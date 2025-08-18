@extends('main')
@section('content')
<div class="row">
        <!-- Cart Section -->
        <div class="cart">
            <h2>Giỏ hàng</h2>
            @php
                $subTotal = 0
            @endphp
            @forelse($cart as $key => $item)
                @php
                    $itemTotal = $item['price'] * $item['quantity'];
                    $subTotal += $itemTotal;
                @endphp
                <div class="item" data-id="{{ $key }}">
                    <img src="{{ asset('storage/' . $item['image']) }}">
                    <div class="item__details">
                        <h3>{{ $item['name'] }}</h3>
                        <p>{{ $item['category_name'] }}</p>
                        <p>{{ $item['color_name']}}</p>
                        <p>{{ number_format($item['price'], 0, ',', '.') }}<sup>đ</sup></p>
                        <p>Size: <u>{{ $item['size_id'] }}</u></p>
                        <div class="item__actions">
                            <a href="{{ route('cart.destroy', $key) }}"><i class="fa-solid fa-trash"></i></a>
                            <div class="quantity__box">
                                <button class="decrease">-</button>
                                <span class="quantity">{{ $item['quantity'] }}</span>
                                <button class="increase">+</button>
                            </div>
                            <a><i class="fa-regular fa-heart"></i></a>
                        </div>
                    </div>
                    <h4>{{ number_format($itemTotal, 0, ',', '.') }}<sup>đ</sup></h4>
                </div>
                @empty
                    <p>Giỏ hàng của bạn đang trống.</p>
                @endforelse
        </div>
        <!-- Summary Section -->
        <div class="summary">
            <h2>Đơn hàng của bạn</h2>
            <div class="summary__item">
                <span id="subtotal">{{ number_format($subTotal, 0, ',', '.') }}<sup>đ</sup></span>
                <span>Tạm tính <i class="fa-regular fa-circle-question"></i></span>
            </div>
            <div class="summary__item">
                <span>Giao hàng</span>
                <span>Tiêu chuẩn (3-4 ngày): Free</span>
            </div>
            <div class="summary__item summary__total">
                <span>Tổng cộng</span>
                <span id="cart-total">{{ number_format($subTotal, 0, ',', '.') }}<sup>đ</sup></span>
            </div>
            <a href="{{ route('checkout.index') }}" class="checkout__btn">Thanh toán</a>
            <a href="{{ url()->previous() }}" class="back__btn">Quay lại</a>
        </div>
</div>

  <!-- Product related -->
<x-related-products :product-id="$productId"/>

<script>
    window.updateCartUrl = "{{ route('cart.update') }}";
    window.csrfToken = "{{ csrf_token() }}";
</script>
<script src="{{ asset('user/js/ajax.js') }}"></script>

@endsection
