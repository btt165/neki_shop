@extends('admin.main')
@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Màu sắc</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">+ Thêm Màu sắc</button>
    <!-- Modal thêm danh mục -->
    @include('admin.colors.partials.add-modal')
</div>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
<table class="table table-striped mt-4">
    <thead class="table-dark">
        <tr>
        <th>ID</th>
        <th>Tên màu</th>
        <th>Ảnh</th>
        <th>Ngày tạo</th>
        <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($colors as $c)
        <!-- View -->
        <tr id="row-view-{{$c->id}}">
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>
                <img src="{{asset('storage/'. $c->image)}}" alt="" width="50">
            </td>
            <td> {{$c->created_at}} </td>
            <td>
            <a href="javascript:void(0);" onclick="showEditForm({{$c->id}})" class="btn btn-sm btn-dark">Sửa</a>
            <a href="" class="btn btn-sm btn-secondary" onclick="remove('{{ route('colors.destroy', $c->id) }}')">Xoá</a>
            </td>
        </tr>
        <!-- Edit -->
        @include('admin.colors.partials.edit-modal')
        @endforeach
    </tbody>
</table>
<script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection
