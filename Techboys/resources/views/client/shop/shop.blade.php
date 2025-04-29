<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>Techmarket HTML</title>
    <link rel="stylesheet" type="text/css" href="home/assets/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/bootstrap-grid.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/bootstrap-reboot.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/font-techmarket.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/slick.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/techmarket-font-awesome.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/slick-style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/animate.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="home/assets/css/colors/blue.css" media="all" />

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
    <link rel="shortcut icon" href="home/assets/images/fav-icon.png">
</head>

<body class="woocommerce-active left-sidebar">
    <div id="page" class="hfeed site">
        <div class="top-bar top-bar-v1">
            <div class="col-full">
                <ul id="menu-top-bar-left" class="nav justify-content-center">
                    <li class="menu-item animate-dropdown">
                        <a title="Techboys  - Always free delivery" href="contact-v1.html">Techboys &#8211; Always free
                            delivery</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Quality Guarantee of products" href="shop.html">Quality Guarantee of products</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="Fast returnings program" href="track-your-order.html">Fast returnings program</a>
                    </li>
                    <li class="menu-item animate-dropdown">
                        <a title="No additional fees" href="contact-v2.html">No additional fees</a>
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
                                <img src="{{ url('') }}/admin/assets/images/config/{{ $config->logo }}"
                                    alt="">
                            </a>
                            <!-- /.custom-logo-link -->
                        </div>
                        <!-- /.site-branding -->
                        <!-- ============================================================= End Header Logo ============================================================= -->
                        <nav id="primary-navigation" class="primary-navigation" aria-label="Primary Navigation"
                            data-nav="flex-menu">
                            <ul id="menu-primary-menu" class="nav yamm">
                                <li class="sale-clr yamm-fw menu-item animate-dropdown">
                                    <a title="Super deals" href="product-category.html">Super deals</a>
                                </li>
                                <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                                    <a title="Mother`s Day" data-toggle="dropdown" class="dropdown-toggle"
                                        aria-haspopup="true" href="#">Mother`s Day <span
                                            class="caret"></span></a>
                                    <ul role="menu" class=" dropdown-menu">
                                        <li class="menu-item animate-dropdown">
                                            <a title="Wishlist" href="wishlist.html">Wishlist</a>
                                        </li>
                                        <li class="menu-item animate-dropdown">
                                            <a title="Add to compare" href="compare.html">Add to compare</a>
                                        </li>
                                        <li class="menu-item animate-dropdown">
                                            <a title="About Us" href="about.html">About Us</a>
                                        </li>
                                        <li class="menu-item animate-dropdown">
                                            <a title="Track Order" href="track-your-order.html">Track Order</a>
                                        </li>
                                    </ul>
                                    <!-- .dropdown-menu -->
                                </li>
                                <li class="yamm-fw menu-item menu-item-has-children animate-dropdown dropdown">
                                    <a title="Pages" data-toggle="dropdown" class="dropdown-toggle"
                                        aria-haspopup="true" href="#">Pages <span class="caret"></span></a>
                                    <ul role="menu" class=" dropdown-menu">
                                        <li class="menu-item menu-item-object-static_block animate-dropdown">
                                            <div class="yamm-content">
                                                <div class="tm-mega-menu">
                                                    <div class="widget widget_nav_menu">
                                                        <ul class="menu">
                                                            <li class="nav-title menu-item">
                                                                <a href="#">Home Pages</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v1.html">Home v1</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v2.html">Home v2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v3.html">Home v3</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v4.html">Home v4</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v5.html">Home v5</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v6.html">Home v6</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v7.html">Home v7</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v8.html">Home v8</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v9.html">Home v9</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v10.html">Home v10</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v11.html">Home v11</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v12.html">Home v12</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v13.html">Home v13</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="home-v14.html">Home v14</a>
                                                            </li>
                                                        </ul>
                                                        <!-- .menu -->
                                                    </div>
                                                    <!-- .widget_nav_menu -->
                                                    <div class="widget widget_nav_menu">
                                                        <ul class="menu">
                                                            <li class="nav-title menu-item">
                                                                <a href="#">Landing Pages</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="landing-page-v1.html">Landing v1</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="landing-page-v2.html">Landing v2</a>
                                                            </li>
                                                            <li class="nav-title menu-item">
                                                                <a href="#">Shop Pages</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop.html">Shop</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-extended.html">Shop Extended</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-listing.html">Shop Listing</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-listing-large.html">Shop Listing
                                                                    Large</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-listing-with-product-sidebar.html">Shop
                                                                    Listing with Product Sidebar</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="product-category.html">Categories</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-right-sidebar.html">Shop Right
                                                                    Sidebar</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="shop-fullwidth.html">Shop Full Width</a>
                                                            </li>
                                                        </ul>
                                                        <!-- .menu -->
                                                    </div>
                                                    <!-- .widget_nav_menu -->
                                                    <div class="widget widget_nav_menu">
                                                        <ul class="menu">
                                                            <li class="nav-title menu-item">
                                                                <a href="#">Single Product Pages</a>
                                                            </li>
                                                            <li class="menu-item menu-item-object-product">
                                                                <a href="single-product-sidebar.html">Single Product
                                                                    Sidebar</a>
                                                            </li>
                                                            <li class="menu-item menu-item-object-product">
                                                                <a href="single-product-fullwidth.html">Single Product
                                                                    Fullwidth</a>
                                                            </li>
                                                            <li class="menu-item menu-item-object-product">
                                                                <a href="single-product-extended.html">Single Product
                                                                    Extended</a>
                                                            </li>
                                                            <li class="nav-title menu-item">
                                                                <a href="#">Ecommerce Pages</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="{{ route('client.cart.index') }}">Cart</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="checkout.html">Checkout</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="{{ route('client.edit') }}">My Account</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="compare.html">Compare</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="wishlist.html">Wishlist</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="track-your-order.html">Track Order</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="terms-and-conditions.html">Terms and
                                                                    Conditions</a>
                                                            </li>
                                                        </ul>
                                                        <!-- .menu -->
                                                    </div>
                                                    <!-- .widget_nav_menu -->
                                                    <div class="widget widget_nav_menu">
                                                        <ul class="menu">
                                                            <li class="nav-title menu-item">
                                                                <a href="#">Blog Pages</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="blog-v1.html">Blog v1</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="blog-v2.html">Blog v2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="blog-v3.html">Blog v3</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="blog-fullwidth.html">Blog Full Width</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="blog-single.html">Single Blog Post</a>
                                                            </li>
                                                            <li class="nav-title menu-item">
                                                                <a href="#">Other Pages</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="about.html">About Us</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="contact-v1.html">Contact v1</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="contact-v2.html">Contact v2</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="faq.html">FAQ</a>
                                                            </li>
                                                            <li class="menu-item">
                                                                <a href="404.html">404</a>
                                                            </li>
                                                        </ul>
                                                        <!-- .menu -->
                                                    </div>
                                                    <!-- .widget_nav_menu -->
                                                </div>
                                                <!-- .tm-mega-menu -->
                                            </div>
                                            <!-- .yamm-content -->
                                        </li>
                                        <!-- .menu-item -->
                                    </ul>
                                    <!-- .dropdown-menu -->
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Logitech Sale" href="product-category.html">Logitech Sale</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Headphones Sale" href="product-category.html">Headphones Sale</a>
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
                                        <i class="tm tm-order-tracking"></i>Track Your Order</a>
                                </li>
                                <li
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-487 animate-dropdown dropdown">
                                    <a title="Dollar (US)" data-toggle="dropdown" class="dropdown-toggle"
                                        aria-haspopup="true" href="#">
                                        <i class="tm tm-dollar"></i>Dollar (US)
                                        <span class="caret"></span>
                                    </a>
                                    <ul role="menu" class=" dropdown-menu">
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-489 animate-dropdown">
                                            <a title="AUD" href="#">AUD</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-490 animate-dropdown">
                                            <a title="INR" href="#">INR</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-491 animate-dropdown">
                                            <a title="AED" href="#">AED</a>
                                        </li>
                                        <li
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-492 animate-dropdown">
                                            <a title="SGD" href="#">SGD</a>
                                        </li>
                                    </ul>
                                    <!-- .dropdown-menu -->
                                </li>
                                <li class="menu-item">
                                    <a title="My Account" href="{{ route('login.client') }}">
                                        <i class="tm tm-login-register"></i>Register or Sign in</a>
                                </li>
                                <li class="techmarket-flex-more-menu-item dropdown">
                                    <a title="..." href="#" data-toggle="dropdown"
                                        class="dropdown-toggle">...</a>
                                    <ul class="overflow-items dropdown-menu"></ul>
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
                            <span>All Departments</span>
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
                                                        <img src="home/assets/images/megamenu.jpg" class=""
                                                            alt="" />
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
                                                                    <a href="#">
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
                                                        <img src="home/assets/images/megamenu-1.jpg" class=""
                                                            alt="" />
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
                                                                    <a href="#">
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
                                                        <img src="home/assets/images/megamenu.jpg" class=""
                                                            alt="" />
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
                                                                    <a href="#">
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
                                                        <img src="home/assets/images/megamenu-1.jpg" class=""
                                                            alt="" />
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
                                                                    <a href="#">
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
                                                        <img src="home/assets/images/megamenu.jpg" class=""
                                                            alt="" />
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
                                                                    <a href="#">
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
                                                        <img src="home/assets/images/megamenu-1.jpg" class=""
                                                            alt="" />
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
                                                                    <a href="#">
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
                                                        <img src="home/assets/images/megamenu.jpg" class=""
                                                            alt="" />
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
                                                                    <a href="#">
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
                    <form class="navbar-search" method="get" action="home-v1.html">
                        <label class="sr-only screen-reader-text" for="search">Search for:</label>
                        <div class="input-group">
                            <input type="text" id="search"
                                class="form-control search-field product-search-field" dir="ltr" value=""
                                name="s" placeholder="Search for products" />
                            <div class="input-group-addon search-categories popover-header">
                                <select name='product_cat' id='product_cat' class='postform resizeselect'>
                                    <option value='0' selected='selected'>All Categories</option>
                                    <option class="level-0" value="television">Televisions</option>
                                    <option class="level-0" value="home-theater-audio">Home Theater &amp; Audio
                                    </option>
                                    <option class="level-0" value="headphones">Headphones</option>
                                    <option class="level-0" value="digital-cameras">Digital Cameras</option>
                                    <option class="level-0" value="cells-tablets">Cells &amp; Tablets</option>
                                    <option class="level-0" value="smartwatches">Smartwatches</option>
                                    <option class="level-0" value="games-consoles">Games &amp; Consoles</option>
                                    <option class="level-0" value="printer">Printer</option>
                                    <option class="level-0" value="tv-video">TV &amp; Video</option>
                                    <option class="level-0" value="home-entertainment">Home Entertainment</option>
                                    <option class="level-0" value="tvs">TVs</option>
                                    <option class="level-0" value="speakers">Speakers</option>
                                    <option class="level-0" value="computers-laptops">Computers &amp; Laptops</option>
                                    <option class="level-0" value="laptops">Laptops</option>
                                    <option class="level-0" value="ultrabooks">Ultrabooks</option>
                                    <option class="level-0" value="notebooks">Notebooks</option>
                                    <option class="level-0" value="desktop-pcs">Desktop PCs</option>
                                    <option class="level-0" value="mac-computers">Mac Computers</option>
                                    <option class="level-0" value="all-in-one-pc">All in One PC</option>
                                    <option class="level-0" value="audio-music">Audio &amp; Music</option>
                                    <option class="level-0" value="pc-components">PC Components</option>
                                </select>
                            </div>
                            <!-- .input-group-addon -->
                            <div class="input-group-btn input-group-append">
                                <input type="hidden" id="search-param" name="post_type" value="product" />
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                    <span class="search-btn">Search</span>
                                </button>
                            </div>
                            <!-- .input-group-btn -->
                        </div>
                        <!-- .input-group -->
                    </form>
                    <!-- .navbar-search -->
                    <ul class="header-compare nav navbar-nav">
                        <li class="nav-item">
                            <a href="compare.html" class="nav-link">
                                <i class="tm tm-compare"></i>
                                <span id="top-cart-compare-count" class="value">3</span>
                            </a>
                        </li>
                    </ul>
                    <!-- .header-compare -->

                    <!-- .header-wishlist -->
                    <ul id="site-header-cart" class="site-header-cart menu">
                        <li class="animate-dropdown dropdown ">
                            <a class="cart-contents" href="{{ route('client.cart.index') }}" data-toggle="dropdown"
                                title="Xem giỏ hàng">
                                <i class="tm tm-shopping-bag"></i>
                                <span class="count">{{ $cartCount }}</span>
                                <span class="amount">
                                    <span class="price-label">Your Cart</span>&#036;136.99</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-mini-cart">
                                <li>
                                    <div class="widget woocommerce widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                <li class="woocommerce-mini-cart-item mini_cart_item">
                                                    <a href="#" class="remove" aria-label="Remove this item"
                                                        data-product_id="65" data-product_sku="">×</a>
                                                    <a href="single-product-sidebar.html">
                                                        <img src="home/assets/images/products/mini-cart1.jpg"
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
                                                        <img src="home/assets/images/products/mini-cart2.jpg"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                            alt="">Gear Virtual Reality 3D with Bluetooth
                                                        Glasses&nbsp;
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
                                                    <span
                                                        class="woocommerce-Price-currencySymbol">$</span>136.99</span>
                                            </p>
                                            <p class="woocommerce-mini-cart__buttons buttons">
                                                <a href="{{ route('client.cart.index') }}"
                                                    class="button wc-forward">View cart</a>
                                                <a href="checkout.html"
                                                    class="button checkout wc-forward">Checkout</a>
                                            </p>
                                        </div>
                                        <!-- .widget_shopping_cart_content -->
                                    </div>
                                    <!-- .widget_shopping_cart -->
                                </li>
                            </ul>
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
                            <a href="home-v1.html" class="custom-logo-link" rel="home">
                                <a href="{{ route('home') }}" class="custom-logo-link" rel="home">
                                    <img src="{{ url('') }}/admin/assets/images/config/{{ $config->logo }}"
                                        alt="">
                                </a>
                            </a>
                            <!-- /.custom-logo-link -->
                        </div>
                        <!-- /.site-branding -->
                        <!-- ============================================================= End Header Logo ============================================================= -->
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
                                                &#038; Laptops <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="home/assets/images/megamenu.jpg"
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
                                                                                <a href="#">
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
                                                &#038; Photo <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="home/assets/images/megamenu-1.jpg"
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
                                                                                <a href="#">
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
                                                Phones &#038; Tablets <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="home/assets/images/megamenu.jpg"
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
                                                                                <a href="#">
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
                                                Games &#038; Consoles <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="home/assets/images/megamenu-1.jpg"
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
                                                                            <li class="nav-title">Cameras &
                                                                                Photography</li>
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
                                                                            <li><a href="shop.html">Camcorders</a>
                                                                            </li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="#">
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
                                            <a title="TV &amp; Audio" data-toggle="dropdown"
                                                class="dropdown-toggle" aria-haspopup="true" href="#">TV
                                                &#038; Audio <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="home/assets/images/megamenu.jpg"
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
                                                                            <li><a href="shop.html">All Computers
                                                                                    &amp; Accessories</a></li>
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
                                                                                <a href="#">
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
                                                Electronic &#038; GPS <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div
                                                            class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="home/assets/images/megamenu-1.jpg"
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
                                                                            <li class="nav-title">Cameras &
                                                                                Photography</li>
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
                                                                            <li><a href="shop.html">Camcorders</a>
                                                                            </li>
                                                                            <li class="nav-divider"></li>
                                                                            <li>
                                                                                <a href="#">
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
                                                                    <img src="home/assets/images/megamenu.jpg"
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
                                                                            <li><a href="shop.html">All Computers
                                                                                    &amp; Accessories</a></li>
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
                                                                                <a href="#">
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
                                            class="search-field" placeholder="Search products&hellip;"
                                            value="" name="s" />
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
        <div id="content" class="site-content" tabindex="-1">
            <div class="col-full">
                <div class="row">
                    <nav class="woocommerce-breadcrumb">
                        <a href="home-v1.html">Home</a>
                        <span class="delimiter">
                            <i class="tm tm-breadcrumbs-arrow-right"></i>
                        </span>Shop
                    </nav>
                    <!-- .woocommerce-breadcrumb -->
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <div class="shop-archive-header">
                                <div class="jumbotron">
                                    <div class="jumbotron-img">
                                        <img width="416" height="283" alt=""
                                            src="home/assets/images/products/jumbo.jpg"
                                            class="jumbo-image alignright">
                                    </div>
                                    <div class="jumbotron-caption">
                                        <h3 class="jumbo-title">Virtual Reality Headsets</h3>
                                        <p class="jumbo-subtitle">Nullam dignissim elit ut urna rutrum, a fermentum mi
                                            auctor. Mauris efficitur magna orci, et dignissim lacus scelerisque sit
                                            amet. Proin malesuada tincidunt nisl ac commodo. Vivamus eleifend porttitor
                                            ex sit amet suscipit. Vestibulum at ullamcorper lacus, vel facilisis arcu.
                                            Aliquam erat volutpat.
                                            <br>
                                            <br>Maecenas in sodales nisl. Pellentesque ac nibh mi. Ut lobortis odio
                                            nulla, congue rhoncus risus facilisis eget. Orci varius natoque penatibus et
                                            magnis dis parturient montes, nascetur ridiculus mus.
                                            <a href="#">read more <i class="tm tm-long-arrow-right"></i></a>
                                        </p>
                                    </div>
                                    <!-- .jumbotron-caption -->
                                </div>
                                <!-- .jumbotron -->
                            </div>
                            <!-- .shop-archive-header -->
                            <div class="shop-control-bar">
                                <div class="handheld-sidebar-toggle">
                                    <button type="button" class="btn sidebar-toggler">
                                        <i class="fa fa-sliders"></i>
                                        <span>Filters</span>
                                    </button>
                                </div>
                                <!-- .handheld-sidebar-toggle -->
                                <h1 class="woocommerce-products-header__title page-title">Shop</h1>
                                <ul role="tablist" class="shop-view-switcher nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#grid" title="Grid View" data-toggle="tab"
                                            class="nav-link active">
                                            <i class="tm tm-grid-small"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#grid-extended" title="Grid Extended View" data-toggle="tab"
                                            class="nav-link ">
                                            <i class="tm tm-grid"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#list-view-large" title="List View Large" data-toggle="tab"
                                            class="nav-link ">
                                            <i class="tm tm-listing-large"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#list-view" title="List View" data-toggle="tab"
                                            class="nav-link ">
                                            <i class="tm tm-listing"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#list-view-small" title="List View Small" data-toggle="tab"
                                            class="nav-link ">
                                            <i class="tm tm-listing-small"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- .shop-view-switcher -->
                                <form class="form-techmarket-wc-ppp" method="POST">
                                    <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()"
                                        name="ppp">
                                        <option value="20">Show 20</option>
                                        <option value="40">Show 40</option>
                                        <option value="-1">Show All</option>
                                    </select>
                                    <input type="hidden" value="5" name="shop_columns">
                                    <input type="hidden" value="15" name="shop_per_page">
                                    <input type="hidden" value="right-sidebar" name="shop_layout">
                                </form>
                                <!-- .form-techmarket-wc-ppp -->
                                <form method="get" class="woocommerce-ordering">
                                    <select class="orderby" name="orderby">
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option selected="selected" value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                    <input type="hidden" value="5" name="shop_columns">
                                    <input type="hidden" value="15" name="shop_per_page">
                                    <input type="hidden" value="right-sidebar" name="shop_layout">
                                </form>
                                <!-- .woocommerce-ordering -->
                                <nav class="techmarket-advanced-pagination">
                                    <form class="form-adv-pagination" method="post">
                                        <input type="number" value="1" class="form-control" step="1"
                                            max="5" min="1" size="2" id="goto-page">
                                    </form> of 5<a href="#" class="next page-numbers">→</a>
                                </nav>
                                <!-- .techmarket-advanced-pagination -->
                            </div>
                            <!-- .shop-control-bar -->
                            <div class="tab-content">
                                <div id="grid" class="tab-pane active" role="tabpanel">
                                    <div class="woocommerce columns-5">
                                        <div class="products">
                                            <div class="product first">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/1.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen
                                                        LED-Lit Monitorss Buds</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/2.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Bluetooth on-ear
                                                        PureBass Headphones</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/3.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50
                                                    </h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/4.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate
                                                        splashproof portable speaker</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product last">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/5.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG
                                                    </h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product first">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/6.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG
                                                    </h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/7.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate
                                                        splashproof portable speaker</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/8.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Gear Virtual Reality
                                                        3D with Bluetooth Glasses</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/9.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Watch Stainless with
                                                        Grey Suture Leather Strap</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product last">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/10.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook
                                                        8GB 512SSD W10</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product first">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/11.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Watch Stainless with
                                                        Grey Suture Leather Strap</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/12.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">XONE Wireless
                                                        Controller</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/13.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">ZenBook 3 Ultrabook
                                                        8GB 512SSD W10</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/14.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Bluetooth on-ear
                                                        PureBass Headphones</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product last">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/15.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate
                                                        splashproof portable speaker</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product first">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/16.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">4K Action Cam with
                                                        Wi-Fi & GPS</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/17.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Gear Virtual Reality
                                                        3D with Bluetooth Glasses</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/5.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen
                                                        LED-Lit Monitorss Buds</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/12.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">4K Action Cam with
                                                        Wi-Fi & GPS</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product last">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/1.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">XONE Wireless
                                                        Controller</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="hover-area">
                                                    <a class="button" href="{{ route('client.cart.index') }}">Thêm
                                                        vào giỏ hàng</a>
                                                    <a class="add-to-compare-link" href="compare.html">Add to
                                                        compare</a>
                                                </div>
                                                <!-- .hover-area -->
                                            </div>
                                            <!-- .product -->
                                        </div>
                                        <!-- .products -->
                                    </div>
                                    <!-- .woocommerce -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="grid-extended" class="tab-pane" role="tabpanel">
                                    <div class="woocommerce columns-5">
                                        <div class="products">
                                            <div class="product first">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/1.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate
                                                        splashproof portable speaker</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/2.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">4K Action Cam with
                                                        Wi-Fi & GPS</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/3.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG
                                                    </h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/4.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate
                                                        splashproof portable speaker</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product last">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/5.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Smart Watches 3 SWR50
                                                    </h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product first">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/6.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate
                                                        splashproof portable speaker</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/7.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Video & Air Quality
                                                        Monitor</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/8.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Video & Air Quality
                                                        Monitor</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/9.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen
                                                        LED-Lit Monitorss Buds</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product last">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/10.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Gear Virtual Reality
                                                        3D with Bluetooth Glasses</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product first">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/11.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Xtreme ultimate
                                                        splashproof portable speaker</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/12.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Bluetooth on-ear
                                                        PureBass Headphones</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/13.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">XONE Wireless
                                                        Controller</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/14.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Gear Virtual Reality
                                                        3D with Bluetooth Glasses</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product last">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/15.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Watch Stainless with
                                                        Grey Suture Leather Strap</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product first">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/16.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Watch Stainless with
                                                        Grey Suture Leather Strap</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/17.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Bbd 23-Inch Screen
                                                        LED-Lit Monitorss Buds</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/5.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">On-ear Wireless NXTG
                                                    </h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product ">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/12.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">4K Action Cam with
                                                        Wi-Fi & GPS</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                            <div class="product last">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <a href="wishlist.html" rel="nofollow"
                                                        class="add_to_wishlist"> Add to Wishlist</a>
                                                </div>
                                                <!-- .yith-wcwl-add-to-wishlist -->
                                                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                    href="single-product-fullwidth.html">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/1.jpg">
                                                    <span class="price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>800.00</span>
                                                    </span>
                                                    <h2 class="woocommerce-loop-product__title">Bluetooth on-ear
                                                        PureBass Headphones</h2>
                                                </a>
                                                <!-- .woocommerce-LoopProduct-link -->
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated 5.00 out of 5" class="star-rating">
                                                        <span style="width:100%">
                                                            <strong class="rating">5.00</strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(1)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                                <span class="sku_wrapper">SKU:
                                                    <span class="sku">5487FB8/13</span>
                                                </span>
                                                <div class="woocommerce-product-details__short-description">
                                                    <ul>
                                                        <li>Multimedia Speakers</li>
                                                        <li>120 watts peak</li>
                                                        <li>Front-facing subwoofer</li>
                                                        <li>Refresh Rate: 120Hz (Effective)</li>
                                                        <li>Backlight: LED</li>
                                                        <li>Smart Functionality: Yes, webOS 3.0</li>
                                                        <li>Dimensions (W x H x D): TV without stand: 43.5″ x 25.4″ x
                                                            3.0″, TV with stand: 43.5″ x 27.6″ x 8.5″</li>
                                                        <li>Inputs: 3 HMDI, 2 USB, 1 RF, 1 Component, 1 Composite, 1
                                                            Optical, 1 RS232C, 1 Ethernet</li>
                                                    </ul>
                                                </div>
                                                <!-- .woocommerce-product-details__short-description -->
                                                <a class="button product_type_simple add_to_cart_button"
                                                    href="{{ route('client.cart.index') }}">Thêm vào giỏ hàng</a>
                                                <a class="add-to-compare-link" href="compare.html">Add to
                                                    compare</a>
                                            </div>
                                            <!-- .product -->
                                        </div>
                                        <!-- .products -->
                                    </div>
                                    <!-- .woocommerce -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="list-view-large" class="tab-pane" role="tabpanel">
                                    <div class="woocommerce columns-1">
                                        <div class="products">
                                            <div class="product list-view-large first ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/1.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                            <span class="sku_wrapper">SKU:
                                                                <span class="sku">5487FB8/13</span>
                                                            </span>
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-large ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/2.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                            <span class="sku_wrapper">SKU:
                                                                <span class="sku">5487FB8/13</span>
                                                            </span>
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-large ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/3.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                            <span class="sku_wrapper">SKU:
                                                                <span class="sku">5487FB8/13</span>
                                                            </span>
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-large ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/4.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                            <span class="sku_wrapper">SKU:
                                                                <span class="sku">5487FB8/13</span>
                                                            </span>
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-large last">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/5.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                            <span class="sku_wrapper">SKU:
                                                                <span class="sku">5487FB8/13</span>
                                                            </span>
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-large first ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/6.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                            <span class="sku_wrapper">SKU:
                                                                <span class="sku">5487FB8/13</span>
                                                            </span>
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                        </div>
                                        <!-- .products -->
                                    </div>
                                    <!-- .woocommerce -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="list-view" class="tab-pane" role="tabpanel">
                                    <div class="woocommerce columns-1">
                                        <div class="products">
                                            <div class="product list-view ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/1.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/2.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/3.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view last">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/4.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view first ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/5.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/6.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div class="brand">
                                                                <a href="#">
                                                                    <img alt="galaxy"
                                                                        src="home/assets/images/brands/5.png">
                                                                </a>
                                                            </div>
                                                            <!-- .brand -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <div class="availability">
                                                                Availability:
                                                                <p class="stock in-stock">1000 in stock</p>
                                                            </div>
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                        </div>
                                        <!-- .products -->
                                    </div>
                                    <!-- .woocommerce -->
                                </div>
                                <!-- .tab-pane -->
                                <div id="list-view-small" class="tab-pane" role="tabpanel">
                                    <div class="woocommerce columns-1">
                                        <div class="products">
                                            <div class="product list-view-small ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/1.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-small ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/2.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-small last">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/3.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-small first ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/4.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-small ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/5.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-small ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/6.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-small ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/7.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-small last">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/8.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                            <div class="product list-view-small first ">
                                                <div class="media">
                                                    <img width="224" height="197" alt=""
                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                        src="home/assets/images/products/9.jpg">
                                                    <div class="media-body">
                                                        <div class="product-info">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <a href="wishlist.html" rel="nofollow"
                                                                    class="add_to_wishlist"> Add to Wishlist</a>
                                                            </div>
                                                            <!-- .yith-wcwl-add-to-wishlist -->
                                                            <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link"
                                                                href="single-product-fullwidth.html">
                                                                <h2 class="woocommerce-loop-product__title">60UH6150
                                                                    60-Inch 4K Ultra HD Smart LED TV</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 5.00 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:100%">
                                                                            <strong class="rating">5.00</strong> out
                                                                            of 5</span>
                                                                    </div>
                                                                    <span class="review-count">(1)</span>
                                                                </div>
                                                            </a>
                                                            <!-- .woocommerce-LoopProduct-link -->
                                                            <div
                                                                class="woocommerce-product-details__short-description">
                                                                <ul>
                                                                    <li>CUJO smart firewall brings business-level
                                                                        Internet security to protect all of your home
                                                                        devices</li>
                                                                    <li>Internet Security: Guard your network and smart
                                                                        devices against hacks, malware, and cyber
                                                                        threats</li>
                                                                    <li>Mobile App: Monitor your wired and wireless
                                                                        network activity with a sleek iPhone or Android
                                                                        app</li>
                                                                    <li>CUJO connects to your wireless router with an
                                                                        ethernet cable. CUJO is not compatible with Luma
                                                                        and does not support Google Wifi Mesh. CUJO
                                                                        works with Eero in Bridge mode.</li>
                                                                </ul>
                                                            </div>
                                                            <!-- .woocommerce-product-details__short-description -->
                                                        </div>
                                                        <!-- .product-info -->
                                                        <div class="product-actions">
                                                            <span class="price">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">$</span>730.00</span>
                                                            </span>
                                                            <!-- .price -->
                                                            <a class="button add_to_cart_button"
                                                                href="{{ route('client.cart.index') }}">Thêm vào giỏ
                                                                hàng</a>
                                                            <a class="add-to-compare-link" href="compare.html">Add
                                                                to compare</a>
                                                        </div>
                                                        <!-- .product-actions -->
                                                    </div>
                                                    <!-- .media-body -->
                                                </div>
                                                <!-- .media -->
                                            </div>
                                            <!-- .product -->
                                        </div>
                                        <!-- .products -->
                                    </div>
                                    <!-- .woocommerce -->
                                </div>
                                <!-- .tab-pane -->
                            </div>
                            <!-- .tab-content -->
                            <div class="shop-control-bar-bottom">
                                <form class="form-techmarket-wc-ppp" method="POST">
                                    <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()"
                                        name="ppp">
                                        <option value="20">Show 20</option>
                                        <option value="40">Show 40</option>
                                        <option value="-1">Show All</option>
                                    </select>
                                    <input type="hidden" value="5" name="shop_columns">
                                    <input type="hidden" value="15" name="shop_per_page">
                                    <input type="hidden" value="right-sidebar" name="shop_layout">
                                </form>
                                <!-- .form-techmarket-wc-ppp -->
                                <p class="woocommerce-result-count">
                                    Showing 1&ndash;15 of 73 results
                                </p>
                                <!-- .woocommerce-result-count -->
                                <nav class="woocommerce-pagination">
                                    <ul class="page-numbers">
                                        <li>
                                            <span class="page-numbers current">1</span>
                                        </li>
                                        <li><a href="#" class="page-numbers">2</a></li>
                                        <li><a href="#" class="page-numbers">3</a></li>
                                        <li><a href="#" class="page-numbers">4</a></li>
                                        <li><a href="#" class="page-numbers">5</a></li>
                                        <li><a href="#" class="next page-numbers">→</a></li>
                                    </ul>
                                    <!-- .page-numbers -->
                                </nav>
                                <!-- .woocommerce-pagination -->
                            </div>
                            <!-- .shop-control-bar-bottom -->
                        </main>
                        <!-- #main -->
                    </div>
                    <!-- #primary -->
                    <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                        <div class="widget woocommerce widget_product_categories techmarket_widget_product_categories"
                            id="techmarket_product_categories_widget-2">
                            <ul class="product-categories ">
                                <li class="product_cat">
                                    <span>Browse Categories</span>
                                    <ul>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>Televisions</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>Home Theater &amp; Audio</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Headphones</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Digital Cameras</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Cells &amp; Tablets</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>Smartwatches</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Games &amp; Consoles</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>Printer</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>TV &amp; Video</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Home Entertainment</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Computers &amp; Laptops</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>Notebooks</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Desktop PCs</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>Mac Computers</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>All in One PC</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Audio &amp; Music</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>PC Components</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="child-indicator">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>Desktop PCs</a>
                                        </li>
                                        <li class="cat-item">
                                            <a href="product-category.html">
                                                <span class="no-child"></span>Monitors</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div id="techmarket_products_filter-3" class="widget widget_techmarket_products_filter">
                            <span class="gamma widget-title">Filters</span>
                            <div class="widget woocommerce widget_price_filter" id="woocommerce_price_filter-2">
                                <p>
                                    <span class="gamma widget-title">Filter by price</span>
                                <div class="price_slider_amount">
                                    <input id="amount" type="text" placeholder="Min price" data-min="6"
                                        value="33" name="min_price" style="display: none;">
                                    <button class="button" type="submit">Filter</button>
                                </div>
                                <div id="slider-range" class="price_slider"></div>
                            </div>
                            <div class="widget woocommerce widget_layered_nav maxlist-more"
                                id="woocommerce_layered_nav-2">
                                <span class="gamma widget-title">Thương hiệu</span>
                                <ul>
                                    <li class="wc-layered-nav-term ">
                                        <a href="#">apple</a>
                                        <span class="count">(2)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">bosch</a>
                                        <span class="count">(1)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">cannon</a>
                                        <span class="count">(1)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">connect</a>
                                        <span class="count">(1)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">galaxy</a>
                                        <span class="count">(3)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">gopro</a>
                                        <span class="count">(1)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">kinova</a>
                                        <span class="count">(1)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">samsung</a>
                                        <span class="count">(1)</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- .woocommerce widget_layered_nav -->
                            <div class="widget woocommerce widget_layered_nav maxlist-more"
                                id="woocommerce_layered_nav-3">
                                <span class="gamma widget-title">Color</span>
                                <ul>
                                    <li class="wc-layered-nav-term "><a href="#">Black</a>
                                        <span class="count">(4)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Blue</a>
                                        <span class="count">(4)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Green</a>
                                        <span class="count">(5)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Orange</a>
                                        <span class="count">(5)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Red</a>
                                        <span class="count">(4)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Yellow</a>
                                        <span class="count">(5)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Green</a>
                                        <span class="count">(5)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Orange</a>
                                        <span class="count">(5)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Red</a>
                                        <span class="count">(4)</span>
                                    </li>
                                    <li class="wc-layered-nav-term "><a href="#">Yellow</a>
                                        <span class="count">(5)</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- .woocommerce widget_layered_nav -->
                        </div>
                        <div class="widget widget_techmarket_products_carousel_widget">
                            <section id="single-sidebar-carousel" class="section-products-carousel">
                                <header class="section-header">
                                    <h2 class="section-title">Latest Products</h2>
                                    <nav class="custom-slick-nav"></nav>
                                </header>
                                <!-- .section-header -->
                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products"
                                    data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
                                    <div class="container-fluid">
                                        <div class="woocommerce columns-1">
                                            <div class="products">
                                                <div class="landscape-product-widget product">
                                                    <a class="woocommerce-LoopProduct-link"
                                                        href="single-product-fullwidth.html">
                                                        <div class="media">
                                                            <img class="wp-post-image"
                                                                src="home/assets/images/products/sm-1.jpg"
                                                                alt="">
                                                            <div class="media-body">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 50.99</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">26.99</span>
                                                                    </del>
                                                                </span>
                                                                <!-- .price -->
                                                                <h2 class="woocommerce-loop-product__title">S100
                                                                    Wireless Bluetooth Speaker – Neon Green</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 0 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:0%">
                                                                            <strong class="rating">0</strong> out of
                                                                            5</span>
                                                                    </div>
                                                                    <span class="review-count">(0)</span>
                                                                </div>
                                                                <!-- .techmarket-product-rating -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </a>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                </div>
                                                <div class="landscape-product-widget product">
                                                    <a class="woocommerce-LoopProduct-link"
                                                        href="single-product-fullwidth.html">
                                                        <div class="media">
                                                            <img class="wp-post-image"
                                                                src="home/assets/images/products/sm-2.jpg"
                                                                alt="">
                                                            <div class="media-body">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 50.99</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">26.99</span>
                                                                    </del>
                                                                </span>
                                                                <!-- .price -->
                                                                <h2 class="woocommerce-loop-product__title">S100
                                                                    Wireless Bluetooth Speaker – Neon Green</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 0 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:0%">
                                                                            <strong class="rating">0</strong> out of
                                                                            5</span>
                                                                    </div>
                                                                    <span class="review-count">(0)</span>
                                                                </div>
                                                                <!-- .techmarket-product-rating -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </a>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                </div>
                                                <div class="landscape-product-widget product">
                                                    <a class="woocommerce-LoopProduct-link"
                                                        href="single-product-fullwidth.html">
                                                        <div class="media">
                                                            <img class="wp-post-image"
                                                                src="home/assets/images/products/sm-3.jpg"
                                                                alt="">
                                                            <div class="media-body">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 50.99</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">26.99</span>
                                                                    </del>
                                                                </span>
                                                                <!-- .price -->
                                                                <h2 class="woocommerce-loop-product__title">S100
                                                                    Wireless Bluetooth Speaker – Neon Green</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 0 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:0%">
                                                                            <strong class="rating">0</strong> out of
                                                                            5</span>
                                                                    </div>
                                                                    <span class="review-count">(0)</span>
                                                                </div>
                                                                <!-- .techmarket-product-rating -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </a>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                </div>
                                                <div class="landscape-product-widget product">
                                                    <a class="woocommerce-LoopProduct-link"
                                                        href="single-product-fullwidth.html">
                                                        <div class="media">
                                                            <img class="wp-post-image"
                                                                src="home/assets/images/products/sm-4.jpg"
                                                                alt="">
                                                            <div class="media-body">
                                                                <span class="price">
                                                                    <ins>
                                                                        <span class="amount"> 50.99</span>
                                                                    </ins>
                                                                    <del>
                                                                        <span class="amount">26.99</span>
                                                                    </del>
                                                                </span>
                                                                <!-- .price -->
                                                                <h2 class="woocommerce-loop-product__title">S100
                                                                    Wireless Bluetooth Speaker – Neon Green</h2>
                                                                <div class="techmarket-product-rating">
                                                                    <div title="Rated 0 out of 5"
                                                                        class="star-rating">
                                                                        <span style="width:0%">
                                                                            <strong class="rating">0</strong> out of
                                                                            5</span>
                                                                    </div>
                                                                    <span class="review-count">(0)</span>
                                                                </div>
                                                                <!-- .techmarket-product-rating -->
                                                            </div>
                                                            <!-- .media-body -->
                                                        </div>
                                                        <!-- .media -->
                                                    </a>
                                                    <!-- .woocommerce-LoopProduct-link -->
                                                </div>
                                            </div>
                                            <!-- .products -->
                                        </div>
                                        <!-- .woocommerce -->
                                    </div>
                                    <!-- .container-fluid -->
                                </div>
                                <!-- .products-carousel -->
                            </section>
                            <!-- .section-products-carousel -->
                        </div>
                        <!-- .widget_techmarket_products_carousel_widget -->
                    </div>
                    <!-- #secondary -->
                </div>
                <!-- .row -->
            </div>
            <!-- .col-full -->
        </div>
        <!-- #content -->
        <div class="col-full">
            <section class="brands-carousel">
                <h2 class="sr-only">Brands Carousel</h2>
                <div class="col-full" data-ride="tm-slick-carousel" data-wrap=".brands"
                    data-slick="{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;:400,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:800,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                    <div class="brands">
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>apple</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="apple" src="home/assets/images/brands/1.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>bosch</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="bosch" src="home/assets/images/brands/2.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>cannon</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="cannon" src="home/assets/images/brands/3.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>connect</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="connect" src="home/assets/images/brands/4.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>galaxy</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="galaxy" src="home/assets/images/brands/5.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>gopro</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="gopro" src="home/assets/images/brands/6.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>handspot</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="handspot" src="home/assets/images/brands/7.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>kinova</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="kinova" src="home/assets/images/brands/8.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>nespresso</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="nespresso" src="home/assets/images/brands/9.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>samsung</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="samsung" src="home/assets/images/brands/10.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>speedway</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="speedway" src="home/assets/images/brands/11.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                        <div class="item">
                            <a href="shop.html">
                                <figure>
                                    <figcaption class="text-overlay">
                                        <div class="info">
                                            <h4>yoko</h4>
                                        </div>
                                        <!-- /.info -->
                                    </figcaption>
                                    <img width="145" height="50" class="img-responsive desaturate"
                                        alt="yoko" src="home/assets/images/brands/12.png">
                                </figure>
                            </a>
                        </div>
                        <!-- .item -->
                    </div>
                </div>
                <!-- .col-full -->
            </section>
            <!-- .brands-carousel -->
        </div>
        <!-- .col-full -->
        <footer class="site-footer footer-v1">
            <div class="col-full">
                <div class="before-footer-wrap">
                    <div class="col-full">
                        <div class="footer-newsletter">
                            <div class="media">
                                <i class="footer-newsletter-icon tm tm-newsletter"></i>
                                <div class="media-body">
                                    <div class="clearfix">
                                        <div class="newsletter-header">
                                            <h5 class="newsletter-title">Sign up to Newsletter</h5>
                                            <span class="newsletter-marketing-text">...and receive
                                                <strong>$20 coupon for first shopping</strong>
                                            </span>
                                        </div>
                                        <!-- .newsletter-header -->
                                        <div class="newsletter-body">
                                            <form class="newsletter-form">
                                                <input type="text" placeholder="Enter your email address">
                                                <button class="button" type="button">Sign up</button>
                                            </form>
                                        </div>
                                        <!-- .newsletter body -->
                                    </div>
                                    <!-- .clearfix -->
                                </div>
                                <!-- .media-body -->
                            </div>
                            <!-- .media -->
                        </div>
                        <!-- .footer-newsletter -->
                        <div class="footer-social-icons">
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
                        </div>
                        <!-- .footer-social-icons -->
                    </div>
                    <!-- .col-full -->
                </div>
                <!-- .before-footer-wrap -->
                <div class="footer-widgets-block">
                    <div class="row">
                        <div class="footer-contact">
                            <div class="footer-logo">
                                <a href="home-v1.html" class="custom-logo-link" rel="home">
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
                            </div>
                            <!-- .footer-logo -->
                            <div class="contact-payment-wrap">
                                <div class="footer-contact-info">
                                    <div class="media">
                                        <span class="media-left icon media-middle">
                                            <i class="tm tm-call-us-footer"></i>
                                        </span>
                                        <div class="media-body">
                                            <span class="call-us-title">Got Questions ? Call us 24/7!</span>
                                            <span class="call-us-text">(800) 8001-8588, (0600) 874 548</span>
                                            <address class="footer-contact-address">17 Princess Road, London, Greater
                                                London NW1 8JR, UK</address>
                                            <a href="#" class="footer-address-map-link">
                                                <i class="tm tm-map-marker"></i>Find us on map</a>
                                        </div>
                                        <!-- .media-body -->
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .footer-contact-info -->
                                <div class="footer-payment-info">
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
                                                            src="home/assets/images/credit-cards/mastercard.svg"
                                                            alt="mastercard" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="home/assets/images/credit-cards/visa.svg"
                                                            alt="visa" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="home/assets/images/credit-cards/paypal.svg"
                                                            alt="paypal" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="payment-icon-image"
                                                            src="home/assets/images/credit-cards/maestro.svg"
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
                                                            src="home/assets/images/secured-by/norton.svg"
                                                            alt="norton" />
                                                    </li>
                                                    <li class="nav-item">
                                                        <img class="secure-icons-image"
                                                            src="home/assets/images/secured-by/mcafee.svg"
                                                            alt="mcafee" />
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- .footer-secure-by-info -->
                                        </div>
                                        <!-- .media-body -->
                                    </div>
                                    <!-- .media -->
                                </div>
                                <!-- .footer-payment-info -->
                            </div>
                            <!-- .contact-payment-wrap -->
                        </div>
                        <!-- .footer-contact -->
                        <div class="footer-widgets">
                            <div class="columns">
                                <aside class="widget clearfix">
                                    <div class="body">
                                        <h4 class="widget-title">Find it Fast</h4>
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
                                        <h4 class="widget-title">Customer Care</h4>
                                        <div class="menu-footer-menu-3-container">
                                            <ul id="menu-footer-menu-3" class="menu">
                                                <li class="menu-item">
                                                    <a href="{{ route('client.edit') }}">My Account</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="track-your-order.html">Track Order</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="shop.html">Shop</a>
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
                                        </div>
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
                <div class="site-info">
                    <div class="col-full">
                        <div class="copyright">Copyright &copy; 2017 <a href="home-v1.html">Techmarket</a> Theme.
                            All rights reserved.</div>
                        <!-- .copyright -->
                        <div class="credit">Made with
                            <i class="fa fa-heart"></i> by bcube.
                        </div>
                        <!-- .credit -->
                    </div>
                    <!-- .col-full -->
                </div>
                <!-- .site-info -->
            </div>
            <!-- .col-full -->
        </footer>
        <!-- .site-footer -->
    </div>

    <script type="text/javascript" src="home/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="home/assets/js/tether.min.js"></script>
    <script type="text/javascript" src="home/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="home/assets/js/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="home/assets/js/hidemaxlistitem.min.js"></script>
    <script type="text/javascript" src="home/assets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="home/assets/js/hidemaxlistitem.min.js"></script>
    <script type="text/javascript" src="home/assets/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="home/assets/js/scrollup.min.js"></script>
    <script type="text/javascript" src="home/assets/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="home/assets/js/waypoints-sticky.min.js"></script>
    <script type="text/javascript" src="home/assets/js/pace.min.js"></script>
    <script type="text/javascript" src="home/assets/js/slick.min.js"></script>
    <script type="text/javascript" src="home/assets/js/scripts.js"></script>

</body>

</html>
