@extends('main')
@section('content')
<div class="container">
    <div class="category__top">
        <div>
            <div class="category__breadcrumb">
               @foreach($breadcrumb as $name => $url)
                    @if($url)
                        <a href="{{ $url }}">{{ $name }}</a>
                        <span> / </span>
                    @else
                        <span>{{ $name }}</span>
                    @endif
                @endforeach
            </div>
        </div>
        <div>
            <div class="category__title">
                <h1>{{$title}}</h1>
            </div>
        </div>
        <div>
            <div class="category__right">
                <button id="filterToggle" ><span>Bộ lọc </span><i class="fa-solid fa-sliders"></i></button>
                <div class="category__sort">
                    <select id="sortSelect">
                        <option value="">Sắp xếp</option>
                        <option value="newest">Mới nhất</option>
                        <option value="desc">Giá: Cao-Thấp</option>
                        <option value="asc">Giá: Thấp-Cao</option>
                    </select>
                </div>
            </div>   
        </div>       
    </div>   
    <div class="row">
        <aside id="sidebarFilter" class="category__sidebar">
            <ul>
                @foreach($productLines as $pl)
                    <li class="category__sidebar-item {{ request()->routeIs('productLine.show') && request()->route('id') == $pl->id ? 'active' : '' }}">
                        <a href="{{ route('productLine.show', $pl->id) }}">{{ $pl->name }}</a>
                    </li>
                @endforeach
            </ul>
            <hr>

            <div class="filter-section">
                
                <div class="filter-group">
                    <button class="filter-toggle">Shop By Price <i class="fa-solid fa-chevron-down"></i></button>
                    <ul class="filter-options">
                        <label>
                            <li><input type="checkbox" class="price-filter" value="0-1000000"> Dưới 1 triệu </li>
                        </label>
                        <label>
                            <li><input type="checkbox" class="price-filter" value="1000000-2000000"> 1 - 2 triệu</li>
                        </label>
                    </ul>
                </div>

                <div class="filter-group">
                    <button class="filter-toggle">Size <i class="fa-solid fa-chevron-down"></i></button>
                    <ul class="filter-options">
                        <ul class="size-list">
                                @foreach($sizes as $size)
                                    <li>
                                        <label class="size-option">
                                        <input type="checkbox" class="size-filter" value="{{ $size->name }}"> 
                                        <span>{{ $size->name }}</span>
                                    </li>
                                @endforeach
                            </label>
                        </ul>
                    </ul>
                </div>

                <div class="filter-group">
                    <button class="filter-toggle">Colour <i class="fa-solid fa-chevron-down"></i></button>
                    <ul class="filter-options">
                        <ul class="color-list">
                        @foreach($colors as $color)
                            <li>
                                <label class="color-option">
                                    <input type="checkbox" class="color-filter" value="{{ $color->id }}">
                                    <img src="{{ asset('storage/' . $color->image) }}" alt="{{ $color->name }}">
                                    <p>{{ $color->name }}</p>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </ul>
                </div>

            </div>
        </aside>
        <main class="category__main" id="mainContent">
            <div class="category__products">
                @foreach($products as $product)
                <div class="product__card" 
                    data-created="{{ $product->created_at }}"
                    data-price="{{ $product->price }}"
                    data-color="{{ $product->color_id }}"
                    data-sizes="{{ $product->sizes->pluck('name')->implode(',') }}">
                    <a href="/product/{{$product->id}}"><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"/></a>
                    <h2>{{ $product->name }}</h2>
                    <p>{{ number_format($product->price, 0, ',', '.') }}<sup>đ</sup></p>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>
<script>
    // toggle sidebar
    document.querySelectorAll('.filter-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const icon = button.querySelector('.fa-chevron-down');
            icon.classList.toggle('active')

            const options = button.nextElementSibling;
            options.classList.toggle('open');
        });
    });

    // Bộ lọc
    document.getElementById('filterToggle').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebarFilter');
    const mainContent = document.getElementById('mainContent');

    sidebar.classList.toggle('hidden');
    mainContent.classList.toggle('full-width');
    });

    // Sắp xếp
    document.getElementById('sortSelect').addEventListener('change', function () {
    let sortType = this.value;
    let container = document.querySelector('.category__products');
    let products = Array.from(container.querySelectorAll('.product__card'));

    products.sort((a, b) => {
        let priceA = parseInt(a.querySelector('p').innerText.replace(/\D/g, ''), 10);
        let priceB = parseInt(b.querySelector('p').innerText.replace(/\D/g, ''), 10);

        let dateA = new Date(a.dataset.created);
        let dateB = new Date(b.dataset.created);

        if (sortType === 'asc') {
            return priceA - priceB; // Giá thấp -> cao
        } else if (sortType === 'desc') {
            return priceB - priceA; // Giá cao -> thấp
        } else if (sortType === 'newest') {
            return dateB - dateA; // Mới nhất trước
        }
        return 0;
    });

    container.innerHTML = '';
    products.forEach(p => container.appendChild(p));
    });

    // Lọc sản phẩm theo size, màu, giá
    document.addEventListener('DOMContentLoaded', function () {
    const productCards = document.querySelectorAll('.product__card');

    function filterProducts() {
        const selectedPrices = Array.from(document.querySelectorAll('.price-filter:checked')).map(cb => cb.value);
        const selectedSizes = Array.from(document.querySelectorAll('.size-filter:checked')).map(cb => cb.value);
        const selectedColors = Array.from(document.querySelectorAll('.color-filter:checked')).map(cb => cb.value);

        productCards.forEach(card => {
            const price = parseInt(card.dataset.price);
            const color = card.dataset.color;
            const sizes = card.dataset.sizes.split(',').map(s => s.trim());

            let show = true;

            // Lọc theo giá
            if (selectedPrices.length > 0) {
                show = selectedPrices.some(range => {
                    const [min, max] = range.split('-').map(Number);
                    return price >= min && price <= max;
                });
            }

            // Lọc theo size
            if (show && selectedSizes.length > 0) {
                show = selectedSizes.some(size => sizes.includes(size));
            }

            // Lọc theo màu
            if (show && selectedColors.length > 0) {
                show = selectedColors.includes(color);
            }

            card.style.display = show ? '' : 'none';
        });
    }

    // Lắng nghe sự kiện change
    document.querySelectorAll('.price-filter, .size-filter, .color-filter').forEach(input => {
        input.addEventListener('change', filterProducts);
    });
});

</script>
@endsection