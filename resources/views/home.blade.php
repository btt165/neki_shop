@include('layouts.header')
<body>
<div class="container">
    <div id="slider">
        <div class="slider-wrapper">
            <div class="slider-track">
                @foreach($slides as $slide)
                    <div class="slide">
                        <a href="{{ $slide->link ?? '#' }}">
                        <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="dot-container">
                @foreach($slides as $index => $slide)
                    <div class="dot" {{ $index == 0 ? 'active' : ''}}></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="new-arrivals">
            <h2>Mới ra mắt</h2>
            <div class="arrivals-wrapper">
                <button class="arrivals-btn prev-btn">&#10094;</button>
                <div class="arrivals-track">
                    @foreach($products as $p)
                        <div class="arrival-item">
                            <a href="/product/{{$p->id}}"><img src="{{asset('storage/' . $p->image)}}" alt=""></a>
                            <a href="/product/{{$p->id}}"><h3>{{$p->name}}</h3></a>
                            <p>{{$p->productLine->name}}</p>
                            <span class="price">{{number_format($p->price), 0, ',','.'}}<sup>đ</sup></span>
                        </div>
                    
                </div>
                <button class="arrivals-btn next-btn">&#10095;</button>
            </div>
    </div>
        <!-- Product related -->
    <x-related-products :product-id="$p->id"/>
        @endforeach
</div>
</body>
@include('layouts.footer')
<script>
    // silder
    const sliderTrack = document.querySelector(".slider-track")
    const dots = document.querySelectorAll(".dot")
    const totalSlides = dots.length
    let currentSlideIndex = 0

    // Gán click cho từng dot
    dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
        goToSlide(index)
    })
    })

    // Chuyển slide thủ công hoặc tự động
    function goToSlide(index) {
    sliderTrack.style.transform = `translateX(-${index * 100}%)`

    // Đổi dot active
    document.querySelector(".dot.active")?.classList.remove("active")
    dots[index].classList.add("active")

    currentSlideIndex = index
    }

    // Tự động chuyển slide
    setInterval(() => {
        currentSlideIndex = (currentSlideIndex + 1) % totalSlides
        goToSlide(currentSlideIndex)
    }, 15000)


    // Sản phẩm mới nhất
    const track = document.querySelector('.arrivals-track');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    let scrollAmount = 0;
    const scrollStep = 300; // pixel mỗi lần cuộn

    nextBtn.addEventListener('click', () => {
        track.scrollBy({ left: scrollStep, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        track.scrollBy({ left: -scrollStep, behavior: 'smooth' });
    });
</script>