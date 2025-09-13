$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// Xóa 
function remove(url) {
    if (confirm('Bạn có chắc muốn xóa?')) {
        $.ajax({
            url: url,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            success: function(res) {
                if (res.success) {
                    location.reload();
                } else {
                    alert(res.message || 'Xoá thất bại!');
                }
            },
            error: function(err) {
                alert('Đã xảy ra lỗi!');
            }
        });
    }
}
// Load dữ liệu theo danh mục 
$(document).ready(function () {
    // Khi chọn danh mục
    // $(document).on('change', '.category-select', function () {
    //     const categoryId = $(this).val();
    //     const parent = $(this).closest('form'); // lấy form chứa select này

    //     const brandSelect = parent.find('.brand-select');
    //     const productLineSelect = parent.find('.productline-select');

    //     brandSelect.html('<option value="">-- Đang tải thương hiệu --</option>');
    //     productLineSelect.html('<option value="">-- Chọn dòng sản phẩm --</option>');

    //     if (categoryId) {
    //         $.get(`/api/brands-by-category/${categoryId}`, function (data) {
    //             let options = '<option value="">-- Chọn thương hiệu --</option>';
    //             data.forEach(function (brand) {
    //                 options += `<option value="${brand.id}">${brand.name}</option>`;
    //             });
    //             brandSelect.html(options);
    //         });
    //     }
    // });

    // Khi chọn thương hiệu
    $(document).on('change', '.brand-select', function () {
        const brandId = $(this).val();
        const parent = $(this).closest('form');

        const productLineSelect = parent.find('.productline-select');

        productLineSelect.html('<option value="">-- Đang tải dòng sản phẩm --</option>');

        if (brandId) {
            $.get(`/api/product-lines-by-brand/${brandId}`, function (data) {
                let options = '<option value="">-- Chọn dòng sản phẩm --</option>';
                data.forEach(function (pl) {
                    options += `<option value="${pl.id}">${pl.name}</option>`;
                });
                productLineSelect.html(options);
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('editModal');
    const editModal = new bootstrap.Modal(modalEl); // Instance dùng chung

    // Mở modal khi click edit
    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const productId = this.dataset.id;

            fetch(`/dashboard/product/${productId}/edit`)
                .then(res => res.json())
                .then(data => {
                    fillEditForm(data); // Tách ra 1 hàm riêng
                    editModal.show();
                })
                .catch(err => console.error(err));
        });
    });

    // Submit form
    document.getElementById('edit-product-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch("/dashboard/product/update", {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                editModal.hide(); // Đóng modal ngay

                showAlert(data.message, 'success','alert-container'); // Hiện thông báo

            } else {
                showAlert('Có lỗi xảy ra!', 'danger');
            }
        })
        .catch(err => console.error(err));
    });

    // Hàm hiện alert
    function showAlert(message, type = 'success', containerId = 'alert-container') {
    const container = document.getElementById(containerId);
    const alertBox = document.createElement('div');
    alertBox.className = `alert alert-${type} mt-2`;
    alertBox.innerText = message;
    container.appendChild(alertBox);

    // Tự ẩn sau 3 giây
    setTimeout(() => alertBox.remove(), 5000);
    }

    // Hàm fill dữ liệu form (để code gọn)
    function fillEditForm(data) {
        const p = data.product;
        const qMap = data.quantityMap;
        const sizes = data.sizes;
        
        document.getElementById('edit-id').value = p.id;
        document.getElementById('edit-name').value = p.name;
        document.getElementById('edit-price').value = p.price;
        document.getElementById('edit-code').value = p.product_code;
        document.getElementById('edit-des').value = p.des;
        document.getElementById('edit-color').value = p.color_id;

        $('#edit-category').val(p.category_id).trigger('change');
        setTimeout(() => $('#edit-brand').val(p.brand_id).trigger('change'), 300);
        setTimeout(() => $('#edit-productLine').val(p.productLine_id), 600);

        // Ảnh
        document.getElementById('edit-main-image').innerHTML =
            p.image ? `<img src="/storage/${p.image}" width="100" class="rounded border">` : '';

        const thumbContainer = document.getElementById('edit-thumb-container');
        thumbContainer.innerHTML = '';
        p.images.forEach(img => {
            thumbContainer.innerHTML += `
                <div class="position-relative me-2 mb-2">
                    <img src="/storage/${img.image_path}" width="80" class="border rounded">
                    <button type="button" class="btn btn-sm btn-dark position-absolute top-0 end-0 delete-thumb-btn" data-id="${img.id}">×</button>
                </div>
            `;
        });

        // Sizes
        const sizeContainer = document.getElementById('edit-size-container');
        sizeContainer.innerHTML = '';
        sizes.forEach(size => {
            const checked = qMap[size.id] !== undefined;
            const qty = checked ? qMap[size.id] : '';
            sizeContainer.innerHTML += `
                <div class="col-md-4 mb-2">
                    <div class="border p-2 rounded">
                        <label>
                            <input type="checkbox" name="sizes[${size.id}][selected]" value="1" ${checked ? 'checked' : ''}>
                            Size: ${size.name}
                        </label>
                        <input type="number" name="sizes[${size.id}][quantity]" class="form-control form-control-sm mt-1" min="0" value="${qty}">
                    </div>
                </div>
            `;
        });

    // Gán sự kiện xóa ảnh
    thumbContainer.querySelectorAll('.delete-thumb-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const imageId = this.dataset.id;

            if (confirm('Bạn có chắc muốn xóa ảnh này?')) {
                fetch(`/dashboard/product/image/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        this.closest('.position-relative').remove(); // Xóa ảnh khỏi UI
                        showAlert(data.message, 'success','modal-alert-container');
                    } else {
                        showAlert('Xóa ảnh thất bại!', 'danger');
                    }
                })
                .catch(err => console.error(err));
            }
        });
    });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const categoryFilter = document.getElementById('filter-category');
    const brandFilter = document.getElementById('filter-brand');
    const productLineFilter = document.getElementById('filter-productLine');
    const productCards = document.querySelectorAll('.product-card');

    function filterProducts() {
        const categoryVal = categoryFilter.value;
        const brandVal = brandFilter.value;
        const productLineVal = productLineFilter.value;

        productCards.forEach(card => {
            const matchCategory = !categoryVal || card.dataset.category === categoryVal;
            const matchBrand = !brandVal || card.dataset.brand === brandVal;
            const matchProductLine = !productLineVal || card.dataset.productline === productLineVal;

            if (matchCategory && matchBrand && matchProductLine) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    categoryFilter.addEventListener('change', filterProducts);
    brandFilter.addEventListener('change', filterProducts);
    productLineFilter.addEventListener('change', filterProducts);
});

