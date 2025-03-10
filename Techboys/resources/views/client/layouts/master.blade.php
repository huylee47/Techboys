<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/bootstrap.min.css" media="all" />
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
    <link rel="shortcut icon" href="{{ url('') }}/home/assets/images/fav-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ url('') }}/home/assets/images/fav-icon.png">

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
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
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

        .dropdown-menu li a p {
            margin: 0;
            padding: 5px;

        }
    </style>
    @yield('styles')
</head>

<body class="page-template-default error-page woocommerce-active single-product full-width normal">
    <div id="page" class="hfeed site">
        <div class="top-bar top-bar-v1">
            <div class="col-full">
                <ul id="menu-top-bar-left" class="nav justify-content-center">
                    <li class="menu-item animate-dropdown">
                        <a title="Techboys - Always free delivery" href="contact-v1.html">Techboys &#8211; Lựa chọn tối
                            ưu</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Sản phẩm chất lượng" href="shop.html">Sản phẩm chất lượng</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Hỗ trợ nhanh chóng" href="track-your-order.html">Hỗ trợ nhanh chóng</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Không thu phụ phí" href="contact-v2.html">Không thu phụ phí</a>
                    </li>
                </ul>
                <!-- .nav -->
            </div>
            <!-- .col-full -->
        </div>
        <!-- .top-bar-v1 -->
        <header id="masthead" class="site-header header-v1" style="background-image: none; ">
            <div class="col-full desktop-only">
                <div class="techmarket-sticky-wrap">
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
                        <!-- ============================================================= End Header Logo ============================================================= -->
                        <nav id="primary-navigation" class="primary-navigation" aria-label="Primary Navigation"
                            data-nav="flex-menu">
                            <ul id="menu-primary-menu" class="nav yamm">
                                <li class="sale-clr yamm-fw menu-item animate-dropdown">
                                    <a title="Super deals" href="product-category.html">Sản phẩm hot</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="about us" href="product-category.html">Về chúng tôi</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Headphones Sale" href="product-category.html">Liên hệ</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Headphones Sale" href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li class="techmarket-flex-more-menu-item dropdown">
                                    <a title="..." href="#" data-toggle="dropdown"
                                        class="dropdown-toggle">...</a>
                                    <ul class="overflow-items dropdown-menu"></ul>
                                    <!-- . -->
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
                                    <a title="Track Your Order" href="track-your-order.html">
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
                <!-- .techmarket-sticky-wrap -->
                <div class="row align-items-center">
                    <div id="departments-menu" class="dropdown departments-menu">
                        <button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="tm tm-departments-thin"></i>
                            <span>Tất cả sản phẩm</span>
                        </button>
                        <ul id="menu-departments-menu" class="dropdown-menu yamm departments-menu-dropdown">
                            <li class="highlight menu-item animate-dropdown">
                                <a title="Value of the Day" href="home-v2.html">Value of the Day</a>
                            </li>
                            <li class="highlight menu-item animate-dropdown">
                                <a title="Top 100 Offers" href="home-v3.html">Top 100 Offers</a>
                            </li>
                            <li class="highlight menu-item animate-dropdown">
                                <a title="New Arrivals" href="home-v4.html">New Arrivals</a>
                            </li>
                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                <a title="Computers &amp; Laptops" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true" href="#">Computers &#038; Laptops <span
                                        class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                        <div class="yamm-content">
                                            <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                <div class="kc-col-container">
                                                    <div class="kc_single_image">
                                                        <img src="{{ asset('home/assets/images/megamenu.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <!-- .kc_single_image -->
                                                </div>
                                                <!-- .kc-col-container -->
                                            </div>
                                            <!-- .bg-yamm-content -->
                                            <div class="row yamm-content-row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Computers &amp; Accessories</li>
                                                                <li><a href="shop.html">All Computers &amp;
                                                                        Accessories</a></li>
                                                                <li><a href="shop.html">Laptops, Desktops &amp;
                                                                        Monitors</a></li>
                                                                <li><a href="shop.html">Pen Drives, Hard Drives &amp;
                                                                        Memory Cards</a></li>
                                                                <li><a href="shop.html">Printers &amp; Ink</a></li>
                                                                <li><a href="shop.html">Networking &amp; Internet
                                                                        Devices</a></li>
                                                                <li><a href="shop.html">Computer Accessories</a></li>
                                                                <li><a href="shop.html">Software</a></li>
                                                                <li class="nav-divider"></li>
                                                                <li>
                                                                    <a href="shop.html">
                                                                        <span class="nav-text">All Electronics</span>
                                                                        <span class="nav-subtext">Discover more
                                                                            products</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Office &amp; Stationery</li>
                                                                <li><a href="shop.html">All Office &amp; Stationery</a>
                                                                </li>
                                                                <li><a href="shop.html">Pens &amp; Writing</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                            </div>
                                            <!-- .kc_row -->
                                        </div>
                                        <!-- .yamm-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                <a title="Cameras &amp; Photo" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true" href="#">Cameras &#038; Photo <span
                                        class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                        <div class="yamm-content">
                                            <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                <div class="kc-col-container">
                                                    <div class="kc_single_image">
                                                        <img src="{{ asset('home/assets/images/megamenu-1.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <!-- .kc_single_image -->
                                                </div>
                                                <!-- .kc-col-container -->
                                            </div>
                                            <!-- .bg-yamm-content -->
                                            <div class="row yamm-content-row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Cameras & Photography</li>
                                                                <li><a href="shop.html">All Cameras & Photography</a>
                                                                </li>
                                                                <li><a href="shop.html">Point & Shoot Cameras</a></li>
                                                                <li><a href="shop.html">Lenses</a></li>
                                                                <li><a href="shop.html">Camera Accessories</a></li>
                                                                <li><a href="shop.html">Security & Surveillance</a>
                                                                </li>
                                                                <li><a href="shop.html">Binoculars & Telescopes</a>
                                                                </li>
                                                                <li><a href="shop.html">Camcorders</a></li>
                                                                <li class="nav-divider"></li>
                                                                <li>
                                                                    <a href="shop.html">
                                                                        <span class="nav-text">All Electronics</span>
                                                                        <span class="nav-subtext">Discover more
                                                                            products</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Audio & Video</li>
                                                                <li><a href="shop.html">All Audio & Video</a></li>
                                                                <li><a href="shop.html">Headphones & Speakers</a></li>
                                                                <li><a href="shop.html">Home Entertainment Systems</a>
                                                                </li>
                                                                <li><a href="shop.html">MP3 & Media Players</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                            </div>
                                            <!-- .kc_row -->
                                        </div>
                                        <!-- .yamm-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                <a title="Smart Phones &amp; Tablets" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true" href="#">Smart Phones &#038; Tablets <span
                                        class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                        <div class="yamm-content">
                                            <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                <div class="kc-col-container">
                                                    <div class="kc_single_image">
                                                        <img src="{{ asset('home/assets/images/megamenu.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <!-- .kc_single_image -->
                                                </div>
                                                <!-- .kc-col-container -->
                                            </div>
                                            <!-- .bg-yamm-content -->
                                            <div class="row yamm-content-row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Computers &amp; Accessories</li>
                                                                <li><a href="shop.html">All Computers &amp;
                                                                        Accessories</a></li>
                                                                <li><a href="shop.html">Laptops, Desktops &amp;
                                                                        Monitors</a></li>
                                                                <li><a href="shop.html">Pen Drives, Hard Drives &amp;
                                                                        Memory Cards</a></li>
                                                                <li><a href="shop.html">Printers &amp; Ink</a></li>
                                                                <li><a href="shop.html">Networking &amp; Internet
                                                                        Devices</a></li>
                                                                <li><a href="shop.html">Computer Accessories</a></li>
                                                                <li><a href="shop.html">Software</a></li>
                                                                <li class="nav-divider"></li>
                                                                <li>
                                                                    <a href="shop.html">
                                                                        <span class="nav-text">All Electronics</span>
                                                                        <span class="nav-subtext">Discover more
                                                                            products</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Office &amp; Stationery</li>
                                                                <li><a href="shop.html">All Office &amp; Stationery</a>
                                                                </li>
                                                                <li><a href="shop.html">Pens &amp; Writing</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                            </div>
                                            <!-- .kc_row -->
                                        </div>
                                        <!-- .yamm-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                <a title="Video Games &amp; Consoles" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true" href="#">Video Games &#038; Consoles <span
                                        class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                        <div class="yamm-content">
                                            <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                <div class="kc-col-container">
                                                    <div class="kc_single_image">
                                                        <img src="{{ asset('home/assets/images/megamenu-1.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <!-- .kc_single_image -->
                                                </div>
                                                <!-- .kc-col-container -->
                                            </div>
                                            <!-- .bg-yamm-content -->
                                            <div class="row yamm-content-row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Cameras & Photography</li>
                                                                <li><a href="shop.html">All Cameras & Photography</a>
                                                                </li>
                                                                <li><a href="shop.html">Point & Shoot Cameras</a></li>
                                                                <li><a href="shop.html">Lenses</a></li>
                                                                <li><a href="shop.html">Camera Accessories</a></li>
                                                                <li><a href="shop.html">Security & Surveillance</a>
                                                                </li>
                                                                <li><a href="shop.html">Binoculars & Telescopes</a>
                                                                </li>
                                                                <li><a href="shop.html">Camcorders</a></li>
                                                                <li class="nav-divider"></li>
                                                                <li>
                                                                    <a href="shop.html">
                                                                        <span class="nav-text">All Electronics</span>
                                                                        <span class="nav-subtext">Discover more
                                                                            products</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Audio & Video</li>
                                                                <li><a href="shop.html">All Audio & Video</a></li>
                                                                <li><a href="shop.html">Headphones & Speakers</a></li>
                                                                <li><a href="shop.html">Home Entertainment Systems</a>
                                                                </li>
                                                                <li><a href="shop.html">MP3 & Media Players</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                            </div>
                                            <!-- .kc_row -->
                                        </div>
                                        <!-- .yamm-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                <a title="TV &amp; Audio" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true" href="#">TV &#038; Audio <span
                                        class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                        <div class="yamm-content">
                                            <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                <div class="kc-col-container">
                                                    <div class="kc_single_image">
                                                        <img src="{{ asset('home/assets/images/megamenu.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <!-- .kc_single_image -->
                                                </div>
                                                <!-- .kc-col-container -->
                                            </div>
                                            <!-- .bg-yamm-content -->
                                            <div class="row yamm-content-row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Computers &amp; Accessories</li>
                                                                <li><a href="shop.html">All Computers &amp;
                                                                        Accessories</a></li>
                                                                <li><a href="shop.html">Laptops, Desktops &amp;
                                                                        Monitors</a></li>
                                                                <li><a href="shop.html">Pen Drives, Hard Drives &amp;
                                                                        Memory Cards</a></li>
                                                                <li><a href="shop.html">Printers &amp; Ink</a></li>
                                                                <li><a href="shop.html">Networking &amp; Internet
                                                                        Devices</a></li>
                                                                <li><a href="shop.html">Computer Accessories</a></li>
                                                                <li><a href="shop.html">Software</a></li>
                                                                <li class="nav-divider"></li>
                                                                <li>
                                                                    <a href="shop.html">
                                                                        <span class="nav-text">All Electronics</span>
                                                                        <span class="nav-subtext">Discover more
                                                                            products</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Office &amp; Stationery</li>
                                                                <li><a href="shop.html">All Office &amp; Stationery</a>
                                                                </li>
                                                                <li><a href="shop.html">Pens &amp; Writing</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                            </div>
                                            <!-- .kc_row -->
                                        </div>
                                        <!-- .yamm-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                <a title="Car Electronic &amp; GPS" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true" href="#">Car Electronic &#038; GPS <span
                                        class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                        <div class="yamm-content">
                                            <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                <div class="kc-col-container">
                                                    <div class="kc_single_image">
                                                        <img src="{{ asset('home/assets/images/megamenu-1.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <!-- .kc_single_image -->
                                                </div>
                                                <!-- .kc-col-container -->
                                            </div>
                                            <!-- .bg-yamm-content -->
                                            <div class="row yamm-content-row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Cameras & Photography</li>
                                                                <li><a href="shop.html">All Cameras & Photography</a>
                                                                </li>
                                                                <li><a href="shop.html">Point & Shoot Cameras</a></li>
                                                                <li><a href="shop.html">Lenses</a></li>
                                                                <li><a href="shop.html">Camera Accessories</a></li>
                                                                <li><a href="shop.html">Security & Surveillance</a>
                                                                </li>
                                                                <li><a href="shop.html">Binoculars & Telescopes</a>
                                                                </li>
                                                                <li><a href="shop.html">Camcorders</a></li>
                                                                <li class="nav-divider"></li>
                                                                <li>
                                                                    <a href="shop.html">
                                                                        <span class="nav-text">All Electronics</span>
                                                                        <span class="nav-subtext">Discover more
                                                                            products</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Audio & Video</li>
                                                                <li><a href="shop.html">All Audio & Video</a></li>
                                                                <li><a href="shop.html">Headphones & Speakers</a></li>
                                                                <li><a href="shop.html">Home Entertainment Systems</a>
                                                                </li>
                                                                <li><a href="shop.html">MP3 & Media Players</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                            </div>
                                            <!-- .kc_row -->
                                        </div>
                                        <!-- .yamm-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                <a title="Accesories" data-toggle="dropdown" class="dropdown-toggle"
                                    aria-haspopup="true" href="#">Accesories <span class="caret"></span></a>
                                <ul role="menu" class=" dropdown-menu">
                                    <li class="menu-item menu-item-object-static_block animate-dropdown">
                                        <div class="yamm-content">
                                            <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                <div class="kc-col-container">
                                                    <div class="kc_single_image">
                                                        <img src="{{ asset('home/assets/images/megamenu.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <!-- .kc_single_image -->
                                                </div>
                                                <!-- .kc-col-container -->
                                            </div>
                                            <!-- .bg-yamm-content -->
                                            <div class="row yamm-content-row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Computers &amp; Accessories</li>
                                                                <li><a href="shop.html">All Computers &amp;
                                                                        Accessories</a></li>
                                                                <li><a href="shop.html">Laptops, Desktops &amp;
                                                                        Monitors</a></li>
                                                                <li><a href="shop.html">Pen Drives, Hard Drives &amp;
                                                                        Memory Cards</a></li>
                                                                <li><a href="shop.html">Printers &amp; Ink</a></li>
                                                                <li><a href="shop.html">Networking &amp; Internet
                                                                        Devices</a></li>
                                                                <li><a href="shop.html">Computer Accessories</a></li>
                                                                <li><a href="shop.html">Software</a></li>
                                                                <li class="nav-divider"></li>
                                                                <li>
                                                                    <a href="shop.html">
                                                                        <span class="nav-text">All Electronics</span>
                                                                        <span class="nav-subtext">Discover more
                                                                            products</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="kc-col-container">
                                                        <div class="kc_text_block">
                                                            <ul>
                                                                <li class="nav-title">Office &amp; Stationery</li>
                                                                <li><a href="shop.html">All Office &amp; Stationery</a>
                                                                </li>
                                                                <li><a href="shop.html">Pens &amp; Writing</a></li>
                                                            </ul>
                                                        </div>
                                                        <!-- .kc_text_block -->
                                                    </div>
                                                    <!-- .kc-col-container -->
                                                </div>
                                                <!-- .kc_column -->
                                            </div>
                                            <!-- .kc_row -->
                                        </div>
                                        <!-- .yamm-content -->
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-type-custom animate-dropdown">
                                <a title="Gadgets" href="landing-page-v1.html">Gadgets</a>
                            </li>
                            <li class="menu-item menu-item-type-custom animate-dropdown">
                                <a title="Virtual Reality" href="landing-page-v2.html">Virtual Reality</a>
                            </li>
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

                    <!-- .navbar-search -->
                    {{-- <ul class="header-compare nav navbar-nav">
                        <li class="nav-item">
                            <a href="compare.html" class="nav-link">
                                <i class="tm tm-compare"></i>
                                <span id="top-cart-compare-count" class="value">3</span>
                            </a>
                        </li>
                    </ul> --}}
                    <!-- .header-compare -->
                    {{-- <ul class="header-wishlist nav navbar-nav">
                        <li class="nav-item">
                            <a href="wishlist.html" class="nav-link">
                                <i class="tm tm-favorites"></i>
                                <span id="top-cart-wishlist-count" class="value">3</span>
                            </a>
                        </li>
                    </ul> --}}
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
                            {{-- <ul class="dropdown-menu dropdown-menu-mini-cart">
                                <li>
                                    <div class="widget woocommerce widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                <li class="woocommerce-mini-cart-item mini_cart_item">
                                                    <a href="#" class="remove" aria-label="Remove this item"
                                                        data-product_id="65" data-product_sku="">×</a>
                                                    <a href="single-product-sidebar.html">
                                                        <img src="{{asset('home/assets/images/products/mini-cart1.jpg')  }}"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                            alt="">XONE Wireless Controller&nbsp;
                                                    </a>
                                                    <span class="quantity">1 ×
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>64.99</span>
                                                    </span>
                                                </li>
                                                <li class="woocommerce-mini-cart-item mini_cart_item">
                                                    <a href="#" class="remove" aria-label="Remove this item"
                                                        data-product_id="27" data-product_sku="">×</a>
                                                    <a href="single-product-sidebar.html">
                                                        <img src="{{asset('home/assets/images/products/mini-cart2.jpg')  }}"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                            alt="">Gear Virtual Reality 3D with Bluetooth Glasses&nbsp;
                                                    </a>
                                                    <span class="quantity">1 ×
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>72.00</span>
                                                    </span>
                                                </li>
                                            </ul>
                                            <!-- .cart_list -->
                                            <p class="woocommerce-mini-cart__total total">
                                                <strong>Subtotal:</strong>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol">$</span>136.99</span>
                                            </p>
                                            <p class="woocommerce-mini-cart__buttons buttons">
                                                <a href="cart.html" class="button wc-forward">View cart</a>
                                                <a href="checkout.html" class="button checkout wc-forward">Checkout</a>
                                            </p>
                                        </div>
                                        <!-- .widget_shopping_cart_content -->
                                    </div>
                                    <!-- .widget_shopping_cart -->
                                </li>
                            </ul> --}}
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
                        <!-- ============================================================= End Header Logo ============================================================= -->
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
                                            <a title="Value of the Day" href="shop.html">Value of the Day</a>
                                        </li>
                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="Top 100 Offers" href="shop.html">Top 100 Offers</a>
                                        </li>
                                        <li class="highlight menu-item animate-dropdown">
                                            <a title="New Arrivals" href="shop.html">New Arrivals</a>
                                        </li>
                                        <li
                                            class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                            <a title="Computers &amp; Laptops" data-toggle="dropdown"
                                                class="dropdown-toggle" aria-haspopup="true" href="#">Computers
                                                &#038;
                                                Laptops <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="{{ asset('home/assets/images/megamenu.jpg') }}"
                                                                        class="" alt="" />
                                                                </div>
                                                                <!-- .kc_single_image -->
                                                            </div>
                                                            <!-- .kc-col-container -->
                                                        </div>
                                                        <!-- .bg-yamm-content -->
                                                        <div class="row yamm-content-row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Computers &amp;
                                                                                Accessories</li>
                                                                            <li><a href="shop.html">All Computers &amp;
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Laptops, Desktops
                                                                                    &amp; Monitors</a></li>
                                                                            <li><a href="shop.html">Pen Drives, Hard
                                                                                    Drives &amp; Memory Cards</a></li>
                                                                            <li><a href="shop.html">Printers &amp;
                                                                                    Ink</a></li>
                                                                            <li><a href="shop.html">Networking &amp;
                                                                                    Internet Devices</a></li>
                                                                            <li><a href="shop.html">Computer
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Software</a></li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="shop.html">
                                                                                    <span class="nav-text">All
                                                                                        Electronics</span>
                                                                                    <span class="nav-subtext">Discover
                                                                                        more products</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Office &amp;
                                                                                Stationery</li>
                                                                            <li><a href="shop.html">All Office &amp;
                                                                                    Stationery</a></li>
                                                                            <li><a href="shop.html">Pens &amp;
                                                                                    Writing</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                        </div>
                                                        <!-- .kc_row -->
                                                    </div>
                                                    <!-- .yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                            <a title="Cameras &amp; Photo" data-toggle="dropdown"
                                                class="dropdown-toggle" aria-haspopup="true" href="#">Cameras
                                                &#038;
                                                Photo <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="{{ asset('home/assets/images/megamenu-1.jpg') }}"
                                                                        class="" alt="" />
                                                                </div>
                                                                <!-- .kc_single_image -->
                                                            </div>
                                                            <!-- .kc-col-container -->
                                                        </div>
                                                        <!-- .bg-yamm-content -->
                                                        <div class="row yamm-content-row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Cameras & Photography
                                                                            </li>
                                                                            <li><a href="shop.html">All Cameras &
                                                                                    Photography</a></li>
                                                                            <li><a href="shop.html">Point & Shoot
                                                                                    Cameras</a></li>
                                                                            <li><a href="shop.html">Lenses</a></li>
                                                                            <li><a href="shop.html">Camera
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Security &
                                                                                    Surveillance</a></li>
                                                                            <li><a href="shop.html">Binoculars &
                                                                                    Telescopes</a></li>
                                                                            <li><a href="shop.html">Camcorders</a></li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="shop.html">
                                                                                    <span class="nav-text">All
                                                                                        Electronics</span>
                                                                                    <span class="nav-subtext">Discover
                                                                                        more products</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Audio & Video</li>
                                                                            <li><a href="shop.html">All Audio &
                                                                                    Video</a></li>
                                                                            <li><a href="shop.html">Headphones &
                                                                                    Speakers</a></li>
                                                                            <li><a href="shop.html">Home Entertainment
                                                                                    Systems</a></li>
                                                                            <li><a href="shop.html">MP3 & Media
                                                                                    Players</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                        </div>
                                                        <!-- .kc_row -->
                                                    </div>
                                                    <!-- .yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                            <a title="Smart Phones &amp; Tablets" data-toggle="dropdown"
                                                class="dropdown-toggle" aria-haspopup="true" href="#">Smart
                                                Phones
                                                &#038; Tablets <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="{{ asset('home/assets/images/megamenu.jpg') }}"
                                                                        class="" alt="" />
                                                                </div>
                                                                <!-- .kc_single_image -->
                                                            </div>
                                                            <!-- .kc-col-container -->
                                                        </div>
                                                        <!-- .bg-yamm-content -->
                                                        <div class="row yamm-content-row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Computers &amp;
                                                                                Accessories</li>
                                                                            <li><a href="shop.html">All Computers &amp;
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Laptops, Desktops
                                                                                    &amp; Monitors</a></li>
                                                                            <li><a href="shop.html">Pen Drives, Hard
                                                                                    Drives &amp; Memory Cards</a></li>
                                                                            <li><a href="shop.html">Printers &amp;
                                                                                    Ink</a></li>
                                                                            <li><a href="shop.html">Networking &amp;
                                                                                    Internet Devices</a></li>
                                                                            <li><a href="shop.html">Computer
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Software</a></li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="shop.html">
                                                                                    <span class="nav-text">All
                                                                                        Electronics</span>
                                                                                    <span class="nav-subtext">Discover
                                                                                        more products</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Office &amp;
                                                                                Stationery</li>
                                                                            <li><a href="shop.html">All Office &amp;
                                                                                    Stationery</a></li>
                                                                            <li><a href="shop.html">Pens &amp;
                                                                                    Writing</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                        </div>
                                                        <!-- .kc_row -->
                                                    </div>
                                                    <!-- .yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                            <a title="Video Games &amp; Consoles" data-toggle="dropdown"
                                                class="dropdown-toggle" aria-haspopup="true" href="#">Video
                                                Games &#038;
                                                Consoles <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="{{ asset('home/assets/images/megamenu-1.jpg') }}"
                                                                        class="" alt="" />
                                                                </div>
                                                                <!-- .kc_single_image -->
                                                            </div>
                                                            <!-- .kc-col-container -->
                                                        </div>
                                                        <!-- .bg-yamm-content -->
                                                        <div class="row yamm-content-row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Cameras & Photography
                                                                            </li>
                                                                            <li><a href="shop.html">All Cameras &
                                                                                    Photography</a></li>
                                                                            <li><a href="shop.html">Point & Shoot
                                                                                    Cameras</a></li>
                                                                            <li><a href="shop.html">Lenses</a></li>
                                                                            <li><a href="shop.html">Camera
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Security &
                                                                                    Surveillance</a></li>
                                                                            <li><a href="shop.html">Binoculars &
                                                                                    Telescopes</a></li>
                                                                            <li><a href="shop.html">Camcorders</a></li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="shop.html">
                                                                                    <span class="nav-text">All
                                                                                        Electronics</span>
                                                                                    <span class="nav-subtext">Discover
                                                                                        more products</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Audio & Video</li>
                                                                            <li><a href="shop.html">All Audio &
                                                                                    Video</a></li>
                                                                            <li><a href="shop.html">Headphones &
                                                                                    Speakers</a></li>
                                                                            <li><a href="shop.html">Home Entertainment
                                                                                    Systems</a></li>
                                                                            <li><a href="shop.html">MP3 & Media
                                                                                    Players</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                        </div>
                                                        <!-- .kc_row -->
                                                    </div>
                                                    <!-- .yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                            <a title="TV &amp; Audio" data-toggle="dropdown" class="dropdown-toggle"
                                                aria-haspopup="true" href="#">TV &#038; Audio <span
                                                    class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="{{ asset('home/assets/images/megamenu.jpg') }}"
                                                                        class="" alt="" />
                                                                </div>
                                                                <!-- .kc_single_image -->
                                                            </div>
                                                            <!-- .kc-col-container -->
                                                        </div>
                                                        <!-- .bg-yamm-content -->
                                                        <div class="row yamm-content-row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Computers &amp;
                                                                                Accessories</li>
                                                                            <li><a href="shop.html">All Computers &amp;
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Laptops, Desktops
                                                                                    &amp; Monitors</a></li>
                                                                            <li><a href="shop.html">Pen Drives, Hard
                                                                                    Drives &amp; Memory Cards</a></li>
                                                                            <li><a href="shop.html">Printers &amp;
                                                                                    Ink</a></li>
                                                                            <li><a href="shop.html">Networking &amp;
                                                                                    Internet Devices</a></li>
                                                                            <li><a href="shop.html">Computer
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Software</a></li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="shop.html">
                                                                                    <span class="nav-text">All
                                                                                        Electronics</span>
                                                                                    <span class="nav-subtext">Discover
                                                                                        more products</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Office &amp;
                                                                                Stationery</li>
                                                                            <li><a href="shop.html">All Office &amp;
                                                                                    Stationery</a></li>
                                                                            <li><a href="shop.html">Pens &amp;
                                                                                    Writing</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                        </div>
                                                        <!-- .kc_row -->
                                                    </div>
                                                    <!-- .yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                            <a title="Car Electronic &amp; GPS" data-toggle="dropdown"
                                                class="dropdown-toggle" aria-haspopup="true" href="#">Car
                                                Electronic
                                                &#038; GPS <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="{{ asset('home/assets/images/megamenu-1.jpg') }}"
                                                                        class="" alt="" />
                                                                </div>
                                                                <!-- .kc_single_image -->
                                                            </div>
                                                            <!-- .kc-col-container -->
                                                        </div>
                                                        <!-- .bg-yamm-content -->
                                                        <div class="row yamm-content-row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Cameras & Photography
                                                                            </li>
                                                                            <li><a href="shop.html">All Cameras &
                                                                                    Photography</a></li>
                                                                            <li><a href="shop.html">Point & Shoot
                                                                                    Cameras</a></li>
                                                                            <li><a href="shop.html">Lenses</a></li>
                                                                            <li><a href="shop.html">Camera
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Security &
                                                                                    Surveillance</a></li>
                                                                            <li><a href="shop.html">Binoculars &
                                                                                    Telescopes</a></li>
                                                                            <li><a href="shop.html">Camcorders</a></li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="shop.html">
                                                                                    <span class="nav-text">All
                                                                                        Electronics</span>
                                                                                    <span class="nav-subtext">Discover
                                                                                        more products</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Audio & Video</li>
                                                                            <li><a href="shop.html">All Audio &
                                                                                    Video</a></li>
                                                                            <li><a href="shop.html">Headphones &
                                                                                    Speakers</a></li>
                                                                            <li><a href="shop.html">Home Entertainment
                                                                                    Systems</a></li>
                                                                            <li><a href="shop.html">MP3 & Media
                                                                                    Players</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                        </div>
                                                        <!-- .kc_row -->
                                                    </div>
                                                    <!-- .yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                        <li
                                            class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                            <a title="Accesories" data-toggle="dropdown" class="dropdown-toggle"
                                                aria-haspopup="true" href="#">Accesories <span
                                                    class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="{{ asset('home/assets/images/megamenu.jpg') }}"
                                                                        class="" alt="" />
                                                                </div>
                                                                <!-- .kc_single_image -->
                                                            </div>
                                                            <!-- .kc-col-container -->
                                                        </div>
                                                        <!-- .bg-yamm-content -->
                                                        <div class="row yamm-content-row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Computers &amp;
                                                                                Accessories</li>
                                                                            <li><a href="shop.html">All Computers &amp;
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Laptops, Desktops
                                                                                    &amp; Monitors</a></li>
                                                                            <li><a href="shop.html">Pen Drives, Hard
                                                                                    Drives &amp; Memory Cards</a></li>
                                                                            <li><a href="shop.html">Printers &amp;
                                                                                    Ink</a></li>
                                                                            <li><a href="shop.html">Networking &amp;
                                                                                    Internet Devices</a></li>
                                                                            <li><a href="shop.html">Computer
                                                                                    Accessories</a></li>
                                                                            <li><a href="shop.html">Software</a></li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="shop.html">
                                                                                    <span class="nav-text">All
                                                                                        Electronics</span>
                                                                                    <span class="nav-subtext">Discover
                                                                                        more products</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title">Office &amp;
                                                                                Stationery</li>
                                                                            <li><a href="shop.html">All Office &amp;
                                                                                    Stationery</a></li>
                                                                            <li><a href="shop.html">Pens &amp;
                                                                                    Writing</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                        </div>
                                                        <!-- .kc_row -->
                                                    </div>
                                                    <!-- .yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item animate-dropdown">
                                            <a title="Gadgets" href="shop.html">Gadgets</a>
                                        </li>
                                        <li class="menu-item animate-dropdown">
                                            <a title="Virtual Reality" href="shop.html">Virtual Reality</a>
                                        </li>
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
                                            class="search-field" placeholder="Search products&hellip;" value=""
                                            name="s" />
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
                        <!-- /.row -->
                    </div>
                    <!-- .techmarket-sticky-wrap -->
                </div>
                <!-- .handheld-header -->
            </div>
            <!-- .handheld-only -->
        </header>
        <!-- .header-v1 -->
        <!-- ============================================================= Header End ============================================================= -->
        @yield('main');
        @yield('loading');
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
                <!-- Tin nhắn sẽ hiển thị ở đây -->
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
                        {{-- <div class="footer-newsletter">
                            <div class="media">
                                <i class="footer-newsletter-icon tm tm-newsletter"></i>
                                <div class="media-body">
                                    <div class="clearfix">
                                        <div class="newsletter-header">
                                            <h5 class="newsletter-title">Đăng ký </h5>
                                            <span class="newsletter-marketing-text">... và nhận ngay
                                                <strong>Phiếu giảm giá 100k cho lần đầu mua hàng</strong>
                                            </span>
                                        </div>
                                        <!-- .newsletter-header -->
                                        <div class="newsletter-body">
                                            <form class="newsletter-form">
                                                <input type="text" placeholder="Enter your email address">
                                                <button class="button" type="button">Đăng ký ngay</button>
                                            </form>
                                        </div>
                                        <!-- .newsletter body -->
                                    </div>
                                    <!-- .clearfix -->
                                </div>
                                <!-- .media-body -->
                            </div>
                            <!-- .media -->
                        </div> --}}
                        <!-- .footer-newsletter -->
                        {{-- <div class="footer-social-icons">
                            <ul class="social-icons nav">
                                <li class="nav-item">
                                    <a class="sm-icon-label-link nav-link" href="#">
                                        <i class="fa fa-facebook"></i> Facebook</a>
                                </li>
                                <li class="nav-item">
                                    <a class="sm-icon-label-link nav-link" href="#">
                                        <i class="fa fa-twitter"></i> Twitter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="sm-icon-label-link nav-link" href="#">
                                        <i class="fa fa-google-plus"></i> Google+</a>
                                </li>
                                <li class="nav-item">
                                    <a class="sm-icon-label-link nav-link" href="#">
                                        <i class="fa fa-vimeo-square"></i> Vimeo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="sm-icon-label-link nav-link" href="#">
                                        <i class="fa fa-rss"></i> RSS</a>
                                </li>
                            </ul>
                        </div> --}}
                        <!-- .footer-social-icons -->
                        {{--
                    </div> --}}
                        <!-- .col-full -->
                        {{--
                </div> --}}
                        <!-- .before-footer-wrap -->
                        <div class="footer-widgets-block">
                            <div class="row">
                                <div class="footer-contact">
                                    <div class="footer-logo">
                                        <a href="{{ route('home') }}" class="custom-logo-link" rel="home">
                                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 176 28">
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
                                                <rect class="cls-2" x="166.19" y="0.06" width="3.47"
                                                    height="0.84" />
                                                <rect class="cls-2" x="159.65" y="4.81" width="3.51"
                                                    height="0.84" />
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
                                                <rect class="cls-2" x="99.13" y="0.44" width="5.87"
                                                    height="27.12" />
                                                <polygon class="cls-1"
                                                    points="85.94 27.56 79.92 27.56 79.92 0.44 85.94 0.44 85.94 16.86 96.35 16.86 96.35 21.84 85.94 21.84 85.94 27.56" />
                                                <path class="cls-1"
                                                    d="M77.74,36.07a9,9,0,0,0,6.41-2.68L88,37c-2.6,2.74-6.71,4-10.89,4A13.94,13.94,0,0,1,62.89,27.15,14.19,14.19,0,0,1,77.11,13c4.38,0,8.28,1.17,10.89,4,0,0-3.89,3.82-3.91,3.8A9,9,0,1,0,77.74,36.07Z"
                                                    transform="translate(-12 -13)" />
                                                <rect class="cls-2" x="37.4" y="11.14" width="7.63"
                                                    height="4.98" />
                                                <polygon class="cls-1"
                                                    points="32.85 27.56 28.6 27.56 28.6 5.42 28.6 3.96 28.6 0.44 47.95 0.44 47.95 5.42 34.46 5.42 34.46 22.72 48.25 22.72 48.25 27.56 34.46 27.56 32.85 27.56" />
                                                <polygon class="cls-1"
                                                    points="15.4 27.56 9.53 27.56 9.53 5.57 9.53 0.59 9.53 0.44 24.93 0.44 24.93 5.57 15.4 5.57 15.4 27.56" />
                                                <rect class="cls-2" y="0.44" width="7.19" height="5.13" />
                                            </svg>
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
                                                <!-- .media-body -->
                                            </div>
                                            <!-- .media -->
                                        </div>
                                        <!-- .footer-contact-info -->
                                        {{-- <div class="footer-payment-info">
                                    <div class="media">
                                        <span class="media-left icon media-middle">
                                            <i class="tm tm-safe-payments"></i>
                                        </span>
                                        <div class="media-body">
                                            <h5 class="footer-payment-info-title">We are using safe payments</h5>
                                            <div class="footer-payment-icons">
                                                <ul class="list-payment-icons nav">
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="{{asset('home/assets/images/credit-cards/mastercard.svg')  }}"
                                                            alt="mastercard" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="{{asset('home/assets/images/credit-cards/visa.svg')  }}"
                                                            alt="visa" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="{{asset('home/assets/images/credit-cards/paypal.svg')  }}"
                                                            alt="paypal" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="{{asset('home/assets/images/credit-cards/maestro.svg')  }}"
                                                            alt="maestro" />
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .footer-payment-icons -->
                                            <div class="footer-secure-by-info">
                                                <h6 class="footer-secured-by-title">Secured by:</h6>
                                                <ul class="footer-secured-by-icons">
                                                    <li class="nav-item">
                                                        <img class="secure-icons-image"
                                                            src="{{asset('home/assets/images/secured-by/norton.svg')  }}"
                                                            alt="norton" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="secure-icons-image"
                                                            src="{{asset('home/assets/images/secured-by/mcafee.svg')  }}"
                                                            alt="mcafee" />
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .footer-secure-by-info -->
                                        </div>
                                        <!-- .media-body -->
                                    </div>
                                    <!-- .media -->
                                </div> --}}
                                        <!-- .footer-payment-info -->
                                    </div>
                                    <!-- .contact-payment-wrap -->
                                </div>
                                <!-- .footer-contact -->
                                <div class="footer-widgets">
                                    <div class="columns">
                                        <aside class="widget clearfix">
                                            <div class="body">
                                                <h4 class="widget-title">Các danh mục</h4>
                                                <div class="menu-footer-menu-1-container">
                                                    <ul id="menu-footer-menu-1" class="menu">
                                                        <li class="menu-item">
                                                            <a href="shop.html">Computers &#038; Laptops</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">Cameras &#038; Photography</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">Smart Phones &#038; Tablets</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">Video Games &#038; Consoles</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">TV</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">Car Electronic &#038; GPS</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .menu-footer-menu-1-container -->
                                            </div>
                                            <!-- .body -->
                                        </aside>
                                        <!-- .widget -->
                                    </div>
                                    <!-- .columns -->
                                    <div class="columns">
                                        <aside class="widget clearfix">
                                            <div class="body">
                                                <h4 class="widget-title">&nbsp;</h4>
                                                <div class="menu-footer-menu-2-container">
                                                    <ul id="menu-footer-menu-2" class="menu">
                                                        <li class="menu-item">
                                                            <a href="shop.html">Printers &#038; Ink</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">Audio &amp; Music</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">Home Theaters</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">PC Components</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">Ultrabooks</a>
                                                        </li>
                                                        <li class="menu-item">
                                                            <a href="shop.html">Smartwatches</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- .menu-footer-menu-2-container -->
                                            </div>
                                            <!-- .body -->
                                        </aside>
                                        <!-- .widget -->
                                    </div>
                                    <!-- .columns -->
                                    <div class="columns">
                                        <aside class="widget clearfix">
                                            <div class="body">
                                                <h4 class="widget-title">
                                                    <a href="#" class="footer-address-map-link">
                                                        <i class="tm tm-map-marker"> </i> Địa chỉ</a>
                                                </h4>
                                                {!! $config->map !!}
                                                {{-- <div class="menu-footer-menu-3-container">
                                            <ul id="menu-footer-menu-3" class="menu">
                                                <li class="menu-item">
                                                    <a href="login-and-register.html">My Account</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="track-your-order.html">Track Order</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="shop.html">Shop</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="about.html">About Us</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="terms-and-conditions.html">Returns/Exchange</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="faq.html">FAQs</a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                                <!-- .menu-footer-menu-3-container -->
                                            </div>
                                            <!-- .body -->
                                        </aside>
                                        <!-- .widget -->
                                    </div>
                                    <!-- .columns -->
                                </div>
                                <!-- .footer-widgets -->
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .footer-widgets-block -->
                        {{-- <div class="site-info">
                    <div class="col-full">
                        <div class="copyright">Copyright &copy; 2025 <a href="home-v1.html">Techboys</a> </div>
                        <!-- .copyright -->
                        <div class="credit">Thiết kế
                            <i class="fa fa-heart"></i> bởi WDK18.4 FPOLY.
                        </div>
                        <!-- .credit -->
                    </div>
                    <!-- .col-full -->
                </div> --}}
                        <!-- .site-info -->
                    </div>
                    <!-- .col-full -->
        </footer>
        <!-- .site-footer -->
    </div>
    <script>
        document.querySelector('.user-menu-toggle').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('userDropdownMenu');
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        // Đóng menu thả xuống nếu người dùng nhấp chuột bên ngoài menu
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
    @vite(['resources/js/app.js'])

    <script>
        document.addEventListener("DOMContentLoaded", async function() {
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            let chatIcon = document.getElementById("chat-icon");
            let chatModal = document.getElementById("chat-modal");
            let closeChat = document.getElementById("close-chat");
            let chatInput = document.getElementById("chat-input");
            let sendMessage = document.getElementById("send-message");
            let chatMessages = document.getElementById("chat-messages");

            let sendMessageUrl = "{{ route('client.send.message') }}";
            let loadMessagesUrl = "{{ route('client.load.messages') }}";
            let chatId = null;
            const mess = @json($messages);
            console.log(mess);

            chatIcon.addEventListener("click", function() {
                chatModal.style.display = "block";
                loadMessages();
            });

            closeChat.addEventListener("click", function() {
                chatModal.style.display = "none";
            });

            sendMessage.addEventListener("click", function() {
                let message = chatInput.value.trim();
                if (message) {
                    sendMessageToServer(message);
                }
            });

            async function loadMessages() {
                try {
                    let response = await fetch(loadMessagesUrl);
                    let data = await response.json();
                    console.log("Dữ liệu API nhận được:", data);

                    chatMessages.innerHTML = "";

                    if (data.original && data.original.chat_id) {
                        chatId = data.original.chat_id;
                    } else {
                        console.error("Lỗi: API không trả về chatId.");
                        return;
                    }

                    if (data.original && data.original.messages) {
                        data.original.messages.forEach(msg => {
                            let sender = getSenderName(msg);
                            displayMessage(sender, msg.message);
                        });
                    } else {
                        console.error("Lỗi: API không trả về danh sách tin nhắn.");
                    }

                    chatMessages.scrollTop = chatMessages.scrollHeight;
                } catch (error) {
                    console.error("Lỗi tải tin nhắn:", error);
                }
            }

            function getSenderName(msg) {
                console.log("Tin nhắn nhận được:", msg);
                if (!msg) return "Không xác định";

                if (msg.sender_id) {
                    if (msg.role_id === 1) {
                        return "Admin";
                    } else if (msg.role_id === 2) {
                        return msg.customer_name || "Khách hàng";
                    }
                } else{
                    return "Guest";
                }
                
            }


            function setupPusher(chatId) {
                console.log(`🔹 Đăng ký Echo.private('chat.${chatId}')`);

                const pusher = new Pusher("83277f57e063c09290aa", {
                    cluster: "ap1",
                    encrypted: true,
                    authEndpoint: "/broadcasting/auth",
                    auth: {
                        headers: {
                            "X-CSRF-TOKEN": csrfToken
                        }
                    }
                });

                const channel = pusher.subscribe(`chat.${chatId}`);
                channel.bind("MessageSent", function(data) {
                    let sender = getSenderName(data.message);
                    displayMessage(sender, data.message.message);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                });
            }

            function sendMessageToServer(message) {
                fetch(sendMessageUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        body: JSON.stringify({
                            message: message
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("🔹 Phản hồi từ server:", data);

                        if (data.message && data.message === "Message sent successfully") {
                            displayMessage("Bạn", message);
                            chatInput.value = "";
                            chatMessages.scrollTop = chatMessages.scrollHeight;
                        } else {
                            console.error("Lỗi gửi tin nhắn:", data);
                        }
                    })
                    .catch(error => console.error("Lỗi kết nối:", error));
            }

            function displayMessage(sender, message) {
                let msgDiv = document.createElement("div");
                msgDiv.innerHTML = `<strong>${sender}:</strong> ${message}`;
                chatMessages.appendChild(msgDiv);
            }

            let response = await fetch(loadMessagesUrl);
            let data = await response.json();
            if (data.original && data.original.chat_id) {
                chatId = data.original.chat_id;
                setupPusher(chatId);
            }
        });
    </script>

</body>

</html>
