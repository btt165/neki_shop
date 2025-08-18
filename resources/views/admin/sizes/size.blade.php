@extends('admin.main')
@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Size sản phẩm</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">+ Thêm Size</button>
    <!-- Modal thêm danh mục -->
    @include('admin.sizes.partials.add-modal')
</div>
<table class="table table-striped mt-4">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Size</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sizes as $s)
            <!-- View -->
            <tr id="row-view-{{$s->id}}">
                <td>{{$s->id}}</td>
                <td>{{$s->name}}</td>
                <td>{{$s->created_at}}</td>
                <td>
                    <a href="javascript:void(0);" onclick="showEditForm({{$s->id}})" class="btn btn-sm btn-dark">Sửa</a>
                    <a href="" class="btn btn-sm btn-secondary" onclick="remove('{{ route('sizes.destroy', $s->id) }}')">Xoá</a>
                </td>
            </tr>

            <!-- Edit -->
            @include('admin.sizes.partials.edit-row')
        @endforeach
    </tbody>
</table>
<script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection