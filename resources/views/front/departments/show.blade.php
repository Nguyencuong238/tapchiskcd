@extends('layouts.front')
@push('css')
    <style>
        .jeg_post_title {
            padding: 5px 10px;
        }
        .title{
            font-size: 40px;
            font-weight: 500;
            color: #1b85a6;
        }

        .info{
            font-family: 'Roboto';
            margin-top: 20px;
            font-size: 20px;
            color: #54595F;
            font-weight: 400;
        }
        .info-text{
            font-size: 18px;
        }
        .p-text{
            font-size: 18px;
            font-weight: 450;
            width: 550px;
        }
        .text-h3{
            font-size: 18px;
            font-weight: 400;
        }
        .activities{
            display: flex;
        }
        .introduction{
            margin-right: 120px;
        }
        .img-show{
            display: block;
            margin-left: auto;
            margin-right: auto;
            height: 340px;
            width: 580px;
        }
        .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .main-news{
        height: 360px !important;
    }
    .main-exe{
        height: 400px !important;
    }
    .main-image{
        height: 330px !important;
    }
    .swiper-slide img{
        height: 240px;
    }
    .img-video img{
        height: 220px;
    }
    .p-executive{
        font-weight: 500;
    }
    .swiper-button-prev{
        top: 38% !important;
    }
    .swiper-button-next{
        top: 38% !important;
    }

    @media (max-width: 760px) {
      .swiper-button-next {
        right: 20px;
        transform: rotate(90deg);
      } 

      .swiper-button-prev {
        left: 20px;
        transform: rotate(90deg);
      }
    }
        @media (min-width: 375px) and (max-width: 768px) {
                .activities{
                    display: block;
                }
                .p-history{
                    margin-left: 0px;
                }
                .p-text{
                    width: 360px;
                }
                .swiper-slide img{
                    height: 120px;
                }
                .swiper-wrapper{
                    height: 290px !important;
                }
                .img-video img{
                    height: 120px;
                }
                .swiper-button-prev{
                    top: 22% !important;
                }
                .swiper-button-next{
                    top: 22% !important;
                }
                .p-executive{
                    font-weight: 500;
                    font-size: 14px;
                } 
                .introduction{
                    margin-right: 2px !important;
                }
                .main-image{
                    height: 220px !important;
                }
            }
    </style>
@endpush
@section('page')
    <div class="jeg_main">
        <div class="jeg_container">
            <div class="jeg_singlepage"> 
                    <div class="jeg_ad jeg_article jnews_article_top_ads">
                        <div class="ads-wrapper"></div>
                    </div>
                    <div class="body">
                        <div class="row">
                            {{--  <div class="section-8 pb-5" style="padding-top: 60px">
                                <div class="container profile-img mt-4">
                                    <img class="img-fluid img-show radius-3 ghhv-lg mt-4" src="{{ $department->getFirstMediaUrl('media', 'show') }}" alt="{{ $department->name }}" />
                                </div>
                            </div>  --}}
                            <div class="section-8 pb-5" style="padding-top: 80px; background-color: #F7F7F7" >
                                <div class="container activities">
                                    <div class="introduction col-lg-5">
                                        <div class="text-center mb-4">
                                            <img src="{{ $department->getFirstMediaUrl('media', 'show') }}" alt="{{ $department->name }}" class="text-center w-100" style="max-height: 300px;">
                                        </div>
                                        <h2 class="text-center" style="font-weight: 600">Giới thiệu</h2>
                                        <p class="p-text" > {!! $department->introduction !!} </p>
                                    </div>
                                    <div class="history col-lg-6">
                                        <h2 class="text-center" style="font-weight: 600">Lịch Sử</h2>
                                        <p class="p-text p-history">{!! $department->activity !!} </p>
                                    </div>
                                </div>
                            </div>
                            {{--  <div class="section-8 pb-5 executive" style="padding-top: 40px; ">
                                <div class="container">
                                    <h2 class="text-center" style="font-weight: 600">Ban Điều Hành</h2>
                                        
                                        <div class="swiper" style="margin-top: 40px;">
                                            <div class="swiper-wrapper main-exe" style="display: flex; gap:20px">
                                                @foreach($executive as $exe)
                                                    <div class="swiper-slide" style="display: block;">
                                                        <div class="">
                                                            <img src="{{ $exe->getFirstMediaUrl('media', 'show') }}" alt="{{ $exe->title }}" />
                                                        </div>
                                                        <div class="jeg_postblock_content">
                                                            <h3 class="jeg_post_title" style="padding: 5 10">
                                                                {{ $exe->name }}
                                                            </h3>
                                                        </div>
                                                        <div class="jeg_postblock_content">
                                                            <h4 class="jeg_post_title p-executive" style="padding: 5 10">
                                                                {{ $exe->position }}
                                                            </h4>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                          </div>
                                </div>
                            </div>  --}}
                            <div class="section-8 pb-5" style="padding-top: 40px; background-color: #F7F7F7">
                                <div class="container">
                                    <h2 class="text-center" style="font-weight: 600">Tin Tức Hoạt Động</h2>
                                        {{-- mySwiper --}}
                                        <div class="swiper" style="margin-top: 20px;">
                                            <div class="swiper-wrapper main-news" style="display: flex; gap:20px">
                                                @foreach($posts as $post)
                                                <div class="swiper-slide" style="display: block;">
                                                        <div class="">
                                                            <a href="{{ $post->showUrl() }}">
                                                                <img src="{{ $post->getFirstMediaUrl('media', 'show') }}" alt="{{ $post->title }}" />
                                                            </a>
                                                        </div>
                                                        <div class="jeg_postblock_content">
                                                            <h3 class="jeg_post_title" style="padding: 5 10">
                                                                <a href="{{ $post->showUrl() }}">{{ $post->title }}</a>
                                                            </h3>
                                                        </div>
                                                </div>
                                            @endforeach
                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                </div>
                            </div>
                            <div class="section-8 pb-5" style="padding-top: 40px;">
                                <div class="container media" >
                                    <div class="row p-0">
                                        <div class="col-md-12">
                                            <div class="row mb-5 container">
                                                <h2 class="text-center" style="font-weight: 600; margin-top: 20px">Hình Ảnh-Video</h2>
                                                <div class="swiper" style="margin-top: 20px;">
                                                    <div class="swiper-wrapper main-image" style="display: flex; gap:10px">
                                                        @foreach($albums as $album)
                                                        <div class="swiper-slide" style="display: block;">
                                                            <div class="img-video">
                                                                <a href="{{ $album->showUrl() }}">
                                                                    <img class="img-fluid sec2-img radius-3" src="{{ $album->getFirstMediaUrl('media', 'show') }}"
                                                                    alt="">
                                                                </a>
                                                                <div class="jeg_postblock_content">
                                                                    <h3 class="jeg_post_title" style="padding: 5 10">
                                                                        <a href="{{ $album->showUrl() }}">{{ $album->name }}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop

@section('custom-js')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>



<script>
    var swiper = new Swiper('.swiper', {
      slidesPerView: 3,
      direction: getDirection(),
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      on: {
        resize: function () {
          swiper.changeDirection(getDirection());
        },
      },
    });

    function getDirection() {
      var windowWidth = window.innerWidth;
      var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

      return direction;
    }
  </script>
@endsection