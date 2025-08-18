<div class="product__related">
    <div class="product__related-title">
        <p>Có thể bạn thích </p>
        <div class="related-wrapper">
            
            <button class="related-btn prev-btn">&#10094;</button>
            <div class="related-track">
                @foreach($relatedProducts as $item)
                    <div class="product__related-item">
                        <a href="/product/{{$item->id}}">
                            <img src="{{asset('storage/' . $item->image)}}" alt="{{$item->name}}">
                        </a>
                        <h1>{{$item->name}}</h1>
                        <h5>{{$item->category->name}}</h5>
                        <span>{{ number_format($item->price, 0, ',','.') }}<sup>đ</sup></span>
                    </div>
                @endforeach
            </div>
            <button class="related-btn next-btn">&#10095;</button>
        </div>
    </div>
</div>