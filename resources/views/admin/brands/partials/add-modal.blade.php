<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form method="POST" action="{{route('brands.store')}}">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Thêm thương hiệu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label for="name" class="form-label">Tên thương hiệu</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Danh mục</label>
                <select name="category_id" class="form-select" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $cat):
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
                </select>
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