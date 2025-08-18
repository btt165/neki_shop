<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form method="POST" action="{{route('productLines.store')}}">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Thêm Dòng sản phẩm</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label for="name" class="form-label">Tên Dòng sản phẩm</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Thương hiệu</label>
                <select name="brand_id" class="form-select" required>
                    <option value="">-- Chọn thương hiệu --</option>
                    @foreach($brands as $b)
                        <option value="{{$b->id}}">{{$b->name}}</option>
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