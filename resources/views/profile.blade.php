@extends('main')

@section('content')
<div class="account-container">
    <div class="sidebar">
        <ul>
            <li>Chi tiết tài khoản</li>
            
        </ul>
    </div>

    <div class="account-details">
        <h2>Chi tiết tài khoản</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form id="accountForm" action="{{ route('account.update') }}" method="POST">
            @csrf
            <label>Email</label>
            <input type="email" value="{{ $user->email }}" readonly >

            <label>Mật khẩu</label>
            <div class="inline-field">
                <input type="password" value="********" readonly>
                <a href="#" data-bs-toggle="modal" data-bs-target="#passwordModal" >Cập nhật</a>
            </div>
            <label>Số điện thoại</label>
            <div class="inline-field">
                <input type="text" placeholder="{{ $user->phone }}">
                <a href="#" data-bs-toggle="modal" data-bs-target="#phoneModal">Thêm</a>
            </div>

            <label>Ngày tháng năm xinh</label>
            <input type="text" value="{{ $user->dob }}" readonly>

            <h3>Địa chỉ</h3>
            
            <label>Tỉnh/Thành phố</label>
            <input type="text" name="province" value="{{ $user->province }}">

            <label>Xã/phường</label>
            <input type="text" name="ward" value="{{ $user->ward }}">

            <label>Chi tiết</label>
            <input type="text" name="detail"  value="{{ $user->detail }}">

        </form>
        <div class="delete-section">
            <p>Xóa tài khoản</p>
            <form action="{{ route('account.destroy') }}" method="POST" style="display: contents"
                onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Xóa tài khoản</button>
            </form>
        </div>
        <div class="actions-section">
            <button type="submit" class="save-btn" form="accountForm">Lưu thay đổi</button>
        </div>
    </div>
</div>
@endsection
@include('components.edit-password')
@include('components.edit-phone')
