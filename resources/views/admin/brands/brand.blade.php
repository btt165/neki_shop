@extends('admin.main')
@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Thương hiệu</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">+ Thêm thương hiệu</button>

    <!-- Modal thêm danh mục -->
    @include('admin.brands.partials.add-modal')
</div>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
      <!-- Bảng thương hiệu -->
      <table class="table table-striped mt-4">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Tên thương hiệu</th>
            <th>Danh mục</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
            @foreach($brands as $b)
          <tr id="row-view-{{$b->id}}">
            <td>{{$b->id}}</td>
            <td id="view-name-{{$b->id}}">{{$b->name}}</td>
            <td id="view-cat-{{$b->id}}">{{$b->category->name}}</td>
            <td>{{$b->created_at}}</td>
            <td>
                <a href="javascript:void(0);" onclick="showEditForm({{$b->id}})" class="btn btn-sm btn-dark">Sửa</a>
                <a href="" class="btn btn-sm btn-secondary" onclick="remove('{{ route('brands.destroy', $b->id) }}')">Xoá</a>
            </td>
            </tr>
            <!-- Hàng chỉnh sửa -->
            @include('admin.brands.partials.edit-row')
          @endforeach
        </tbody>
      </table>
    <script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection