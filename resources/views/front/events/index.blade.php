@extends('layouts.front')
@section('meta')
    @if(request()->routeIs('postArchive'))
        <title>{{ $category->name }}</title>
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
        <title>{{ 'Danh mục sự kiện' }}</title>
        <link rel="canonical" href="{{ request()->url() }}">
        <meta name="title" content="{{ 'Danh mục sự kiện' }}">
        <meta name="description" content="Công Giáo">
        <meta name="keywords" content="conggiao">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Conggiao">
        <meta property="og:description" content="Conggiao">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="xaqueconggiao">
    @endif
@stop
@push('css')
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
                        <div class="jeg_cat_content row">
                            <div class="jeg_main_content jeg_column col-sm-8">
                                <div class="jeg_inner_content">
                                    <div class="jnews_category_header_bottom">
                                        <div class="jeg_cat_header jeg_cat_header_1">
                                            <div class="jeg_breadcrumbs jeg_breadcrumb_category jeg_breadcrumb_container">
                                                <div id="breadcrumbs">
                                                    <span class="">
                                                        <a href="{{ route('home') }}">Trang Chủ</a>
                                                    </span>
                                                    @if(isset($category))
                                                        <i class="fa fa-angle-right"></i>
                                                        <span class="">
                                                            <a href="{{ request()->url() }}">{{ $category->name }}</a>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            @if(isset($category))
                                                <h1 class="jeg_cat_title">{{ $category->name }}</h1>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="jnews_category_content_wrapper">
                                        <div class="jeg_postblock_14 jeg_postblock jeg_module_hook jeg_pagination_nav_1 jeg_col_2o3 jnews_module_11285_0_632186393c066" data-unique="jnews_module_11285_0_632186393c066">
                                            <div class="jeg_block_container">
                                                <div class="jeg_posts_wrap">
                                                    @if(isset($events))
                                                    <div class="jeg_posts jeg_load_more_flag">
                                                        @foreach($events as $event)
                                                            <article class="jeg_post jeg_pl_md_1 format-standard">
                                                                <div class="jeg_thumb">
                                                                    <a href="{{ $event->showUrl() }}">
                                                                        <div class="thumbnail-container animate-lazy size-500">
                                                                            <img width="360" height="180"
                                                                             src="{{ $event->getFirstMediaUrl('media', 'show') }}"
                                                                             class="attachment-jnews-360x180 size-jnews-360x180 wp-post-image lazyautosizes lazyloaded"
                                                                             alt="{{ $event->title }}" loading="lazy" sizes="360px">
                                                                        </div>
                                                                    </a>
                                                                    @if(isset($category))
                                                                        <div class="jeg_post_category">
                                                                            <span>
                                                                                <a href="{{ request()->url() }}"
                                                                                   class="category">
                                                                                    {{ $category->name }}
                                                                                </a>
                                                                            </span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="jeg_postblock_content">
                                                                    <h3 class="jeg_post_title">
                                                                        <a href="{{ $event->showUrl() }}">{{ $event->title }}</a>
                                                                    </h3>
                                                                    <div class="jeg_post_meta">
                                                                        {{--  <div class="jeg_meta_author"><span class="by">Đăng bởi</span> <a href="{{ $event->showUrl() }}">{{ $event->author->name }}</a></div>  --}}
                                                                        <div class="jeg_meta_date">
                                                                            <a href="{{ $event->showUrl() }}">
                                                                                <i class="fa fa-clock-o"></i> {{ $event->created_at->format('d/m/Y H:i:s') }}</a></div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="jeg_block_navigation">
                                                {{ $events->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('front.events._rightSidebar')
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
