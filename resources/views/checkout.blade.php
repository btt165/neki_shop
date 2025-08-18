@extends('main')
@section('content')
    <div class="row">
        <div class="checkout__wrapper">
            <h2>Thông tin giao hàng</h2>
            <form class="checkout__form" action="{{ route('checkout.store')}} " method="POST">
                <div class="checkout__group">
                    <label for="fullname">Họ và tên</label>
                    <input type="text" name="fullname" id="fullname" required>
                </div>
                <div class="checkout__group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="checkout__group">
                    <label for="address">Thành phố</label>
                    <input type="text" name="city" id="city" required>
                </div>
                <div class="checkout__group">
                    <label for="address">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" required>
                </div>
                <div class="checkout__group">
                    <label for="address">Email</label>
                    <input type="text" name="email" id="email" >
                </div>
                <div class="checkout__group">
                    <label>Phương thức thanh toán</label>
                    <select name="payment" id="checkout">
                        <option value="">-- Chọn phương thức --</option>
                        <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                        <option value="card">Thẻ ngân hàng</option>
                        <option value="momo">Ví Momo</option>
                    </select>
                </div>
                    <button type="submit" class="btn__submit">Tiếp tục</button>
                @csrf
            </form>
        </div>
        <div class="order__summary">
            <h2>Đơn hàng của bạn</h2>
            <div class="summary__line">
                <span>Tạm tính</span>
                <span>{{ number_format($subTotal, 0, ',','.') }}<sup>đ</sup></span>
            </div>
            <div class="summary__line">
                <span>Giao hàng</span>
                <span>Miến phí</span>
            </div>
            <div class="summary__total">
                <p>Tổng cộng</p>
                <p>{{ number_format($subTotal, 0, ',', '.') }}<sup>đ</sup></p>
            </div>
            <div class="shipment__title">
                <p>Dự kiến, 11 tháng 7 - 16 tháng 7</p>
            </div>
            @foreach($cart as $item)
            <div class="order__item">
                <img src="{{ asset('storage/' . $item['image']) }}">
                <div class="item__info">
                    <h3>{{$item['name']}}</h3>
                    <h3>{{$item['category_name']}}</h3>
                    <p>Số lượng: {{$item['quantity']}}</p>
                    <p>Size: {{$item['size_id']}}</p>
                    <p>{{ number_format($item['price'], 0, ',', '.') }}<sup>đ</sup></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection