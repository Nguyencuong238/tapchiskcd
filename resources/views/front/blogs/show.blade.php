@extends('layouts.front')
@section('meta')
    <title>{{ $blog->title }}</title>
    <link rel="canonical" href="{{ $blog->showUrl() }}">
    <meta name="title" content="{{ $blog->meta['meta_title'] ?? $blog->title }}">
    <meta name="description" content="{{ $blog->meta['meta_description'] ?? $blog->excerpt }}">
    <meta name="keywords" content="Conggiao">
    <meta property="og:url" content="{{ $blog->showUrl() }}">
    <meta property="og:title" content="{{ $blog->meta['meta_title'] ?? $blog->title }}">
    <meta property="og:description" content="{{ $blog->meta['meta_title'] ?? $blog->excerpt }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $blog->getFirstMediaUrl('media') }}">
    <meta property="og:site_name" content="xaqueconggiao">
@stop
@push('css')
    <style>
        .jeg_post_title {
            padding: 5px 10px;
        }
        iframe {
            max-width: 100%;
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
                                           <a href="{{ $blog->showUrl() }}">{{ $blog->title }}</a>
                                       </span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <h1 class="jeg_post_title">{{ $blog->title }}</h1>
                                    <div class="jeg_meta_container">
                                        <div class="jeg_post_meta jeg_post_meta_1">
                                            <div class="meta_left">
                                                {{--  <div class="jeg_meta_author">
                                                    <span class="meta_text">Đăng bởi</span>
                                                    <a href="{{ $blog->showUrl() }}">Admin</a>
                                                </div>  --}}
                                                <div class="jeg_meta_date">
                                                    <a href="{{ $blog->showUrl() }}">{{ $blog->created_at->format('d/m/Y H:i:s') }}</a>
                                                </div>
                                                <div class="jeg_meta_category">
                                                    <span><span class="meta_text">Chuyên mục:</span>
                                                        <a href="{{ $blog->showUrl() }}" rel="category tag">{{ $blog->title }}</a>
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
                                                <div class="counts">{{ $blog->views }}</div>
                                                <span class="sharetext">VIEWS</span>
                                            </div>
                                        </div>
                                        <div class="jeg_sharelist">
                                            <a href="http://www.facebook.com/sharer.php?u={{ $blog->showUrl() }}" rel="nofollow" class="jeg_btn-facebook expanded"><i class="fa fa-facebook-official"></i><span>Share on Facebook</span></a><a href="https://twitter.com/intent/tweet?text={{ $blog->title }};url={{ $blog->showUrl() }}" rel="nofollow" class="jeg_btn-twitter expanded"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a><a href="https://www.pinterest.com/pin/create/bookmarklet/?pinFave=1&amp;url={{ $blog->showUrl() }};" rel="nofollow" class="jeg_btn-pinterest "><i class="fa fa-pinterest"></i></a>
                                            <div class="share-secondary">
                                                <a href="https://plus.google.com/share?url={{ $blog->showUrl() }}" rel="nofollow" class="jeg_btn-google-plus removed "><i class="fa fa-google-plus"></i></a><a href="https://www.linkedin.com/shareArticle?url={{ $blog->showUrl() }};title={{ $blog->title }}" rel="nofollow" class="jeg_btn-linkedin "><i class="fa fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="entry-content no-share" style="transform: none;">
                                    <div class="content-inner">
                                        {!! $blog->body !!}
                                    </div>
                                </div>
                                <div class="jnews_related_post_container">
                                    @if(isset($otherBlog))
                                    <div class="jeg_postblock_22 jeg_postblock jeg_module_hook jeg_pagination_disable jeg_col_2o3 jnews_module_11102_0_632189454874f   " data-unique="jnews_module_11102_0_632189454874f">
                                        <div class="jeg_block_heading jeg_block_heading_6 jeg_subcat_right">
                                            <h3 class="jeg_block_title"><span>BÀI VIẾT<strong>LIÊN QUAN</strong></span></h3>
                                        </div>
                                        <div class="jeg_block_container">
                                            <div class="jeg_posts_wrap">
                                                <div class="jeg_posts jeg_load_more_flag">
                                                    @foreach($otherBlog as $Oblog)
                                                        <article class="jeg_post jeg_pl_md_5 format-standard">
                                                        <div class="jeg_thumb">
                                                            <a href="{{ $Oblog->showUrl() }}">
                                                                <div class="thumbnail-container animate-lazy  size-715 ">
                                                                    <img width="350" height="250"
                                                                         src="{{ $Oblog->getFirstMediaUrl('media', 'show') }}"
                                                                         class="attachment-jnews-350x250 size-jnews-350x250 lazyload wp-post-image"
                                                                          data-sizes="auto" data-expand="700"></div>
                                                                       alt="{{ $Oblog->title }}" loading="lazy" sizes="(max-width: 350px) 100vw, 350px"
                                                             </a>
                                                            <div class="jeg_post_category">
                                                                <span>
                                                                    <a href="{{ $Oblog->showUrl() }}" class="category">
                                                                        {{ $Oblog->title }}
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="jeg_postblock_content">
                                                            <h3 class="jeg_post_title">
                                                                <a href="{{ $Oblog->showUrl() }}">{{ $Oblog->title }}</a>
                                                            </h3>
                                                            <div class="jeg_post_meta">
                                                                <div class="jeg_meta_date"><a href="{{ $Oblog->showUrl() }}"><i class="fa fa-clock-o"></i> {{ $Oblog->created_at->translatedFormat('D, M, Y') }}</a></div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @include('front.posts._rightSidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
