<section id="section-1">
    <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <div class="swiper bg-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="/img/background.png" alt="">
                <div class="text-content">
                    <h2 class="title">{{$tampil_nav_foot['news_header']}}</h2>
                    <p>
                        {{$tampil_nav_foot['news_desc']}}
                    </p>
                    <button class="read-btn">
                        Read More <i class="uil uil-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="swiper-slide dark-layer">
                <img src="img/background2.png" alt="" />
                <div class="text-content">
                    <h2 class="title">{{$tampil_nav_foot['news_header']}}</h2>
                    <p>
                        {{$tampil_nav_foot['news_desc']}}
                    </p>
                    <button class="read-btn">
                        Read More <i class="uil uil-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="swiper-slide dark-layer">
                <img src="img/background3.png" alt="" />
                <div class="text-content">
                    <h2 class="title">{{$tampil_nav_foot['news_header']}}</h2>
                    <p>
                        {{$tampil_nav_foot['news_desc']}}
                    </p>
                    <button class="read-btn">
                        Read More <i class="uil uil-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="img/background4.png" alt="" />
                <div class="text-content">
                    <h2 class="title">{{$tampil_nav_foot['news_header']}}</h2>
                    <p>
                        {{$tampil_nav_foot['news_desc']}}
                    </p>
                    <button class="read-btn">
                        Read More <i class="uil uil-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-slider-thumbs">
        <div class="swiper-wrapper thumbs-container">
            <img src="/img/background.png" class="swiper-slide" alt="" />
            <img src="/img/background2.png" class="swiper-slide" alt="" />
            <img src="/img/background3.png" class="swiper-slide" alt="" />
            <img src="/img/background4.png" class="swiper-slide" alt="" />
        </div>
    </div>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/swiper-main.js') }}"></script>
</section>