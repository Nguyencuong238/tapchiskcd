@extends('layouts.front')
@section('meta')
    <title>{{ $event->title }}</title>
    <link rel="canonical" href="{{ $event->showUrl() }}">
    <meta name="title" content="{{ $event->meta['meta_title'] ?? $event->title }}">
    <meta name="description" content="{{ $event->meta['meta_description'] }}">
    <meta name="keywords" content="Conggiao">
    <meta property="og:url" content="{{ $event->showUrl() }}">
    <meta property="og:title" content="{{ $event->meta['meta_title'] ?? $event->title }}">
    <meta property="og:description" content="{{ $event->meta['meta_title'] }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $event->getFirstMediaUrl('media') }}">
    <meta property="og:site_name" content="xaqueconggiao">
@stop
@push('css')
    <style>
        :root {
            --thm-black: #150b5c;
            --thm-base: #ff6f0f;
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

        .review_box .review_box_details .review-count {
            margin-bottom: 6px;
        }

        .review_box .review_box_details .review-count a {
            font-size: 20px;
            color: #ff6f0f;
        }

        .review_box .review_box_details .review-count a.clr-gray {
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
            font-weight: 500;
            display: inline-block;
            float: none;
        }

        .progress-levels .progress-box .inner .percent {
            position: relative;
            color: #4a4c59;
            font-size: 18px;
            line-height: 20px;
            font-weight: 500;
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
        }

        .comment-one__content {
            position: relative;
            margin-left: 20px;
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

        .listings-details-page__content-comment .reviews-box {
            position: absolute;
            top: 0;
            right: 0;
        }

        .listings-details-page__content-comment .reviews-box li {
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
            font-weight: 500;
            font-family: 'Rubik', sans-serif;
            padding: 0px 0px 0px;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .listings-details-page__sidebar-single+.listings-details-page__sidebar-single {
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
        .sidebar__location-contacts-map {
            position: relative;
            display: block;
            height: 250px;
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
            margin-bottom: 5px;
        }

        .sidebar__location-contacts-list li p span {
            position: relative;
            display: inline-block;
            color: #150b5c;
            font-weight: 600;
            width: 70px;
        }
        .sidebar__location-contacts-map {
            position: relative;
            display: block;
            height: 250px;
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
            font-weight: 600;
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
                                    <img src="{{ $event->getFirstMediaUrl('media', '') }}" alt="#">
                                </div>
                                <div class="listings-details-page__content-text-box1">
                                    <h3>Nội dung</h3>
                                    <p class="text1">
                                        {!! $event->body !!}
                                    </p>
                                </div>
                                @if(!empty($event->feature))
                                <div class="listings-details-page__content-listing-features">
                                    <h3>Thiết Bị</h3>
                                    <ul>
                                        @foreach($event->feature as $key => $value)
                                        <li>
                                            <div class="inner">
                                               <div class="text">
                                                    <a href="javascript:void(0);"> {{ getListFeature($value) }}</a>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="listings-details-page__content-gallery">
                                    <h3>Thư Viện Ảnh</h3>
                                    <div class="row">
                                        <div class="col-12">
                                            @foreach($event->getMedia('eventMulti') as $image)
                                                <div class="col-lg-6">
                                                    <img src="{{ $image->getFullUrl() }}" style="border-radius: 6px;">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

{{--                                <div class="review_and_progress_bar">--}}
{{--                                    <div class="review_box">--}}
{{--                                        <div class="review_box_details">--}}
{{--                                            <h2>4.5</h2>--}}
{{--                                            <div class="review-count">--}}
{{--                                                <a href="#"><i class="icon-star"></i></a>--}}
{{--                                                <a href="#"><i class="icon-star"></i></a>--}}
{{--                                                <a href="#"><i class="icon-star"></i></a>--}}
{{--                                                <a href="#"><i class="icon-star"></i></a>--}}
{{--                                                <a href="#" class="clr-gray"><i class="icon-star-1"></i></a>--}}
{{--                                            </div>--}}
{{--                                            <p>48 Total Reviews</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress_bar">--}}
{{--                                        <div class="progress-levels">--}}
{{--                                            <!--Skill Box-->--}}
{{--                                            <div class="progress-box">--}}
{{--                                                <div class="text">Rating</div>--}}
{{--                                                <div class="inner count-box">--}}
{{--                                                    <div class="bar">--}}
{{--                                                        <div class="bar-innner">--}}
{{--                                                            <div class="skill-percent">--}}
{{--                                                                <span class="count-text" data-speed="3000"--}}
{{--                                                                      data-stop="95">0</span>--}}
{{--                                                                <span class="percent">%</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar-fill" data-percent="95" style="width: 75%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--Skill Box-->--}}
{{--                                            <div class="progress-box">--}}
{{--                                                <div class="text">Hospitality</div>--}}
{{--                                                <div class="inner count-box">--}}
{{--                                                    <div class="bar">--}}
{{--                                                        <div class="bar-innner">--}}
{{--                                                            <div class="skill-percent">--}}
{{--                                                                <span class="count-text" data-speed="3000"--}}
{{--                                                                      data-stop="85">0</span>--}}
{{--                                                                <span class="percent">%</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar-fill" data-percent="85" style="width: 75%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--Skill Box-->--}}
{{--                                            <div class="progress-box">--}}
{{--                                                <div class="text">Services</div>--}}
{{--                                                <div class="inner count-box">--}}
{{--                                                    <div class="bar">--}}
{{--                                                        <div class="bar-innner">--}}
{{--                                                            <div class="skill-percent">--}}
{{--                                                                <span class="count-text" data-speed="3000"--}}
{{--                                                                      data-stop="75">0</span>--}}
{{--                                                                <span class="percent">%</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar-fill" data-percent="75" style="width: 75%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <!--Skill Box-->--}}
{{--                                            <div class="progress-box marb">--}}
{{--                                                <div class="text">Pricing</div>--}}
{{--                                                <div class="inner count-box">--}}
{{--                                                    <div class="bar">--}}
{{--                                                        <div class="bar-innner">--}}
{{--                                                            <div class="skill-percent">--}}
{{--                                                                <span class="count-text" data-speed="3000"--}}
{{--                                                                      data-stop="65">0</span>--}}
{{--                                                                <span class="percent">%</span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="bar-fill" data-percent="65" style="width: 75%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="comment-one listings-details-page__content-comment">
                                    <h3 class="comment-one__title">Đánh Giá</h3>
                                    @foreach($reviews as $review)
                                        <div class="comment-one__single">
{{--                                            <div class="comment-one__image">--}}
{{--                                                <img src="assets/images/blog/comment-1-1.png" alt="">--}}
{{--                                            </div>--}}
                                            <div class="comment-one__content">
                                                <h3>{{ $review->name }}</h3>
                                                <span>{{ $review->created_at }}</span>
                                                <p>{!! $review->comment !!}</p>
{{--                                                <ul class="reviews-box">--}}
{{--                                                    <li><span class="icon-star"></span></li>--}}
{{--                                                    <li><span class="icon-star"></span></li>--}}
{{--                                                    <li><span class="icon-star"></span></li>--}}
{{--                                                    <li><span class="icon-star"></span></li>--}}
{{--                                                    <li><span class="icon-star-1"></span></li>--}}
{{--                                                </ul>--}}
                                            </div>
                                        </div>
                                    @endforeach

{{--                                    <div class="comment-one__single comment-one__single--two">--}}
{{--                                        <div class="comment-one__image">--}}
{{--                                            <img src="assets/images/blog/comment-1-2.png" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="comment-one__content">--}}
{{--                                            <h3>Robin Wiliam</h3>--}}
{{--                                            <span>14 dec 2022</span>--}}
{{--                                            <p>Lorem Ipsum available, but the majority have suffered alteration in--}}
{{--                                                some form If you are going to use a passage of Lorem Ipsum, you need--}}
{{--                                            </p>--}}

{{--                                            <ul class="reviews-box">--}}
{{--                                                <li><span class="icon-star"></span></li>--}}
{{--                                                <li><span class="icon-star"></span></li>--}}
{{--                                                <li><span class="icon-star"></span></li>--}}
{{--                                                <li><span class="icon-star"></span></li>--}}
{{--                                                <li><span class="icon-star-1"></span></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>

                                <div class="comment-form listings-details-page__content-form">
                                    <h3 class="comment-form__title">Thêm Đánh Giá</h3>
                                    <form action="{{ route('postReview') }}" method="POST" class="comment-one__form contact-form-validated" novalidate="novalidate">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="comment-form__input-box">
                                                    <input type="text" placeholder="Full name" name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="comment-form__input-box">
                                                    <input type="email" placeholder="Email Address" name="email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="comment-form__input-box text-message-box">
                                                    <textarea name="comment" placeholder="Comments" required></textarea>
                                                </div>
                                                <div class="comment-form__btn-box">
                                                    <button type="submit" class="comment-form__btn thm-btn">Post
                                                        Comment
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="jeg_sidebar left jeg_sticky_sidebar col-sm-4" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                            <div class="jegStickyHolder">
                                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
{{--                                    <div class="listings-details-page__sidebar-single sidebar__working-hours wow animated fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">--}}
{{--                                        <div class="title">--}}
{{--                                            <h2>Working Hours</h2>--}}
{{--                                        </div>--}}

{{--                                        <ul class="sidebar__working-hours-list">--}}
{{--                                            <li><a href="#">Saturday <span>Closed</span></a></li>--}}
{{--                                            <li><a href="#">Sunday <span>9 AM - 5 PM</span></a></li>--}}
{{--                                            <li><a href="#">Monday <span>9 AM - 5 PM</span> </a></li>--}}
{{--                                            <li><a href="#">Tuesday <span>9 AM - 5 PM</span></a></li>--}}
{{--                                            <li><a href="#">Wednesday <span>9 AM - 5 PM</span></a></li>--}}
{{--                                            <li><a href="#">Thursday <span>9 AM - 5 PM</span></a></li>--}}
{{--                                            <li><a href="#">Friday <span>Closed</span></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}

                                    <div class="listings-details-page__sidebar-single sidebar__location-contacts wow animated fadeInUp animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="title">
                                            <h2>Địa Chỉ / Liên Hệ</h2>
                                        </div>

                                        <div class="sidebar__location-contacts-google-map">
                                            <iframe src="{{ $event->map }}" class="sidebar__location-contacts-map" allowfullscreen=""></iframe>
                                        </div>

                                        <ul class="sidebar__location-contacts-list">
                                            <li>
                                                <p><i class="fa fa-map-marker fw-bold"></i> <span> Địa chỉ :</span> {{ $event->address }}
                                                </p>
                                            </li>

                                            <li>
                                                <p><i class="fa fa-phone"></i> <span> SĐT :</span> <a href="tel:{{ $event->phone }}">{{ $event->phone }}</a>
                                                </p>
                                            </li>

                                            <li>
                                                <p><i class="fa fa-envelope-o"></i> <span> Mail :</span> <a href="mailto:{{ $event->email }}">{{ $event->email }}</a>
                                                </p>
                                            </li>

                                            <li>
                                                <p><i class="fa fa-link"></i> <span> Website :</span> <a href="mailto:{{ $event->website }}">{{ $event->website }}</a>
                                                </p>
                                            </li>
                                        </ul>
{{--                                        <ul class="sidebar__location-contacts-social-links">--}}
{{--                                            <li><a href="#"><span class="icon-facebook-app-symbol"></span></a></li>--}}
{{--                                            <li><a href="#"><span class="icon-twitter"></span></a></li>--}}
{{--                                            <li><a href="#"><span class="icon-instagram"></span></a></li>--}}
{{--                                            <li><a href="#"><span class="icon-pinterest"></span></a></li>--}}
{{--                                        </ul>--}}
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
