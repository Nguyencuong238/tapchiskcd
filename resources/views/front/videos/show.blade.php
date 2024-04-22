@extends('layouts.front')
@section('meta')
    <title>{{ $video->title }}</title>
    <link rel="canonical" href="{{ $video->showUrl() }}">
    <meta name="title" content="{{ $video->meta['meta_title'] ?? $video->title }}">
    <meta name="description" content="{{ $video->meta['meta_description'] ?? $video->excerpt }}">
    <meta name="keywords" content="Conggiao">
    <meta property="og:url" content="{{ $video->showUrl() }}">
    <meta property="og:title" content="{{ $video->meta['meta_title'] ?? $video->title }}">
    <meta property="og:description" content="{{ $video->meta['meta_title'] ?? $video->excerpt }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $video->getFirstMediaUrl('media') }}">
    <meta property="og:site_name" content="xaqueconggiao">
@stop
@push('css')
    <style>
        .jeg_post_title {
            padding: 5px 0px;
        }

        .jeg_pl_md_2 .jeg_thumb, .jeg_pl_md_3 .jeg_thumb{
            height: auto;
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
                                <div class="jeg_breadcrumbs jeg_breadcrumb_container d-none">
                                    <div id="breadcrumbs"><span class="">
                                       <a href="{{ route('home') }}">Trang Chủ</a>
                                           </span><i class="fa fa-angle-right"></i><span class="">
                                           <a href="{{ $video->showUrl() }}">{{ $video->title }}</a>
                                       </span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <h1 class="jeg_post_title" style="font-size: 28px;">{{ $video->title }}</h1>

                                    <div>
                                        <iframe
                                            width="100%" height="500px"
                                                src="{{ $video->link }}"
                                                title="{{ $video->title }}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>
                                        </iframe>
                                    </div>

                                    <div class="jeg_meta_container">
                                        <div class="jeg_post_meta jeg_post_meta_1">
                                            <div class="meta_left">
                                                {{--  <div class="jeg_meta_author">
                                                    <span class="meta_text">Đăng bởi</span>
                                                    <a href="javascript:void(0);">
                                                        {{$video->author->name ?? 'Admin'}}
                                                    </a>
                                                </div>  --}}
                                                <div class="jeg_meta_date">
                                                    <a href="javascript:void(0);">
                                                        <i class="fa fa-clock-o me-1"></i>
                                                        {{ $video->created_at->format('d/m/Y H:i:s') }}
                                                    </a>
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
                                                <div class="counts">{{ $video->views }}</div>
                                                <span class="sharetext">VIEWS</span>
                                            </div>
                                        </div>
                                        <div class="jeg_sharelist">
                                            <a href="http://www.facebook.com/sharer.php?u={{ $video->showUrl() }}" rel="nofollow" class="jeg_btn-facebook expanded"><i class="fa fa-facebook-official"></i><span>Share on Facebook</span></a><a href="https://twitter.com/intent/tweet?text={{ $video->title }};url={{ $video->link }}" rel="nofollow" class="jeg_btn-twitter expanded"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a><a href="https://www.pinterest.com/pin/create/bookmarklet/?pinFave=1&amp;url={{ $video->link }};" rel="nofollow" class="jeg_btn-pinterest "><i class="fa fa-pinterest"></i></a>
                                            <div class="share-secondary">
                                                <a href="https://plus.google.com/share?url={{ $video->showUrl() }}" rel="nofollow" class="jeg_btn-google-plus removed "><i class="fa fa-google-plus"></i></a><a href="https://www.linkedin.com/shareArticle?url={{ $video->link }};title={{ $video->title }}" rel="nofollow" class="jeg_btn-linkedin "><i class="fa fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="entry-content no-share" style="transform: none;">
                                    <div class="content-inner">
                                        {!! $video->body !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('front.videos._rightSidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
