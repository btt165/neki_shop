@extends('admin.main')
@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Số lượng</h2>
  
</div>
<table class="table table-striped mt-4">
<thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Sản phẩm</th>
        <th>Size</th>
        <th>Số lượng</th>
        <th>Ngày tạo</th>
        <th>Hành động</th>
    </tr>
</thead>
<tbody>
    @foreach($quantities as $q)
    <tr id="row-view-{{$q->id}}">
        <td>{{$q->id}}</td>
        <td>{{$q->product->name}}</td>
        <td>{{$q->size->name}}</td>
        <td>{{$q->amount}}</td>
        <td>{{$q->created_at}}</td>
        <td>
            <a href="javascript:void(0);" onclick="showEditForm(<?= $q['id']?>)" class="btn btn-dark">Sửa</a>
            <a href="?delete=<?= $q['id']?>" class="btn btn-sm btn-secondary" onclick="return confirm('Xác nhận xóa!">Xóa</a>
        </td>
    </tr>
    <!-- Form sửa inline -->

       @endforeach
</tbody>
</table>

@endsection