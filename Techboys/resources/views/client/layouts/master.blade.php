<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="chat-id" content="{{ $chatId ?? '' }}">
    <meta name="user-role" content="{{ auth()->check() ? auth()->user()->role_id : 0 }}">
    <meta name="user-id" content="{{ auth()->check() ? auth()->user()->id : 0 }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>Techboys </title>
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/bootstrap-grid.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/bootstrap-reboot.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/font-techmarket.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/slick.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/techmarket-font-awesome.css"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/slick-style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/animate.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/real-time.css" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/colors/blue.css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/chat-bot.css" media="all" />
    <link rel="shortcut icon" href="{{ url('') }}/admin/assets/images/config/{{ $config->favicon }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ url('') }}/admin/assets/images/config/{{ $config->favicon }}">

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

        .menu-item.active>a {
            color: red !important;
            font-weight: bold;
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
                        <a title="Techboys - Always free delivery" href="#">Techboys &#8211; Lựa chọn tối
                            ưu</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Sản phẩm chất lượng" href="#">Sản phẩm chất
                            lượng</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Hỗ trợ nhanh chóng" href="#">Hỗ trợ nhanh chóng</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Không thu phụ phí" href="#">Không thu phụ phí</a>
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
                                <img src="{{ url('') }}/admin/assets/images/config/{{ $config->logo }}" alt="">
                            </a>
                        </div>
                        <!-- ====================== End Header Logo ====================== -->
                        <nav id="primary-navigation" class="primary-navigation" aria-label="Primary Navigation"
                            data-nav="flex-menu">
                            <ul id="menu-primary-menu" class="nav yamm">
                                <li class="menu-item animate-dropdown {{ request()->routeIs('home') ? 'active' : '' }}">
                                    <a title="about us" href="{{ route('home') }}">Trang chủ</a>
                                </li>
                                 <li
                                    class="menu-item animate-dropdown {{ request()->routeIs('client.product.index') ? 'active' : '' }}">
                                    <a title="Super deals" href="{{ route('client.product.index') }}">Sản phẩm</a>
                                </li>
                                <li
                                    class="menu-item animate-dropdown {{ request()->routeIs('client.about.about') ? 'active' : '' }}">
                                    <a title="about us" href="{{ route('client.about.about') }}">Về chúng tôi</a>
                                </li>
                                <li
                                    class="menu-item animate-dropdown {{ request()->routeIs('contact') ? 'active' : '' }}">
                                    <a title="Headphones Sale" href="{{ route('contact') }}">Liên hệ</a>
                                </li>
                               
                                <li class="menu-item animate-dropdown {{ request()->routeIs('blog') ? 'active' : '' }}">
                                    <a title="Headphones Sale" href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li class="techmarket-flex-more-menu-item dropdown">
                                    <a title="..." href="#" data-toggle="dropdown" class="dropdown-toggle">...</a>
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
                                                @auth
                                                @if (Auth::user()->role_id == 1)
                                                    <li>
                                                        <a href="{{ route('admin.index') }}">
                                                            <img src="{{ asset('home/assets/images/profile.png') }}">
                                                            <p style="margin-top: 3px">Admin</p>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endauth
                                                <li>
                                                    <a href="{{ route('client.edit') }}">
                                                        <img src="{{ asset('home/assets/images/profile.png') }}">
                                                        <p style="margin-top: 3px">Thông tin</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('client.changePassword') }}">
                                                        <img src="{{ asset('home/assets/images/setting.png') }}">
                                                        <p style="margin-top: 3px">Đổi mật khẩu</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('client.logout') }}">
                                                        <img src="{{ asset('home/assets/images/logout.png') }}">
                                                        <p style="margin-top: 3px">Đăng xuất</p>
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
                            <span>Tất cả danh mục</span>
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
                            <input type="text" id="search" class="form-control search-field product-search-field"
                                name="s" placeholder="Nhập sản phẩm muốn tìm" required />
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
                            <a class="cart-contents" href="{{ route('client.cart.index') }}">
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
                                <img src="{{ url('') }}/admin/assets/images/config/{{ $config->logo }}"
                                    alt="">
                            </a>
                            <!-- /.custom-logo-link -->
                        </div>
                        <!-- /.site-branding -->
                        <!-- ============================================================= End Header Logo ============================= -->
                        <div class="handheld-header-links">
                            <ul class="columns-3">
                                <li class="my-account">
                                    <a href="{{ route('login.client') }}" class="has-icon">
                                        <i class="tm tm-login-register"></i>
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
                            <nav id="handheld-navigation" class="handheld-navigation" aria-label="Handheld Navigation">
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
                                            class="search-field" placeholder="Nhập sản phẩm muốn tìm kiếm" value=""
                                            name="s" />
                                        <input type="submit" value="Search" />
                                        <input type="hidden" name="post_type" value="product" />
                                    </form>
                                </div>
                                <!-- .widget -->
                            </div>
                            <!-- .site-search -->
                            <a class="handheld-header-cart-link has-icon" href="{{ route('client.cart.index') }}"
                                title="Xem giỏ hàng">
                                <i class="tm tm-shopping-bag"></i>
                                <span class="count">{{ $cartCount }}</span>
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
        {{-- Modal ChatBot --}}
        <div id="bot-chat-icon" class="bot-real-time-icon">
            <img src="{{ url('') }}/admin/assets/images/config/{{ $config->favicon }}" alt="" width="40px">
            <div id="chat-title" class="chat-title">
                Chat cùng Techboys AI
            </div>
        </div>

        <div id="bot-chat-modal" class="bot-real-time-box">
            <div class="bot-real-time-title">
                <span>Chat với Techboys AI</span>
                <span id="bot-close-chat" class="bot-real-time-close">&times;</span>

            </div>
            <div id="bot-chat-messages" class="bot-real-time-content">
            </div>
            <div class="bot-real-time-sent-content">
                <input type="text" id="bot-chat-input" placeholder="Nhập tin nhắn..."
                    onkeydown="if(event.key === 'Enter') sendMessage()" />
                <button id="bot-send-message" onclick="sendMessage()">Gửi</button>
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
                                            <img src="{{ url('') }}/admin/assets/images/config/{{ $config->logo }}"
                                                alt="">
                                        </a>
                                        <span>{{ $config->title }}</span>
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
                                                                <a href="{{ route('client.about.about') }}">Về chúng
                                                                    tôi</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="{{ route('contact') }}">Liên hệ</a>
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
                                                        <a href="https://caodang.fpt.edu.vn"
                                                            class="footer-address-map-link">
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
        document.querySelector('.user-menu-toggle').addEventListener('click', function () {
            var dropdownMenu = document.getElementById('userDropdownMenu');
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
        window.addEventListener('click', function (e) {
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

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

        $(document).ready(function () {
            $('#search').on('keyup', function () {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('client.product.search') }}",
                        type: "GET",
                        data: {
                            s: query
                        },
                        success: function (data) {
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

            $(document).click(function (e) {
                if (!$(e.target).closest("#search-form").length) {
                    $("#search-dropdown").hide();
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
    <script>
        $('#bot-chat-icon').click(function () {
            $('#bot-chat-modal').toggle();
            $(this).hide();
        });

        $('#bot-close-chat').click(function () {
            $('#bot-chat-modal').hide();
            $('#bot-chat-icon').show();
        });

        function sendMessage() {
            var prompt = $('#bot-chat-input').val();
            var chatMessages = $('#bot-chat-messages');
            var sendButton = $('#bot-send-message');

            if (prompt.trim() === '') return;

            sendButton.prop('disabled', true);

            chatMessages.append('<div class="bot-user-message">' + prompt + '</div>');

            $.post('/ask-gemini', { _token: '{{ csrf_token() }}', prompt: prompt }, function (data) {
                chatMessages.append('<div class="bot-bot-message">' + data.response + '</div>');
                chatMessages.scrollTop(chatMessages[0].scrollHeight);
                console.log(data.response);
                sendButton.prop('disabled', false);
            });

            $('#bot-chat-input').val('');
        }
    </script>




    <script type="text/javascript" src="{{ url('') }}/home/assets/js/chat.js"></script>
    @yield('cartScripts');

</body>

</html>