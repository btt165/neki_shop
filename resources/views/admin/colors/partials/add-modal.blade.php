<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form method="POST" action="{{ route('colors.store') }}" enctype="multipart/form-data">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Thêm Màu sắc</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label for="name" class="form-label">Tên Màu sắc</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <div class="image-wrapper">
                    <label>Ảnh màu sắc</label>
                    <input type="file" name="image" class="form-control file" accept="image/*">
                    <input type="hidden" name="image" class="input-file-hidden">
                    <div class="mt-2 input-file">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-dark">Thêm</button>
        </div>
        </div>
        @csrf
    </form>
    </div>
</div>