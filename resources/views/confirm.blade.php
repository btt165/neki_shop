@extends('main')
@section('content')
  <div class="row">
    <div class="confirmation__wrapper">
        <div class="confirmation__container">
        <h1>Cảm ơn bạn đã đặt hàng!</h1>
        <p>Đơn hàng của bạn đã được xác nhận và đang được xử lý.</p>

        <div class="confirmation__summary">
            <h2>Chi tiết đơn hàng: </h2>
            <div class="summary__line">
            <span>Mã đơn hàng:</span>
            <span>#{{$order->id}}</span>
            </div>
            <div class="summary__line">
            <span>Ngày đặt:</span>
            <span>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</span>
            </div>
            <div class="summary__line">
            <span>Thanh toán:</span>
            <span>{{ $order->payment_method }}</span>
            </div>
            <div class="summary__line">
            <span>Tổng tiền:</span>
            <span>{{ number_format($order->total_price, 0, ',', '.') }}<sup>đ</sup></span>
            </div>
        </div>

        @foreach($order->items as $item)
        <div class="confirmation__item">
            <img src="{{ asset('storage/' . $item->product->image ?? '') }}" alt="{{ $item->product_name }}">
            <div>
            <p><strong>{{ $item->product_name }}</strong></p>
            <p>Số lượng: {{ $item->quantity }}</p>
            <p>Size: {{ $item->size_id }}</p>
            <p>Giá: {{ number_format($item->price, 0, ',', '.') }}<sup>đ</sup></p>
            </div>
        </div>
        @endforeach
        <a href="/" class="back__home-btn">Tiếp tục mua sắm</a>
        </div>
    </div>
  </div>
@endsection