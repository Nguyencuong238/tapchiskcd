@extends('layouts.front')
@section('meta')
    @if(request()->routeIs('postCategory'))
        <title>{{ $category->name }}</title>
        <link rel="canonical" href="{{ request()->url() }}">
        <meta name="title" content="{{ $category->name }}">
        <meta name="description" content="Công Giáo">
        <meta name="keywords" content="conggiao">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Conggiao">
        <meta property="og:description" content="Conggiao">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="xaqueconggiao">
    @elseif(request()->routeIs('postTag'))
        <title>Thẻ - {{ $tag->name }}</title>
        <link rel="canonical" href="{{ request()->url() }}">
        <meta name="title" content="Thẻ - {{ $tag->name }}">
        <meta name="description" content="Công Giáo">
        <meta name="keywords" content="Conggiao">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Conggiao">
        <meta property="og:description" content="Conggiao">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="xaqueconggiao">
    @elseif(request()->routeIs('postArchive'))
        <title>Bài viết tháng {{ request('month') }} - {{ request('year') }}</title>
        <link rel="canonical" href="{{ request()->url() }}">
        <meta name="title" content="Conggiao">
        <meta name="description" content="Công Giáo">
        <meta name="keywords" content="Conggiao">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Conggiao">
        <meta property="og:description" content="Conggiao">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="xaqueconggiao">
    @else
        <title>ALBUM ẢNH</title>
        <link rel="canonical" href="{{ request()->url() }}">
        <meta name="title" content="Conggiao">
        <meta name="description" content="Công Giáo">
        <meta name="keywords" content="Conggiao">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Conggiao">
        <meta property="og:description" content="Conggiao">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="xaqueconggiao">
    @endif
@stop
@push('css')
    <link href="{{ asset('icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css">
    
    <style>
        :root {
            --thm-base: #ff6f0f;
            --thm-base-rgb: 255, 111, 15;
            --thm-black: #150b5c;
            --thm-black-rgb: 21, 11, 92;
            --thm-gray: #4a4c59;
            --thm-gray-rgb: 74, 76, 89;
        }
        .jeg_post_title {
            padding: 5px 0px;
        }

        .jeg_pl_md_2 .jeg_thumb, .jeg_pl_md_3 .jeg_thumb{
            height: auto;
        }
        .listings_one_content_left_form .input_box input[type="text"] {
            width: 100%;
            color: rgb(var(--thm-gray-rgb));
            padding: 0 20px;
            outline: none;
            font-weight: 400;
            height: 40px;
            border-radius: 0.25rem;
            border: 1px solid #ddd;
        }
        .select-box .select2-selection--single {
            height: 40px;
        }
        .select-box .select2-selection--single .select2-selection__rendered {
            line-height: 25px;
        }
        
        .listings_one_content_left_form .input_box .nice-select {
            height: 60px;
            width: 100%;
            border: none;
            color: rgba(var(--thm-gray-rgb), 0.4);
            background: #ffffff;
            border: 1px solid rgba(var(--thm-gray-rgb), 0.1);
            padding: 0 20px;
            font-size: 15px;
            font-weight: 500;
            outline: none;
        }
        
        .listings_one_content_left_form .input_box .nice-select.open:after {
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        
        .listings_one_content_left_form .input_box .nice-select:after {
            right: 20px;
        }
        .listings_one_wrap-btn {
            position: relative;
            display: block;
            margin-top: 27px;
        }
        
        .listings_one_wrap-btn .thm-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            padding: 6px 30px;
            height: 40px;
        }
        .thm-btn {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            -webkit-appearance: none;
            border: none;
            outline: none !important;
            background-color: var(--thm-base);
            color: #ffffff;
            font-size: 17px;
            font-weight: 500;
            text-transform: capitalize;
            padding: 17px 40px 17px;
            border-radius: 5px;
            font-family: var(--thm-font-3);
            letter-spacing: 0.015em;
            transition: transform 0.3s ease;
            overflow: hidden;
            z-index: 1;
        }
        .thm-btn:hover {
            color: #ffffff;
        }
        
        .thm-btn:before {
            position: absolute;
            width: 200%;
            height: 200%;
            content: "";
            top: 110%;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            border-radius: 50%;
            z-index: -1;
            background: var(--thm-black);
            -webkit-transition-duration: 800ms;
            transition-duration: 800ms;
        }
        
        .thm-btn:hover:before {
            top: -30%;
        }
        .listings_one_wrap-btn a span::before {
            position: relative;
            display: inline-block;
            font-size: 17px;
            margin-right: 5px;
            top: 2px;
        }
        .album-img {
            height: 245px;
            border-radius: 3px;
        }
        .jeg_post_title a {
            font-size: 16px;
        }
        @media (max-width: 1199px) {
            .album-img {
                height: 210px;
            }
        }
        @media (max-width: 991px) {
            .album-img {
                height: 240px;
            }
        }
        @media (max-width: 767px) {
            .album-img {
                height: 190px;
            }
        }
        @media (max-width: 767px) {
            .album-img {
                height: 230px;
            }
        }
    </style>
@endpush
@section('page')
    <div class="jeg_main">
        <div class="jeg_container">
            <div class="jeg_content">
                <div class="jnews_category_header_top">
                </div>
                <div class="jeg_section">
                    <div class="container">
                        <div class="jeg_ad jeg_category jnews_archive_above_hero_ads">
                            <div class="ads-wrapper"></div>
                        </div>
                        <div class="jnews_category_hero_container">
                        </div>
                        <div class="jeg_ad jeg_category jnews_archive_below_hero_ads">
                            <div class="ads-wrapper"></div>
                        </div>
                        <form class="listings_one_content_left_form">
                            <input type="hidden" name="sortby" value="{{request('sortby')}}">
                            <div class="row">
                                <div class="col-sm-6 mb-sm-0 mb-3">
                                    <div class="input_box">
                                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Nhập từ khóa . . .">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input_box">
                                        <div class="select-box">
                                            <select name="category" data-placeholder="--- Chọn danh mục ---" class="form-control form-control-select2" data-fouc >
                                                <option value="0">--- Chọn danh mục ---</option>
                                                @foreach($categories as $c)
                                                    <option value="{{ $c->id }}" @if($c->id == request('category')) selected @endif>
                                                        {!! $c->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listings_one_wrap-btn mb-5">
                                <button class="thm-btn"><span class="fa fa-search"></span>&nbsp;Tìm kiếm</button>
                            </div>
                        </form>
                        <div class="row">
                            @foreach($albums as $album)
                                <div class="col-lg-4 col-sm-6 mb-4">
                                    <a href="{{ $album->showUrl() }}">
                                        <img src="{{ $album->getFirstMediaUrl('media', 'show') }}" class="w-100 album-img" alt="{{ $album->name }}">
                                    </a>
                                    <h3 class="jeg_post_title py-0 mt-1 mb-0">
                                        <a href="{{ $album->showUrl() }}">{{ $album->name }}</a>
                                    </h3>
                                </div>
                            @endforeach
                        </div>
                        <div class="jeg_block_navigation mt-4">
                            {{ $albums->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="jeg_ad jnews_above_footer_ads">
                <div class="ads-wrapper"></div>
            </div>
        </div>
    </div>
@stop
@section('custom-js')
    <script src="{{ asset('plugins/forms/selects/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('.form-control-select2').select2();
        });
    </script>
@endsection
