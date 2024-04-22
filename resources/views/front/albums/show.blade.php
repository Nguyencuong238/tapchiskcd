@extends('layouts.front')
@section('meta')
    <title>{{ $album->name }}</title>
    <link rel="canonical" href="{{ $album->showUrl() }}">
    <meta name="title" content="{{ $album->meta['meta_title'] ?? $album->name }}">
    <meta name="description" content="{{ $album->meta['meta_description'] ?? $album->excerpt }}">
    <meta name="keywords" content="Conggiao">
    <meta property="og:url" content="{{ $album->showUrl() }}">
    <meta property="og:title" content="{{ $album->meta['meta_title'] ?? $album->name }}">
    <meta property="og:description" content="{{ $album->meta['meta_title'] ?? $album->excerpt }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $album->getFirstMediaUrl('media') }}">
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
                                <div class="jeg_breadcrumbs jeg_breadcrumb_container">
                                    <div id="breadcrumbs"><span class="">
                                       <a href="{{ route('home') }}">Trang Chủ</a>
                                           </span><i class="fa fa-angle-right"></i><span class="">
                                           <a href="{{ $album->showUrl() }}">{{ $album->name }}</a>
                                       </span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <h1 class="jeg_post_title">{{ $album->name }}</h1>
                                    <div>
                                        <div class="row vc_row wpb_row vc_row-fluid mb-2">
                                            <div class="jeg-vc-wrapper">
                                                @if(!empty($album))
                                                    <div class="wpb_column jeg_column jeg_main_content">
                                                        <div class="jeg_wrapper wpb_wrapper">
                                                            <div class="jeg_postblock_3 jeg_postblock jeg_module_hook jeg_pagination_loadmore jeg_col_2o3 jnews_module_2_3_631e9d7ecbc0a" data-unique="jnews_module_2_3_631e9d7ecbc0a">
                                                                {{--  <div class="jeg_block_heading jeg_subcat_right">
                                                                    <h3 class="jeg_block_title">
                                                                        <a href="/">
                                                                            <span>ALBUM ẢNH</span>
                                                                        </a>
                                                                    </h3>
                                                                </div>  --}}
                                                                <div class="jeg_posts jeg_block_container">
                                                                    <div class="jeg_posts jeg_load_more_flag tt-box-album">
                                                                        <div class="tt-album">
                                                                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                                                                 class="swiper mySwiper2">
                                                                                <div class="swiper-wrapper">
                                                                                    @foreach($album->getMedia('album') as $image)
                                                                                        <div class="swiper-slide">
                                                                                            <img src="{{ $image->getFullUrl() }}" />
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="swiper-button-next"></div>
                                                                                <div class="swiper-button-prev"></div>
                                                                            </div>
                                                                            {{--  <div class="swiper mySwiper">
                                                                                <div class="swiper-wrapper">
                                                                                    @foreach($album->getMedia('album') as $image)
                                                                                        <div class="swiper-slide">
                                                                                            <img class="tt-slide-image" src="{{ $image->getFullUrl() }}" />
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>  --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jeg_meta_container">
                                        <div class="jeg_post_meta jeg_post_meta_1">
                                            <div class="meta_left">
                                                {{--  <div class="jeg_meta_author">
                                                    <span class="meta_text">Đăng bởi</span>
                                                    <a href="javascript:void(0);">
                                                        Admin
                                                    </a>
                                                </div>  --}}
                                                <div class="jeg_meta_date">
                                                    <a href="javascript:void(0);">
                                                        <i class="fa fa-clock-o"></i>
                                                        {{ $album->created_at->format('d/m/Y H:i:s') }}
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
                                                <div class="counts">{{ $album->views ?? 0 }}</div>
                                                <span class="sharetext">VIEWS</span>
                                            </div>
                                        </div>
                                        <div class="jeg_sharelist">
                                            <a href="http://www.facebook.com/sharer.php?u={{ $album->showUrl() }}" rel="nofollow" class="jeg_btn-facebook expanded"><i class="fa fa-facebook-official"></i><span>Share on Facebook</span></a><a href="https://twitter.com/intent/tweet?text={{ $album->name }};url={{ $album->showUrl() }}" rel="nofollow" class="jeg_btn-twitter expanded"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a><a href="https://www.pinterest.com/pin/create/bookmarklet/?pinFave=1&amp;url={{ $album->showUrl() }};" rel="nofollow" class="jeg_btn-pinterest "><i class="fa fa-pinterest"></i></a>
                                            <div class="share-secondary">
                                                <a href="https://plus.google.com/share?url={{ $album->showUrl() }}" rel="nofollow" class="jeg_btn-google-plus removed "><i class="fa fa-google-plus"></i></a><a href="https://www.linkedin.com/shareArticle?url={{ $album->showUrl() }};title={{ $album->name }}" rel="nofollow" class="jeg_btn-linkedin "><i class="fa fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="entry-content no-share" style="transform: none;">
                                    <div class="content-inner">
                                        {!! $album->body !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('front.albums._rightSidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('custom-js')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    // mySwiper
    var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
</script>
@endsection