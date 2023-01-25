    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <!-- Light Box -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />

    <style>
        /* Main Slider */
        .slider {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            border: solid 9px #fff;
            box-sizing: border-box;
            border-radius: 5px;
            background: url(/img/loading.svg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100px 100px;
            min-height: 100px;
        }

        .lb-nav a.lb-prev,
        .lb-nav a.lb-next {
            opacity: 1;
        }

        .slider img.slick-loading {
            opacity: 0;
        }

        .slider img {
            transition: opacity 0.3s ease 0s;
        }

        .slider .slick-loading:after {
            content: "loading";
        }

        .slider .slick-slide {}

        .slider .slick-slide img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            left: 0;
            margin-right: auto;
            margin-left: auto;
        }

        /* make button larger and change their positions */
        .slick-prev,
        .slick-next {
            width: 50px;
            height: 50px;
            z-index: 1;
        }

        .slick-prev {
            left: 5px;
        }

        .slick-next {
            right: 5px;
        }

        .slick-prev:before,
        .slick-next:before {
            font-size: 40px;
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* General slick slider styling */
        .slick-slide:focus,
        .slick-slide:focus {
            outline: none;
            /* remove default outline when on :focus */
        }

        /* hide dots and arrow buttons when slider is not hovered */
        .slick-slider:not(:hover) .slick-arrow,
        .slick-slider:not(:hover) .slick-dots {
            opacity: 0;
        }

        /* transition effects for opacity */
        .slick-arrow {
            transition: opacity 0.5s ease-out;
        }

        /* Thumbnails Slider */
        .slider-thumbnails {
            margin-left: -15px;
            margin-right: -15px;
        }

        .slider-thumbnails .slick-slide {
            padding: 15px;
            transition: transform 0.3s ease-out;
        }

        .slider-thumbnails .slick-slide:focus img {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.6);
        }

        .slider-thumbnails .slick-slide img {
            height: 120px;
            width: 100%;
            object-fit: cover;
            border: solid 5px #fff;
            box-sizing: border-box;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-out;
            border-radius: 3px;
        }

        .product-images {
            width: 100%;
        }

        @media (max-width: 768px) {
            .product {
                flex-direction: row;
            }

            .product-description {
                margin-left: 36px;
            }
        }

        #sec1-detail {
            padding-top: 170px;
            padding-bottom: 113px;
        }
    </style>

    <section id="sec1-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-images">
                        <div class="slider">
                            <div>
                                <a href="img/news/news1.jpg" data-lightbox="lightbox">
                                    <img data-lazy="img/news/news1.jpg" />
                                </a>
                            </div>
                            <div>
                                <a href="img/section3/bg2.png" data-lightbox="lightbox">
                                    <img data-lazy="img/section3/bg2.png" />
                                </a>
                            </div>
                            <div>
                                <a href="img/section3/bg3.png" data-lightbox="lightbox">
                                    <img data-lazy="img/section3/bg3.png" />
                                </a>
                            </div>
                            <div>
                                <a href="img/section3/bg4.png" data-lightbox="lightbox">
                                    <img data-lazy="img/section3/bg4.png" />
                                </a>
                            </div>
                        </div>
                        <div class="slider-thumbnails">
                            <div>
                                <img data-lazy="img/news/news1.jpg" />
                            </div>
                            <div>
                                <img data-lazy="img/section3/bg2.png" />
                            </div>
                            <div>
                                <img data-lazy="img/section3/bg3.png" />
                            </div>
                            <div>
                                <img data-lazy="img/section3/bg4.png" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mt-4">Mining</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, magni optio ab nostrum laborum quaerat atque, doloremque reprehenderit quos saepe mollitia cupiditate esse sapiente aperiam, odio odit officia tempore fugiat? Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, magni optio ab nostrum laborum quaerat atque, doloremque reprehenderit quos saepe mollitia cupiditate esse sapiente aperiam, odio odit officia tempore fugiat?</p>
                    <button class="btn btn-submit">
                        Contact Us
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Slick JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Light Box JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>
    <!-- Our Script -->
    <script>
        $(document).ready(function() {
            $(".slider-thumbnails").slick({
                infinite: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: ".slider",
                focusOnSelect: true,
            });

            $(".slider").slick({
                infinite: false,
                lazyLoad: "ondemand",
                asNavFor: ".slider-thumbnails",
            });
        });
    </script>