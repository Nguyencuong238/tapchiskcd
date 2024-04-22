@extends('layouts.front')

@push('css')
    <style>
        @media only screen and (min-width: 600px) {
            .slides {
                max-height: 789px;
            }
        }
        .post-bg-wrap .post-grid-layout3 .post-img img {
            min-height: 260px;
        }
        .widget-upcoming-post .post-list-layout2 .media {
            padding: 0 0 1.3rem;
        }
        .post-grid-layout3 .post-img {
            border-radius: 5px;
        }
        .post-grid-layout2.post-grid10 .item-img {
            border-radius: 5px;
        }
        .post-list-layout3.post-grid-layout5 .item-img {
            border-radius: 5px;
        }
        /* .post-grid-layout2 .item-img img {
            min-height: 264px;
        } */
        .background-container-bg{
           
            /* transform: matrix(-1, 0, 0, 1, 0, 0); */
            
        }
        .post-list-layout2 .media .item-img img {
            border-radius: 5px;
        }
        .widget-most-viewed img {
            border-radius: 5px;
            height: 80px;
        }
        .post-wrap-layout6 img {
            border-radius: 5px;
        }
        .nav-control-layout2.ad .owl-nav .owl-prev{
            top: 50%;
            left: 0;
        }
        .nav-control-layout2.ad .owl-nav .owl-next{
            top: 50%;
            right: 0;
        }
        .project-links-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80%;
            margin: 0 auto;
        }
        .project-links-container a {
            width: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 16px;
        }
        .project .owl-nav button i {
            color: #3e3737b8;
        }
        .post-video-slider {
            background-image: url(/front/media/banner-01.jpg);
        }
        .owl-carousel .owl-item a {
            display: block;
        }
        .blog-media .blog-img.left, .blog-media .blog-img.right {
            width: 30%;
        }
        .blog-media .blog-img.right img {
            height: 83px;
        }
        .dgg-tv .blog-coverd, .blog-coverd .blog-img, .dgg-tv .blog-coverd .blog-img img {
            height: 100%;
        }
        .new-style-col .blog-title a {
            font-size: 17px;
        }
        .new-style-col .text-overflow-2-lines {
            /* -webkit-line-clamp: 1; */
        }
        .blog-coverd .blog-img img.feature-big {
            height: 517px;
        }
        .blog-coverd .blog-img img.feature-small {
            /* height: 290px; */
        }
        .widget-most-viewed .grid-post .item-img img.tt-big {
            height: 200px;
            width: 100%;
        }
        .tt-padding {
            padding: 5px;
        }
        .blog-title.h4 {
            min-height: 2.4em;
        }
        .vs-blog.blog-card .blog-title {
            min-height: 3em;
        }
        .rs_padding {
            padding: 5px 5px 15px 5px;
        }
        .kt-section .blog-media {
            margin-bottom: 0;
            padding: 5px 5px 15px 5px;
        }
        .link-banner{
            margin-top:-90px;
            margin-left:12px;
            margin-right:auto;
            display: block;
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            color: #000000;
            width: auto;
            text-decoration: none;
            z-index: 1;
            justify-content: center;
            background: rgba(215, 220, 227, 0.4);
            transition: opacity .5s;
        }
        .link-banner:hover{
            opacity: 1;
        }
        .link-banner-main{
            margin-top:-90px;
            margin-left:20px;
            margin-right:auto;
            display: inline-block;
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 36px;
            color: #000000;
            width: auto;
            text-decoration: none;
        }
        .img-header{
            height: 600px; 
            width: 640px;
            opacity: 0.7;
        }
        .text-content{
            color: black;
            font-size: 18px;
            font-family: 'Roboto';
            margin-top: 20px;
        }
      
        @media (min-width: 300px) and (max-width: 776px) {
            .span-loi-chua{
                margin-left: -400px;
            }
            .text-banner-main{
                margin-top: -98px;
            }
            .link-banner{
                margin-top: -102px;
            }
            .text-banners{
                font-size: 12px !important;
                margin-bottom: -60px !important;
                width: 200px;
            }
            .text-banners-main{
                margin-top: 270px !important;
            }
            .location-loi-chua-img{
                width: 340px !important;
                margin-left: 20px;
            }
            .title-loi-chua{
                margin-left: 20px !important;
            }
            .text-song-dao{
                margin-left: -50px !important;
                margin-bottom: -200px !important;
                width: 300px !important;
            }
            .block-slide{
                margin-left: 10px !important;
                margin-top: 150px !important;  
                height: 100px; 
                overflow-x: auto;
            }
            .tt-slide-image-1{
                width: 130px;
                height: 80px !important;
            }
                .p-text-video{
                margin-left: 10px;
                color: black;
                width: 200px !important;
                margin-top: -10px;
            }
            .img-banner-main{
                height: 360px !important;
            }
            .img-banner-new{
                height: 170px !important;
            }
            .img-song-dao-small{
                width: 110px !important;
                height: 120px !important;
            }
            .block-text-song-dao-up{
                width: 100px;
                margin-left: 50px;
            }
            .block-text-song-dao-down{
                margin-top: 220px !important;
            }
            .block-text-song-dao-down-title{
                width: 90px !important;
            }
        }
        .text-content-1{
            color: black;
            font-size: 14px;
            font-family: 'Roboto';
            margin-top: 20px;
        }
        .height-350{
            height: 350px;
        }
        .height-180{
            height: 150px;
        }
        .img-song-dao-big{
            width: 380px;
        }
        .img-song-dao-small{
            width: 233px;
            margin-left: -14px;
        }
        .p-song-dao{
            margin-left: -12px;
            color: black;
            font-size: 14px;
            font-family: 'Roboto';
            font-weight: 500 !important;
        }
        .tt-slide-image-1{
            width: 70%;
            height: auto;
        }
        .block-slide{
            margin-left: 150px;
            margin-top: 80px;  
            height: 140px; 
        }
        .jeg_block_title2 {
            margin-top: -15px;
        }
        .jeg_block_title2 a {
            border-bottom: 3px solid #000000;
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 28px;
            letter-spacing: 0.015em;
            color: #000000;
            text-decoration: none;
            padding-bottom: 2px;
        }
        .main-header-left{
            gap: 98px !important;
            display: flex !important;
            flex-direction: column !important;
            margin-left: -20px !important;
        }
        .p-songdao-title{
            width: 350px;
        }
        .block-song-dao{
            margin-left: -15px !important;
        }
        .video-song-dao{
            margin-left: 15px !important;
        }
        .location-image:hover {
            opacity: 0.7;
            filter: blur(0.7px);
        }
        @media (hover: none) {
            .location-image img {
                filter: blur(1px);
                opacity: 0.7;
            }
        }
        .location-listing {
            /* position: relative; */
        }
        .location-title {
            font-size: 1.5em;
            font-weight: bold;
            text-decoration: none;
            z-index: 1;
            /* position: absolute; */
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
        .text-song-dao{
            width: 320px !important;
            font-weight: 500 !important;
        }
        .text-banners{
            margin-bottom: -100px !important;
            font-size: 16px;
            margin-top: 12px;    
        }
        .text-banners-main{
            margin-left: 6px;
            margin-top: 360px;
            font-size: 24px;
        }
        .text-hover{
            font-family:'Roboto';
            font-weight: 500;
            font-size: 16px;
            margin-top: 10px;
        }
        .text-hover:hover{
            color: #f70d28 !important;
            transition: color .2s !important;
        }
        .img-banner-main{
            height: auto;
            max-width: 100%;
        }
        .section-one {
            padding-bottom: 100px;
            padding-top: 50px;
            position: relative;
        }
        .section-one__bg {
            position: absolute;
            bottom: 0;
            left: -20px;
            z-index: -1;
        }
        .block-text-song-dao-up{
            width: 200px;
        }
        .block-text-song-dao-down-title{
            width: 200px;
        }
        .tt-information-1{
            margin-top: 0; 
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
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 1em;
        }
        .location-image {
            border-radius: 3px;
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
            border-bottom: 3px solid black;
            font-size: 18px;
            font-weight: 700;
            color: black;
            padding-bottom: 3px;
        }
        .location-listing {
            /* position: relative; */
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
        .h3-sm {
            font-weight: 500;
            font-size: 14px;
            color: black;
        }
        .h3-md {
            font-weight: 500;
            font-size: 16px;
            color: black;
        }
        .h3-lg {
            font-weight: 500;
            font-size: 16px;
            color: black;
        }
        .h3-xl {
            font-weight: 500;
            font-size: 20px; 
            color: black;
        }
        .tbdd-big img {
            height: 160px;
        }
        .section-2, .section-4, .section-6 {
            background: #F7F7F7;
        }
        .sec2-img {
            height: 200px;
        }
        .sec3-img__xl {
            height: 300px;
        }
        .sec3-img__sm {
            height: 190px;
        }
        .ddcg-sec__xl img {
            height: 160px;
        }
        .ddcg-sec__sm img {
            height: 60px;
        }
        .ghhv-lg {
            height: 360px;
        }
        .ghhv-sm {
            height: 120px;
        }
        .ghvn-lg {
            height: 190px;
        }
        .tbdd-small, .ddcg-sec__sm, .ghvn-link {
            border-top: 1px dashed #EAEAEA;
        }
        .tbdd-small img {
            height: 60px;
        }
        .ktdd-img {
            height: 190px;
        }
        .tlvk-sm {
            height: 100px;
        }
        .tlvk-lg {
            height: 290px;
        }
        .icon-left, .icon-right {
            border: 1px solid #d9d9d9;
            padding: 5px 12px;
            font-size: 10px;
            margin-right: 10px;
            border-radius: 3px;
        }
        .album-name {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            height: 50px;
            bottom: 0;
            background: linear-gradient(180deg,transparent 0,rgba(0,0,0,0.65) 70%);
        }
        .album-name a {
            color: #fff;
        }
        .img-feature-big {
            height: 458px;
        }
        .tbdd-small > .row {
            padding-top: 15px;
            padding-bottom: 15px;
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
        
            .p-trending{
                text-align: center;
                margin-left: -50px;
            }
        }
        @media(max-width: 1919px) {
            .section-one__bg {
                left: -90px;
            }
        }
        @media(max-width: 1599px) {
            .section-one__bg {
                left: -100px;
            }
        }
        @media(max-width: 1399px) {
            .section-one__bg {
                left: -140px;
                bottom: -20px;
            }
        }
        @media(max-width: 1199px) {
            .section-one {
                padding-bottom: 60px;
            }
            .tbdd-small > .row {
                padding-top: 10px;
                padding-bottom: 10px;
            } 
            .img-feature-big {
                height: 377px;
            }
            .img-feature-small {
                height: 150px;
            }
            .tbdd-big img {
                height: 130px;
            }
            .tbdd-small img, .ddcg-sec__sm img {
                height: 50px;
            }
            .tbdd-big h3 {
                line-height: 1.2;
            }
            .sec2-img, .ktdd-img {
                height: 160px;
            }
            .ddcg-sec__xl img, .ghvn-lg {
                height: 140px;
            }
            .sec3-img__xl {
                height: 240px;
            }
            .sec3-img__sm {
                height: 155px;
            }
            .ghhv-lg {
                height: 280px;
            }
            .ghhv-sm {
                height: 100px;
            }
            .category-title {
                font-size: 17px;
            }
            .tlvk-sm {
                height: 85px;
            }
            .tlvk-lg {
                height: 240px;
            }
        }
        @media(max-width: 991px) {
            .img-feature-big {
                height: 360px;
            }
            .img-feature-small {
                height: 142px;
            }
            .section-one__bg {
                display: none;
            }
            .tbdd-big img {
                height: 240px;
            }
            .tbdd-small img {
                height: 76px;
            }
            .tbdd-small > .row {
                padding-top: 0;
                padding-bottom: 15px;
            }
            .tbdd-small, .ddcg-sec__sm, .ghvn-link {
                border-top: none;
            }
            .sec2-img, .ktdd-img {
                height: 210px;
            }
            .sec3-img__xl {
                height: 230px;
            }
            .ddcg-sec__xl img {
                height: 280px;
            }
            .ddcg-sec__sm img {
                height: 70px;
            }
            .ddcg-sec__sm .ddcg-first {
                padding-top: 0 !important;
            }
            .ghhv-lg {
                height: 250px;
            }
            .ghhv-sm {
                height: 90px;
            }
            .ghvn-lg {
                height: 240px;
            }
            .ghvn-sm, .ghvn-lg {
                height: 160px;
            }
        }
        @media(max-width: 767px) {
            .img-feature-small {
                height: 97px;
            }
            .img-feature-big {
                height: 270px;
            }
            .tbdd-small img {
                height: 65px;
            }
            .tbdd-big img {
                height: 195px;
            }
            .sec2-img {
                height: 170px;
            }
            .sec3-img__xl {
                height: 170px;
            }
            .ddcg-sec__sm img {
                height: 60px;
            }
            .ddcg-sec__xl img {
                height: 240px;
            }
            .ghhv-lg {
                height: 195px;
            }
            .ghhv-sm {
                height: 70px;
            }
            .ghvn-lg {
                height: 300px;
            }
            .sec2-img, .ktdd-img {
                height: 180px;
            }
            .h3-lg {
                font-size: 16px;
            }
            .h3-md {
                font-size: 14px;
            }
            .tlvk-lg {
                height: 190px;
            }
            .tlvk-sm {
                height: 70px;
            }
        }
        @media(max-width: 575px) {
            .img-feature-small, .img-feature-big, .tbdd-small img, .sec3-img__xl, .tbdd-big img, .sec2-img, .sec3-img__sm,
            .ddcg-sec__xl img, .ddcg-sec__sm img, .ghhv-lg, .ghhv-sm, .tlvk-lg, .tlvk-sm, .ktdd-img, .ghvn-lg, .ghvn-sm {
                height: 240px;
            }
            .h3-sm, .h3-md, .h3-lg {
                font-size: 14px;
            }
            .tbdd-small > .row {
                padding-bottom: 24px;
            }
            
            #button::after {
                line-height: 40px;
                font-size: 1.2em;
            }
            #button {
                width: 40px;
                height: 40px;
            }
        }
        @media(max-width: 400px) {
            .img-feature-small, .img-feature-big, .tbdd-small img, .sec3-img__xl, .tbdd-big img, .sec2-img, .sec3-img__sm,
            .ddcg-sec__xl img, .ddcg-sec__sm img, .ghhv-lg, .ghhv-sm, .tlvk-lg, .tlvk-sm, .ktdd-img, .ghvn-lg, .ghvn-sm {
                height: 230px;
            }
        }
    </style>
@endpush
@section('page')
    <main>
        <div class="section-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mb-lg-0 mb-5">
                        <div class="row">
                            <div class="col-sm-4 pe-sm-2">
                                @foreach($featurePosts as $fp)
                                <div class="mb-4">
                                    <a href="{{ $fp->showUrl() }}">
                                        <img class="img-fluid w-100 radius-3 img-feature-small" src="{{ $fp->getFirstMediaUrl('media') }}" alt="{{$fp->title}}">
                                    </a>
                                    <a class="h3-md mt-2 text-2-line" href="{{ $fp->showUrl() }}">{{ $fp->title }}</a>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-sm-8"> 
                                <div class="jeg_post jeg_hero_item_1" >
                                    <div class="jeg_block_container">
                                        <a href="{{ $firstFeaturePost->showUrl() }}">
                                            <img class="img-fluid w-100 radius-3 img-feature-big" src="{{ $firstFeaturePost->getFirstMediaUrl('media') }}" alt="{{ $firstFeaturePost->title}}">
                                        </a>
                                    </div>
                                    <a class="text-2-line h3-lg mt-2" href="{{ $firstFeaturePost->showUrl() }}">{{ $firstFeaturePost->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <div class="col-lg-3 mt-lg-0 mt-5">
                        <h2 class="jeg_block_title2 mb-3">
                            <a href="{{route('postCategory', 'thong-bao-xa-que')}}" class="category-title">THÔNG BÁO XA QUÊ</a>
                        </h2>
                        <div class="row">
                            @if($notificationsfirst)
                            <div class="col-lg-12 col-sm-6 mb-sm-0 mb-3">
                                <div class="tbdd-big">
                                    <a href="{{ $notificationsfirst->showUrl() }}">
                                        <img class="w-100 radius-3" src="{{ $notificationsfirst->getFirstMediaUrl('media') }}"
                                            alt="{{ $notificationsfirst->title }}">
                                    </a>
                                    <h3 class="mt-1">
                                        <a href="{{ $notificationsfirst->showUrl() }}" class="h3-md">{{ $notificationsfirst->title }}</a>
                                    </h3>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-12 col-sm-6">
                                @foreach($notificationsGo as $key => $notification )
                                <div class="tbdd-small">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-5 pe-sm-2">
                                            <a href="{{ $notification->showUrl() }}">
                                                <img src="{{ $notification->getFirstMediaUrl('media') }}" alt="{{ $notification->title }}" class="w-100 radius-3">
                                            </a>
                                        </div>
                                        <div class="col-md-8 col-sm-7 ps-sm-2 mt-sm-0 mt-2">
                                            <a href="{{ $notification->showUrl() }}" class="h3-sm">{{ $notification->title }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-one__bg">
                <img src="../images/Vector.png" alt="">
            </div>
        </div>
        <div class="section-2">
            <div class="container">
                <div class="row heading">
                    <h2 class="pt-5 pb-3 text-center">
                        <a href="{{route('postCategory', 'loi-chua-moi-ngay')}}" class="category-title">LỜI CHÚA MỖI NGÀY</a>
                    </h3>
                </div>
                <div class="row p-0">
                    <div class="col-md-12">
                        <div class="row mb-5">
                            @if ($postGroupGods)
                                @foreach ($postGroupGods as $iE)
                                    <div class="col-lg-3 col-sm-6 mb-4">
                                        <a class="d-block mb-2" href="{{ $iE->showUrl() }}">
                                            <img class="img-fluid w-100 sec2-img radius-3" src="{{ $iE->getFirstMediaUrl('media') }}"
                                                alt="{{ $iE->title }}"> </a>
                                        <a class="h3-md text-2-line" href="{{ $iE->showUrl() }}">{{ $iE->title }}</a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  <div class="section-3 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 jeg_main_content mb-lg-0 mb-4">
                        <h2 class="mt-0 mb-4">
                            <a href="{{route('postCategory', 'song-dao')}}" class="category-title clr-black">SỐNG ĐẠO</a>
                        </h2>
                        <div class="row">
                            @php
                                $padding_array = ['','','pe-sm-2', 'px-sm-2', 'ps-sm-2'];
                            @endphp
                            @foreach($postSongDao as $psd)
                            @if($loop->index <=1)
                            <div class="col-sm-6 @if($loop->index%2) ps-sm-2 @else pe-sm-2 @endif">
                                <a href="{{ $psd->showUrl() }}">
                                    <img class="w-100 radius-3 sec3-img__xl" src="{{ $psd->getFirstMediaUrl('media') }}" alt="">
                                </a>
                                <a href="{{ $psd->showUrl() }}" class="h3-md mt-2 mb-4 text-2-line">{{ $psd->title }}</a>
                            </div>
                            @else
                                <div class="col-md-4 col-sm-6 format-standard {{$padding_array[$loop->index]}} @if($loop->last)d-md-block d-none @endif">
                                    <a href="{{ $psd->showUrl() }}">
                                        <img src="{{ $psd->getFirstMediaUrl('media') }}" class="img-fluid w-100 radius-3 sec3-img__sm" alt="{{ $psd->title}}">
                                    </a>
                                    <a href="{{ $psd->showUrl() }}" class="h3-md mt-2 mb-4 text-2-line">{{ $psd->title }}</a>
                                </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 mt-lg-0 mt-4 ddcg-sec">
                        <h2 class="mt-0 mb-4">
                            <a href="{{route('postCategory', 'di-dan-cong-giao')}}" class="category-title clr-black">DI DÂN CÔNG GIÁO</a>
                        </h2>
                        <div class="row">
                            @if($postCatholicImmigrant)
                                <div class="col-lg-12 col-sm-7">
                                    <div class="ddcg-sec__xl">
                                        <a href="">
                                            <img class="radius-3 img-fluid w-100" src="{{ $postCatholicImmigrant->getFirstMediaUrl('media') }}" 
                                                alt="{{$postCatholicImmigrant->title}}">
                                        </a>
                                        <p class="mb-3" style="margin-top: 10px">
                                            <a href="#" class="h3-md text-2-line">{{ $postCatholicImmigrant->title }}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-5">
                                    @foreach($postCatholicImmigrants as $f)
                                    <div class="ddcg-sec__sm">
                                        <div class="row py-lg-3 py-2 @if($loop->first) ddcg-first @endif">
                                            <div class="col-md-4 col-sm-5 pe-sm-2 mt-sm-0 mt-3">
                                                <a href="{{ $f->showUrl() }}">
                                                    <img src="{{ $f->getFirstMediaUrl('media') }}" alt="{{$f->title}}" class="img-fluid w-100 radius-3">
                                                </a>
                                            </div>
                                            <div class="col-md-8 col-sm-7 ps-sm-2 mt-sm-0 mt-2">
                                                <a href="{{ $f->showUrl() }}" class="h3-sm text-3-line" style="text-decoration: none">{{ $f->title }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}

        <div class="section-4 py-5">
            <div class="container" >
                <h2 class="mt-0 pb-3 text-center">
                    <a href="{{ route('front.videos.index') }}" class="category-title">VIDEO</a>
                </h2>
                <div class="row">
                @foreach($videos as $v)
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <a href="{{ $v->showUrl() }}">
                            <img class="img-fluid w-100 radius-3" src="{{ $v->getFirstMediaUrl('media', 'show') }}" />
                        </a>
                        <a href="{{ $v->showUrl() }}" class="h3-md mt-2 text-2-line">{{ $v->title }}</a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>

        <div class="section-5 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mb-lg-0 mb-4 ghhv">
                        <h2 class="my-0 pb-4">
                            <a href="{{route('postCategory', 'giao-hoi-hoan-vu')}}" class="category-title">GIÁO HỘI HOÀN VŨ</a>
                        </h2>
                        <div class="row">
                            <div class="col-lg-7 col-sm-6 pe-sm-2 mb-sm-0 mb-4">
                                @if($uC1)
                                <a href="{{ $uC1->showUrl() }}">
                                    <img class="w-100 img-fluid radius-3 ghhv-lg" src="{{ $uC1->getFirstMediaUrl('media') }}" alt="{{ $uC1->title }}">
                                </a>
                                <a href="{{ $uC1->showUrl() }}" class="d-block mt-2 h3-lg">{{ $uC1->title }}</a>
                                @endif
                            </div>
                            <div class="col-lg-5 col-sm-6 ps-sm-2">
                                @foreach ($universalChurch as $key => $uC)
                                    <div class="row mb-sm-3 mb-4">
                                        <div class="col-lg-6 col-sm-5 pe-sm-2">
                                            <a class="" href="{{ $uC->showUrl() }}">
                                                <img class="w-100 img-fluid radius-3 ghhv-sm" src="{{ $uC->getFirstMediaUrl('media') }}" alt="{{ $uC->title }}">
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-sm-7 ps-sm-2 mt-sm-0 mt-2">
                                            <a class="h3-md text-3-line" href="{{ $uC->showUrl() }}">{{ $uC->title }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-lg-0 mt-4 ghvn">
                        <h2 class="my-0 pb-4">
                            <a href="{{route('postCategory', 'giao-hoi-viet-nam')}}" class="category-title">GIÁO HỘI VIỆT NAM</a>
                        </h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($vietnameseChurch as $key => $vC)
                                    @if($loop->first)
                                        <div class="col-lg-12 col-md-4">
                                            <div class="mb-xl-4 mb-3">
                                                <a class="d-block" href="{{ $vC1->showUrl() }}">
                                                    <img class="img-fluid w-100 radius-3 ghvn-lg" src="{{ $vC1->getFirstMediaUrl('media') }}" alt="{{ $vC1->title }}">
                                                </a>
                                                <a class="text-2-line h3-md mt-2" href="{{ $vC1->showUrl() }}">{{ $vC1->title }}</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-12 col-md-4 col-sm-6">
                                            <a class="d-block" href="{{ $vC->showUrl() }}">
                                                <img class="img-fluid w-100 radius-3 d-lg-none ghvn-sm" src="{{ $vC->getFirstMediaUrl('media') }}" alt="{{ $vC->title }}">
                                            </a>
                                            <a href="{{ $vC->showUrl() }}" class="h3-md pt-3 mb-3 ghvn-link text-2-line">{{ $vC->title }}</a>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-6 py-5">
            <div class="container">
                <div class="row heading">
                    <h2 class="pt-0 pb-3" style="text-align: center;">
                        <a href="{{route('postCategory', 'kinh-te-di-dan')}}" class="category-title">KINH TẾ DI DÂN</a>
                    </h2>
                </div>
                <div class="row ktdd p-0">
                    @foreach ($projects as $p)
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <a class="d-block" href="{{ $p->showUrl() }}">
                            <img class="img-fluid w-100 ktdd-img radius-3" src="{{ $p->getFirstMediaUrl('media') }}" alt="{{ $p->title }}">
                        </a>
                        <div>
                            {{--  <h5 class="jeg_post_title">
                                <a href="{{ $p->showUrl() }}">{{ $p->title }}</a>
                            </h5>  --}}
                            <p class="box-rate mt-2 mb-0 h3-sm">
                                <span class="rating" style="color: orange;">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                                <span class="vote">(5.0)</span>
                                <span class="info-rate">Rất tốt (900)</span>
                            </p>
                            <p class="mb-1 h3-sm"><i class="fa fa-map-marker fa-white me-2"></i>{{ $p->address }}</p>
                            <p class="mb-1 h3-sm"><i class="fa fa-phone fa-white me-2"></i>{{ $p->phone }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    
        <div class="section-7 py-5">
            <div class="container">
                <div class="row">
                    <h3 class="pb-3">
                        <a href="{{route('postCategory', 'tu-lieu')}}" class="category-title">TƯ LIỆU - VĂN KIỆN</a>
                    </h3>
                </div>
                <div class="row">
                    @if($dM1)
                    <div class="col-lg-4 col-sm-6 mb-sm-0 mb-4">
                        <a href="{{ $dM1->showUrl() }}">
                            <img class="img-fluid w-100 radius-3 tlvk-lg" src="{{ $dM1->getFirstMediaUrl('media') }}" alt="{{ $dM1->title }}">
                        </a>
                        <a href="{{ $dM1->showUrl() }}" class="h3-md mt-2 d-block">{{ $dM1->title }}</a>
                    </div>
                    @endif
                    <div class="col-lg-8 col-sm-6">
                        <div class="row">
                            @foreach ($documentaryMaterial as $item)
                                <div class="col-lg-6 mb-sm-3 mb-4 @if($loop->index > 2) d-lg-block d-none @endif">
                                    <div class="row">
                                        <div class="col-sm-5 pe-sm-2">
                                            <a class="d-block" href="{{ $item->showUrl() }}">
                                                <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{$item->title}}" class="img-fluid w-100 radius-3 tlvk-sm">
                                            </a>
                                        </div>
                                        <div class="col-sm-7 ps-sm-2 mt-sm-0 mt-2">
                                            <a class="h3-md text-3-line" href="{{ $item->showUrl() }}">{{ $item->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-8 pb-5">
            <div class="container">
                <div class="row bgrimg block-trending py-4">
                    <div class="col-lg-3 ps-4 d-lg-block d-flex justify-content-between">
                        <h2 class="h3-xl mb-4">
                            Today Best Trending <br>Topics
                        </h2>
                        <div class="d-flex align-items-center">
                            <div class="icon-left">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </div>
                            <div class="icon-right">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    {{-- mySwiper --}}
                    <div class="col-lg-9">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach($albums as $album)
                                <div class="swiper-slide">
                                    <a href="{{ $album->showUrl() }}">
                                        <img class="img-fluid w-100 radius-3" src="{{ $album->getFirstMediaUrl('media', 'show') }}" alt="{{ $album->name}}">
                                    </a>
                                    <div class="album-name w-100">
                                        <a href="{{ $album->showUrl() }}" class="text-2-line h3-md" >
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
        </div>
    </main>
@stop

@section('custom-js')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    // mySwiper
    var swiper = new Swiper(".swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
          nextEl: ".icon-right",
          prevEl: ".icon-left",
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
            spaceBetween: 30,
          },
          "@1.50": {
            slidesPerView: 4,
            spaceBetween: 20,
          },
        },
      });
</script>
@endsection