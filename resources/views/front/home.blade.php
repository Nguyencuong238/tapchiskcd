@extends('layouts.front')

@push('css')
    <style>
        .back-home2-slider-area .image-areas img {
            width: 115px !important;
            height: 115px;
        }
        .back-title h2 a {
            color: #0a0a0a;
        }
        .back-title h2 a:hover {
            color: #0088cb;
        }
        .clr-black {
            color: black !important;
        }
        #tbxq-section .image-areas img{
            height: 210px;
        }
        #ghhv-section .back-hero-right img {
            height: 190px;
        }
        #ghhv-section .back-hero-slider img {
            height: 410px;
        }
        #ghvn-section .back-trending-stories-home2 img {
            height: 190px;
        }
        #ktdd-section .back-weekend-slider img {
            height: 220px;
        }
        #video-section ul.back-hero-bottom img {
            height: 70px;
        }

        .back-hero-area .back-hero-right ul .image-area .back-btm-content {
            padding: 15px;
        }

        .home-search button {
            border: 1px solid #ced4da;
            background: #ced3da;
            border-radius: 0 3px 3px 0;
        }
        .home-search button:hover {
            border: 1px solid #ced4da;
            border-radius: 0 3px 3px 0;
            background: #ced3da;
        }
        .home-search input:focus {
            border-color: #ced4da;
            box-shadow: none;
        }

        @media screen and (max-width: 1399px) {
            #tbxq-section .image-areas img{
                height: 180px;
            }
            #ghhv-section .back-hero-right img {
                height: 180px;
            }
            #ghhv-section .back-hero-slider img {
                height: 390px;
            }
            #ghvn-section .back-trending-stories-home2 img {
                height: 160px;
            }
            #ktdd-section .back-weekend-slider img {
                height: 200px;
            }
        }

        @media screen and (max-width: 1199px) {
            #tbxq-section .image-areas img{
                height: 180px;
            }
            #ghhv-section .back-hero-right img {
                height: 160px;
            }
            #ghhv-section .back-hero-slider img {
                height: 350px;
            }
            #ghvn-section .back-trending-stories-home2 img {
                height: 140px;
            }
            #ktdd-section .back-weekend-slider img {
                height: 190px;
            }
        }

        @media screen and (max-width: 991px) {
            #tbxq-section .image-areas img{
                height: 220px;
            }
            #ghhv-section .back-hero-right img {
                height: 380px;
            }
            #ghhv-section .back-hero-slider img {
                height: 380px;
            }
            #ghvn-section .back-trending-stories-home2 img {
                height: 380px;
            }
            #ktdd-section .back-weekend-slider img {
                height: 220px;
            }
            #video-section ul.back-hero-bottom img {
                height: 140px;
            }
        }

        @media screen and (max-width: 767px) {
            #tbxq-section .image-areas img{
                height: 300px;
            }
            #ghhv-section .back-hero-right img {
                height: 300px;
            }
            #ghhv-section .back-hero-slider img {
                height: 300px;
            }
            #ghvn-section .back-trending-stories-home2 img {
                height: 300px;
            }
            #ktdd-section .back-weekend-slider img {
                height: 300px;
            }
            #video-section ul.back-hero-bottom img {
                height: 110px;
            }
        }

        @media screen and (max-width: 575px) {
            #tbxq-section .image-areas img{
                height: auto;
            }
            #ghhv-section .back-hero-right img {
                height: auto;
            }
            #ghhv-section .back-hero-slider img {
                height: auto;
            }
            #ghvn-section .back-trending-stories-home2 img {
                height: auto;
            }
            #ktdd-section .back-weekend-slider img {
                height: auto;
            }
            #video-section ul.back-hero-bottom img {
                height: auto;
            }
        }
    </style>
@endpush

@section('page') 
@php
    $fb_url = settings('facebook', 'https://www.facebook.com/giadinhconggiaoxaque');
    $yt_url = settings('youtube', 'https://www.youtube.com/@didanconggiao');
@endphp
<div class="back-wrapper">
    <div class="back-hero-area back-latest-posts back-whats-posts back-hero-area2">
        <div class="container">                                
            <div class="row">
                <div class="col-lg-3">
                    <ul class="back-hero-bottom back-hero-bottom2">
                        @foreach($leftFeaturedPosts as $item)
                        <li>
                            <div class="image-areas">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>                                
                            </div>
                            <div class="back-btm-content">
                                <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>
                                <ul>
                                    <li class="back-date">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </span>
                                        <span style="font-size: 13px">{{ $item->created_at->format('d/m/Y H:i:s') }}</span>
                                    </li> 
                                </ul>
                            </div> 
                        </li>
                        @endforeach                                 
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="back-whats-btm">
                        <li>
                            @if($firstFeaturePost)
                            <div class="image-areas">
                                <a href="{{ $firstFeaturePost->showUrl() }}">
                                    <img src="{{ $firstFeaturePost->getFirstMediaUrl('media') }}" alt="{{ $firstFeaturePost->title }}" class="w-100"></a>
                            </div>
                            <div class="back-btm-content pt-3">                                                    
                                <h3 class="mb-3"><a href="{{ $firstFeaturePost->showUrl() }}">{{ $firstFeaturePost->title }}</a></h3>
                                <p class="mb-2">{!! Str::words(strip_tags($firstFeaturePost->body), 50) !!}</p>
                                <ul>
                                    {{--  <li class="back-author">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        </span>
                                        <span>Đăng bởi <a href="{{ $firstFeaturePost->showUrl() }}">{{ $firstFeaturePost->author->name }}</a></span>
                                    </li>  --}}
                                    <li class="back-date">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </span>
                                        <span>{{ $firstFeaturePost->created_at->format('d/m/Y H:i:s') }}</span>
                                    </li>                                                    
                                </ul>
                            </div>    
                            @endif                                        
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    {{--  <form action="{{route('searchIndex')}}" class="home-search mb-4">
                        <div class="input-group">
                            <input type="text" name="key" autocomplete="off" class="form-control" placeholder="Tìm kiếm . . ." required>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="fa fa-search p-0 border-0"></span>
                                </button>
                            </div>
                        </div>
                    </form>  --}}
                    <div class="back-title back-small-title">
                        <h2 class="mb-3" style="margin-top: -10px;">Tin Mới Nhất</h2>
                    </div>
                    <ul class="back-hero-bottom back-hero-bottom2 back-hero-rights">
                        @foreach($recentPosts as $key => $item)
                        <li>
                            <div class="image-areas">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100">
                                </a>                                
                            </div>
                            <div class="back-btm-content">
                                <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>
                                <ul>
                                    <li class="back-date">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </span>
                                        <span style="font-size: 13px">{{ $item->created_at->format('d/m/Y H:i:s') }}</span>
                                    </li> 
                                </ul>
                            </div> 
                        </li>
                        @endforeach                                    
                    </ul>
                </div>
            </div>                                            
        </div>                
    </div>

    <div class="back-home2-slider-area">
        <div class="container">
            <ul class="back-hero-bottom-two back-hero-slider3 owl-carousel">
                @foreach ($postGroupGods as $item)
                <li>
                    <div class="image-areas">
                        <a href="{{ $item->showUrl() }}">
                            <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100">
                        </a>                                
                    </div>
                    <div class="back-btm-content">
                        <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>
                        <ul>
                            <li class="back-date">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                </span>
                                {{ $item->created_at->format('d/m/Y H:i:s') }}
                            </li>                                        
                        </ul>
                    </div> 
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="back-add text-center pt-70">
        <div class="container"><img src="custom_assets/images/add.jpg" alt="Back Add" class="d-none"></div>
    </div>

    <div class="back-trending-stories back-trending-stories-home2" id="tbxq-section">
        <div class="container">
            <div class="back-title">
                <h2><a href="{{route('postCategory', 'thong-bao-xa-que')}}">Thông Báo Xa Quê</a></h2>
            </div>
            <ul class="back-trending-slider owl-carousel">
                @foreach ($notificationsGo as $item)
                <li>
                    <div class="image-areas">
                        <a href="{{ $item->showUrl() }}">
                            <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100">
                        </a>
                    </div>
                    <div class="back-btm-content">                            
                        <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>
                        <ul>
                            {{--  <li class="back-author">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </span>
                                <span>Đăng bởi <a href="{{ $firstFeaturePost->showUrl() }}">{{ $firstFeaturePost->author->name }}</a></span>
                            </li>  --}}
                            <li class="back-date">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                </span>
                                {{ $item->created_at->format('d/m/Y H:i:s') }}
                            </li>
                        </ul>
                    </div> 
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="back-hero-area back-latest-posts back-whats-posts back-feature-posts back-stories-posts" id="ghvn-section">
        <div class="container">                    
            <div class="row">
                <div class="col-lg-8">
                    <div class="back-title">
                        <h2>
                            <a href="{{route('postCategory', 'tin-xa-que')}}">Tin Tức Xa Quê</a>
                        </h2>
                    </div>
                    
                    <ul class="back-hero-bottom back-hero-bottom2 pb-4">
                        <li>
                            @if($xq = $tinXaQuePosts->first())
                            <div class="image-areas py-4">
                                <a href="{{ $xq->showUrl() }}">
                                    <img src="{{ $xq->getFirstMediaUrl('media') }}" alt="{{ $xq->title }}" class="w-100"></a>                                
                            </div>
                            <div class="back-btm-content">
                                <h3 class="mt-0"><a href="{{ $xq->showUrl() }}">{{ $xq->title }}</a></h3> 
                                <p>{!! Str::words(strip_tags($xq->body), 20) !!}</p>  
                                <ul class="back-meta">
                                    {{--  <li class="back-author">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        </span>
                                        <span>Đăng bởi <a href="{{ $item->showUrl() }}">{{ $item->author->name }}</a></span>
                                    </li>  --}}
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>{{ $xq->created_at->format('d/m/Y H:i:s') }}</li>                                                    
                                </ul>                                     
                            </div> 
                            @endif
                        </li>                               
                    </ul> 

                    
                    <div class="back-trending-stories back-trending-stories-home2 back-trending-stories-home2-top">
                        <ul class="row">
                            @foreach ($tinXaQuePosts as $key => $item)
                            @if($loop->first) @continue @endif
                            <li class="col-lg-4">
                                <div class="image-areas">
                                    <a href="{{ $item->showUrl() }}">
                                        <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>
                                </div>
                                <div class="back-btm-content pt-3">                              
                                    <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>
                                    <ul>
                                        <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>{{ $item->created_at->format('d/m/Y H:i:s') }}</li>
                                    </ul>
                                </div> 
                            </li>
                            @endforeach
                        </ul>                                
                    </div>                           
                </div>
                <div class="col-lg-4 pl-30"> 
                    <div class="back-title back-small-title">
                        <h2><a href="{{route('postCategory', 'giao-hoi-hoan-vu')}}">Giáo Hội Hoàn Vũ</a></h2>
                    </div>
                    <ul class="back-hero-bottom back-hero-bottom3 pt-0">
                        @foreach($universalChurch as $item)
                        <li>
                            <div class="image-areas">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>                                
                            </div>
                            <div class="back-btm-content">
                                <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>                                        
                            </div> 
                        </li>
                        @endforeach
                    </ul>      
                    <div class="back-title back-small-title pt-30">
                        <h2><a href="{{route('postCategory', 'giao-hoi-viet-nam')}}">Giáo Hội Việt Nam</a></h2>
                    </div>
                    <ul class="back-hero-bottom back-hero-bottom3 pt-0">
                        @foreach($vietnameseChurch as $item)
                        <li>
                            <div class="image-areas">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>                                
                            </div>
                            <div class="back-btm-content">
                                <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>                                        
                            </div> 
                        </li>
                        @endforeach
                    </ul>                                              
                </div>
            </div>                         
        </div>
    </div>

    <div class="back-hero-area back-hero-home2 pt-25 pb-70" id="ghhv-section">
        <div class="container">
            <div class="back-title">
                <h2><a href="{{route('postCategory', 'su-vu')}}">Sứ Vụ</a></h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="back-hero-slider owl-carousel">
                        @foreach ($suVuPosts as $key => $item)
                        @if($loop->index > 3)
                        <li>
                            <div class="image-area">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>
                                <div class="back-btm-content">
                                    <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>
                                    <ul>
                                        {{--  <li class="back-author">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            </span>
                                            <span>Đăng bởi <a href="{{ $item->showUrl() }}">{{ $item->author->name }}</a></span>
                                        </li>  --}}
                                        <li class="back-date">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                            </span>
                                            {{ $item->created_at->format('d/m/Y H:i:s') }}
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 back-hero-right">
                    <div class="row back-pl-6">
                        @foreach ($universalChurch as $key => $item)
                        @if($loop->index < 4)
                        <div class="col-lg-6 @if($loop->index > 1) pt-30 @endif">
                            <ul>
                                <li>
                                    <div class="image-area">
                                        <a href="{{ $item->showUrl() }}">
                                            <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>
                                        <div class="back-btm-content">
                                            <h3 class="mb-0">
                                                <a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>
                                            <ul class="d-none">                                                        
                                                <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>{{ $item->created_at->format('d/m/Y H:i:s') }}</li>
                                            </ul>
                                        </div>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>     
        </div>
    </div>

    <!--================= Back Trading Video Start Here =================-->
    <div class="back-trading-video back-video-post" id="video-section" style="background-color: #f5f5f5">
        <div class="container">  
            <div class="back-title">
                <h2>
                    <a href="{{route('front.videos.index')}}">VIDEO</a>
                </h2>
            </div>                  
            <div class="row">
                <div class="col-lg-8">                            
                    <ul>
                        <li>
                            @if($firstVideo)
                            <div class="image-area">
                                <a href="{{ $firstVideo->showUrl() }}">
                                    <img src="{{ $firstVideo->getFirstMediaUrl('media') }}" alt="{{ $firstVideo->title }}" class="w-100"></a>
                                <a href="{{ str_replace('embed/', 'watch?v=', $firstVideo->link) }}" class="popup-videos back-video"><i class="fa-solid fa-play"></i></a>
                                <div class="back-btm-content">
                                    <h3 class="mb-2">
                                        <a href="{{ $firstVideo->showUrl() }}" style="font-size: 24px;">
                                            {{ $firstVideo->title }}
                                        </a>
                                    </h3>
                                    <p class="mb-2">{{ $firstVideo->excerpt }}</p>    
                                    {{-- <p>{!! Str::words(strip_tags($firstVideo->excerpt), 30) !!}</p>  --}}
                                    <ul>
                                         {{-- <li class="back-author">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            </span>
                                            <span>Đăng bởi <a href="{{ $firstVideo->showUrl() }}">{{$firstVideo->author->name ?? 'Admin'}}</a></span>
                                        </li>  --}}
                                        <li class="back-date" style="color: #777">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                            </span>{{ $firstVideo->created_at->format('d/m/Y H:i:s') }}</li>
                                    </ul>
                                </div>
                            </div> 
                            @endif
                        </li>
                    </ul>                                                        
                </div>
                <div class="col-lg-4 pl-30">                            
                    <ul class="back-hero-bottom">
                        @foreach($videos as $item)
                        @if($loop->index)
                        <li>
                            <div class="image-areas">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a> 
                                <a href="{{ str_replace('embed/', 'watch?v=', $item->link) }}" class="popup-videos back-video">
                                    <i class="fa-solid fa-play"></i></a>                               
                            </div>
                            <div class="back-btm-content">
                                <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>
                                <ul>
                                    {{--  <li class="back-author">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        </span>
                                        <span>Đăng bởi <a href="{{ $item->showUrl() }}">{{ $item->author->name }}</a></span>
                                    </li>  --}}
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>March 26, 2022</li>
                                </ul>                                    
                            </div> 
                        </li>
                        @endif
                        @endforeach
                    </ul>                        
                </div>
            </div>                         
        </div>
    </div>
    <!--================= Back Trading Video End Here =================-->

    <!--================= Back Feature Posts Start Here =================-->
    <div class="back-hero-area back-latest-posts back-whats-posts back-feature-posts back-feature-posts-latest">
        <div class="container">                    
            <div class="row">
                <div class="col-lg-8">
                    <div class="back-title">
                        <h2>
                            <a href="{{route('postCategory', 'phung-vu')}}">Phụng Vụ</a>
                        </h2>
                    </div>
                    
                    <ul class="back-hero-bottom back-hero-bottom2">
                        @foreach($phungVuPosts as $item)
                        <li>
                            <div class="image-areas mt-4">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>                                
                            </div>
                            <div class="back-btm-content">
                                <h3><a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3> 
                                <p>{!! Str::words(strip_tags($item->body), 20) !!}</p>  
                                <ul class="back-meta">
                                    {{--  <li class="back-author">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        </span>
                                        <span>Đăng bởi <a href="{{ $item->showUrl() }}">{{ $item->author->name }}</a></span>
                                    </li>  --}}
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>March 26, 2022</li>                                                    
                                </ul>                                     
                            </div> 
                        </li>  
                        @endforeach                                                               
                    </ul>                        
                </div>
                <div class="col-lg-4 pl-30"> 
                    <div class="back-title back-small-title">
                        <h2>Cộng Đồng</h2>
                    </div>
                    <ul class="social-area2">
                        <li><div><a href="{{$fb_url}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a> <span>Facebook <em>750</em></span></div></li>
                        {{--  <li><div><a href="#"><i class="fa-brands fa-twitter"></i></a> <span>Fans <em>1236</em></span></div></li>
                        <li><div><a href="#"><i class="fa-brands fa-instagram"></i></a> <span>Likes <em>523</em></span></div></li>
                        <li><div><a href="#"><i class="fa-brands fa-vimeo-v"></i></a> <span>Comments <em>790</em></span></div></li>
                        <li><div><a href="#"><i class="fa-brands fa-linkedin-in"></i></a> <span>Followers <em>1025</em></span></div></li>  --}}
                        <li>
                            <div style="background: #ef242b;">
                                <a href="{{$yt_url}}" target="_blank">
                                    <i class="fa-brands fa-youtube" style="color: #ef242b;"></i>
                                </a>
                                <span>Youtube <em>590M</em></span>
                            </div>
                        </li>
                    </ul>
                    <div class="back-title back-small-title pt-30">
                        <h2><a href="{{route('postCategory', 'gia-dinh')}}">Gia Đình</a></h2>
                    </div>
                    <ul class="back-hero-bottom back-hero-bottom3">
                        @foreach($giaDinhPosts as $item)
                        <li>
                            <div class="image-areas">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>                                
                            </div>
                            <div class="back-btm-content">
                                <h3>
                                    <a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>                                        
                            </div> 
                        </li>
                        @endforeach
                    </ul>
                    <div class="back-title back-small-title pt-25">
                        <h2><a href="{{route('postCategory', 'gioi-tre')}}">Giới Trẻ</a></h2>                                
                    </div>    
                    <ul class="back-hero-bottom back-hero-bottom3">
                        @foreach($gioiTrePosts as $item)
                        <li>
                            <div class="image-areas">
                                <a href="{{ $item->showUrl() }}">
                                    <img src="{{ $item->getFirstMediaUrl('media') }}" alt="{{ $item->title }}" class="w-100"></a>                                
                            </div>
                            <div class="back-btm-content">
                                <h3>
                                    <a href="{{ $item->showUrl() }}">{{ $item->title }}</a></h3>                                        
                            </div> 
                        </li>
                        @endforeach
                    </ul>                
                </div>
            </div>                         
        </div>
    </div>
    <!--================= Back Feature Posts End Here =================-->

    <!--================= Back Trending Stories Start Here =================-->
    <div class="back-trending-stories back-trending-stories-home2 back-trending-stories-weekend" id="ktdd-section">
        <div class="container">
            <div class="back-title">
                <h2>
                    <a href="{{route('postCategory', 'kinh-te-di-dan')}}">KINH TẾ DI DÂN</a>
                </h2>
            </div>
            <ul class="back-weekend-slider owl-carousel">
                @foreach ($projects as $item)
                <li>
                    <div class="image-areas">
                        <a href="{{ $item->showUrl() }}">
                            <img src="{{ $item->getFirstMediaUrl('projectAvatar') ?: $item->getFirstMediaUrl('media', '') }}" alt="{{ $item->title }}" class="w-100"></a>
                    </div>
                    <div class="back-btm-content px-3 py-4">                               
                        <h3><a href="{{ $item->showUrl() }}">{{ $item->name }}</a></h3>
                        
                        <p class="mb-1 h3-sm"><i class="fa fa-map-marker fa-white me-2"></i>{{ $item->address }}</p>
                        <p class="mb-1 h3-sm"><i class="fa fa-phone fa-white me-2"></i>{{ $item->phone }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="text-center pt-40">
                <a href="{{route('postCategory', 'kinh-te-di-dan')}}" class="back-btn">Xem tất cả</a>
            </div>   
        </div>
    </div>
    <!--================= Back Trending Stories End Here =================-->
</div> 
@stop

@section('custom-js')
    
@endsection