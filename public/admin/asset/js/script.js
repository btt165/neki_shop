
// Kích hoạt active
  document.addEventListener('DOMContentLoaded', function () {
    const sidebarLinks = document.querySelectorAll('.sidebar a');
    const currentPath = window.location.pathname;

    sidebarLinks.forEach(link => {
      // So khớp với đường dẫn tuyệt đối
      if(link.getAttribute('href') === currentPath){
        link.classList.add('active');

        // Nếu link nằm tỏngn submenu, mở collapse
        const submenu = link.closest('.collapse');
        if(submenu) {
          const bscollapse = new bootstrap.Collapse(submenu, { toggle : false});
          bscollapse.show();
        }
      }
    });
  });
      let currentEditingId = null;

  // Ẩn thông báo sau 3 giây
  setTimeout(() => {
    const alert = document.getElementById("alert-message");
    if (alert) alert.style.display = "none";
  }, 3000);

  // Hiện dòng chỉnh sửa
  function showEditForm(id) {
    // Nếu đang sửa dòng khác thì hủy trước
    if (currentEditingId !== null && currentEditingId !== id) {
      cancelEdit(currentEditingId);
    }

    // Hiện form chỉnh sửa cho dòng mới
    document.getElementById('row-view-' + id).classList.add('d-none');
    document.getElementById('row-edit-' + id).classList.remove('d-none');
    currentEditingId = id;
  }

  // Hủy chỉnh sửa
  function cancelEdit(id) {
    document.getElementById('row-view-' + id).classList.remove('d-none');
    document.getElementById('row-edit-' + id).classList.add('d-none');
    if (currentEditingId === id) {
      currentEditingId = null;
    }
  }

  // Bấm ra ngoài thì cancel
  document.addEventListener('click', function (event) {
    if (currentEditingId !== null) {
      const editRow = document.getElementById('row-edit-' + currentEditingId);
      const viewRow = document.getElementById('row-view-' + currentEditingId);

      if (!editRow.contains(event.target) && !viewRow.contains(event.target)) {
        cancelEdit(currentEditingId);
      }
    }
  });

// Khi thay đổi trạng thái => hiện nút ✓
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.order-status-form').forEach(function(form) {
        const select = form.querySelector('.order-status-select');
        const button = form.querySelector('.confirm-status-btn');
        const initialValue = select.value;

        select.addEventListener('change', function() {
            if (select.value !== initialValue) {
                button.style.display = 'inline-block';
            } else {
                button.style.display = 'none';
            }
        });
        
         // Khi click ra ngoài => ẩn nút nếu chưa bấm ✓
        document.addEventListener('click', function(e) {
            if (!form.contains(e.target)) {
                button.style.display = 'none';
                select.value = initialValue; 
            }
        });
    });
});




document.addEventListener("DOMContentLoaded", function () {
    // Preview ảnh chính
    function previewMainImage(input, container) {
        let previewContainer = document.querySelector(container);
        previewContainer.innerHTML = "";
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                let wrapper = document.createElement("div");
                wrapper.classList.add("position-relative", "d-inline-block", "me-2");

                let img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("img-thumbnail");
                img.style.maxHeight = "120px";

                let btn = document.createElement("button");
                btn.type = "button";
                btn.innerHTML = "&times;";
                btn.classList.add("btn", "btn-sm", "btn-dark", "position-absolute");
                btn.style.top = "0";
                btn.style.right = "0";


                btn.onclick = function () {
                    input.value = ""; // clear input file
                    previewContainer.innerHTML = "";
                };

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Preview + xóa nhiều ảnh phụ
    function previewThumbImages(input, container) {
        let previewContainer = document.querySelector(container);
        previewContainer.innerHTML = "";

        if (input.files) {
            Array.from(input.files).forEach((file, index) => {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let wrapper = document.createElement("div");
                    wrapper.classList.add("position-relative", "d-inline-block", "me-2", "mb-2");

                    let img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("img-thumbnail");
                    img.style.maxHeight = "100px";

                    let btn = document.createElement("button");
                    btn.type = "button";
                    btn.innerHTML = "&times;";
                    btn.classList.add("btn", "btn-sm", "btn-dark", "position-absolute");
                    btn.style.top = "0";
                    btn.style.right = "0";


                    btn.onclick = function () {
                        wrapper.remove();

                        
                        let dt = new DataTransfer();
                        Array.from(input.files)
                            .forEach((f, i) => { if (i !== index) dt.items.add(f); });
                        input.files = dt.files;
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(btn);
                    previewContainer.appendChild(wrapper);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    // Gắn sự kiện cho modal Thêm sản phẩm
    document.querySelector("#addModal input[name='image']").addEventListener("change", function () {
        previewMainImage(this, "#addModal .input-file");
    });

    document.querySelector("#addModal input[name='thumb_images[]']").addEventListener("change", function () {
        previewThumbImages(this, "#addModal .input-files");
    });

    // Gắn sự kiện cho modal Sửa sản phẩm
    document.querySelector("#editModal input[name='image']").addEventListener("change", function () {
        previewMainImage(this, "#edit-main-image");
    });

    document.querySelector("#editModal input[name='thumb_images[]']").addEventListener("change", function () {
        previewThumbImages(this, "#edit-thumb-container");
    });
});
