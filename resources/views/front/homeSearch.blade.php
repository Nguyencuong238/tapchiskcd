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
        <meta property="og:title" content="Xa quê công giáo">
        <meta property="og:description" content="Xa quê công giáo">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="Xa quê công giáo">
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
        <title>Bài viết</title>
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
<style>
    .jeg_post_title a:hover{
        color: red;
    }
    .text-p:hover{
        color: red;
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
                        <div class="jeg_cat_content row">
                            <div class="jeg_main_content jeg_column col-sm-8">
                                <h5>Tìm thấy {{ $posts->count() }} kết quả cho từ khóa "{{ request()->key }}"</h5>
                                <div class="row">
                                    @foreach($posts as $post)
                                    <div class="col-4 mt-4">
                                        <div class="jeg_thumb">
                                            <a href="{{ $post->showUrl() }}">
                                                <div class="thumbnail-container animate-lazy size-500" style="height: 140px; max-width:100%">
                                                    <img  
                                                     src="{{ $post->getFirstMediaUrl('media', 'show') }}"
                                                     class="attachment-jnews-360x180 size-jnews-360x180 wp-post-image lazyautosizes lazyloaded"
                                                     alt="{{ $post->title }}" loading="lazy" sizes="360px">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h3 class="jeg_post_title">
                                            <a href="{{ $post->showUrl() }}">
                                                {{ $post->title }}
                                            </a> 
                                        </h3>
                                        <p>
                                            <a class="text-p" style="color: black; height: 50px" href="{{ $post->showUrl() }}"> 
                                                {{ $post->excerpt }}
                                            </a>
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="jeg_block_navigation mt-4">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                            @include('front.posts._rightSidebar')
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
