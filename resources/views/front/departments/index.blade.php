@extends('layouts.front')

@section('meta')
        <title>Cộng đoàn</title>
        <link rel="canonical" href="{{ request()->url() }}">
        <meta name="title" content="Xa quê công giáo">
        <meta name="description" content="Xa quê công giáo">
        <meta name="keywords" content="Xa quê công giáo">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Xa quê công giáo">
        <meta property="og:description" content="Xa quê công giáo">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="Xa quê công giáo">
@stop
@section('page')
    <div class="page-wrapper">
        <section class="listings_one_wrap listings_one_wrap--listings-three">
            <div class="container clearfix">
                <div class="listings__one__content">
                    <div class="listings_one_content_left">
                        <form class="listings_one_content_left_form">
                            <input type="hidden" name="sortby" value="{{request('sortby')}}">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="input_box">
                                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Nhập từ khóa . . .">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="input_box">
                                        <div class="select-box">
                                            <select name="type" data-placeholder="--- Tất cả ---" class="form-control form-control-select2" data-fouc >
                                                <option value="0">--- Tất cả ---</option>
                                                <option value="1" @if(request('type')==1) selected @endif>Ban ngành</option>
                                                <option value="2" @if(request('type')==2) selected @endif>Cộng đoàn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listings_one_wrap-btn">
                                <button class="thm-btn"><span class="fa fa-search"></span>&nbsp;Tìm kiếm</button>
                            </div>
                        </form>
                         
                        <div class="filter">
                            <div class="filter_inner_content">
                                <div class="left">
                                    <div class="left_text">
                                        @if($departments->count())
                                        <h4>Tìm thấy {{ $departments->total()}} kết quả</h4>
                                        @else
                                        <h4>Không tìm thấy kết quả</h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="shorting">
                                        <div class="sort-box">
                                            <select name="sort_id" id="sort_id" data-placeholder="{{ __('-- Mặc định --') }}" class="form-control sort-select2 @error('type')is-invalid @enderror" data-fouc >
                                                <option value="{{ request()->fullUrlWithQuery(['sortby' => '']) }}" @if(!request('sortby')) selected @endif>-- Sắp xếp --</option>
                                                <option value="{{ request()->fullUrlWithQuery(['sortby' => 'desc']) }}" @if(request('sortby')=='desc') selected @endif>Mới nhất</option>
                                                <option value="{{ request()->fullUrlWithQuery(['sortby' => 'asc']) }}" @if(request('sortby')=='asc') selected @endif>Cũ nhất</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <section class="listings_three-page one row">
                    @foreach($departments as $department)
                        <div class="col-lg-4 col-sm-6 jeg_pl_md_1" >
                            <!--Start Place One Single-->
                            <div class="place-one__single">
                                <div class="place-one__single-img">
                                    <div class="place-one__single-img-inner">
                                        <div class="icon-box">
                                            <a href="#"><span class="fa fa-heart"></span></a>
                                        </div>

                                        <a href="{{ $department->showUrl() }}">
                                            <img src="{{ $department->getFirstMediaUrl('media', 'show') }}" alt="{{ $department->name }}" />
                                        </a>
                                    </div>
                                    {{--  <div class="text-box">
                                        <span>Công giáo</span>
                                    </div>  --}}
                                </div>

                                <div class="place-one__single-content">
                                    <div class="top-content">
                                        <h2> <a href="{{ $department->showUrl() }}">{{ $department->name }}</a></h2>
                                        <p>{{ $department->excerpt}}</p>

                                        <div class="top-content-bottom">
                                            <div class="location-box mt-3">
                                                <div class="icon-box">
                                                    <span class="fa fa-map-marker"></span>
                                                </div>
                                                <div class="text">
                                                    <p>{{ $department->address }}</p>
                                                </div>
                                            </div>

                                            <div class="number-box mt-2">
                                                <div class="icon">
                                                    <span class="fa fa-phone"></span>
                                                </div>
                                                <div class="text">
                                                    <p>{{ $department->contact }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    {{--  <div class="bottom-content">
                                        <div class="avg-rating">
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                            <div class="avg-rating__current" style="width: 100%;">
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                            </div>
                                        </div>
                                        <div class="count-box">
                                            <p>(5.0)</p>
                                        </div>
                                    </div>  --}}
                                </div>
                            </div>
                            <!--End Place One Single-->
                        </div>
                    @endforeach
                </section>
                    <div class="jeg_block_navigation">
                    {{ $departments->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div><!-- /.page-wrapper -->
@stop

@push('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
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
        body {
            line-height: 28px;
        }
        .place-one {
            position: relative;
            display: block;
            background: #f6f6f6;
            padding: 120px 0px 90px;
        }


        .place-one__single {
            position: relative;
            display: block;
            margin-bottom: 30px;
        }

        .place-one__single-img {
            position: relative;
            display: block;
        }

        .place-one__single-img .text-box {
            position: absolute;
            left: 20px;
            bottom: -15px;
            display: inline-block;
            background: var(--thm-base);
            padding: 2px 20px 2px;
            border-radius: 5px;
            z-index: 5;
        }

        .place-one__single-img .text-box span {
            color: #ffffff;
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 0.002;
            text-transform: capitalize;
        }

        .place-one__single-img-inner {
            position: relative;
            display: block;
            overflow: hidden;
            z-index: 1;
            border-radius: 3px 3px 0 0;
        }

        .place-one__single-img-inner:before {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: var(--thm-black);
            opacity: 0.70;
            content: "";
            transform: skew(-90deg) translateY(100%);
            transform-origin: left;
            transform-style: preserve-3d;
            transition: all 900ms ease 100ms;
            z-index: 1;
            display: none;
        }

        .place-one__single:hover .place-one__single-img-inner:before {
            transform: skew(0deg) translateY(0);
        }

        .place-one__single-img-inner .icon-box {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 5;
        }

        .icon-box:before {
            display: none;
        }

        .place-one__single-img-inner .icon-box a {
            position: relative;
            display: block;
            width: 40px;
            height: 40px;
            background: #ffffff;
            border-radius: 50%;
            text-align: center;
            transition: all 200ms linear;
            transition-delay: 0.1s;
            z-index: 1;
        }

        .place-one__single-img-inner .icon-box a:before {
            position: absolute;
            top: 0px;
            left: 0px;
            bottom: 0px;
            right: 0px;
            background: var(--thm-base);
            border-radius: 50%;
            transition: .5s;
            transform: scale(.5);
            transition-delay: 0.8s;
            opacity: 0;
            content: '';
            z-index: -1;
        }

        .place-one__single:hover .place-one__single-img-inner .icon-box a:before {
            transform: scale(1);
            opacity: 1;
        }

        .place-one__single-img-inner .icon-box a span::before {
            position: relative;
            display: inline-block;
            line-height: 40px;
            color: var(--thm-base);
            font-size: 17px;
            transition: all 200ms linear;
            transition-delay: 0.1s;
        }

        .place-one__single:hover .place-one__single-img-inner .icon-box a span::before {
            color: #ffffff;
            transition-delay: 0.8s;
        }

        .place-one__single-img-inner img {
            width: 100%;
            height: 240px;
            transition-delay: .1s;
            transition-timing-function: ease-in-out;
            transition-duration: .7s;
            transition-property: all;
        }

        .place-one__single:hover .place-one__single-img-inner img {
            transform: scale(1.2) rotate(1deg);
        }

        .place-one__single-content {
            position: relative;
            display: block;
            background: #ffffff;
            border: 1px solid #dddddd;
            padding: 25px 15px 0px;
            border-radius: 0 0 3px 3px;
        }

        .place-one__single-content .top-content {
            position: relative;
            display: block;
            margin-bottom: 16px;
        }

        .place-one__single-content .top-content h2 {
            font-size: 22px;
            font-weight: 500;
            margin-bottom: 2px;
            margin-top: 0;
        }

        .place-one__single-content .top-content h2 a {
            color: var(--thm-black);
            transition: all 200ms linear;
            transition-delay: 0.1s;

        }

        .place-one__single-content .top-content h2 a:hover {
            color: var(--thm-base);
        }

        .place-one__single-content .top-content p {
            letter-spacing: 0.002em;
            margin-bottom: 0;
            font-size: 15px;
        }

        .place-one__single-content .top-content-bottom {
            position: relative;
            {{--  display: flex;
            align-items: center;  --}}
            margin-top: 4px;
        }

        .place-one__single-content .top-content-bottom .location-box {
            position: relative;
            display: flex;
            align-items: center;
        }

        .place-one__single-content .top-content-bottom .location-box .icon-box {
            position: relative;
            display: block;
        }

        .place-one__single-content .top-content-bottom .location-box .icon-box span::before {
            position: relative;
            display: inline-block;
            color: var(--thm-base);
            font-size: 15px;
        }

        .place-one__single-content .top-content-bottom .location-box .text {
            position: relative;
            display: block;
            margin-left: 10px;
        }

        .place-one__single-content .top-content-bottom .location-box .text p {
            font-size: 15px;
            line-height: 25px;
            font-family: var(--thm-font);
            text-transform: capitalize;
            margin-bottom: 0;
        }

        .place-one__single-content .top-content-bottom .number-box {
            position: relative;
            display: flex;
            align-items: center;
            {{--  margin-left: 30px;  --}}
        }

        .place-one__single-content .top-content-bottom .number-box .icon {
            position: relative;
            display: block;
        }

        .place-one__single-content .top-content-bottom .number-box .icon span::before {
            position: relative;
            display: inline-block;
            color: var(--thm-base);
            font-size: 15px;
        }

        .place-one__single-content .top-content-bottom .number-box .text {
            position: relative;
            display: block;
            margin-left: 10px;
        }

        .place-one__single-content .top-content-bottom .number-box .text a {
            color: var(--thm-gray);
            font-size: 15px;
            line-height: 25px;
            font-family: var(--thm-font);
            transition: all 200ms linear;
            transition-delay: 0.1s;

        }

        .place-one__single-content .top-content-bottom .number-box .text a:hover {
            color: var(--thm-base);
        }

        .place-one__single-content .bottom-content {
            position: relative;
            display: flex;
            align-items: center;
            padding-top: 6px;
            padding-bottom: 3px;
        }

        .place-one__single-content .bottom-content::before {
            position: absolute;
            top: 0;
            left: -16px;
            right: -16px;
            height: 1px;
            background: #dddddd;
            content: "";
        }

        .place-one__single-content .bottom-content .review-box {
            position: relative;
            display: block;
        }

        .place-one__single-content .bottom-content .review-box li {
            position: relative;
            display: inline-block;
            color: #f1cc38;
            font-size: 15px;
            margin-right: 5px;
        }

        .place-one__single-content .bottom-content .review-box li:last-child {
            margin-right: 0px;
        }

        .place-one__single-content .bottom-content .count-box {
            position: relative;
            display: block;
            margin-left: 13px;
        }

        .place-one__single-content .bottom-content .count-box p {
            color: var(--thm-black);
            font-size: 14px;
            line-height: 24px;
            font-weight: 400;
            font-family: var(--thm-font-3);
            margin-bottom: 0;
        }
        .listings_one_wrap--listings-three .listings__one__content {
            position: relative;
            display: block;
            width: 100%;
            padding: 60px 15px 90px;
            float: none;
        }

        .listings__one__content {
            position: relative;
            display: block;
            width: 50%;
            padding: 120px 60px 120px;
            float: left;
            background-color: #fff;
        }
        
        .listings_one_content_left {
            position: relative;
            display: block;
        }
        
        .listings_one_content_left_form {
            position: relative;
            display: block;
        }
        
        .listings_one_content_left_form .input_box {
            {{--  margin-bottom: 20px;  --}}
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
        
        .filter_by_tags {
            position: relative;
            display: block;
            margin-top: 42px;
        }
        
        .filter_by_tags h3 {
            font-size: 20px;
            font-weight: 700;
            line-height: 30px;
            margin-bottom: 24px;
        }
        
        .single_tags_check__box+.single_tags_check__box {
            margin-top: 10px;
        }
        
        .single_tags_check__box label {
            position: relative;
            display: inline-block;
            padding-left: 30px;
            margin-right: 0px;
            margin-bottom: 0;
            color: var(--thm-gray);
            font-size: 15px;
            line-height: 30px;
            font-weight: 500;
            cursor: pointer;
        }
        
        .single_tags_check__box input[type="checkbox"] {
            display: none;
        }
        
        .single_tags_check__box input[type="checkbox"]+label span {
            position: absolute;
            display: block;
            top: 7px;
            left: 0;
            width: 15px;
            height: 15px;
            vertical-align: middle;
            border: 1px solid rgba(var(--thm-gray-rgb), 0.5);
            cursor: pointer;
            border-radius: 50%;
            transition: all 300ms ease;
        }
        
        .single_tags_check__box label span:before {
            position: absolute;
            top: 2px;
            left: 2px;
            bottom: 2px;
            right: 2px;
            content: "";
            background: rgba(var(--thm-gray-rgb), 0.5);
            border-radius: 50%;
            transform: scale(0);
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease;
        }
        
        .single_tags_check__box input[type="checkbox"]:checked+label span {
            border-color: rgba(var(--thm-gray-rgb), 0.5);
        }
        
        .single_tags_check__box input[type="checkbox"]:checked+label span:before {
            transform: scale(1.0);
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
        
        .shop-grid-page-top-info .right-box .nice-select {
            position: relative;
            display: block;
            height: 50px;
            line-height: 48px;
            background: #ffffff;
            border: 1px solid rgba(var(--thm-gray-rgb), 0.5) !important;
            font-family: var(--thm-font);
            border-radius: 0px;
            color: #888888;
            font-size: 14px;
            font-weight: 300;
            padding-left: 20px;
            padding-right: 0px;
        }
        
        .listings_one_wrap .filter_inner_content {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        
        .listings_one_wrap .filter_inner_content .left {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .listings_one_wrap .filter_inner_content .left .left_icon {
            position: relative;
            display: block;
        }
        
        .listings_one_wrap .filter_inner_content .left .left_icon a {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 50px;
            background: #ffffff;
            border: 1px solid rgba(var(--thm-gray-rgb), 0.1);
            border-radius: 0%;
            color: var(--thm-gray);
            font-size: 15px;
            line-height: 48px;
            text-align: center;
            transition: all 300ms ease 100ms;
        }
        
        .listings_one_wrap .filter_inner_content .left .left_icon a+a {
            margin-left: 1px;
        }
        
        .listings_one_wrap .filter_inner_content .left .left_icon a:hover {
            color: #ffffff;
            background: var(--thm-base);
        }
        
        .listings_one_wrap .filter_inner_content .left .left_text {
            {{--  position: relative;
            display: block;
            margin-left: 35px;  --}}
        }
        
        .listings_one_wrap .filter_inner_content .left .left_text h4 {
            font-size: 18px;
            line-height: 28px;
            font-weight: 600;
        }
        
        .listings_one_wrap .filter_inner_content .right {
            position: relative;
            display: block;
        }
        
        .listings_one_wrap .filter_inner_content .shorting {
            position: relative;
            display: block;
        }
        
        .listings_one_wrap .filter_inner_content .shorting .sort-box {
            width: 150px;
        }
        
        .listings_one_wrap .filter_inner_content .shorting .nice-select {
            position: relative;
            display: block;
            height: 50px;
            line-height: 48px;
            background: #ffffff;
            border: 1px solid rgba(var(--thm-gray-rgb), 0.1) !important;
            font-family: var(--thm-font);
            border-radius: 0px;
            padding: 0 20px;
            color: rgba(var(--thm-gray-rgb), 0.4);
            font-size: 15px;
            font-weight: 500;
            padding-left: 20px;
            padding-right: 0px;
            background: #ffffff;
        }
        
        .listings__one__map {
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            background: #ddd;
            height: 100%;
        
        }
        
        .listings__one__map .google-map {
            width: 100%;
            height: 100%;
            border: none;
        }

        .block-project-cate{
            background: red;
        }
        .avg-rating {
            color: #F4C150;
            display: inline-flex;
            font-size: 20px;
            position: relative;
        }
        .avg-rating__current {
            display: flex;
            overflow: hidden;
            white-space: nowrap;
            position: absolute;
            top: 0;
        }
        .avg-rating.review-count {
            font-size: 26px;
        }
        @media(max-width: 1199px) {
            .place-one__single-img-inner img {
                height: 210px;
            }
        }
        @media(max-width: 767px) {
            .place-one__single-img-inner img {
                height: 180px;
            }
        }
        @media(max-width: 575px) {
            .place-one__single-img-inner img {
                height: 200px;
            }
        }
    </style>
@endpush
@section('custom-js')
    <script src="{{ asset('plugins/forms/selects/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('.form-control-select2').select2({
                minimumResultsForSearch: -1
            });
            $('.sort-select2').select2({
                minimumResultsForSearch: -1
            });
        });

        $(document).ready(function(){
            $('#sort_id').on('change',function(){

                var url = $(this).val();
                if(url){
                    window.location = url;
                }
                return false;
            });
        });
    </script>
@endsection