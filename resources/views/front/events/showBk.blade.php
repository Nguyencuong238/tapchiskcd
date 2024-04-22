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
        .jeg_post_title {
            padding: 5px 10px;
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
                            <div class="jeg_inner_content">
                                <div class="jeg_breadcrumbs jeg_breadcrumb_container">
                                    <div id="breadcrumbs"><span class="">
                                       <a href="{{ route('home') }}">Trang Chủ</a>
                                           </span><i class="fa fa-angle-right"></i><span class="">
                                           <a href="{{ $event->showUrl() }}">{{ $event->title }}</a>
                                       </span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <h1 class="jeg_post_title">{{ $event->title }}</h1>
                                    <div class="jeg_meta_container">
                                        <div class="jeg_post_meta jeg_post_meta_1">
                                            <div class="meta_left">
                                                {{--  <div class="jeg_meta_author">
                                                    <span class="meta_text">Đăng bởi</span>
                                                    <a href="{{ $event->showUrl() }}">Admin</a>
                                                </div>  --}}
                                                <div class="jeg_meta_date">
                                                    <a href="{{ $event->showUrl() }}">{{ $event->created_at->format('d/m/Y H:i:s') }}</a>
                                                </div>
                                                <div class="jeg_meta_category">
                                                    <span><span class="meta_text">Chuyên mục:</span>
                                                        <a href="{{ $event->showUrl() }}" rel="category tag">{{ $event->title }}</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jeg_share_top_container">
                                    <div class="jeg_share_button clearfix">
                                        <div class="jeg_share_stats">
                                            <div class="jeg_share_count">
                                                <div class="counts">0</div>
                                                <span class="sharetext">SHARES</span>
                                            </div>
                                            <div class="jeg_views_count">
                                                <div class="counts">{{ $event->views }}</div>
                                                <span class="sharetext">VIEWS</span>
                                            </div>
                                        </div>
                                        <div class="jeg_sharelist">
                                            <a href="http://www.facebook.com/sharer.php?u={{ $event->showUrl() }}" rel="nofollow" class="jeg_btn-facebook expanded"><i class="fa fa-facebook-official"></i><span>Share on Facebook</span></a><a href="https://twitter.com/intent/tweet?text={{ $event->title }};url={{ $event->showUrl() }}" rel="nofollow" class="jeg_btn-twitter expanded"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a><a href="https://www.pinterest.com/pin/create/bookmarklet/?pinFave=1&amp;url={{ $event->showUrl() }};" rel="nofollow" class="jeg_btn-pinterest "><i class="fa fa-pinterest"></i></a>
                                            <div class="share-secondary">
                                                <a href="https://plus.google.com/share?url={{ $event->showUrl() }}" rel="nofollow" class="jeg_btn-google-plus removed "><i class="fa fa-google-plus"></i></a><a href="https://www.linkedin.com/shareArticle?url={{ $event->showUrl() }};title={{ $event->title }}" rel="nofollow" class="jeg_btn-linkedin "><i class="fa fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="entry-content no-share" style="transform: none;">
                                    <div class="content-inner">
                                        {!! $event->body !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('front.events._rightSidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
