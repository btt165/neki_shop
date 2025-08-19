<link rel="stylesheet" href="{{asset('user/css/style.css')}}">
<script src="https://kit.fontawesome.com/8c390cc221.js" crossorigin="anonymous"></script>
<link rel="icon" href="{{ asset('user/images/android-icon.png') }}"  type="image/x-icon">
<title>Đăng kí</title>

<!-- register.blade.php -->
<div class="nike-container">
    <div class="nike-logo">
        <a href="/"><img src="{{ asset('user/images/LOGO_NIKE.png') }}"></a>
    </div>
    <h3 class="nike-title">Chỉ mất vài bước để bắt đầu!</h3>

    <form method="POST" action="/register">
        @csrf
        <!-- Email -->
        <div class="form-group">
            <label>Email*</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
             @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- First Name & Surname -->
        <div class="form-row">
            <div class="form-group">
                <label>Họ*</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" required>
                @error('first_name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tên*</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" required>
                @error('last_name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Password -->
        <div class="form-group password-wrapper">
            <label>Mật khẩu*</label>
            <input type="password" name="password" required>
            <span class="password-toggle-register" onclick="togglePassword(this)"><i class="fa-regular fa-eye"></i></span>
            @error('password')
                <div class="error-text">{{ $message }}</div>
            @enderror
            <small class="note">Ít nhất 8 kí tự, có chữ hoa chữ thường và số nhé!</small>
        </div>

        <!-- Date of Birth -->
        <label>Ngày tháng năm xinh </label>
        <div class="form-row">
            <div class="form-group">
                <input type="number" name="day" placeholder="Ngày*" min="1" max="31" required>
            </div>
            <div class="form-group">
                <input type="number" name="month" placeholder="Tháng*" min="1" max="12" required>
            </div>
            <div class="form-group">
                <input type="number" name="year" placeholder="Năm*" min="1900" max="2100" required>
            </div>
            @error('day')<div class="error-text">{{ $message }}</div>@enderror
            @error('month')<div class="error-text">{{ $message }}</div>@enderror
            @error('year')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-nike">Tạo tài khoản</button>
    </form>

    <p class="link-text">
        Đã có tài khoản? <a href="/login">Vào đây.</a>
    </p>
</div>
<script src="{{asset('user/js/script.js')}}"></script>

