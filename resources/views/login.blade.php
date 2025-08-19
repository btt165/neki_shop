<link rel="stylesheet" href="{{asset('user/css/style.css')}}">
<script src="https://kit.fontawesome.com/8c390cc221.js" crossorigin="anonymous"></script>

<!-- login.blade.php -->
<div class="nike-container">
    <div class="nike-logo">
        <a href="/"><img src="{{ asset('user/images/LOGO_NIKE.png') }}"></a>
    </div>

    <h3 class="nike-title">Đăng nhập để được nhận nhiều ưu đãi hơn!</h3>

    <form method="POST" action="/login">
        @csrf
        <!-- Email -->
        <div class="form-group">
            <label>Email*</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
            @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        <!-- Password -->
        <div class="form-group password-wrapper">
            <label>Mật khẩu*</label>
            <input type="password" name="password" required>
            <span class="password-toggle" onclick="togglePassword(this)"><i class="fa-regular fa-eye"></i></span>
        </div>
        @error('password')
            <div class="error-text">{{ $message }}</div>
        @enderror

        <!-- Submit -->
        <button type="submit" class="btn-nike">Đăng nhập</button>
    </form>

    <p class="link-text">
        Chưa có tài khoản? <a href="/register">Vào đây.</a>
    </p>
</div> 
<script src="{{asset('user/js/script.js')}}"></script>
