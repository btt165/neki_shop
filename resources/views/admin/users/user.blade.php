@extends('admin.main')

@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Quản lý người dùng</h2>
</div>

@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<!-- Bảng người dùng -->
<table class="table table-striped mt-4">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Ngày tạo</th>
            <th>Vai trò</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        <form action="{{ route('users.update', $u->id) }}" method="POST" class="d-flex">
        @csrf
        <tr id="row-view-{{$u->id}}">
            <td>{{$u->id}}</td>
            <td>{{$u->first_name}} {{$u->last_name}}</td>
            <td>{{$u->email}}</td>
            <td>{{$u->created_at}}</td>
            <td>
                    <select name="role" class="form-select form-select-sm me-2">
                        <option value="user" {{ $u->role === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ $u->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
        
                </td>
                <td>
                <button type="submit" class="btn btn-sm btn-dark">Lưu</button>
                <a href="" onclick="remove('{{ route('users.destroy', $u->id) }}')" class="btn btn-sm btn-secondary">Xóa</a>
            </td>
        </tr>
        </form>
        @endforeach
    </tbody>
</table>
<script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection
