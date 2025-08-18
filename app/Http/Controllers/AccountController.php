<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class AccountController extends Controller
{
    public function edit(){
        $user = Auth::user();
        $title = 'Quản lý tài khoản';
        return view('profile', compact('user', 'title'));
    }

     public function update(Request $request){
        $user = Auth::user();

        $user->province = $request->province;
        $user->ward     = $request->ward;
        $user->detail = $request->detail;
        $user->save();

        return back()->with('success', 'Cập nhật địa chỉ thành công!');
    }

     public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ], [
            'new_password.confirmed' => 'Mật khẩu xác nhận không khớp',
            'new_password.regex' => 'Mật khẩu phải có chữ hoa, chữ thường và số',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function updatePhone(Request $request)
    {
        $user = Auth::user();

        $user->phone = $request->phone;
        $user->save();

        return back()->with('success', 'Cập nhật số điện thoại thành công!');
    }

    public function destroy(Request $request)
{
    $user = Auth::user();

    Auth::logout(); // Đăng xuất trước khi xóa

    $user->delete(); // Xóa user khỏi DB

    return redirect('/')->with('success', 'Tài khoản của bạn đã được xóa thành công!');
}
}
