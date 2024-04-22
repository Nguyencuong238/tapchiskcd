<!doctype html>
<html class="no-js" lang="">

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @hasSection('meta')
        @yield('meta')
    @else
        <title>Xa quê công giáo</title>
        <link rel="canonical" href="{{ request()->url() }}">
        <meta name="title" content="Xa quê công giáo">
        <meta name="description" content="Xa quê công giáo">
        <meta name="keywords" content="Xa quê công giáo">
        <meta name="google-site-verification" content="TLNXAQM5ukDH-KPg0pmjbmcCrQ1GrIMjz3tJZ4ixgeo" />
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Xa quê công giáo">
        <meta property="og:description" content="Xa quê công giáo">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="Xa quê công giáo">
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/front/media/favi.png">

    <!-- Dependencies CSS -->
    <link rel="stylesheet" href="/front/dependencies/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front/dependencies/fontawesome/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/flaticon/flaticon.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/animate.css/css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/owl.carousel/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/owl.carousel/css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/magnific-popup/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/sal/css/sal.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/select2/css/select2.min.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/nivo-slider/nivo-slider.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/meanmenu/meanmenu.min.css" type="text/css">
    <link rel="stylesheet" href="/front/dependencies/toastr/toastr.min.css" type="text/css">

    <!-- Google Web Fonts -->
    @googlefonts
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset_v('/front/assets/css/app.css') }}" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset_v('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset_v('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset_v('assets/css/style.css') }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3EY0L8CHG2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3EY0L8CHG2');
    </script>
    <!-- Hotjar Tracking Code for https://dragongame.io/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2885101,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <style>
        .post-list-layout2 .media .item-img img {
            max-width: 152px;
            max-height: 113px;
        }

        .page-item.active .page-link {
            background-color: #f80136;
            border-color: #f80136;
        }
        .page-link {
            color: #f80136;
        }

        .text-overflow-2-lines {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            -webkit-line-clamp: 2;
        }
        .text-overflow-3-lines {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
        }

        .post-grid-layout2.post-grid10 .item-content {
            padding: 0.375rem 1.5625rem 0.9375rem 1.5625rem;
            min-height: 132px;
        }

        .lazyload, .lazyloading {
            opacity: 0;
        }
        .lazyloaded {
            opacity: 1;
            transition: opacity 300ms;
        }

        @media screen and (max-width: 1024px) {
            .mobile-hide {
                display: none;
            }
        }

        .social-box-img a img {
            opacity: 0.8;
        }

        .social-box-img a:hover img {
            opacity: 1;
        }

        .menu-layout1 {
            background: #2c1c24;
        }

        nav.template-main-menu > ul > li > a {
            color: #f5f5f5;
        }

        .header-action-layout1 ul .search-btn i:before {
            color: #f5f5f5;
        }

    </style>

    @stack('css')

</head>

<body class="sticky-header">
    <div class="vs-cursor"></div>
    {{--  <div class="preloader">
        <button class="vs-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner">
            <div class="vs-loadholder">
                <div class="vs-loader"><span class="loader-text">Loading</span></div>
            </div>
        </div>
    </div>  --}}
    <div id="main-wrapper" class="fh-main-wrapper">

        <!--=====================================-->
        <!--=           Header Menu Start      =-->
        <!--=====================================-->

        <div id="rt-sticky-placeholder"></div>
        <div id="header-menu" class="header-menu menu-layout1">
            <script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
            <coingecko-coin-price-marquee-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" background-color="#ffffff" locale="en">
            </coingecko-coin-price-marquee-widget>
        </div>

        <div class="vs-menu-wrapper">
            <div class="vs-menu-area text-center">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo"><a href="/"><img src="/images/news-01.png" alt="DragonNews" height="86"></a></div>
                <div class="vs-mobile-menu">
                    <ul>
                        <li><a href="/">TRANG CHỦ</a></li>
                        @php
                            $menuCategories = collect();
                            $categoryId = settings('menu_category_id', []);

                            if (count($categoryId) > 0) {
                                $menuCategories = \App\Models\Category::whereIn('id', $categoryId)->with([
                                    'children' => function($q) {
                                        $q->oldest();
                                    }
                                ])->orderByRaw('FIELD(id,' . implode(',', $categoryId) . ')')->get();
                            }
                        @endphp
                        @foreach($menuCategories as $c)
                        <li>
                            <a href="{{ route('postCategory', $c->slug) }}">{{ $c->name }}</a>
                            @if($c->children->isNotEmpty())
                                <ul class="sub-menu">
                                    @foreach($c->children as $cc)
                                    <li>
                                        <a href="{{ route('postCategory', $cc->slug) }}">{{ $cc->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @endforeach
                        <li><a href="{{ route('front.projects.index') }}">DỰ ÁN</a></li>    
                    </ul>
                </div>
            </div>
        </div>
        <div class="popup-search-box">
            <button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>
            <form  method="GET" action="{{ route('front.posts.index') }}">
                <input type="text" class="border-theme" type="search" name="search" value="" placeholder="Tìm kiếm...">
                <button type="submit">
                    <i class="fal fa-search"></i>
                </button>
            </form>
        </div>
        <div class="sidemenu-wrapper d-none d-lg-block">
            <div class="sidemenu-content">
                <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
                <div class="widget">
                    <div class="vs-widget-about">
                        <div class="footer-logo">
                            <a href="/"><img src="/images/news-01.png" alt="DragonNews" width="192" height="86"></a>
                        </div>
                        <p class="footer-about-text">Dragon Game là một trong những dự án cộng nghệ nổi bật và trọng tâm của Tập Đoàn Công Nghệ AnyTech. Được hình thành và phát triển từ năm 01/2021, Dragon Game định vị đến năm 2023 trở thành một Hệ sinh thái hỗ trợ Game Blockchain hàng đầu Châu Á.</p>
                        <div class="multi-social">
                            <a href="{{ settings('facebook', '#') }}"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ settings('twitter', '#') }}"><i class="fab fa-twitter"></i></a>
                            <a href="{{ settings('telegram', '#') }}"><i class="fab fa-telegram"></i></a>
                            <a href="{{ settings('youtube', '#') }}"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <div class="recent-post-wrap">
                        <div class="nav recent-post-tab" data-asnavfor="#recent-post-slide2">
                            <button class="nav-link active">Vừa xem</button>
                            <button class="nav-link">Bài viết mới</button>
                        </div>
                        <div class="recent-post-slide vs-carousel" id="recent-post-slide2" data-fade="true" data-slide-show="1" data-md-slide-show="1" data-speed="800" data-adaptive-height="true" data-infinite="fasle">
                        <div class="slide">
                            @foreach(array_reverse(session('recent_posts', [])) as $rp)
                            <div class="recent-post">
                                <div class="media-img"><a href="{{ $rp->showUrl() }}"><img src="{{ $rp->getFirstMediaUrl('media', 'show-bf') }}" alt="{{ $rp->title }}"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title">
                                        <a class="text-inherit" href="{{ $rp->showUrl() }}">{{ $rp->title }}</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="{{ $rp->showUrl() }}"><i class="fal fa-user"></i>By DragonNews</a>
                                        <a href="{{ $rp->showUrl() }}"><i class="fal fa-calendar-alt"></i>{{ $rp->created_at->translatedFormat('M d, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="slide">
                            @php
                                $latestPosts = \App\Models\Post::latest()->where('is_new', true)->forCard()->take(5)->get();
                            @endphp
                            @foreach($latestPosts as $l)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ $l->showUrl() }}">
                                        <img src="{{ $l->getFirstMediaUrl('media', 'show-bf') }}" alt="{{ $l->title }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="post-title">
                                        <a class="text-inherit" href="{{ $l->showUrl() }}">{{ $l->title }}</a>
                                    </h4>
                                    <div class="recent-post-meta">
                                        <a href="{{ $l->showUrl() }}"><i class="fal fa-user"></i>By DragonNews</a>
                                        <a href="{{ $l->showUrl() }}"><i class="fal fa-calendar-alt"></i>{{ $l->created_at->translatedFormat('M d, Y') }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                     </div>
                  </div>
                </div>
            </div>
        </div>
        <header class="vs-header header-layout5">
            <div class="menu-top">
                <div class="container-xl">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="/"><img src="/images/news-01.png" alt="DragonNews"></a>
                            </div>
                        </div>
                        <div class="col-auto d-lg-none">
                            <button type="button" class="icon-btn style3 searchBoxTggler"><i class="fal fa-search"></i></button>
                            <button type="button" class="vs-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
                        </div>
                        <div class="col-lg mt-20 mt-lg-0 text-end banner-area">
                            <a target="_blank" href="#"><img src="/assets/img/banner/banner-top.png" alt="Ad Banner"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sticky-wrapper">
                <div class="sticky-active d-none d-lg-block">
                    <div class="container-xl">
                        <div class="menu-area">
                            <div class="row justify-content-between align-items-center">
                            <div class="col-auto"><button type="button" class="icon-btn style4 sideMenuToggler"><i class="fas fa-th"></i></button></div>
                            <div class="col-auto">
                                <nav class="main-menu menu-style3 d-none d-lg-block">
                                    <ul>
                                        <li><a href="/">TRANG CHỦ</a></li>
                                        @php
                                            $menuCategories = collect();
                                            $categoryId = settings('menu_category_id', []);

                                            if (count($categoryId) > 0) {
                                                $menuCategories = \App\Models\Category::whereIn('id', $categoryId)->with([
                                                    'children' => function($q) {
                                                        $q->oldest();
                                                    }
                                                ])->orderByRaw('FIELD(id,' . implode(',', $categoryId) . ')')->get();
                                            }
                                        @endphp
                                        @foreach($menuCategories as $c)
                                        <li class="@if($c->children->isNotEmpty()) menu-item-has-children @endif">
                                            <a href="{{ route('postCategory', $c->slug) }}">{{ $c->name }}</a>
                                            @if($c->children->isNotEmpty())
                                                <ul class="sub-menu">
                                                    @foreach($c->children as $cc)
                                                    <li>
                                                        <a href="{{ route('postCategory', $cc->slug) }}">{{ $cc->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                        <li><a href="{{ route('front.projects.index') }}">DỰ ÁN</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-auto">
                                <div class="me-3"><button type="button" class="icon-btn style3 searchBoxTggler"><i class="fal fa-search"></i></button></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('page')
        <footer class="footer-wrap">
            <div class="footer-top-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="footer-box col-5">
                                    <h3 class="footer-box-title">
                                        Liên kết
                                    </h3>
                                    <div class="footer-link">
                                        <ul>
                                            <li><a href="/">Trang chủ</a></li>
                                            <li><a href="{{route('front.posts.index')}}">Bài viết</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-box col-6 px-0">
                                    <h3 class="footer-box-title">
                                        Về Chúng tôi
                                    </h3>
                                    <div class="footer-link">
                                        <ul>
                                            <li><a href="#">Giới thiệu</a></li>
                                            <li><a href="#">Dịch vụ</a></li>
                                            <li><a href="#">Đối tác</a></li>
                                            {{--  <li><a href="{{ route('front.pages.about') }}">Giới thiệu</a></li>
                                            <li><a href="{{ route('front.pages.service') }}">Dịch vụ</a></li>
                                            <li><a href="{{ route('front.pages.partner') }}">Đối tác</a></li>  --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer-box text-lg-center">
                                <div class="footer-logo">
                                    <a href="/"><img src="/images/news-01.png" width="75%" alt="logo"></a>
                                </div>
                                <form action="{{ route('newsletters') }}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="email" placeholder="Đăng ký nhận bản tin">
                                        <div class="input-group-append">
                                            <button class="item-btn" type="submit"><i class="fas fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 social-section">
                            <div class="footer-box">
                                <h3 class="footer-box-title">
                                    Mạng xã hội
                                </h3>
                                <div class="footer-social">
                                    <ul class="social-icon">
                                    <li><a target="_blank" href="{{ settings('facebook', '#') }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a target="_blank" href="{{ settings('twitter', '#') }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a target="_blank" href="{{ settings('telegram', '#') }}"><i class="fab fa-telegram"></i></a></li>
                                    <li><a target="_blank" href="{{ settings('youtube', '#') }}"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-wrap">
                <div class="container">
                    <div class="footer-copyright">Copyright@2021 DragonNews. All Rights Reserved</div>
                </div>
            </div>
        </footer>
        <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>

        <!--=====================================-->
        <!--=            Sidebar Start          =-->
        <!--=====================================-->
        <div class="sidebar-nav-menu" id="sidebar-nav">
            <button class="close-btn sidebar-toggle"><i class="fas fa-times"></i></button>
            <div class="sidebar-logo">
                <a href="/">
                    <img src="/images/news-01.png" height="70%" alt="Side Logo">
                </a>
            </div>
            <ul class="menu-list">
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/post">Bài viết</a></li>
            </ul>
            <ul class="item-social">
                <li><a target="_blank" href="{{ settings('facebook', '#') }}"><i class="fab fa-facebook-f"></i></a></li>
                <li><a target="_blank" href="{{ settings('twitter', '#') }}"><i class="fab fa-twitter"></i></a></li>
                <li><a target="_blank" href="{{ settings('telegram', '#') }}"><i class="fab fa-telegram"></i></a></li>
                <li><a target="_blank" href="{{ settings('youtube', '#') }}"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </div>

    </div>
    <!-- Dependencies Js -->
    <script src="/front/dependencies/jquery/js/jquery.min.js"></script>
    <script src="/front/dependencies/popper.js/js/popper.min.js"></script>
    <script src="/front/dependencies/bootstrap/js/bootstrap.min.js"></script>
    <script src="/front/dependencies/nivo-slider/jquery.nivo.slider.js"></script>
    <script src="/front/dependencies/nivo-slider/home.js"></script>
    {{--  <script src="/front/dependencies/owl.carousel/js/owl.carousel.min.js"></script>  --}}
    <script src="/front/dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="/front/dependencies/sal/js/sal.js"></script>
    <script src="/front/dependencies/select2/js/select2.min.js"></script>
    <script src="/front/dependencies/isotope-layout/js/isotope.pkgd.min.js"></script>
    <script src="/front/dependencies/imagesloaded/js/imagesloaded.pkgd.min.js"></script>
    <script src="/front/dependencies/validator/validator.min.js"></script>
    <script src="/front/dependencies/meanmenu/jquery.meanmenu.min.js"></script>
    <script src="/front/assets/js/lazysizes.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
    <script src="/front/dependencies/toastr/toastr.min.js"></script>
    <script src="{{ asset_v('/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset_v('assets/js/app.min.js') }}"></script>
    <script src="{{ asset_v('/assets/js/vscustom-carousel.min.js') }}"></script>
    <script src="/front/dependencies/owl.carousel/js/owl.carousel.min.js"></script>
    <script src="{{ asset_v('/assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset_v('/assets/js/main.js') }}"></script>

    <!-- Custom Js -->
    <script src="/front/assets/js/app.js?v=1.1"></script>
    @if(session()->has('success_subscribe'))
        <script>
                toastr.success("{{ session('success_subscribe') }}", 'Thành công')
        </script>
    @endif

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6258f3737b967b11798ad5e2/1g0lndvgc';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

    @stack('js')
</body>

</html>
