@extends('admin.main')
@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Đơn hàng</h2>
</div>
    @if (session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif

    <table class="table table-striped mt-4">
    <thead class="table-dark">
        <tr>
        <th>ID</th>
        <th>Khách hàng</th>
        <th>Địa chỉ</th>
        <th>Thanh toán</th>
        <th>Tổng tiền</th>
        <th>Ngày đặt</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $ord)
        <tr>
        <td>{{ $ord->id }}</td>
        <td>{{ $ord->fullname }}</td>
        <td>{{ $ord->address }}, {{ $ord->city }}</td>
        <td>{{ strtoupper($ord->payment_method) }}</td>
        <td>{{ number_format($ord->total_price, 0, ',', '.') }} đ</td>
        <td>{{ $ord->created_at }}</td>
        <td>
            <form method="POST" action="{{ route('orders.update-status') }}" class="d-flex align-items-center gap-1 order-status-form">
                @csrf
                <input type="hidden" name="order_id" value="{{ $ord->id }}">
                <select name="status" class="form-select form-select-sm order-status-select">
                    @foreach (['Chờ xác nhận', 'Đang xử lý', 'Đang giao', 'Hoàn thành', 'Đã huỷ'] as $status)
                        <option {{ $ord->status === $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-dark confirm-status-btn" style="width: 30px; display: none;">✓</button>
                
            </form>
            
        </td>
        <td>
            <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#modalOrder{{ $ord->id }}">Chi tiết</button>
            <a href="" class="btn btn-sm btn-secondary" onclick="remove('{{route('orders.destroy', $ord->id)}}')">Xoá</a>
        </td>
        
        </tr>
        <!-- Modal Chi Tiết -->
        @include('admin.orders.partials.detail-modal')
        @endforeach
    </tbody>
    </table>
<script>

</script>
<script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection
