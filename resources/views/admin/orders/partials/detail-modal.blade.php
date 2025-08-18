<div class="modal fade" id="modalOrder{{ $ord->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $ord->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel{{ $ord->id }}">Chi tiết đơn hàng #{{ $ord->id }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <p><strong>Khách hàng:</strong> {{ $ord->fullname }}</p>
            <p><strong>Số điện thoại:</strong> {{ $ord->phone }}</p>
            <p><strong>Địa chỉ:</strong> {{ $ord->address }}, {{ $ord->city }}</p>
            <p><strong>Phương thức thanh toán:</strong> {{ strtoupper($ord->payment_method) }}</p>
            <p><strong>Trạng thái:</strong> {{ $ord->status }}</p>
            <hr>
            <h6>Sản phẩm đã đặt: </h6>
            <div class="row">
            @foreach ($ord->items as $item)
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                <div class="row g-0">
                    <div class="col-4">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->product_name }}" class="img-fluid rounded-start">
                    </div>
                    <div class="col-8">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-1">{{ $item->product_name }}</h6>
                        <p class="mb-1"><strong>Size:</strong> {{ $item->size }}</p>
                        <p class="mb-1"><strong>Số lượng:</strong> {{ $item->quantity }}</p>
                        <p class="mb-0"><strong>Giá:</strong> {{ number_format($item->price, 0, ',', '.') }} đ</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
        </div>
    </div>
</div>