@extends('admin.main')
@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Dòng sản phẩm</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">+ Thêm Dòng sản phẩm</button>
    <!-- Modal thêm danh mục -->
    @include('admin.productLines.partials.add-modal')
</div>
<table class="table table-striped mt-4">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên dòng</th>
            <th>Thương hiệu</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($productLines as $pl)
        <tr id="row-view-{{$pl->id}}">
            <td>{{$pl->id}}</td>
            <td id="view-name-{{$pl->id}}">{{$pl->name}}</td>
            <td id="view-brand-{{$pl->id}}">{{$pl->brand->name}}</td>
            <td>{{$pl->created_at}}</td>
            <td>
                <a href="javascript:void(0);" onclick="showEditForm({{$pl->id}})" class="btn btn-sm btn-dark">Sửa</a>
                <a href="" onclick="remove('{{route('productLines.destroy', $pl->id)}}')" class="btn btn-sm btn-secondary">Xoá</a>
            </td>
        </tr>

        <!-- Form chỉnh sửa -->
        @include('admin.productLines.partials.edit-row')
    @endforeach
    </tbody>
</table>
<script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection