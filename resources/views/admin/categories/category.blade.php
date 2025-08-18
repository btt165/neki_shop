@extends('admin.main')
@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Danh mục sản phẩm</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">+ Thêm danh mục</button>
    <!-- Modal thêm danh mục -->
    @include('admin.categories.partials.add-modal')
    <!-- Hiển thị danh mục -->
</div>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
 <table class="table table-striped mt-4">
        <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Tên danh mục</th>
              <th>Ngày tạo</th>
              <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
            <tr id="row-view-{{$c->id}}">
              <td>{{$c->id}}</td>
              <td>{{$c->name}} </td>
              <td>{{$c->created_at}}</td>
              <td>
                <a href="javascript:void(0);" onclick="showEditForm({{$c->id}})" class="btn btn-sm btn-dark">Sửa</a>
                <a class="btn btn-sm btn-secondary" onclick="remove('{{ route('categories.destroy', $c->id) }}')">Xoá</a>
              </td>
            </tr>
            <!-- Hàng chỉnh sửa -->
            @include('admin.categories.partials.edit-row')
          @endforeach
        </tbody>
      </table>
    <script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection
