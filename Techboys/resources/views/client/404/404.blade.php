@extends('client.layouts.master')

@section('main')


<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="home-v1.html">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>Error 404
            </nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="error404">
                        <div class="info-404">
                            <h2 class="title">404!</h2>
                            <p class="lead error-text">Oops! That page can’t be found.</p>
                            <p class="lead">Nothing was found at this location. Try searching, or check out the links below.</p>
                            <div class="sub-form-row">
                                <div class="widget woocommerce widget_product_search">
                                    <form class="search-form">
                                        <input type="text" placeholder="Search products...">
                                        <button class="button" type="button">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- .sub-form-row -->
                    </div>
                    <!-- .error404 -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
@endsection