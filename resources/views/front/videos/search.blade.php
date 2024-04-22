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

                                    <div class="input" style="display:flex; margin-bottom: 10px">

                                        <form method="GET" action="{{ route('getSearch') }}" class="row d-flex align-items-center justify-content-center">
                                            <div class="vc_col-sm-8">
                                                <input type="text" name="key" value="" class="form-control" placeholder="Nhập video bạn muốn tìm">
                                            </div>
                                            <div class="vc_col-sm-4">
                                                <button type="submit" class="form-control" style="height: 39px; cursor: pointer;">Tìm Kiếm</button>
                                            </div>
                                      

                                        <div class="select col-6" style="margin-left: 15px" >
                                            <select name="category_id" id="categoryids" style="margin-top: 15px">
                                              <option selected disabled>Chọn Chủ đề </option>
                                              @if (!empty($categories))
                                              @foreach ($categories as $category)
                                                  <option value="{{$category->id}}">{{ $category->name }}</option>
                                              @endforeach
                                          @endif
                                            </select>
                                        </div>
                                    
                                    </div>
                                </form>

                                    <div class="jnews_category_content_wrapper">
                                        <div class="jeg_postblock_14 jeg_postblock jeg_module_hook jeg_pagination_nav_1 jeg_col_2o3 jnews_module_11285_0_632186393c066   " data-unique="jnews_module_11285_0_632186393c066">
                                            <div class="jeg_block_container">
                                                <div class="jeg_posts_wrap">
                                                    @if(isset($searchVideo) && count($searchVideo) > 0)
                                                    <div class="jeg_postbig">
                                                        <article class="jeg_post jeg_pl_lg_box format-standard">
                                                            <div class="box_wrap">
                                                                <div class="jeg_thumb">
                                                                    <a href="{{ $searchVideo->first()->showUrl() }}">
                                                                        <div class="thumbnail-container animate-lazy size-500">
                                                                            <img width="750" height="375"
                                                                                 src="{{ $searchVideo->first()->getFirstMediaUrl('media', 'show') }}"
                                                                                 class="attachment-jnews-750x375 size-jnews-750x375 wp-post-image lazyautosizes lazyloaded"
                                                                                 alt="{{ $searchVideo->first()->title }}" loading="lazy" sizes="750px"
                                                                            >
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <div class="jeg_postblock_content">
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
                                                                    <h3 class="jeg_post_title">
                                                                        <a href="{{ $searchVideo->first()->showUrl() }}">{{ $searchVideo->first()->title }}</a>
                                                                    </h3>
                                                                    <div class="jeg_post_meta">
                                                                        {{--  <div class="jeg_meta_author"><span class="by">Đăng bởi</span> <a href="{{ $searchVideo->first()->showUrl() }}">{{ $searchVideo->author->name }}</a></div>  --}}
                                                                        <div class="jeg_meta_date">
                                                                            <a href="{{ $searchVideo->first()->showUrl() }}">
                                                                                <i class="fa fa-clock-o"></i> {{ $searchVideo->first()->created_at->format('d/m/Y H:i:s') }}</a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                    @endif

                                                    
                                                    @if(isset($searchVideo))
                                                    <div class="jeg_posts jeg_load_more_flag">
                                                        @foreach($searchVideo as $video)
                                                            @if($loop->index > 0)
                                                            <article class="jeg_post jeg_pl_md_1 format-standard">
                                                                <div class="jeg_thumb">
                                                                    <a href="{{ $video->showUrl() }}">
                                                                        <div class="thumbnail-container animate-lazy size-500">
                                                                            <img width="360" height="180"
                                                                             src="{{ $video->getFirstMediaUrl('media', 'show') }}"
                                                                             class="attachment-jnews-360x180 size-jnews-360x180 wp-post-image lazyautosizes lazyloaded"
                                                                             alt="{{ $video->title }}" loading="lazy" sizes="360px">
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
                                                                        <a href="{{ $video->showUrl() }}">{{ $video->title }}</a>
                                                                    </h3>
                                                                    <div class="jeg_post_meta">
                                                                        {{--  <div class="jeg_meta_author"><span class="by">Đăng bởi</span> <a href="{{ $video->showUrl() }}">Admin</a></div>  --}}
                                                                        <div class="jeg_meta_date"><a href="{{ $video->showUrl() }}"><i class="fa fa-clock-o"></i> {{ $video->created_at->format('d/m/Y H:i:s') }}</a></div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @include('front.videos._rightSidebar')
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
