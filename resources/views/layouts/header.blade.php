<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('storage/logo/mini-logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <script src="https://kit.fontawesome.com/8c390cc221.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>{{ $title }}</title>
</head>
<header>
    <div class="menu-container">
        <div class="logo">
            <a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="1000" height="356.39" viewBox="135.5 361.38 1000 356.39">
                <path d="M245.8075 717.62406c-29.79588-1.1837-54.1734-9.3368-73.23459-24.4796-3.63775-2.8928-12.30611-11.5663-15.21427-15.2245-7.72958-9.7193-12.98467-19.1785-16.48977-29.6734-10.7857-32.3061-5.23469-74.6989 15.87753-121.2243 18.0765-39.8316 45.96932-79.3366 94.63252-134.0508 7.16836-8.0511 28.51526-31.5969 28.65302-31.5969.051 0-1.11225 2.0153-2.57652 4.4694-12.65304 21.1938-23.47957 46.158-29.37751 67.7703-9.47448 34.6785-8.33163 64.4387 3.34693 87.5151 8.05611 15.898 21.86731 29.6684 37.3979 37.2806 27.18874 13.3214 66.9948 14.4235 115.60699 3.2245 3.34694-.7755 169.19363-44.801 368.55048-97.8366 199.35686-53.0408 362.49439-96.4029 362.51989-96.3672.056.046-463.16259 198.2599-703.62654 301.0914-38.08158 16.2806-48.26521 20.3928-66.16827 26.6785-45.76525 16.0714-86.76008 23.7398-119.89779 22.4235z"/>
            </svg></a>
        </div>
        <div class="menu-wraper">
            <div class="menu">
                @foreach($categories as $category)
                <li>
                    <a href="{{ route('category.show', $category->id) }}">{{strtoupper($category->name)}}</a>
                    @if($category->brands->count())
                        <ul class="sub-menu">
                            @foreach($category->brands as $brand)
                                <li>
                                    <h4>{{strtoupper($brand->name)}}</h4>
                                    @if($brand->productLines->count())
                                        <ul>
                                            @foreach($brand->productLines as $pl)
                                                <li><a href="{{ route('productLine.show', $pl->id) }}">{{$pl->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endforeach
            </div>
        </div>
        <div class="others">
            <li class="search-icon"><input type="text" placeholder="Tìm kiếm"><i class="fa-solid fa-magnifying-glass"></i></li>
            @auth
            <li class="user-menu">
                    <a id="userIcon" class="fa-regular fa-user icon-hover" href="javascript:void(0);"></a>
                    <!-- Dropdown menu -->
                    <div class="user-dropdown">
                        <h4>Tài khoản</h4>
                        <ul>
                            <li><a href="{{ route('account.edit') }}">Trang cá nhân</a></li>
                            @if(Auth::check() && Auth::user()->role === 'admin')
                                <li><a href="{{ route('admin') }}">Trang quản trị</a></li>
                            @endif
                            <li><a href="">Đơn hàng</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-btn">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @else
                <li><a class="fa-regular fa-user icon-hover" href="{{ route('login')}}"></a></li>
            @endauth
            <li class="cart-icon">
                <a class="fa-solid fa-bag-shopping icon-hover" href="{{ route('cart.index') }}">
                    <span  id="cart-count" class="cart-count">{{ session('cart') ? count(session('cart')) : '' }}</span>
                </a>
            </li>
        </div>      
    </div>
</header>
<div class="menu-overlay"></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const userIcon = document.getElementById("userIcon");
    const dropdown = document.getElementById("userDropdown");

    if (userIcon) {
        userIcon.addEventListener("click", function (e) {
            e.stopPropagation();
            dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
        });
    }

    // Ẩn khi click ra ngoài
    document.addEventListener("click", function () {
        if (dropdown) dropdown.style.display = "none";
        });
    });
</script>