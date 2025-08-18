<!-- Modal chỉnh sửa slide -->
<div class="modal fade" id="editSlideModal-{{ $s->id }}" tabindex="-1" aria-labelledby="editSlideModalLabel-{{ $s->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('slides.update', $s->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chỉnh sửa Slide</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" name="title" value="{{ $s->title }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hình ảnh</label>
                        <input type="file" name="image" class="form-control">
                        <div class="mt-2">
                            <img src="{{ asset('storage/'.$s->image) }}" alt="{{ $s->title }}" width="120" class="rounded">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Link</label>
                        <input type="url" name="link" value="{{ $s->link }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="status" class="form-select">
                            <option value='1' {{ $s->status ? 'selected' : '' }}>Hiển thị</option>
                            <option value='0' {{ !$s->status ? 'selected' : '' }}>Ẩn</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</div>
