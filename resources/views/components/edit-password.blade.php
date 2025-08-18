 <!-- Modal đổi mật khẩu -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Đổi mật khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="POST" action="{{ route('account.updatePassword') }}">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Mật khẩu hiện tại *</label>
                <input type="password" name="current_password" class="form-control" required>
                @error('current_password')
                    <div class="error-text">{{ $message }}</div>
                 @enderror
            </div>

          <div class="mb-3">
            <label class="form-label">Mật khẩu mới *</label>
            <input type="password" name="new_password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Xác nhận mật khẩu mới *</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
            @error('new_password')
                <div class="error-text">{{ $message }}</div>
            @enderror
          </div>

          <div class="password-rules small text-muted">
            <p class="mb-1">Yêu cầu mật khẩu:</p>
            <ul class="mb-0">
              <li>Tối thiểu 8 ký tự</li>
              <li>Gồm chữ hoa, chữ thường và số</li>
            </ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-dark">Lưu</button>
        </div>
      </form>
    </div>
  </div>
</div>
@if ($errors->has('current_password') || $errors->has('new_password'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('passwordModal'));
            myModal.show();
        });
    </script>
@endif