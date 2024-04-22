<!doctype html>
<html class="no-js" lang="">
<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @hasSection('meta')
        @yield('meta')
    @else
        <title>Trang Chủ - Gia Đình Công Giáo Xa Quê Hà Nội</title>
        <link rel="canonical" href="{{ request()->url() }}">
        <meta name="title" content="Trang Chủ - Gia Đình Công Giáo Xa Quê Hà Nội">
        <meta name="description" content="Gia Đình Công Giáo Xa Quê Hà Nội">
        <meta name="keywords" content="xaqueconggiao,conggiao">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Trang Chủ - Gia Đình Công Giáo Xa Quê Hà Nội">
        <meta property="og:description" content="Gia Đình Công Giáo Xa Quê Hà Nội">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:image:alt" content="{{ asset('/images/news-01.png') }}">
        <meta property="og:site_name" content="xaqueconggiao">
        {{--  <meta name="robots" content="noindex">  --}}
    @endif
    <meta name="google-site-verification" content="KNjgSmWJu-kOaJnnrrRfEY-1dkKmpNLR2OMrG-0PIr0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/front/media/favi.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    @googlefonts
@php
    $version_asset = 4.0;
    $fb_url = settings('facebook', 'https://www.facebook.com/giadinhconggiaoxaque');
    $yt_url = settings('youtube', 'https://www.youtube.com/@didanconggiao');
@endphp
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    {{--  <link rel="stylesheet" id="wp-block-library-css" href="{{ asset('new/assets/style/style.min.css') }}" type="text/css" media="all" />  --}}
    {{--  <link rel="stylesheet" id="contact-form-7-css" href="{{ asset('new/assets/style/styles.css') }}" type="text/css" media="all" />  --}}
    {{--  <link rel="stylesheet" id="jnews-parent-style-css" href="{{ asset('new/assets/style/style.css') }}" type="text/css" media="all" />  --}}
    {{--  <link rel="stylesheet" id="js_composer_front-css" href="{{ asset('new/assets/style/js_composer.min.css') }}" type="text/css" media="all" />  --}}
    <link rel="stylesheet" id="jeg_customizer_font-css" href="{{ asset('new/assets/style/css') }}" type="text/css" media="all" />
    {{--  <link rel="stylesheet" id="mediaelement-css" href="{{ asset('new/assets/style/mediaelementplayer-legacy.min.css') }}" type="text/css" media="all" />  --}}
    {{--  <link rel="stylesheet" id="wp-mediaelement-css" href="{{ asset('new/assets/style/wp-mediaelement.min.css') }}" type="text/css" media="all" />  --}}
    <link rel="stylesheet" id="jnews-frontend-css" href="{{ asset('new/assets/style/frontend.min.css') }}?v=2.5" type="text/css" media="all" />
    {{--  <link rel="stylesheet" id="jnews-style-css" href="{{ asset('new/assets/style/style(1).css') }}" type="text/css" media="all" />  --}}
    {{--  <link rel="stylesheet" id="jnews-darkmode-css" href="{{ asset('new/assets/style/darkmode.css') }}" type="text/css" media="all" />  --}}
    <script type="text/javascript" src="{{ asset('new/assets/js/jquery.js') }}" id="jquery-core-js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('new/assets/style/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('new/assets/style/slick-theme.css') }}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('new/assets/style/custom.css') }}?v={{$version_asset}}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link href="{{ asset('icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    
    <script src="{{ asset('new/assets/js/platform.js') }}" gapi_processed="true"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/bootstrap.min.css')}}">        
    <!--================= Fontawesome  css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/all.min.css')}}">       
    <!--================= Rounded  css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/rounded.css')}}">
    <!--================= Back Menus css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/back-menus.css')}}?v={{$version_asset}}">               
    <!--================= Animate css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/animate.css')}}">
    <!--================= Owl Carousel css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/owl.carousel.css')}}">
    <!--================= Magnific Popup css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/magnific-popup.css')}}"> 
    <!--================= Style css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/style.css')}}?v={{$version_asset}}">
    <!--================= Spacing css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/back-spacing.css')}}">
    <!--================= Responsive css =================-->
    <link rel="stylesheet" type="text/css" href="{{asset('custom_assets/css/responsive.css')}}?v={{$version_asset}}">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-52C2M2J2W8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-52C2M2J2W8');
    </script>

    <script src="https://apis.google.com/js/platform.js"></script>
    <style>
        #btnToTop {
            display: inline-block;
            background-color: #FF9800;
            width: 45px;
            height: 45px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s, 
                opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }
        #btnToTop::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 18px;
            line-height: 45px;
            color: #fff;
        }
        #btnToTop:hover {
            cursor: pointer;
            background-color: #333;
        }
        #btnToTop:active {
            background-color: #555;
        }
        #btnToTop.show {
            opacity: 1;
            visibility: visible;
        }
        @media screen and (max-width: 1399px) {
            .footer-column {
                width: 30%;
            }
        }
        @media screen and (max-width: 991px) {
            .footer-column {
                width: 100%;
            }
        }
    </style>
    @stack('css')
</head>
<body>
{{--  <div class="jeg_ad jeg_ad_top jnews_header_top_ads">
    <div class="ads-wrapper"></div>
</div>  --}}
<!-- The Main Wrapper
   ============================================= -->
<div class="jeg_viewport">
    <div class="banner-top">
        <div class="text-center">
            <img src="{{ asset('custom_assets/images/Banner.png') }}?v=1" alt="Banner-top">
        </div>
    </div>
    <header id="back-header" class="back-header">
        <!--================= Topbar Section End Here =================-->
        <div class="menu-part header-style2">
            <div class="container">
                <!--================= Back Menu Start Here =================-->
                <div class="back-main-menu">
                    <nav>
                        <!--================= Menu Toggle btn =================-->
                        <div class="menu-toggle">
                            <div class="logo">
                                <a href="/" class="logo-text">
                                    {{--  <img class="back-logo-dark" src="{{asset('new/assets/image/logo.svg')}}" alt="logo">
                                    <img class="back-logo-light" src="{{asset('new/assets/image/logo.svg')}}" alt="logo">  --}}
                                    <i class="fa fa-home" style="color: white; font-size: 22px"></i>
                                </a>
                            </div>

                            <div class="searchbar-part back-search-mobile"> 
                                <ul>
                                    {{--  <li class="back_search ml-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </li>  --}}
                                    @if(Auth::user())
                                    <li>
                                        <ul class="navbar-nav">
                                            <li class="dropdown ms-0">
                                                <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown">
                                                    {{ Auth::user()->name }}
                                                </a>
                    
                                                <div class="dropdown-menu dropdown-menu-right p-0 mt-3">
                                                    <a href="{{ route('user.dashboard') }}" class="dropdown-item profile-item py-2 px-3">
                                                        <i class="icon-user-plus me-1"></i> {{ __('Profile') }}
                                                    </a>
                                                    <div class="dropdown-divider m-0"></div>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a href="{{ route('logout') }}" class="dropdown-item profile-item py-2 px-3"
                                                            onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="icon-switch2 me-1"></i> {{ __('Đăng xuất') }}</a>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="back-sign">
                                        <a href="{{ route('login') }}" title="Đăng nhập">Đăng nhập</a>
                                    </li>
                                    @endif
                                    <li id="nav-expanders" class="nav-expander bar d-none">
                                        <span class="back-hum1"></span>
                                        <span class="back-hum2"></span>
                                        <span class="back-hum3"></span>
                                    </li>
                                </ul>                                 
                                <form class="search-form" action="{{ route('searchIndex') }}" method="GET">
                                    <input type="text" class="form-input" placeholder="Tìm kiếm" value="{{ request('search') }}" name="key" autocomplete="off" minlength="1">
                                    <button type="submit" class="form-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>
                                </form>
                            </div>

                            <button type="button" id="menu-btn">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!--================= Menu Structure =================--> 
                        <div class="back-inner-menus">
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
                            <ul id="backmenu" class="back-menus back-sub-shadow">
                                <li>
                                    <a href="/" class="logo-text ps-0" title="Trang chủ">
                                        <i class="fa fa-home" style="color: white; font-size: 22px"></i>
                                    </a>
                                </li>
                                @foreach($menuCategories as $c)
                                <li>
                                    <a class="@if(request()->fullUrl() == route('postCategory', $c->slug)) active @endif"
                                        href="{{ route('postCategory', $c->slug) }}">{{ Str::upper($c->name) }}</a>
                                    @endif
                                    @if($c->children->isNotEmpty())
                                        <ul>
                                            @foreach($c->children as $cc)
                                                <li>
                                                    <a href="{{ route('postCategory', $cc->slug) }}">{{ Str::upper($cc->name) }}</a>
                                                    @if($cc->children->isNotEmpty())
                                                        <ul>
                                                            @foreach($cc->children as $c2)
                                                                <li>
                                                                    <a href="{{ route('postCategory', $c2->slug) }}">{{ Str::upper($c2->name) }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            
                            <div class="searchbar-part back-search-desktop"> 
                                <ul>
                                    {{--  <li class="back_search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </li>  --}}
                                    @if(Auth::user())
                                    <li>
                                        <ul class="navbar-nav">
                                            <li class="dropdown ms-0">
                                                <a href="#" class="dropdown-toggle text-white" data-toggle="dropdown">
                                                    {{ Auth::user()->name }}
                                                </a>
                    
                                                <div class="dropdown-menu dropdown-menu-right p-0 mt-3">
                                                    <a href="{{ route('user.dashboard') }}" class="dropdown-item profile-item py-2 px-3">
                                                        <i class="icon-user-plus me-1"></i> {{ __('Profile') }}
                                                    </a>
                                                    <div class="dropdown-divider m-0"></div>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a href="{{ route('logout') }}" class="dropdown-item profile-item py-2 px-3"
                                                            onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="icon-switch2 me-1"></i> {{ __('Đăng xuất') }}</a>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="back-sign">
                                        <a href="{{ route('login') }}" title="Đăng nhập">Đăng nhập</a>
                                    </li>
                                    @endif
                                    <li id="nav-expander" class="nav-expander bar d-none">
                                        <span class="back-hum1"></span>
                                        <span class="back-hum2"></span>
                                        <span class="back-hum3"></span>
                                    </li>
                                </ul>                                  
                                <form class="search-form" action="{{ route('searchIndex') }}">
                                    <input type="text" class="form-input" placeholder="Tìm kiếm" value="{{ request('search') }}" name="key" autocomplete="off">
                                    <button type="submit" class="form-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                    </button>
                                </form>
                            </div>                                
                        </div>                            
                    </nav>
                </div>
                <!--=================  Back Menu End Here  =================-->
            </div>
        </div>
    </header>
    
    <div class="">
    @yield('page')
    </div>

    <footer id="back-footer" class="back-footer">
        <div class="footer-top">
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="footer-column">
                        <div class="footer-widget footer-widget-1 text-center d-lg-inline-block">  
                            <div class="mb-40">
                                <a href="/" class="logo-text">
                                    <img src="{{asset('custom_assets/images/logo.png')}}" alt="logo" width="160px">
                                </a>
                            </div>  
                            <h3 class="footer-title" style="line-height:41px;">GIA ĐÌNH CÔNG GIÁO <br>XA QUÊ HÀ NỘI</h3>                            
                        </div>
                    </div>
                    <div class="footer-column mt-lg-0 mt-5">
                        <div class="footer-widget">
                            <h3 class="footer-title">LIÊN HỆ</h3>
                            <div class="footer-menu">
                                <ul>
                                    <li>Nhà thờ Thái Hà: 180/2 Nguyễn Lương Bằng, P. Quang Trung, Ðống Ða, Hà Nội</li>
                                    <li>Chịu trách nhiệm nội dung: cha Đặc trách Giuse Trần Văn Hưng</li>
                                    {{-- <li>Số điện thoại: <a href="tel:0388498613">0388498613</a></li> --}}
                                    <li>Email: <a href="mailto:truyenthongxaquehanoi@gmail.com">truyenthongxaquehanoi@gmail.com</a></li>
                                </ul>
                            </div>
                            <ul class="social-links mt-4">                                    
                                <li><a href="{{$fb_url}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="{{$yt_url}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>  
                        </div>
                    </div>
                    <div class="footer-column mt-lg-0 mt-5">
                        <div class="footer-widget footer-widget-3">
                            <h3 class="footer-title">LIÊN KẾT TRANG</h3>
                            <iframe src="https://www.facebook.com/plugins/page.php?href={{$fb_url}}" style="width: 340px"></iframe>
                            
                            <div class="d-block">
                                <div class="g-ytsubscribe" data-channelid="UCQ6atpwb6MXhTdcyATgjBoQ" data-layout="full" data-count="default"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="textwidget custom-html-widget pt-4">
            <p class="copyright mb-0">© 2022 <a style="text-decoration: none;" href="/" title="Gia Đình Công Giáo Xa Quê Hà Nội">Gia Đình Công Giáo Xa Quê Hà Nội</a> - Điểm đến của những người Di Dân.</p>
        </div>
    </footer>

    <a style="background-color: #007aff;" id="btnToTop"></a>
</div>

<script>
    var btnToTop = $('#btnToTop');

    $(window).scroll(function() {

        if ($(window).scrollTop() > 300) {
            btnToTop.addClass('show');
        } else {
            btnToTop.removeClass('show');
        }
    });

    btnToTop.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, 500);
    });
</script>
<script type="text/javascript">
    var jfla = [];
</script>
<script type="text/javascript" src="{{ asset('new/assets/js/jquery.form.min.js') }}" id="jquery-form-js"></script>
<script type="text/javascript" id="contact-form-7-js-extra">
    /* <![CDATA[ */
    var _wpcf7 = { loaderUrl: "https:\/\/xaqueconggiao.net\/wp-content\/plugins\/contact-form-7-master\/images\/ajax-loader.gif", sending: "Sending ...", cached: "1" };
    /* ]]> */
</script>
<script type="text/javascript" src="{{ asset('new/assets/js/scripts.js') }}" id="contact-form-7-js"></script>
<script type="text/javascript" src="{{ asset('new/assets/js/comment-reply.min.js') }}" id="comment-reply-js"></script>
<script type="text/javascript" id="mediaelement-core-js-before">

    var mejsL10n = {
        language: "vi",
        strings: {
            "mejs.download-file": "T\u1ea3i v\u1ec1 t\u1eadp tin",
            "mejs.install-flash":
                "B\u1ea1n \u0111ang s\u1eed d\u1ee5ng tr\u00ecnh duy\u1ec7t kh\u00f4ng h\u1ed7 tr\u1ee3 Flash player. Vui l\u00f2ng b\u1eadt ho\u1eb7c c\u00e0i \u0111\u1eb7t \n phi\u00ean b\u1ea3n m\u1edbi nh\u1ea5t t\u1ea1i https:\/\/get.adobe.com\/flashplayer\/",
            "mejs.fullscreen": "To\u00e0n m\u00e0n h\u00ecnh",
            "mejs.play": "Ch\u1ea1y",
            "mejs.pause": "T\u1ea1m d\u1eebng",
            "mejs.time-slider": "Th\u1eddi gian tr\u00ecnh chi\u1ebfu",
            "mejs.time-help-text":
                "S\u1eed d\u1ee5ng c\u00e1c ph\u00edm m\u0169i t\u00ean Tr\u00e1i\/Ph\u1ea3i \u0111\u1ec3 ti\u1ebfn m\u1ed9t gi\u00e2y, m\u0169i t\u00ean L\u00ean\/Xu\u1ed1ng \u0111\u1ec3 ti\u1ebfn m\u01b0\u1eddi gi\u00e2y.",
            "mejs.live-broadcast": "Tr\u1ef1c ti\u1ebfp",
            "mejs.volume-help-text": "S\u1eed d\u1ee5ng c\u00e1c ph\u00edm m\u0169i t\u00ean L\u00ean\/Xu\u1ed1ng \u0111\u1ec3 t\u0103ng ho\u1eb7c gi\u1ea3m \u00e2m l\u01b0\u1ee3ng.",
            "mejs.unmute": "B\u1eadt ti\u1ebfng",
            "mejs.mute": "T\u1eaft ti\u1ebfng",
            "mejs.volume-slider": "\u00c2m l\u01b0\u1ee3ng Tr\u00ecnh chi\u1ebfu",
            "mejs.video-player": "Tr\u00ecnh ch\u01a1i Video",
            "mejs.audio-player": "Tr\u00ecnh ch\u01a1i Audio",
            "mejs.captions-subtitles": "Ph\u1ee5 \u0111\u1ec1",
            "mejs.captions-chapters": "C\u00e1c m\u1ee5c",
            "mejs.none": "Tr\u1ed1ng",
            "mejs.afrikaans": "Ti\u1ebfng Nam Phi",
            "mejs.albanian": "Ti\u1ebfng Albani",
            "mejs.arabic": "Ti\u1ebfng \u1ea2 R\u1eadp",
            "mejs.belarusian": "Ti\u1ebfng Belarus",
            "mejs.bulgarian": "Ti\u1ebfng Bulgari",
            "mejs.catalan": "Ti\u1ebfng Catalan",
            "mejs.chinese": "Ti\u1ebfng Trung Qu\u1ed1c",
            "mejs.chinese-simplified": "Ti\u1ebfng Trung Qu\u1ed1c (gi\u1ea3n th\u1ec3)",
            "mejs.chinese-traditional": "Ti\u1ebfng Trung ( Ph\u1ed3n th\u1ec3 )",
            "mejs.croatian": "Ti\u1ebfng Croatia",
            "mejs.czech": "Ti\u1ebfng S\u00e9c",
            "mejs.danish": "Ti\u1ebfng \u0110an M\u1ea1ch",
            "mejs.dutch": "Ti\u1ebfng H\u00e0 Lan",
            "mejs.english": "Ti\u1ebfng Anh",
            "mejs.estonian": "Ti\u1ebfng Estonia",
            "mejs.filipino": "Ti\u1ebfng Philippin",
            "mejs.finnish": "Ti\u1ebfng Ph\u1ea7n Lan",
            "mejs.french": "Ti\u1ebfng Ph\u00e1p",
            "mejs.galician": "Ti\u1ebfng Galicia",
            "mejs.german": "Ti\u1ebfng \u0110\u1ee9c",
            "mejs.greek": "Ti\u1ebfng Hy L\u1ea1p",
            "mejs.haitian-creole": "Ti\u1ebfng Haiti",
            "mejs.hebrew": "Ti\u1ebfng Do Th\u00e1i",
            "mejs.hindi": "Ti\u1ebfng Hindu",
            "mejs.hungarian": "Ti\u1ebfng Hungary",
            "mejs.icelandic": "Ti\u1ebfng Ailen",
            "mejs.indonesian": "Ti\u1ebfng Indonesia",
            "mejs.irish": "Ti\u1ebfng Ailen",
            "mejs.italian": "Ti\u1ebfng \u00dd",
            "mejs.japanese": "Ti\u1ebfng Nh\u1eadt",
            "mejs.korean": "Ti\u1ebfng H\u00e0n Qu\u1ed1c",
            "mejs.latvian": "Ti\u1ebfng Latvia",
            "mejs.lithuanian": "Ti\u1ebfng Lithuani",
            "mejs.macedonian": "Ti\u1ebfng Macedonia",
            "mejs.malay": "Ti\u1ebfng Malaysia",
            "mejs.maltese": "Ti\u1ebfng Maltese",
            "mejs.norwegian": "Ti\u1ebfng Na Uy",
            "mejs.persian": "Ti\u1ebfng Ba T\u01b0",
            "mejs.polish": "Ti\u1ebfng Ba Lan",
            "mejs.portuguese": "Ti\u1ebfng B\u1ed3 \u0110\u00e0o Nha",
            "mejs.romanian": "Ti\u1ebfng Romani",
            "mejs.russian": "Ti\u1ebfng Nga",
            "mejs.serbian": "Ti\u1ebfng Serbia",
            "mejs.slovak": "Ti\u1ebfng Slovakia",
            "mejs.slovenian": "Ti\u1ebfng Slovenia",
            "mejs.spanish": "Ti\u1ebfng T\u00e2y Ban Nha",
            "mejs.swahili": "Ti\u1ebfng Swahili",
            "mejs.swedish": "Ti\u1ebfng Th\u1ee5y \u0110i\u1ec3n",
            "mejs.tagalog": "Ti\u1ebfng Tagalog",
            "mejs.thai": "Ti\u1ebfng Th\u00e1i",
            "mejs.turkish": "Ti\u1ebfng Th\u1ed5 Nh\u0129 K\u00ec",
            "mejs.ukrainian": "Ti\u1ebfng Ukraina",
            "mejs.vietnamese": "Ti\u1ebfng Vi\u1ec7t",
            "mejs.welsh": "Ti\u1ebfng Welsh",
            "mejs.yiddish": "Ti\u1ebfng Yiddish",
        },
    };
</script>
<script type="text/javascript" src="{{ asset('new/assets/js/mediaelement-and-player.min.js') }}" id="mediaelement-core-js"></script>
<script type="text/javascript" src="{{ asset('new/assets/js/mediaelement-migrate.min.js') }}" id="mediaelement-migrate-js"></script>
<script type="text/javascript" id="mediaelement-js-extra">
    /* <![CDATA[ */
    var _wpmejsSettings = { pluginPath: "\/wp-includes\/js\/mediaelement\/", classPrefix: "mejs-", stretching: "responsive" };
    /* ]]> */
</script>
<script type="text/javascript" src="{{ asset('new/assets/js/wp-mediaelement.min.js') }}" id="wp-mediaelement-js"></script>
<script type="text/javascript" src="{{ asset('new/assets/js/hoverIntent.min.js') }}" id="hoverIntent-js"></script>
<script type="text/javascript" src="{{ asset('new/assets/js/imagesloaded.min.js') }}" id="imagesloaded-js"></script>
<script type="text/javascript" id="jnews-frontend-js-extra">
    /* <![CDATA[ */
    var jnewsoption = {
        login_reload: "https:\/\/xaqueconggiao.net",
        popup_script: "magnific",
        single_gallery: "",
        ismobile: "",
        isie: "",
        sidefeed_ajax: "",
        language: "vi",
        module_prefix: "jnews_module_ajax_",
        live_search: "1",
        postid: "0",
        isblog: "",
        admin_bar: "0",
        follow_video: "",
        follow_position: "top_right",
        rtl: "0",
        gif: "",
        lang: { invalid_recaptcha: "Invalid Recaptcha!", empty_username: "Please enter your username!", empty_email: "Please enter your email!", empty_password: "Please enter your password!" },
        recaptcha: "0",
        site_slug: "\/",
        site_domain: "xaqueconggiao.net",
        zoom_button: "0",
    };
    /* ]]> */
</script>
<script type="text/javascript" src="{{ asset('new/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('new/assets/js/slick.min.js') }}"></script>
<script>
    $('#box-slide-main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: false,
        speed: 900,
        autoplaySpeed: 20000,
        autoplay: true,
        lazyLoad: 'ondemand',
    });
</script>
<script>
    $('.nav_search_form').on('click', function(event){
        event.stopPropagation();
        $('.search-box').addClass('active');
        $(this).find('.search-submit-btn').show();
        $('.result_search').show();
    });

    $('.result_search').on('click', function(event){
        event.stopPropagation();
    });
    
    $(document).click(function(event){
        if($('.search-box').hasClass('active')) {
            $('.search-box').removeClass('active');
            $('.result_search').hide();
            $('.search-submit-btn').hide();
        }
    });
    
    $('#search_lg').on('submit', function() {
        if(!$('.search-box').val()) {
            return false;
        }
        return true;
    })
</script>

<script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
	<script src="{{ asset('plugins/forms/selects/select2.min.js') }}"></script>
	<script src="https://cdn.tiny.cloud/1/n16hhrb5bl3fgp16t48tl2r8lg6iypue1zhq1ponai343ehm/tinymce/5/tinymce.min.js" referrerpolicy="origin" defer></script>

    {{--  <script src="{{asset('custom_assets/js/jquery.min.js')}}"></script>  --}}
    <script src="{{asset('custom_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('custom_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('custom_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('custom_assets/js/wow.min.js')}}"></script>
    <script src="{{asset('custom_assets/js/back-menus.js')}}?v={{$version_asset}}"></script>
    <script src="{{asset('custom_assets/js/plugins.js')}}"></script>
    <script src="{{asset('custom_assets/js/main.js')}}?v={{$version_asset}}"></script>

	<script>
        
        var timer;
        $('.search-box').on('keyup',function(){
            if(timer) clearTimeout(timer);
            timer = setTimeout(() => {
                var keyword = $(this).val();
                keyword = keyword.trim();
                if(keyword) {
                    $.ajax({
                        type: 'get',
                        url: '{{ route('searchAjax') }}',
                        data: {
                            'search': keyword
                        },
                        success:function(data){
                            $('.result_search').html(data);
                        }
                    });
                } else {
                    $('.result_search').html('');
                }
            }, 300);
        })

      

		function setSearchSelect2(selector, searchUrl) {

			if (selector.length > 0) {
				selector.select2({
					width: '100%',
					ajax: {
						url: searchUrl,
						datatype: 'json',
						delay: 250,
						data: function (params) {
							return {
								q: params.term, // search term
								page: params.page
							};
						},
						processResults: function (data, params) {
							params.page = params.page || 1;

							return {
								results: data.data,
								pagination: {
									more: (params.page * 15) < data.total
								}
							};
						},
						templateSelection: function(item) { return item.name || item.text; }
					},
				});

				let selected = selector.val();

				if (selector.attr('multiple')) {
					if (selector.val().length > 0) {
						selected = selector.val().join(',');
					} else {
						selected = null;
					}
				}

				if (selected) {
					$.ajax({
						type: 'GET',
						url: searchUrl + '?id=' + selected
					}).then(function (res) {
						selector.empty().trigger("change");

						// create the option and append to Select2
						res.forEach(function(data) {
							var option = new Option(data.text, data.id, true, true);
							selector.append(option).trigger('change');

							// manually trigger the `select2:select` event
							selector.trigger({
								type: 'select2:select',
								params: {
									data: data
								}
							});
						})
					});
				}

			}
		}

		$(function() {
			$('.form-control-select2').select2();

			$('[data-behavior~=delete-resource]').on('click', function(){
				if (!confirm('{{ __("Bạn chắc chắn muốn xóa?") }}')) {
					return;
				}

				var $this = $(this);
				var $body = $('body');

				var actionUrl = $this.data('action-url');
				var csrf = $('meta[name="csrf-token"]').attr('content');

				var $form = $("<form action='" + actionUrl + "' method='POST'><input type='hidden' name='_token' value='" + csrf + "' /><input type='hidden' name='_method' value='delete' /></form>")

				$body.append($form);

				$form.submit();
			});

			tinymce.init({
				selector: '.editor',
				plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
				imagetools_cors_hosts: ['picsum.photos'],
				menubar: 'file edit view insert format tools table help',
				toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
				toolbar_sticky: true,
				autosave_ask_before_unload: true,
				autosave_interval: '30s',
				autosave_prefix: '{path}{query}-{id}-',
				autosave_restore_when_empty: false,
				autosave_retention: '2m',
				image_advtab: true,
				importcss_append: true,
				templates: [
					{ title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
					{ title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
					{ title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
				],
				template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
				template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
				height: 600,
				image_caption: true,
				quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
				noneditable_noneditable_class: 'mceNonEditable',
				toolbar_mode: 'sliding',
				contextmenu: 'link image imagetools table',
				skin: 'oxide',
				content_css: 'default',
				content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
				file_picker_callback: elFinderBrowser,
				relative_urls : false,
				remove_script_host : false,
				convert_urls : true,
				toolbar_mode: 'wrap',
				language_url : "/plugins/tinymce_languages/langs/vi.js",
				language: 'vi',
				quickbars_insert_toolbar: 'quicktable image media codesample',
				extended_valid_elements : "script[async|src|charset],iframe[src|title|width|height|allowfullscreen|frameborder],img[class|style|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name|loading=lazy]"
			});

			function elFinderBrowser (callback, value, meta) {
				tinymce.activeEditor.windowManager.openUrl({
					title: 'File Manager',
					url: "{{ route('elfinder.tinymce5') }}",
					/**
					 * On message will be triggered by the child window
					 *
					 * @param dialogApi
					 * @param details
					 * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
					 */
					onMessage: function (dialogApi, details) {
						if (details.mceAction === 'fileSelected') {
							const file = details.data.file;

							// Make file info
							const info = file.name;

							console.log(file)

							// Provide file and text for the link dialog
							if (meta.filetype === 'file') {
								callback(file.url, {text: info, title: info});
							}

							// Provide image and alt text for the image dialog
							if (meta.filetype === 'image') {
								callback(file.url, {alt: info});
							}

							// Provide alternative source and posted for the media dialog
							if (meta.filetype === 'media') {
								callback(file.url);
							}

							dialogApi.close();
						}
					}
				});
			}
		})
	</script>

	@stack('js')


@yield('custom-js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('new/assets/js/frontend.min.js') }}" id="jnews-frontend-js"></script>
<script type="text/javascript" src="{{ asset('new/assets/js/wp-embed.min.js') }}" id="wp-embed-js"></script>
<script type="text/javascript" src="{{ asset('new/assets/js/js_composer_front.min.js') }}" id="wpb_composer_front_js-js"></script>
<!--<script type="text/javascript" src="new/assets/js/hero.js" id="jnews-hero-js"></script>-->
<script type="text/javascript" src="{{ asset('new/assets/js/elfsight-youtube-gallery.js') }}" id="elfsight-youtube-gallery-js"></script>
<script>

</script>
</body>
</html>
