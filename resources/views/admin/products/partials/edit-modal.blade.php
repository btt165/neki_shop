<!-- Edit Product Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="edit-product-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="edit-id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div id="modal-alert-container" class="mb-3"></div>
                    <!-- Thông tin cơ bản -->
                    <div class="col-md-6">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" id="edit-name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Màu sắc</label>
                        <select name="color_id" id="edit-color" class="form-select" required>
                            @foreach($colors as $cl)
                                <option value="{{ $cl->id }}">{{ $cl->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Giá</label>
                        <input type="number" name="price" id="edit-price" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" id="edit-category" class="form-select category-select" required>
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="edit-code" class="form-control" required>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Thương hiệu</label>
                        <select name="brand_id" id="edit-brand" class="form-select brand-select" required>
                        </select>
                    </div>
                    <!-- Ảnh chính -->
                    <div class="col-md-6">
                        <div class="image-wrapper">
                            <label class="form-label">Ảnh chính</label>
                            <input type="file" name="image" class="form-control file" >
                            <input type="hidden" name="image_path" id="input-file-hidden">
                            <div id="edit-main-image" class="mt-2 input-file">
                        </div>   
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dòng sản phẩm</label>
                        <select name="productLine_id" id="edit-productLine" class="form-select productline-select" required>
                        </select>
                    </div>
                    <!-- Ảnh phụ -->
                    <div class="col-md-12">
                            <label class="form-label">Ảnh phụ hiện tại</label>
                            <div id="edit-thumb-container" class="d-flex flex-wrap mt-2 input-files"></div>
                            <input type="file" name="thumb_images[]" class="form-control mt-2 thumb_images" multiple>
                    </div>

                    <!-- Size + quantity -->
                    <div class="col-md-12">
                        <label class="form-label">Chọn size và số lượng</label>
                        <div class="row" id="edit-size-container"></div>
                    </div>

                    <!-- Mô tả -->
                    <div class="col-md-12">
                        <label class="form-label">Mô tả</label>
                        <textarea name="des" id="edit-des" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Cập nhật</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </form>
    </div>
</div>
