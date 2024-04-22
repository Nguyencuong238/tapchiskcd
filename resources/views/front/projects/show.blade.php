@extends('layouts.front')

@section('meta')
        <title>{{ $project->name }}</title>
        <link rel="canonical" href="{{ $project->showUrl() }}">
        <meta name="title" content="{{ $project->meta['meta_title'] ?? $project->name }}">
        <meta name="description" content="{{ $project->meta['meta_title'] ?? $project->name }}">
        <meta name="keywords" content="Xa quê công giáo">
        <meta property="og:url" content="{{ $project->showUrl() }}">
        <meta property="og:title" content="{{ $project->meta['meta_title'] ?? $project->name }}">
        <meta property="og:description" content="{{ $project->meta['meta_title'] ?? $project->name }}">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ $project->getFirstMediaUrl('media') }}">
        <meta property="og:site_name" content="Xa quê công giáo">
@stop
@push('css')

    <link rel="stylesheet" href="/front/dependencies/owl.carousel/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/owl.carousel/css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('new/assets/style/jquery.magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('new/assets/style/icon.css') }}" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/toastr/toastr.min.css" type="text/css">
    <style>
        :root {
            --thm-black: #150b5c;
            --thm-base: #ff6f0f;
            --thm-base-rgb: 255, 111, 15;
            --thm-black: #150b5c;
            --thm-black-rgb: 21, 11, 92;
            --thm-gray: #4a4c59;
            --thm-gray-rgb: 74, 76, 89;
            --star-size: 20px;
            --star-color: transparent;
        }
        .jeg_post_title {
            padding: 5px 10px;
        }

        .listings-details-page__content {
            position: relative;
            display: block;
        }

        .listings-details-page__content-img1 {
            position: relative;
            display: block;
            margin-bottom: 20px;
        }

        .listings-details-page__content-img1 img {
            width: 100%;
        }

        .listings-details-page__content-text-box1 {
            position: relative;
            display: block;
            padding: 40px 30px 50px;
            border: 1px solid rgba(74, 76, 89, 0.1);
            background: rgba(74, 76, 89, 0.05);
        }

        .listings-details-page__content-text-box1 h3 {
            font-size: 24px;
            line-height: 34px;
            font-weight: 700;
            margin-bottom: 23px;
            color: #150b5c;
        }

        .listings-details-page__content-text-box1 .text1 {
            position: relative;
            margin-bottom: 20px;
        }

        .listings-details-page__content-text-box1 .text2 {
            position: relative;
        }

        .listings-details-page__content-text-box1 .btn-box {
            position: relative;
            display: block;
            margin-top: 22px;
        }

        .listings-details-page__content-text-box1 .btn-box .thm-btn {
            padding: 11px 25px 11px;
            font-size: 15px;
            font-weight: 600;
        }

        .listings-details-page__content-listing-features {
            position: relative;
            display: block;
            padding: 40px 30px 20px;
            border: 1px solid rgba(74, 76, 89, 0.1);
            background: rgba(74, 76, 89, 0.05);
            margin-top: 20px;
        }

        .listings-details-page__content-listing-features h3 {
            font-size: 24px;
            line-height: 34px;
            font-weight: 700;
            margin-bottom: 31px;
            color: var(--thm-black);
        }

        .listings-details-page__content-listing-features ul {
            position: relative;
            display: block;
        }

        .listings-details-page__content-listing-features ul li {
            position: relative;
            display: inline-block;
            margin-right: 20px;
            margin-bottom: 30px;
        }

        .listings-details-page__content-listing-features ul li .inner {
            position: relative;
            display: flex;
            align-items: center;
        }

        .listings-details-page__content-listing-features ul li .inner .icon {
            position: relative;
            display: block;
        }

        .listings-details-page__content-listing-features ul li .inner .icon a {
            position: relative;
            display: block;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: rgba(74, 76, 89, 0.05);
            text-align: center;
            transition: all 200ms linear;
            transition-delay: 0.1s;
        }

        .listings-details-page__content-listing-features ul li .inner .text {
            position: relative;
            display: block;
            margin-left: 8px;
        }

        .listings-details-page__content-listing-features ul li .inner .icon a span::before {
            position: relative;
            display: inline-block;
            color: #ffffff;
            font-size: 15px;
            line-height: 35px;
            transition: all 200ms linear;
            transition-delay: 0.1s;
        }

        .listings-details-page__content-gallery {
            position: relative;
            display: block;
            padding: 40px 30px 50px;
            border: 1px solid rgba(74, 76, 89, 0.1);
            background: rgba(74, 76, 89, 0.05);
            margin-top: 20px;
        }

        .listings-details-page__content-gallery h3 {
            font-size: 24px;
            line-height: 34px;
            font-weight: 700;
            margin-bottom: 31px;
            color: var(--thm-black);
        }

        .review_and_progress_bar {
            position: relative;
            display: block;
            padding: 50px 30px 50px;
            border: 1px solid rgba(74, 76, 89, 0.1);
            background: rgba(74, 76, 89, 0.05);
            margin-top: 20px;
        }

        .review_and_progress_bar .review_box {
            background: #ffffff;
            position: relative;
            text-align: center;
            padding: 42px 15px 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 280px;
        }

        .review_box .review_box_details {
            position: relative;
            display: block;
        }

        .review_box .review_box_details h2 {
            color: rgba(74, 76, 89, 0.05);
            font-size: 60px;
            line-height: 70px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .review-count {
            margin-bottom: 6px;
        }

        .review-count a.clr-gray {
            color: #4a4c59;
        }

        .review_box .review_box_details p {
            font-size: 15px;
            line-height: 26px;
            font-weight: 600;
            margin: 0;
        }

        .progress_bar {
            position: relative;
            display: block;
            padding: 0px 60px 0px 0px;
            margin-top: 42px;
        }

        .progress-levels {
            position: relative;
            display: block;
        }

        .progress-levels .progress-box {
            position: relative;
            display: block;
            margin-bottom: 22px;
        }

        .progress-levels .progress-box .text {
            position: relative;
            color: #150b5c;
            font-size: 17px;
            font-weight: 600;
            text-transform: capitalize;
            margin-bottom: 7px;
        }

        .progress-levels .progress-box .inner {
            position: relative;
            display: block;
        }

        .progress-levels .progress-box .bar {
            position: relative;
            display: block;
        }

        .progress-levels .progress-box .bar .bar-innner {
            position: relative;
            width: 100%;
            height: 5px;
            background: #ffffff;
            border-radius: 10px;
        }

        .progress-levels .progress-box .bar .bar-innner .skill-percent {
            position: absolute;
            top: -16px;
            right: -48px;
            width: 40px;
            height: 25px;
            display: block;
            text-align: center;
            padding: 0;
            z-index: 1;
        }

        .progress-levels .progress-box .inner .count-text {
            position: relative;
            color: #4a4c59;
            font-size: 18px;
            line-height: 20px;
            font-weight: 600;
            display: inline-block;
            float: none;
        }

        .progress-levels .progress-box .inner .percent {
            position: relative;
            color: #4a4c59;
            font-size: 18px;
            line-height: 20px;
            font-weight: 600;
            display: inline-block;
            float: none;
            margin-left: -2px;
        }

        .progress-levels .progress-box .bar .bar-fill {
            position: absolute;
            top: 0%;
            left: 0px;
            bottom: 0%;
            width: 0px;
            height: 5px;
            border-radius: 10px;
            background: #ff6f0f;
            transition: all 2000ms ease 300ms;
        }

        .listings-details-page__content-comment {
            position: relative;
            display: block;
            padding: 42px 30px 40px;
            border: 1px solid rgba(74, 76, 89, 0.1);
            background: rgba(74, 76, 89 , 0.05);
            margin-top: 20px;
            margin-bottom: 20px;
        }


        .comment-one__title, .comment-form__title {
            margin: 0;
            color: #150b5c;
            font-size: 26px;
            line-height: 32px;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .comment-one__single {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            border-bottom: 1px solid #e4e4e4;
            padding-bottom: 40px;
            margin-bottom: 40px;
        }

        .comment-one__image {
            position: relative;
            display: block;
            border-radius: 50%;
        }

        .comment-one__image img {
            border-radius: 50%;
            max-width: 60px;
        }

        .comment-one__content {
            position: relative;
            margin-left: 20px;
            width: 100%;
        }

        .comment-one__content h3 {
            margin: 0;
            font-size: 20px;
            line-height: 30px;
            font-weight: 700;
            color: #150b5c;
            margin-bottom: 19px;
        }

        .comment-one__content span {
            display: block;
            color: #ff6f0f;
            font-size: 15px;
            line-height: 24px;
        }

        .comment-one__content p {
            font-size: 16px;
            line-height: 32px;
            margin: 0;
        }

        .reviews-box {
            position: absolute;
            top: 0;
            right: 0;
        }

        .reviews-box li {
            position: relative;
            display: inline-block;
        }

        .comment-one__content span {
            display: block;
            color: #ff6f0f;
            font-size: 15px;
            line-height: 24px;
        }

        .comment-one__content span {
            display: block;
            color: #ff6f0f;
            font-size: 15px;
            line-height: 24px;
        }

        .listings-details-page__content-form {
            position: relative;
            display: block;
            background: #ffffff;
            padding: 40px 30px 50px;
            box-shadow: 0px 0px 49px 1px rgb(0 0 0 / 2%);
            border: 1px solid #e5e7f2;
            margin-top: 0px;
        }

        .listings-details-page__content-form .comment-form__title {
            font-size: 24px;
            line-height: 34px;
            font-weight: 700;
            margin-bottom: 31px;
        }

        .listings-details-page__content-form .comment-form__input-box {
            position: relative;
            display: block;
            margin-bottom: 20px;
        }

        .listings-details-page__content-form .comment-form__input-box input[type="text"], .listings-details-page__content-form .comment-form__input-box input[type="email"] {
            height: 50px;
            width: 100%;
            border: 1px solid rgba(21, 11, 92, .1);
            background-color: #ffffff;
            padding-left: 20px;
            padding-right: 20px;
            outline: none;
            font-size: 16px;
            color: rgba(21, 11, 92, .60);
            display: block;
            border-radius: 0px;
            font-family: 'Rubik', sans-serif;
        }

        .listings-details-page__content-form .comment-form__input-box.text-message-box {
            margin-bottom: 20px;
        }

        .listings-details-page__content-form .comment-form__input-box textarea {
            font-size: 16px;
            color: rgba(21, 11, 92, .60);
            height: 220px;
            width: 100%;
            background-color: #ffffff;
            padding: 25px 25px 30px;
            border: none;
            outline: none;
            margin-bottom: 0px;
            border-radius: 0px;
            border: 1px solid rgba(21, 11, 92, .1);
        }

        .listings-details-page__content-form .comment-form__btn.thm-btn {
            border: none;
            font-size: 16px;
            color: #ffffff;
            background-color: #ff6f0f;
            font-weight: 500;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
            padding: 12px 30px 12px;
            border-radius: 5px;
        }

        .jeg_pl_md_2 .jeg_thumb, .jeg_pl_md_3 .jeg_thumb{
            height: auto;
        }

        .sidebar__working-hours {
            position: relative;
            display: block;
            padding: 39px 30px 35px;
            border: 1px solid rgba(74, 76, 89, 0.1);
            background: rgba(74, 76, 89, 0.05);
        }

        .listings-details-page__sidebar-single .title {
            position: relative;
            display: block;
            margin-bottom: 30px;
            padding-bottom: 18px;
        }

        .listings-details-page__sidebar-single .title h2 {
            color: var(--thm-black);
            font-size: 26px;
            line-height: 32px;
            font-weight: 700;
            margin: 0px;
            color: #150b5c;
        }

        .sidebar__working-hours-list {
            position: relative;
            display: block;
            margin: 0;
        }

        .sidebar__working-hours-list li {
            position: relative;
            display: block;
            border-bottom: 1px solid rgba(74, 76, 89, 0.1);
        }

        .sidebar__working-hours-list li a {
            position: relative;
            color: #4a4c59;
            font-size: 16px;
            font-weight: 500;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
            display: block;
            padding: 2px 0px 11px;
        }

        .sidebar__working-hours-list li a span {
            position: absolute;
            top: 42%;
            right: 0px;
            -webkit-transform: translateY(-50%) scale(0);
            transform: translateY(-50%) scale(1);
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
            text-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            color: #4a4c59;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Rubik', sans-serif;
            padding: 0px 0px 0px;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .listings-details-page__sidebar-single + .listings-details-page__sidebar-single {
            margin-top: 40px;
        }

        .sidebar__location-contacts {
            position: relative;
            display: block;
            padding: 39px 30px 55px;
            border: 1px solid rgba(74, 76, 89, 0.1);
            background: rgba(74, 76, 89, 0.05);
        }

        .sidebar__location-contacts-google-map {
            position: relative;
            display: block;
            margin-bottom: 29px;
        }
        .sidebar__location-contacts-google-map iframe {
            position: relative;
            display: block;
            height: 250px;
            width: 100%;
        }

        .sidebar__location-contacts-list {
            position: relative;
            display: block;
        }

        .sidebar__location-contacts-list li {
            position: relative;
            display: block;
            border-bottom: 1px solid rgba(74, 76, 89, 0.1);
            margin-top: 14px;
            padding-bottom: 13px;
        }

        .sidebar__location-contacts-list li p {
            font-size: 15px;
            margin-bottom: 0;
        }

        .sidebar__location-contacts-list li p span {
            position: relative;
            display: inline-block;
            color: #150b5c;
            font-weight: 600;
            width: 70px;
        }
        .listings-details-page__sidebar-single .title::before {
            position: absolute;
            left: -30px;
            bottom: 0;
            right: -30px;
            border-bottom: 1px solid #e5e5e6;
            content: "";
        }
        .sidebar__location-contacts-list li p i::before {
            position: relative;
            display: inline-block;
            font-size: 15px;
            color: #ff6f0f;
            padding-right: 1px;
            top: 1px;
        }
        .sidebar__location-contacts-list li p a {
            color: #4a4c59;
            transition: all 200ms linear;
            transition-delay: 0.1s;
        }
        .sidebar__location-contacts-list li p a:hover {
            color: #ff6f0f;
        }
        .listings-details-page__content-listing-features ul li .inner .text a {
            color: var(--thm-black);
            font-size: 17px;
            font-weight: 400;
            transition: all 200ms linear;
            transition-delay: 0.1s;
        }
        .listings-details-page__content-listing-features ul li:hover .inner .text a {
            color: var(--thm-base);
        }
    </style>
@endpush
@section('page')
    <div class="jeg_main">
        <div class="jeg_container">
            <div class="jeg_content jeg_singlepage">
                <div class="container">
                    <div class="jeg_ad jeg_article jnews_article_top_ads">
                        <div class="ads-wrapper"></div>
                    </div>
                    <div class="row">
                        <div class="jeg_main_content col-md-8">
                            <div class="listings-details-page__content">
                                <div class="listings-details-page__content-img1">
                                    <img src="{{ $project->getFirstMediaUrl('media', '') }}" alt="{{ $project->name }}">
                                </div>
                                <div class="listings-details-page__content-text-box1">
                                    <h3>Nội dung</h3>
                                    <p class="text1">
                                        {!! $project->body !!}
                                    </p>
                                </div>
                                <div class="listings-details-page__content-listing-features">
                                    <h3>Lĩnh Vực Kinh Doanh</h3>
                                    @php
                                        $features = [
                                            1 => 'Free WiFi',
                                            2 => 'Free Parking',
                                            3 => 'Pet Friendly',
                                            4 => 'Online Ordering',
                                            5 => 'Group Visits',
                                            6 => 'Air Conditioned'
                                        ];
                                    @endphp
                                    <ul>
                                        @if($project->features)
                                        @foreach($project->features as $key => $value)
                                        <li>
                                            <div class="inner">
                                               <div class="text">
                                                    <a href="javascript:void(0);"> {{ $value }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <div class="listings-details-page__content-gallery">
                                    <h3>Thư Viện Ảnh</h3>
                                    @if($project->getMedia('projectMulti')->count())
                                    <div class="owl-carousel owl-theme" id="project-multi">
                                        @foreach($project->getMedia('projectMulti') as $image)
                                        <div class="item">
                                            <div class="listings-details-page__content-gallery-single">
                                                <div class="listings-details-page__content-gallery-single-img">
                                                    <img src="{{ $image->getFullUrl() }}" alt="{{ $image->name }}">
                                                    <div class="listings-details-page__content-gallery-single-img-link">
                                                        <a class="img-popup" href="{{ $image->getFullUrl() }}">
                                                            <span class="icon-plus"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>

                                
                                {{--<div class="review_and_progress_bar">
                                    <div class="review_box">
                                        <div class="review_box_details">
                                            <h2>{{number_format($reviews->avg('rating'), 1)}}</h2>
                                            <div class="avg-rating review-count">
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <span>☆</span>
                                                <div class="avg-rating__current" style="width: {{$reviews->avg('rating')/5*100}}%;">
                                                    <span>★</span>
                                                    <span>★</span>
                                                    <span>★</span>
                                                    <span>★</span>
                                                    <span>★</span>
                                                </div>
                                            </div>
                                            @php
                                                $countReview = $reviews->sum(function($item) {
                                                    return $item->rating ? 1 : 0;
                                                });
                                            @endphp
                                            <p>{{$countReview}} đánh giá</p>
                                        </div>
                                    </div>
                                     <div class="progress_bar">
                                        <div class="progress-levels">
                                            <!--Skill Box-->
                                            <div class="progress-box">
                                                <div class="text">Rating</div>
                                                <div class="inner count-box">
                                                    <div class="bar">
                                                        <div class="bar-innner">
                                                            <div class="skill-percent">
                                                                <span class="count-text" data-speed="3000"
                                                                      data-stop="95">95</span>
                                                                <span class="percent">%</span>
                                                            </div>
                                                            <div class="bar-fill" data-percent="95" style="width: 95%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Skill Box-->
                                            <div class="progress-box">
                                                <div class="text">Hospitality</div>
                                                <div class="inner count-box">
                                                    <div class="bar">
                                                        <div class="bar-innner">
                                                            <div class="skill-percent">
                                                                <span class="count-text" data-speed="3000"
                                                                      data-stop="85">85</span>
                                                                <span class="percent">%</span>
                                                            </div>
                                                            <div class="bar-fill" data-percent="85" style="width: 85%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Skill Box-->
                                            <div class="progress-box">
                                                <div class="text">Services</div>
                                                <div class="inner count-box">
                                                    <div class="bar">
                                                        <div class="bar-innner">
                                                            <div class="skill-percent">
                                                                <span class="count-text" data-speed="3000"
                                                                      data-stop="75">75</span>
                                                                <span class="percent">%</span>
                                                            </div>
                                                            <div class="bar-fill" data-percent="75" style="width: 75%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Skill Box-->
                                            <div class="progress-box marb">
                                                <div class="text">Pricing</div>
                                                <div class="inner count-box">
                                                    <div class="bar">
                                                        <div class="bar-innner">
                                                            <div class="skill-percent">
                                                                <span class="count-text" data-speed="3000"
                                                                      data-stop="65">65</span>
                                                                <span class="percent">%</span>
                                                            </div>
                                                            <div class="bar-fill" data-percent="65" style="width: 65%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                
                                {{--<div class="comment-one listings-details-page__content-comment">
                                    <h3 class="comment-one__title">Đánh Giá ({{$reviews->count()}})</h3>
                                    @foreach($reviews as $review)
                                        <div class="comment-one__single">
                                            <div class="comment-one__image">
                                                <img src="{{ asset('/images/user.jpg') }}" alt="">
                                            </div>
                                            <div class="comment-one__content">
                                                <h3>{{ $review->name }}</h3>
                                                <span>{{ $review->created_at }}</span>
                                                <p>{!! $review->comment !!}</p>
                                                <ul class="reviews-box">
                                                    @php
                                                        $review->rating = $review->rating ?? 0;
                                                    @endphp
                                                    @for($i = 1; $i <= 5; $i++)
                                                    <li>
                                                        <span class="@if($review->rating >= $i) icon-star @else icon-star-1 @endif"></span>
                                                    </li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="comment-form listings-details-page__content-form">
                                    <h3 class="comment-form__title">Thêm Đánh Giá</h3>
                                    <form action="{{ route('postReview') }}" method="POST" class="comment-one__form contact-form-validated">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $project->id }}">
                                        <input type="hidden" name="type" value="project">
                                        
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Họ tên" name="name" value="{{ old('name') }}" class="form-control @error('name')is-invalid @enderror" required>
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" class="form-control @error('email')is-invalid @enderror" required>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="comment" placeholder="Đánh giá . . .">{{ old('comment') }}</textarea>
                                        </div>
                                        <div class="rating">
                                            <b>Đánh giá: </b>
                                            <div class="star-rating">
                                                <input id="option1" type="radio" name="rating" value="5">
                                                <label for="option1" title="5 stars">
                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                </label>
                                                <input id="option2" type="radio" name="rating" value="4">
                                                <label for="option2" title="4 stars">
                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                </label>
                                                <input id="option3" type="radio" name="rating" value="3">
                                                <label for="option3" title="3 stars">
                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                </label>
                                                <input id="option4" type="radio" name="rating" value="2">
                                                <label for="option4" title="2 stars">
                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                </label>
                                                <input id="option5" type="radio" name="rating" value="1">
                                                <label for="option5" title="1 star">
                                                <i class="active fa fa-star mrg-lft" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="comment-form__btn-box">
                                            <button type="submit" class="comment-form__btn thm-btn">Gửi</button>
                                        </div>
                                    </form>
                                </div>--}}
                            </div>
                        </div>
                        <div class="jeg_sidebar left jeg_sticky_sidebar col-sm-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                            <div class="jegStickyHolder">
                                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                                    {{--  <div class="listings-details-page__sidebar-single sidebar__working-hours wow animated fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                        <div class="title">
                                            <h2>Thời gian mở cửa</h2>
                                        </div>

                                        <ul class="sidebar__working-hours-list">
                                            <li><a href="#">Saturday <span>Closed</span></a></li>
                                            <li><a href="#">Sunday <span>9 AM - 5 PM</span></a></li>
                                            <li><a href="#">Monday <span>9 AM - 5 PM</span> </a></li>
                                            <li><a href="#">Tuesday <span>9 AM - 5 PM</span></a></li>
                                            <li><a href="#">Wednesday <span>9 AM - 5 PM</span></a></li>
                                            <li><a href="#">Thursday <span>9 AM - 5 PM</span></a></li>
                                            <li><a href="#">Friday <span>Closed</span></a></li>
                                        </ul>
                                    </div>  --}}

                                    <div class="listings-details-page__sidebar-single sidebar__location-contacts" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="title">
                                            <h2>Địa Chỉ / Liên Hệ</h2>
                                        </div>

                                        <div class="sidebar__location-contacts-google-map">{!! $project->map !!}</div>

                                        <ul class="sidebar__location-contacts-list">
                                            <li>
                                                <p><i class="icon-pin"></i> <span> Địa chỉ :</span> {{ $project->address }}
                                                </p>
                                            </li>

                                            <li>
                                                <p><i class="icon-phone-call"></i> <span> SĐT :</span> <a href="tel:{{ $project->phone }}">{{ $project->phone }}</a>
                                                </p>
                                            </li>

                                            <li>
                                                <p><i class="icon-email"></i> <span> Mail :</span> <a href="mailto:{{ $project->email }}">{{ $project->email }}</a>
                                                </p>
                                            </li>

                                            <li>
                                                <p><i class="fa fa-link"></i> <span> Website :</span> <a href="mailto:{{ $project->website }}">{{ $project->website }}</a>
                                                </p>
                                            </li>
                                        </ul>
                                        <ul class="sidebar__location-contacts-social-links">
                                            <li><a href="{{ $project->twitter }}"><span class="icon-twitter"></span></a></li>
                                            <li><a href="{{ $project->telegram }}"><span class="fa fa-telegram"></span></a></li>
                                        </ul>
                                    </div>

                                    <!--Start Listings Details Page Sidebar Single-->
                                    <div class="listings-details-page__sidebar-single sidebar__post"
                                        data-wow-delay="0.3s">
                                        <div class="title">
                                            <h2>Địa điểm khác</h2>
                                        </div>

                                        <ul class="sidebar__post-list list-unstyled">
                                            @foreach($otherProject as $op)
                                            @php
                                                $op_reviews = \App\Models\Review::where('type', 'project')->where('event_id', $op->id)->get();
                                            @endphp
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="{{ $op->getFirstMediaUrl('media', '') }}" alt="{{ $op->name }}">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <h3>
                                                        <a href="{{ $op->showUrl() }}">{{ $op->name }}</a>
                                                    </h3>
                                                    <div class="sidebar__post-content-meta">
                                                        <i class="icon-pin"></i>{{$op->address}}
                                                    </div>
                                                    <div class="avg-star">
                                                        {{number_format($op_reviews->avg('rating'), 1)}} <span>★</span>
                                                    </div>
                                                    {{--  <div class="avg-rating">
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <span>☆</span>
                                                        <div class="avg-rating__current" style="width: {{$op_reviews->avg('rating')/5*100}}%;">
                                                            <span>★</span>
                                                            <span>★</span>
                                                            <span>★</span>
                                                            <span>★</span>
                                                            <span>★</span>
                                                        </div>
                                                    </div>  --}}
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--End Listings Details Page Sidebar Single-->

                                    <!--Start Listings Details Page Sidebar Single-->
                                    <div class="listings-details-page__sidebar-single sidebar__tags"
                                        data-wow-delay="0.4s">
                                        <div class="title">
                                            <h2>Tags</h2>
                                        </div>
                                        <div class="sidebar__tags-list">
                                            @foreach($project->tags as $t)
                                            <a href="#">{{ $t->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--End Listings Details Page Sidebar Single-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('custom-js')
    <script src="/front/dependencies/owl.carousel/js/owl.carousel.min.js"></script>
    <script src="{{ asset('new/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="/front/dependencies/toastr/toastr.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop:false,
            margin:30,
            nav:true,
            navText: ['<span class="fa fa-angle-left fw-bold"></span>','<span class="fa fa-angle-right fw-bold"></span>'],
            dots: false,
            responsive:{
                0:{
                    items:1
                },
                992:{
                    items:2
                },
                1200:{
                    items:2,
                }
            }
        })
        if ($(".img-popup").length) {
            $(".img-popup").magnificPopup({
                type: "image",
                closeOnContentClick: true,
                closeBtnInside: false,
                gallery: {
                    enabled: true,
                },
            });
        }
    </script>
    @if(session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}", 'Thành công')
    </script>
    @endif
    @if($errors->any())
    <script>
        toastr.error("{{ implode('', $errors->all()) }}", 'Thất bại')
    </script>
    @endif
@endsection
@push('css')
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<style>
    .listings-details-page__content-gallery-single-img {
        position: relative;
        display: block;
        overflow: hidden;
        height: 240px;
    }
    .listings-details-page__content-gallery-single-img-link {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transform: scale(0);
        transition: all 700ms ease;
        z-index: 5;
    }
    .listings-details-page__content-gallery-single:hover .listings-details-page__content-gallery-single-img-link {
        transform: scale(1);
        opacity: 1;
        transition-delay: 500ms;
    }

    .listings-details-page__content-gallery-single-img-link a {
        position: relative;
        display: block;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: #150b5c;
        text-align: center;
        transition: all 200ms linear;
        transition-delay: 0.1s;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 14px;
    }
    .listings-details-page__content-gallery-single-img-link a:hover {
        background: #ff6f0f;
    }
    #project-multi .owl-nav {
        position: absolute;
        top: 46%;
        left: 10px;
        right: 10px;
        transition-delay: .1s;
        transition-timing-function: ease-in-out;
        transition-duration: .5s;
        transition-property: all;
        transform-origin: bottom;
        transform-style: preserve-3d;
        line-height: 0;
        height: 0;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        transform: scaleX(1.0) translateX(0px);
        z-index: 999;
    }
    .listings-details-page__content-gallery-single:hover .listings-details-page__content-gallery-single-img::before {
        opacity: 1;
        opacity: 1;
    }
    .listings-details-page__content-gallery-single-img::before {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transition-delay: .1s;
        transition-timing-function: ease-in-out;
        transition-duration: .7s;
        transition-property: all;
        background: rgba(21, 11, 92, 0.5);
        opacity: 0;
        z-index: 1;
        content: "";
    }
    .listings-details-page__content-gallery-single-img img {
        width: 100%;
        transition: .5s ease;
        transform: scale(1.05);
    }
    .listings-details-page__content-gallery-single:hover .listings-details-page__content-gallery-single-img img {
        transform: scale(1);
    }
    #project-multi .owl-prev, #project-multi .owl-next {
        position: relative;
        display: block;
        background: #150b5c;
        border: none;
        height: 35px;
        width: 35px;
        border-radius: 50%;
        text-align: center;
        color: #ffffff;
        font-size: 15px;
        line-height: 35px;
        font-weight: 600;
        opacity: 1;
        margin: 0;
        padding: 0;
        transform: translateY(0px);
        -webkit-transition: all 300ms ease;
        -moz-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        transition: all 300ms ease;
        z-index: 99;
    }
    #project-multi .owl-prev:hover, #project-multi .owl-next:hover {
        color: #ffffff;
        background: #ff6f0f;
        z-index: 99;
    }
    .owl-carousel .owl-prev:before, .owl-carousel .owl-next:before {
        display: none;
    }
    .fw-bold {
        font-weight: bold;
    }
    .owl-carousel .owl-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .sidebar__working-hours-list li a {
        position: relative;
        color: #4a4c59;
        font-size: 16px;
        font-weight: 600;
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
        display: block;
        padding: 2px 0px 11px;
    }
    .sidebar__working-hours-list li:hover a {
        color: #ff6f0f;
    }
    .sidebar__working-hours-list li+li {
        margin-top: 10px;
    }
    .sidebar__location-contacts-social-links {
        position: relative;
        display: block;
        margin-top: 8px;
    }
    .sidebar__location-contacts-social-links li {
        position: relative;
        display: inline-block;
        margin-right: 6px;
    }
    .sidebar__location-contacts-social-links li a {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        text-align: center;
        background: #150b5c;
        border-radius: 3px;
        transition: all 200ms linear;
        transition-delay: 0.1s;
        color: #fff;
    }
    .sidebar__location-contacts-social-links li a:hover {
        background: #ff6f0f;
    }
    .sidebar__post, .sidebar__tags {
        position: relative;
        display: block;
        padding: 37px 30px 55px 30px;
        border: 1px solid rgba(74, 76, 89, 0.1);
        background: rgba(74, 76, 89, 0.05);
    }
    .sidebar__post-image {
        position: relative;
        display: block;
        margin-right: 20px;
    }
    .sidebar__post-image>img {
        width: 90px;
        height: 70px;
        object-fit: cover;
    }
    .sidebar__post-content h3 {
        font-size: 16px;
        margin: 0;
        line-height: 28px;
        margin-bottom: 5px;
    }
    .sidebar__post-content h3 a {
        color: var(--thm-black);
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
        display: block;
        font-size: 20px;
        font-weight: 700;
    }
    .sidebar__post-list li {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-transition: all 500ms ease;
        transition: all 500ms ease;
    }
    .sidebar__tags-list a {
        font-size: 16px;
        color: rgba(var(--thm-black-rgb), 1.0);
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        background: rgba(var(--thm-gray-rgb), 0.1);
        display: inline-block;
        padding: 3px 14px 3px;
        margin-left: 5px;
        font-weight: 400;
        line-height: 30px;
    }
    .sidebar__tags-list a+a {
        margin-left: 5px;
        margin-top: 10px;
    }
    .sidebar__tags-list a:hover {
        color: #ffffff;
        background: var(--thm-base);
    }
    .review_box .review_box_details h2 {
        color: var(--thm-black);
        font-size: 60px;
        line-height: 70px;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .star-rating {
        direction: rtl;
        display: inline-block;
        padding: 0;
        background-color: inherit;
        border: inherit;
    }
    .star-rating input[type=radio] {
        display: none;
    }
    .star-rating label {
        color: #bbb;
        font-size: 18px;
        padding: 0;
        cursor: pointer;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        display: inline-block;
    }
    .mrg-lft {
        margin-left: 30px;
    }
    .star-rating label:hover, .star-rating label:hover ~ label, .star-rating input[type=radio]:checked ~ label {
        color: #F4C150;
    }
    .rating {
        margin-bottom: 20px
    }
    .comment-one__single--two {
        margin-left: 60px;
        padding-bottom: 0px;
        margin-bottom: 0px;
        border-bottom: none;
    }
    .comment-one__single:last-child {
        margin-bottom: 0px;
        border-bottom: 0;
    }
    .sidebar__location-contacts-list li:last-child {
        border-bottom: none;
    }
    .sidebar__post-list li+li {
        border-top: 1px solid #e2e4e3;
        margin-top: 30px;
        padding-top: 30px;
    }
    .comment-one__content .reviews-box span {
        color: #F4C150;
    }
    .sidebar__post-list .review-count {
        margin-top: 10px;
    }
    .sidebar__post-list .review-count a {
        font-size: 14px;
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
    .avg-star span {
        font-size: 18px;
        color: #F4C150;
    }
</style>
@endpush
@stop