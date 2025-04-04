<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="chat-id" content="{{ $chatId ?? '' }}">
    <meta name="user-role" content="{{ auth()->check() ? auth()->user()->role_id : 0 }}">
    <meta name="user-id" content="{{ auth()->check() ? auth()->user()->id : 0 }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/bootstrap.min.css"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/font-awesome.min.css"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/bootstrap-grid.min.css"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/bootstrap-reboot.min.css"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/font-techmarket.css"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/slick.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/techmarket-font-awesome.css"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/slick-style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/animate.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/real-time.css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/colors/blue.css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
    <link rel="shortcut icon" href="{{ url('') }}/admin/assets/images/config/{{$config->favicon}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ url('') }}/admin/assets/images/config/{{$config->favicon}}">

    <style>
        .user-menu {
            position: relative;
            display: inline-block;
        }

        .user-menu-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            /* background-color: #f9f9f9; */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border: none;
        }

        .dropdown-menu li {
            list-style-type: none;

        }

        .dropdown-menu li a {
            text-decoration: none;
            color: black;
            display: flex;
            align-items: center;
        }

        .dropdown-menu li a img {
            margin-right: 10px;
            width: 25px;
            height: auto;
            float: left;
        }
    </style>
    @yield('styles')
</head>

<body class="page-template-default error-page woocommerce-active single-product full-width normal">
    <div id="page" class="hfeed site">
        {{-- Top Bar --}}
        <div class="top-bar top-bar-v1">
            <div class="col-full">
                <ul id="menu-top-bar-left" class="nav justify-content-center">
                    <li class="menu-item animate-dropdown">
                        <a title="Techboys - Always free delivery" href="contact-v1.html">Techboys &#8211; Lựa chọn tối
                            ưu</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Sản phẩm chất lượng" href="{{ route('client.product.index') }}">Sản phẩm chất
                            lượng</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Hỗ trợ nhanh chóng" href="track-your-order.html">Hỗ trợ nhanh chóng</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Không thu phụ phí" href="contact-v2.html">Không thu phụ phí</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Header --}}
        <header id="masthead" class="site-header header-v1" style="background-image: none; ">
            <div class="col-full desktop-only">
                <div class="techmarket-sticky-wrap">
                    <div class="row">
                        <div class="site-branding">
                            <a href="{{ route('home') }}" class="custom-logo-link" rel="home">
                                <img src="{{ url('') }}/admin/assets/images/config/{{$config->logo}}" alt="">
                            </a>
                        </div>
                        <!-- ====================== End Header Logo ====================== -->
                        <nav id="primary-navigation" class="primary-navigation" aria-label="Primary Navigation"
                            data-nav="flex-menu">
                            <ul id="menu-primary-menu" class="nav yamm">
                                <li class="menu-item animate-dropdown">
                                    <a title="about us" href="{{ route('client.about.about') }}">Về chúng tôi</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Headphones Sale" href="{{ route('contact') }}">Liên hệ</a>
                                </li>
                                <li class="sale-clr yamm-fw menu-item animate-dropdown">
                                    <a title="Super deals" href="{{ route('client.product.index') }}">Sản phẩm</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Headphones Sale" href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li class="techmarket-flex-more-menu-item dropdown">
                                    <a title="..." href="#" data-toggle="dropdown"
                                        class="dropdown-toggle">...</a>
                                    <ul class="overflow-items dropdown-menu"></ul>
                                </li>
                            </ul>
                            <!-- .nav -->
                        </nav>
                        <!-- .primary-navigation -->
                        <nav id="secondary-navigation" class="secondary-navigation" aria-label="Secondary Navigation"
                            data-nav="flex-menu">
                            <ul id="menu-secondary-menu" class="nav">
                                <li
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2802 animate-dropdown">
                                    <a title="Track Your Order" href="{{ route('client.orders') }}">
                                        <i class="tm tm-order-tracking"></i>Theo dõi đơn hàng</a>
                                </li>
                                <li class="menu-item">
                                    @php
                                        $user = Auth::user();
                                    @endphp
                                    @guest
                                        <a title="My Account" href="{{ route('login.client') }}">
                                            <i class="tm tm-login-register"></i>Đăng nhập</a>
                                    @else
                                        <div class="user-menu">
                                            <a href="#" class="user-menu-toggle">
                                                <i class="tm tm-login-register"></i><b
                                                    style="margin-top: 5px">{{ Auth::user()->name }}</b>
                                                <i class="fas fa-bars hamburger-icon"
                                                    style="margin-left: 10px; margin-top: 5px"></i>
                                            </a>
                                            <ul class="dropdown-menu" id="userDropdownMenu">
                                                <li>
                                                    <a href="{{ route('client.edit') }}">
                                                        <img src="{{ asset('home/assets/images/profile.png') }}">
                                                        <p>Thông tin</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('client.changePassword') }}">
                                                        <img src="{{ asset('home/assets/images/setting.png') }}">
                                                        <p>Đổi mật khẩu</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('client.logout') }}">
                                                        <img src="{{ asset('home/assets/images/logout.png') }}">
                                                        <p>Đăng xuất</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endguest
                                </li>
                            </ul>
                            <!-- .nav -->
                        </nav>
                        <!-- .secondary-navigation -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="row align-items-center">
                    <div id="departments-menu" class="dropdown departments-menu">
                        <button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="tm tm-departments-thin"></i>
                            <span>Tất cả sản phẩm</span>
                        </button>
                        <ul id="menu-departments-menu" class="dropdown-menu yamm departments-menu-dropdown">
                            @foreach ($categories as $category)
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="{{ $category->name }}"
                                        href="{{ route('client.category.products', ['categoryId' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- .departments-menu -->

                    <form class="navbar-search" method="get" action="{{ route('client.product.search') }}">
                        <div class="input-group">
                            <input type="text" id="search"
                                class="form-control search-field product-search-field" name="s"
                                placeholder="Nhập sản phẩm muốn tìm" required />
                            <div class="input-group-btn input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                    <span class="search-btn">Tìm kiếm</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- .header-wishlist -->
                    <ul id="site-header-cart" class="site-header-cart menu">
                        <li class="animate-dropdown dropdown ">
                            <a class="cart-contents" href="" data-toggle="dropdown"
                                title="Kiểm tra giỏ hàng của bạn">
                                <i class="tm tm-shopping-bag"></i>
                                <span class="count">{{ $cartCount }}</span>
                                <span class="amount">
                                    <span class="price-label"><a href="{{ route('client.cart.index') }}">Giỏ
                                            hàng</a></span></span>
                            </a>
                            <!-- .dropdown-menu-mini-cart -->
                        </li>
                    </ul>
                    <!-- .site-header-cart -->
                </div>
                <!-- /.row -->
            </div>
            <!-- .col-full -->
            <div class="col-full handheld-only">
                <div class="handheld-header">
                    <div class="row">
                        <div class="site-branding">
                            <a href="{{ route('home') }}" class="custom-logo-link" rel="home">
                                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 176 28">
                                    <defs>
                                        <style>
                                            .cls-1,
                                            .cls-2 {
                                                fill: #333e48;
                                            }

                                            .cls-1 {
                                                fill-rule: evenodd;
                                            }

                                            .cls-3 {
                                                fill: #3265b0;
                                            }
                                        </style>
                                    </defs>
                                    <polygon class="cls-1"
                                        points="171.63 0.91 171.63 11 170.63 11 170.63 0.91 170.63 0.84 170.63 0.06 176 0.06 176 0.91 171.63 0.91" />
                                    <rect class="cls-2" x="166.19" y="0.06" width="3.47" height="0.84" />
                                    <rect class="cls-2" x="159.65" y="4.81" width="3.51" height="0.84" />
                                    <polygon class="cls-1"
                                        points="158.29 11 157.4 11 157.4 0.06 158.26 0.06 158.36 0.06 164.89 0.06 164.89 0.87 158.36 0.87 158.36 10.19 164.99 10.19 164.99 11 158.36 11 158.29 11" />
                                    <polygon class="cls-1"
                                        points="149.54 6.61 150.25 5.95 155.72 10.98 154.34 10.98 149.54 6.61" />
                                    <polygon class="cls-1"
                                        points="147.62 10.98 146.65 10.98 146.65 0.05 147.62 0.05 147.62 5.77 153.6 0.33 154.91 0.33 147.62 7.05 147.62 10.98" />
                                    <path class="cls-1"
                                        d="M156.39,24h-1.25s-0.49-.39-0.71-0.59l-1.35-1.25c-0.25-.23-0.68-0.66-0.68-0.66s0-.46,0-0.72a3.56,3.56,0,0,0,3.54-2.87,3.36,3.36,0,0,0-3.22-4H148.8V24h-1V13.06h5c2.34,0.28,4,1.72,4.12,4a4.26,4.26,0,0,1-3.38,4.34C154.48,22.24,156.39,24,156.39,24Z"
                                        transform="translate(-12 -13)" />
                                    <polygon class="cls-1"
                                        points="132.04 2.09 127.09 7.88 130.78 7.88 130.78 8.69 126.4 8.69 124.42 11 123.29 11 132.65 0 133.04 0 133.04 11 132.04 11 132.04 2.09" />
                                    <polygon class="cls-1"
                                        points="120.97 2.04 116.98 6.15 116.98 6.19 116.97 6.17 116.95 6.19 116.95 6.15 112.97 2.04 112.97 11 112 11 112 0 112.32 0 116.97 4.8 121.62 0 121.94 0 121.94 11 120.97 11 120.97 2.04" />
                                    <ellipse class="cls-3" cx="116.3" cy="22.81" rx="5.15"
                                        ry="5.18" />
                                    <rect class="cls-2" x="99.13" y="0.44" width="5.87" height="27.12" />
                                    <polygon class="cls-1"
                                        points="85.94 27.56 79.92 27.56 79.92 0.44 85.94 0.44 85.94 16.86 96.35 16.86 96.35 21.84 85.94 21.84 85.94 27.56" />
                                    <path class="cls-1"
                                        d="M77.74,36.07a9,9,0,0,0,6.41-2.68L88,37c-2.6,2.74-6.71,4-10.89,4A13.94,13.94,0,0,1,62.89,27.15,14.19,14.19,0,0,1,77.11,13c4.38,0,8.28,1.17,10.89,4,0,0-3.89,3.82-3.91,3.8A9,9,0,1,0,77.74,36.07Z"
                                        transform="translate(-12 -13)" />
                                    <rect class="cls-2" x="37.4" y="11.14" width="7.63" height="4.98" />
                                    <polygon class="cls-1"
                                        points="32.85 27.56 28.6 27.56 28.6 5.42 28.6 3.96 28.6 0.44 47.95 0.44 47.95 5.42 34.46 5.42 34.46 22.72 48.25 22.72 48.25 27.56 34.46 27.56 32.85 27.56" />
                                    <polygon class="cls-1"
                                        points="15.4 27.56 9.53 27.56 9.53 5.57 9.53 0.59 9.53 0.44 24.93 0.44 24.93 5.57 15.4 5.57 15.4 27.56" />
                                    <rect class="cls-2" y="0.44" width="7.19" height="5.13" />
                                </svg>
                            </a>
                            <!-- /.custom-logo-link -->
                        </div>
                        <!-- /.site-branding -->
                        <!-- ============================================================= End Header Logo ============================= -->
                        <div class="handheld-header-links">
                            <ul class="columns-3">
                                <li class="my-account">
                                    <a href="login-and-register.html" class="has-icon">
                                        <i class="tm tm-login-register"></i>
                                    </a>
                                </li>
                                <li class="wishlist">
                                    <a href="wishlist.html" class="has-icon">
                                        <i class="tm tm-favorites"></i>
                                        <span class="count">3</span>
                                    </a>
                                </li>
                                <li class="compare">
                                    <a href="compare.html" class="has-icon">
                                        <i class="tm tm-compare"></i>
                                        <span class="count">3</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- .columns-3 -->
                        </div>
                        <!-- .handheld-header-links -->
                    </div>
                    <!-- /.row -->
                    <div class="techmarket-sticky-wrap">
                        <div class="row">
                            <nav id="handheld-navigation" class="handheld-navigation"
                                aria-label="Handheld Navigation">
                                <button class="btn navbar-toggler" type="button">
                                    <i class="tm tm-departments-thin"></i>
                                    <span>Menu</span>
                                </button>
                                <div class="handheld-navigation-menu">
                                    <span class="tmhm-close">Close</span>
                                    <ul id="menu-departments-menu-1" class="nav">
                                        <li class="highlight menu-item animate-dropdown">
                                            @foreach ($categories as $category)
                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="{{ $category->name }}"
                                                href="{{ route('client.product.index') }}">{{ $category->name }}</a>
                                            @endforeach
                                    </ul>
                                </div>
                                <!-- .handheld-navigation-menu -->
                            </nav>
                            <!-- .handheld-navigation -->
                            <div class="site-search">
                                <div class="widget woocommerce widget_product_search">
                                    <form role="search" method="get" class="woocommerce-product-search"
                                        action="home-v1.html">
                                        <label class="screen-reader-text"
                                            for="woocommerce-product-search-field-0">Search for:</label>
                                        <input type="search" id="woocommerce-product-search-field-0"
                                            class="search-field" placeholder="Nhập sản phẩm muốn tìm kiếm"
                                            value="" name="s" />
                                        <input type="submit" value="Search" />
                                        <input type="hidden" name="post_type" value="product" />
                                    </form>
                                </div>
                                <!-- .widget -->
                            </div>
                            <!-- .site-search -->
                            <a class="handheld-header-cart-link has-icon" href="cart.html"
                                title="View your shopping cart">
                                <i class="tm tm-shopping-bag"></i>
                                <span class="count">2</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ============================= Header End ============================= -->
        @yield('main')
        @yield('loading')
        <!-- Icon mở chat -->
        <div id="chat-icon" class="real-time-icon">
            {{-- <img src="{{ asset('images/messenger-icon.png') }}" width="50" height="50" alt="Chat"> --}}
            <i class="bi bi-chat-dots-fill"></i>
        </div>
        <!-- Modal Chat -->
        <div id="chat-modal" class="real-time-box">
            <div class="real-time-title">
                <span>Hỗ trợ khách hàng</span>
                <span id="close-chat" class="real-time-close">&times;</span>
            </div>
            <div id="chat-messages" class="real-time-content">
            </div>
            <div class="real-time-sent-content">
                <input type="text" id="chat-input" placeholder="Nhập tin nhắn...">
                <button id="send-message">Gửi</button>
            </div>

        </div>
        <!-- #content -->
        <footer class="site-footer footer-v1">
            <div class="col-full">
                <div class="before-footer-wrap">
                    <div class="col-full">
                        <div class="footer-widgets-block">
                            <div class="row">
                                <div class="footer-contact">
                                    <div class="footer-logo">
                                        <a href="{{ route('home') }}" class="custom-logo-link" rel="home">
                                            <img src="{{ url('') }}/admin/assets/images/config/{{$config->logo}}"
                                                alt="">
                                        </a>
                                    </div>
                                    <!-- .footer-logo -->
                                    <div class="contact-payment-wrap">
                                        <div class="footer-contact-info">
                                            <div class="media">
                                                <span class="media-left icon media-middle">
                                                    <i class="tm tm-call-us-footer"></i>
                                                </span>
                                                <div class="media-body">
                                                    <span class="call-us-title">Liên hệ với chúng tôi</span>
                                                    <span class="call-us-text">{{ $config->hotline }}</span>
                                                    <address class="footer-contact-address">{{ $config->address }}
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-widgets">
                                    <div class="row">
                                        <!-- Cột 1: Các danh mục -->
                                        <div class="col-md-4">
                                            <aside class="widget clearfix">
                                                <div class="body">
                                                    <h4 class="widget-title">Các danh mục</h4>
                                                    <div class="menu-footer-menu-1-container">
                                                        <ul id="menu-footer-menu-1" class="menu">
                                                            @foreach ($categories as $category)

                                                            <li class="menu-item">
                                                                <a title="{{ $category->name }}"
                                                                    href="{{ route('client.category.products', ['categoryId' => $category->id]) }}">{{ $category->name }}</a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                
                                        <!-- Cột 2: Hỗ trợ - Dịch vụ -->
                                        <div class="col-md-4">
                                            <aside class="widget clearfix">
                                                <div class="body">
                                                    <h4 class="widget-title">Hỗ trợ - Dịch vụ</h4>
                                                    <div class="menu-footer-menu-2-container">
                                                        <ul id="menu-footer-menu-2" class="menu">
                                                            <li class="menu-item">
                                                                <a href="{{ route('client.about.about') }}">Về chúng tôi</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="{{route('contact')}}">Liên hệ</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="{{ route('blog') }}">Tin tức</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                
                                        <!-- Cột 3: Địa chỉ -->
                                        <div class="col-md-4 text-end">
                                            <aside class="widget clearfix">
                                                <div class="body">
                                                    <h4 class="widget-title">
                                                        <a href="https://caodang.fpt.edu.vn" class="footer-address-map-link">
                                                            <i class="tm tm-map-marker"> </i> Địa chỉ
                                                        </a>
                                                    </h4>
                                                    {!! $config->map !!}
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
        </footer>
    </div>
    <script>
        document.querySelector('.user-menu-toggle').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('userDropdownMenu');
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
        window.addEventListener('click', function(e) {
            if (!e.target.matches('.user-menu-toggle') && !e.target.closest('.user-menu')) {
                document.getElementById('userDropdownMenu').style.display = 'none';
            }
        });
    </script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/tether.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/hidemaxlistitem.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/hidemaxlistitem.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/scrollup.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/waypoints-sticky.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/pace.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/slick.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/home/assets/js/scripts.js"></script>
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite(['resources/js/app.js'])
    <script>
        var sendMessageUrl = "{{ route('client.message.send') }}";
        var loadMessagesUrl = "{{ route('client.message.load') }}";
        var currentUserId = "{{ auth()->id() ?? null }}"
        var guestId = "{{ session()->getId() }}";
        var userRole = document.querySelector('meta[name="user-role"]').getAttribute("content");

        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('client.product.search') }}",
                        type: "GET",
                        data: {
                            s: query
                        },
                        success: function(data) {
                            let dropdown = $('#search-dropdown');
                            dropdown.empty(); // Xóa dữ liệu cũ

                            if (data.length > 0) {
                                data.forEach(product => {
                                    dropdown.append(`
                                    <li class="list-group-item">
                                        <a href="/products/${product.slug}" class="d-flex align-items-center">
                                            <img src="{{ url('') }}/admin/assets/images/product/${product.img}" 
                                                 class="me-2" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span>${product.name}</span>
                                        </a>
                                    </li>
                                `);
                                });
                                dropdown.show();
                            } else {
                                dropdown.hide();
                            }
                        }
                    });
                } else {
                    $('#search-dropdown').hide();
                }
            });

            $(document).click(function(e) {
                if (!$(e.target).closest("#search-form").length) {
                    $("#search-dropdown").hide();
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pusher.logToConsole = true;
            console.log("Lắng nghe kênh: admin.blocked." + currentUserId);

            window.Echo.channel('admin.blocked.' + currentUserId)
                .listen("UserBlocked", (event) => {
                    console.log("Tài khoản bị khóa:", event);

                    if (event.userId == currentUserId) {
                        window.location.href = "{{ route('home') }}";
                    }
                })
                .error((error) => {
                    console.error("Lỗi khi nhận sự kiện:", error);
                });
        });
    </script>





    <script type="text/javascript" src="{{ url('') }}/home/assets/js/chat.js"></script>
    @yield('cartScripts');

</body>

</html>
