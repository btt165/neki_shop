@extends('main')
@section('content')
<div class="container">
    <div class="product__content">
      <div class="product__left row">
        <div class="product__thumbnails">
            @foreach($product->images as $img)
            <img src="{{asset('storage/' . $img->image_path )}}">
            @endforeach
        </div>
        <div class="product__main-image">
          <img src="{{asset('storage/'. $product->image )}}">
          <input type="hidden" name="image" value="{{ $product->image }}">
        </div>
      </div>
          <div class="product__right">
            <form id="addToCart" action="{{ route('cart.store') }}" method="POST">
                @csrf
                <div class="product__title">
                <h1>{{$product->name}}</h1>
                <p>{{$product->product_code}}</p>
                </div>
                <div class="product__price">
                <p>{{ number_format($product->price, 0, ',', '.') }}<sup>đ</sup></p>
                </div>
                <div class="product__color">
                <p><strong>Màu sắc</strong></p>
                <div class="product__color-img">
                    <img src="{{ asset('storage/' . $product->color->image) }}" alt="color">
                </div>
                </div>
                <div class="product__size">
                  <p><strong>Size</strong></p>
                  <div class="product__size-options" >
                      @foreach($product->sizes as $s)
                          <span data-id="{{$s->name}}">{{$s->name}}</span>
                      @endforeach
                  </div>
                  <span class="product__size-warning">Vui lòng chọn size*</span>
                </div>
                <div class="product__cart">
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                    <input type="hidden" name="size_id" id="selectedSize" >
                    <input type="hidden" name="color_id"  value="{{$product->color_id}}">
                    <input type="hidden" name="category_id"  value="{{$product->category_id}}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn--add-to-cart">Thêm vào giỏ</button>
                </div>
            </form>
            <div class="product__info">
              <p>
                {{$product->des}}
              </p>
            </div>
    
            <div class="accordion">
              <div class="accordion__item">
                <div class="accordion__header">
                  <span>Miễn phí giao hàng và đổi trả</span>
                  <i class="fa-solid fa-chevron-down icon"></i>
                </div>
                <div class="accordion__content">
                  <p>Miễn phí giao hàng và đổi trả trong vòng 7 ngày.</p>
                </div>
              </div>
    
              <div class="accordion__item">
                <div class="accordion__header">
                  <span>Đánh giá ()</span>
                  <div class="accordion__right">
                    <span class="stars">★ ★ ★ ★ ★</span>
                    <i class="fa-solid fa-chevron-down icon"></i>
                  </div>
                </div>
                <div class="accordion__content">
                  <p>Đánh giá người dùng về sản phẩm...</p>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
  <div class="container">
    <!-- Product related -->
  <x-related-products :product-id="$product->id"/>
  </div>

<!-- Popup giỏ hàng -->
<div id="cart-popup" class="cart-popup">
    <div class="cart-popup-content">
        <span id="cart-popup-close" class="close">&times;</span>
        <p class="cart-popup-title"><i class="fa-solid fa-check"> </i>  Đã thêm vào giỏ hàng </p>
        <div class="cart-popup-product">
            <img id="popup-product-image" src="" alt="">
            <div>
                <p id="popup-product-name"></p>
                <p id="popup-product-category"></p>
                <p id="popup-product-size"></p>
                <p id="popup-product-price"></p>
            </div>
        </div>
        <a href="{{ route('cart.index') }}" class="btn btn-view-cart">Xem giỏ hàng</a>
        <a href="{{ route('checkout.index') }}" class="btn btn-checkout">Thanh toán</a>
    </div>
</div>


@endsection
<script>
document.addEventListener("DOMContentLoaded", function () {
    const addToCartBtn = document.querySelector(".btn--add-to-cart");
    const cartCount = document.getElementById("cart-count");
    const popup = document.getElementById("cart-popup");
    const popupClose = document.getElementById("cart-popup-close");
    const sizeOptions = document.querySelectorAll(".product__size-options span");
    const form = document.getElementById("addToCart");
    const hiddenInput = document.getElementById("selectedSize");
    const sizeWarning = document.querySelector(".product__size-warning");

    addToCartBtn.addEventListener("click", function (e) {
        e.preventDefault();
        // Kiểm tra trước khi submit
        if (!hiddenInput.value) {
                sizeWarning.style.display = "block";
                return;
            }

        sizeWarning.style.display = "none";

        const formData = new FormData();
        formData.append("product_id", document.querySelector("[name='product_id']").value);
        formData.append("size_id", document.querySelector("[name='size_id']").value);
        formData.append("color_id", document.querySelector("[name='color_id']").value);
        formData.append("quantity", document.querySelector("[name='quantity']").value);
        formData.append("_token", document.querySelector("meta[name='csrf-token']").content);

        fetch('{{ route("cart.store") }}', {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Cập nhật số lượng giỏ hàng
                cartCount.textContent = data.cart_count;
                
                // Hiển thị popup
                document.getElementById("popup-product-image").src = data.product.image;
                document.getElementById("popup-product-name").textContent = data.product.name;
                document.getElementById("popup-product-category").textContent = data.product.category;
                document.getElementById("popup-product-size").textContent = data.product.size ? "Size: " + data.product.size : "";
                document.getElementById("popup-product-price").textContent = data.product.price + " ₫";

                popup.style.display = "block";

                // Tự ẩn popup sau 5s
                setTimeout(() => {
                    popup.style.display = "none";
                }, 5000);
            }
        })
        .catch(err => console.error(err));
    });

    popupClose.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // Xử lý chọn size
  sizeOptions.forEach(option => {
      option.addEventListener("click", function(){
          // Xóa active ở tất cả
          sizeOptions.forEach(o => o.classList.remove("active"));

          // Thêm active vào cái được click
          this.classList.add("active");

          // Gán giá trị ID size vào input hidden
          hiddenInput.value = this.dataset.id;

          // Ẩn cảnh báo
          sizeWarning.style.display = "none";
      });
  });
});

</script>