<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form register
    public function showRegister()
    {
        return view('register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'email'       => 'required|email|unique:users,email',
            'first_name'  => 'required|string|max:50',
            'last_name'     => 'required|string|max:50',
            'password'    => 'required|string|min:8',
            'day'         => 'required|integer|min:1|max:31',
            'month'       => 'required|integer|min:1|max:12',
            'year'        => 'required|integer|min:1900|max:' . date('Y'),
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.email'    => 'Email không hợp lệ.',
            'email.unique'   => 'Email này đã tồn tại.',
            'first_name.required' => 'Vui lòng nhập họ.',
            'last_name.required'    => 'Vui lòng nhập tên.',
            'password.required'   => 'Vui lòng nhập mật khẩu.',
            'password.min'        => 'Mật khẩu phải ít nhất 8 ký tự.',
        ]);

        // Gộp ngày sinh
        $dob = sprintf('%04d-%02d-%02d', $request->year, $request->month, $request->day);

        // Lưu user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'dob'        => $dob,
        ]);

        // Login user ngay sau khi đăng ký
        auth()->login($user);

        return redirect('/')->with('success', 'Đăng ký thành công! Chào mừng bạn.');
    }

    // Hiển thị form login
    public function showLogin()
    {
        return view('login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required'    => 'Vui lòng nhập email.',
            'email.email'       => 'Email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min'      => 'Mật khẩu phải ít nhất 8 ký tự.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerate session để tránh fixation attack
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }

        // Nếu đăng nhập thất bại → trả về form kèm lỗi
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ])->withInput($request->only('email'));
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Bạn đã đăng xuất.');
    }
}
