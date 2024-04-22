<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <style>
        html,
        body {
            margin: 0;
            height: 100%;
            text-decoration: none !important;
            font-family: Roboto, Helvetica, Arial, sans-serif;
        }

        img {
            width: 100%;
            height: 420px;
            filter: blur(0px);
            transition: filter 0.3s ease-in;
            transform: scale(1.1);
        }

        h2 {
            margin-bottom: .5em;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 1em;
        }

        .location-image {
            line-height: 0;
            overflow: hidden;
            border-radius: 3px;
        }

        .location-image img {
            filter: blur(0px);
            transition: filter 0.3s ease-in;
            transform: scale(1.1);
        }

        .link-title {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            color: #000000;
            text-decoration: none;
        }

        .link-title:hover {
            color: #f70d28;
            transition: color .2s;
        }

        /* for touch screen devices */
        @media (hover: none) {
            .location-image img {
                filter: blur(1px);
                opacity: 0.7;
            }
        }

        .small-title {
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
        }

        .location-image:hover {
            opacity: 0.7;
            filter: blur(0.7px);
        }

        h5 {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            color: #000000;
        }

        .title-a {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            color: #000000;
            text-decoration: none;
        }

        h3 {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 28px;
            letter-spacing: 0.015em;
            color: #000000;
            text-decoration: none;
        }

        @media only screen and (max-width: 768px) {
            .link-title {
                font-size: 14px;
            }

            .one-change-title {
                margin-top: 30px !important;
            }

            #image-big {
                margin-bottom: 10px;
            }

            .img-height {
                height: 250px;
            }
        }

        .category-title {
            border-bottom: 2px solid black;
        }

        .location-listing {
            /* position: relative; */
        }

        .location-image {
            line-height: 0;
            overflow: hidden;
        }

        .location-image img {
            filter: blur(0px);
            transition: filter 0.3s ease-in;
            transform: scale(1.1);
        }

        .location-title {
            font-size: 1.5em;
            font-weight: bold;
            text-decoration: none;
            z-index: 1;
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity .5s;
            background: rgba(215, 220, 227, 0.4);
            color: rgb(0, 0, 0);
            text-align: center;

            /* position the text in t’ middle*/
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .location-listing:hover .location-title {
            opacity: 1;
            color: black;
        }

        .location-listing:hover .location-image img {
            filter: blur(2px);
        }
        .text-banners{
            margin-bottom: -140px;
            font-size: 16px;
        }
        .text-banners-mains{
        }

        /* for touch screen devices */
        @media (hover: none) {
            .location-title {
                opacity: 1;
            }

            .location-image img {
                filter: blur(2px);
            }
        }

        .img-filter-opa {
            filter:brightness(0.7);
        }

        .bgrimg {
            background-image: url('https://i.pinimg.com/564x/ec/5a/21/ec5a217a86e8de118574f0e184e864d7.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            /* filter:brightness(101%); */
            border-radius: 5px;
        }

        #grid-auto-rows{
            display: grid;
            grid-auto-rows: 420px;
            grid-gap: 26px;
        }
        .img-giao-hoi-hoan-vu{
            height: 320px;
        }
        .text-giao-hoi-hoan-vu{
            font-size: 20px;
            font-weight: 500 !important;
            width: 370px;
        }
        .icon-right{
            margin-left: -5px;
        }
        .p-trending{
            margin-left: -8px;
        }
        .block-direction{
            margin-left: -20px;
        }
        @media (min-width: 300px) and (max-width: 776px) {
            .block-giao-hoi-viet-nam{
                margin-top: 560px !important;
                width: 90%;
                margin-left: 12px;
            }
            .block-kinh-te-di-dan{
                width: 100%;
                margin-left: 0.1px;
            }
            .block-trending{
                margin-top: 560px !important;
                display: block !important;
            }
            .mt-40{
                margin-top: 40px;
            }
            .p-trending{
                display: block;
            }
            .swiper-button-lock {
                display: block;
            }
            .block-direction{
                margin-top: -20px;
                margin-bottom: 10px;
                margin-left: 100px;
            }
            .icon-right{
                margin-left: 16px;
                margin-top: -22px;
            }
            .p-trending{
                text-align: center;
                margin-left: -50px;
            }
        }   
    </style>

    <div class="container mt-5" style="max-width: 1170px;">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="row heading">
                    <h3 class="one-change-title pt-4 pb-3" style="text-align: left;"><span class="category-title">GIÁO HỘI
                            HOÀN VŨ</span></h3>
                </div>
                <div class="row" style="height: 420px;">
                    <div class="col-lg-6 col-md-7">
                        @if ($dM1)
                            <article id="3685" class="location-listing">
                                {{-- <a class="location-title" href="{{ $uC1->showUrl() }}" style="text-align: left; padding: 8px;">
                                    <p class="text-banners-mains">{{ $uC1->title }}</p></a> --}}
                                <div class="location-image">
                                    <a href="#">
                                        <img class="img-giao-hoi-hoan-vu"
                                            src="{{ $uC1->getFirstMediaUrl('media', 'show') }}" alt=""> </a>
                                </div>
                            </article>
                            <div class="jeg_postblock_content">
                                <div class="jeg_post_excerpt" style="width:200px;">
                                    <a href="{{ $uC1->showUrl() }}" style="text-decoration: none; color: black">
                                        <p class="text-giao-hoi-hoan-vu text-hover">{{ $uC1->title }}</p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-5 d-grid gap-4 container" style="border: none;">
                        @if ($universalChurch)
                            @foreach ($universalChurch as $key => $uC)
                                @if ($key != 0)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="location-image ml-auto mr-auto">
                                                <a class="d-block" href="{{ $uC->showUrl() }}">
                                                    <img style="height: 124px;"
                                                        src="{{ $uC->getFirstMediaUrl('media', 'show') }}"
                                                        alt="{{ $uC->title }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> <a class="link-title"
                                                href="{{ $uC->showUrl() }}">{{ $uC->title }}</a></div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 block-giao-hoi-viet-nam">
                <div class="row heading">
                    <h3 class="pt-4 pb-3"><span class="category-title">GIÁO HỘI VIỆT NAM</span></h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if ($vC1 && $vietnameseChurch)
                            <div class="row">
                                <div class="location-image ml-auto mr-auto">
                                    <a class="d-block" href="{{ $vC1->showUrl() }}">
                                        <img style="height: 140px; border-radius: 3px;"
                                            src="{{ $vC1->getFirstMediaUrl('media', 'show') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="row"><a class="link-title mb-3 mt-2 p-0"
                                    href="{{ $vC1->showUrl() }}"><b>{{ $vC1->title }}</b></a></div>
                            @foreach ($vietnameseChurch as $key => $vC)
                                @if ($key != 0)
                                    <div class="row"><a href="{{ $vC->showUrl() }}"
                                            class="link-title mb-3 p-0">{{ $vC->title }}</a></div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5" style="background-color: #F7F7F7; padding-left: 0; padding-right: 0;">
        <div class="container" style="max-width: 1145px;">
            <div class="row heading">
                <h3 class="pt-5 pb-3" style="text-align: center;"><span class="category-title">KINH TẾ DI DÂN</span>
                </h3>
            </div>
            <div class="row p-0">
                <div class="col-md-12">
                    <div class="row mb-5 gx-5 block-kinh-te-di-dan">
                        @if ($immigrantEconomy)
                            @foreach ($immigrantEconomy as $iE)
                                <div class="col-12 col-sm-6 col-lg-3 mb-3">
                                    <div class="row">
                                        <div class="location-image ml-auto mr-auto">
                                            <a class="d-block" href="{{ $iE->showUrl() }}">
                                                <img class="img-fluid" style="height: 160px;"
                                                    src="{{ $iE->getFirstMediaUrl('media', 'show') }}"
                                                    alt="san francisco"> </a>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <a class="link-title" style="padding-left: 0;"
                                            href="{{ $iE->showUrl() }}">{{ $iE->title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5" style="max-width: 1170px;">
        <div class="row">
            <h3 class="pb-3"><span class="category-title">TƯ LIỆU - VĂN KIỆN</span></h3>
        </div>
        <div class="row">
            <div id="image-big" style="height: 420px; padding-bottom: 2px;" class="col-lg-4 col-sm-12">
                    @if ($dM1)
                    <article id="3685" class="location-listing">
                        {{-- <a class="location-title" href="{{ $uC1->showUrl() }}" style="text-align: left; padding: 8px;">
                            <p class="text-banners-mains">{{ $uC1->title }}</p></a> --}}
                        <div class="location-image">
                            <a href="#">
                                <img class="img-giao-hoi-hoan-vu"
                                    src="{{ $dM1->getFirstMediaUrl('media', 'show') }}" alt=""> </a>
                        </div>
                    </article>
                    <div class="jeg_postblock_content">
                        <div class="jeg_post_excerpt" style="width:200px;">
                            <a href="{{ $dM1->showUrl() }}" style="text-decoration: none; color: black">
                                <p class="text-giao-hoi-hoan-vu text-hover">{{ $dM1->title }}</p>
                            </a>
                        </div>
                    </div>
                    @endif
            </div>
            <div style="height: 420px;" class="col-lg-8 col-sm-12" id="grid-auto-rows">
                <div class="row">
                    @foreach ($documentaryMaterial->split(2) as $dM)
                        @foreach ($dM as $item)
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="location-image ml-auto mr-auto">
                                            <a class="d-block" href="{{ $item->showUrl() }}">
                                                <img style="height: 125px;"
                                                    src="{{ $item->getFirstMediaUrl('media', 'show') }}"
                                                    alt="san francisco"> </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="link-title" href="{{ $item->showUrl() }}">{{ $item->title }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row gx-7 p-4 bgrimg block-trending" style="width: 100%;margin-left: auto;margin-right: auto; margin-top: 100px">
            <div class="col">
                <div class="p-trending">
                    <p><b>Today Best Trending</b></p>
                    <p><b>Topics</b></p>
                </div>
                <div class="row block-direction">
                    <div class="col-md-2 icon-left">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left" style="border: 1px solid rgb(213, 213, 213)" viewBox="0 0 16 16">
                            <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
                        </svg>
                    </div>
                    <div class="col-md-2 icon-right">
                        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" style="border: 1px solid rgb(213, 213, 213)" viewBox="0 0 16 16">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                        </svg>
                    </div>
                </div>
            </div>
            {{-- mySwiper --}}
            <div class="swiper " style="width: 85%">
                <div class="swiper-wrapper">
                    @foreach($albums as $album)
                    <div class="swiper-slide location-image">
                        <a href="{{ $album->showUrl() }}">
                            <img class="img-fluid" style="height: 150px; width: 180px;opacity: 0.7" src="{{ $album->getFirstMediaUrl('media', 'show') }}" alt="">
                        </a>
                        <div class="album-name" style="position: absolute; margin-top: 80px">
                            <a href="{{ $album->showUrl() }}" style="text-decoration:none; color: white; font-weight: 600; font-size: 16px" >
                                {{ $album->name }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            <div class="swiper-pagination" style="display: none"></div>
            </div>
        </div>
    </div>
    </div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    // mySwiper
    var swiper = new Swiper(".swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
          nextEl: ".bi-caret-right",
          prevEl: ".bi-caret-left",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          "@0.00": {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          "@0.75": {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          "@1.00": {
            slidesPerView: 3,
            spaceBetween: 40,
          },
          "@1.50": {
            slidesPerView: 4,
            spaceBetween: 50,
          },
        },
      });
  </script>

<style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>