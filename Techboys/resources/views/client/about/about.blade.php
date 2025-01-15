@extends('client.layouts.master')

@section('main')
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="home-v1.html">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                About Us
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <header class="entry-header">
                            <div class="page-featured-image">
                                <img width="1920" height="1391" alt="" class="attachment-full size-full wp-post-image" src="{{ asset('home/assets/images/products/about-header.jpg') }}">
                            </div>
                            <!-- .page-featured-image -->
                            <div class="page-header-caption">
                                <h1 class="entry-title">About Us</h1>
                                <p class="entry-subtitle">Passion may be a friendly or eager interest in or admiration for a proposal,
                                    <br> cause, discovery, or activity or love to a feeling of unusual excitement. </p>
                            </div>
                            <!-- .page-header-caption -->
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="about-features row">
                                <div class="col-md-4">
                                    <div class="single-image">
                                        <img alt="" class="" src="{{ asset('home/assets/images/products/3column1.jpg') }}">
                                    </div>
                                    <!-- .single_image -->
                                    <div class="text-block">
                                        <h2 class="align-top">What we really do?</h2>
                                        <p>Donec libero dolor, tincidunt id laoreet vitae,ullamcorper eu tortor. Maecenas pellentesque,dui vitae iaculis mattis, tortor nisi faucibus magna,vitae ultrices lacus purus vitae metus.</p>
                                    </div>
                                    <!-- .text_block -->
                                </div>
                                <!-- .col -->
                                <div class="col-md-4">
                                    <div class="single-image">
                                        <img alt="" class="" src="{{ asset('home/assets/images/products/3column2.jpg') }}">
                                    </div>
                                    <!-- .single_image -->
                                    <div class="text-block">
                                        <h2 class="align-top">Our Vision</h2>
                                        <p>Donec libero dolor, tincidunt id laoreet vitae,ullamcorper eu tortor. Maecenas pellentesque,dui vitae iaculis mattis, tortor nisi faucibus magna,vitae ultrices lacus purus vitae metus.</p>
                                    </div>
                                    <!-- .text_block -->
                                </div>
                                <!-- .col -->
                                <div class="col-md-4">
                                    <div class="single-image">
                                        <img alt="" class="" src="{{ asset('home/assets/images/products/3column2.jpg') }}">
                                    </div>
                                    <!-- .single_image -->
                                    <div class="text-block">
                                        <h2 class="align-top">History of Beginning</h2>
                                        <p>Donec libero dolor, tincidunt id laoreet vitae,ullamcorper eu tortor. Maecenas pellentesque,dui vitae iaculis mattis, tortor nisi faucibus magna,vitae ultrices lacus purus vitae metus.</p>
                                    </div>
                                    <!-- .text_block -->
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- .about-features -->
                            <div class="light-bg team-member-wrapper">
                                <div class="col-full">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="team-member">
                                                <img src="{{ asset('home/assets/images/team-member/1.jpg') }}" alt="">
                                                <div class="profile">
                                                    <h3>Thomas Snow
                                                        <small class="description">CEO/Founder</small>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-2">
                                            <div class="team-member circle">
                                                <img src="{{ asset('home/assets/images/team-member/2.jpg') }}" alt="">
                                                <div class="profile">
                                                    <h3>Anna Baranov
                                                        <small class="description">Client Care</small>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-2">
                                            <div class="team-member circle">
                                                <img src="{{ asset('home/assets/images/team-member/3.jpg') }}" alt="">
                                                <div class="profile">
                                                    <h3>Andre Kowalsy
                                                        <small class="description">Support Boss</small>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-2">
                                            <div class="team-member circle">
                                                <img src="{{ asset('home/assets/images/team-member/4.jpg') }}" alt="">
                                                <div class="profile">
                                                    <h3>Pamela Doe
                                                        <small class="description">Delivery Driver</small>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-2">
                                            <div class="team-member circle">
                                                <img src="{{ asset('home/assets/images/team-member/5.jpg') }}" alt="">
                                                <div class="profile">
                                                    <h3>Susan McCain
                                                        <small class="description">Packaging Girl</small>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-2">
                                            <div class="team-member circle">
                                                <img src="{{ asset('home/assets/images/team-member/7.png') }}" alt="">
                                                <div class="profile">
                                                    <h3>See Details
                                                        <small class="description"></small>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col -->
                                    </div>
                                    <!-- .row -->
                                </div>
                                <!-- .container -->
                            </div>
                            <!-- .team-member-wrapper -->
                            <div class="row accordion-block">
                                <div class="text-boxes col-sm-7">
                                    <div class="row first-row">
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">What we really do?</h3>
                                                <p>Donec libero dolor, tincidunt id laoreet vitae, ullamcorper eu tortor. Maecenas pellentesque, dui vitae iaculis mattis, tortor nisi faucibus magna, vitae ultrices lacus purus vitae metus. Ut nec odio facilisis, ultricies nunc eget, fringilla orci.</p>
                                            </div>
                                            <!-- .text-block -->
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">Our Vision</h3>
                                                <p>Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur. Vestibulum velit nibh, egestas vel faucibus vitae.</p>
                                            </div>
                                            <!-- .text-block -->
                                        </div>
                                        <!-- .col -->
                                    </div>
                                    <!-- .row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">What we really do?</h3>
                                                <p>Donec libero dolor, tincidunt id laoreet vitae, ullamcorper eu tortor. Maecenas pellentesque, dui vitae iaculis mattis, tortor nisi faucibus magna, vitae ultrices lacus purus vitae metus. Ut nec odio facilisis, ultricies nunc eget, fringilla orci.</p>
                                            </div>
                                            <!-- .text-block -->
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">Our Vision</h3>
                                                <p>Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur. Vestibulum velit nibh, egestas vel faucibus vitae.</p>
                                            </div>
                                            <!-- .text-block -->
                                        </div>
                                        <!-- .col -->
                                    </div>
                                    <!-- .row -->
                                </div>
                                <!-- .text-boxes -->
                                <div class="about-accordion col-sm-5">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <h3 class="about-accordion-title">What can we do for you ?</h3>
                                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="fa-icon"></i>
                                                                Support 24/7
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-block">
                                                            Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                <i class="fa-icon"></i>
                                                                Best Quality
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="card-block">
                                                            Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                <i class="fa-icon"></i>
                                                                Fastest Delivery
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="card-block">
                                                            Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFour">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                <i class="fa-icon"></i>
                                                                Customer Care
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                                                        <div class="card-block">
                                                            Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFive">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                <i class="fa-icon"></i>
                                                                Over 200 Satisfied Customers
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                                                        <div class="card-block">
                                                            Vestibulum velit nibh, egestas vel faucibus vitae, feugiat sollicitudin urna. Praesent iaculis id ipsum sit amet pretium. Aliquam tristique sapien nec enim euismod, scelerisque facilisis arcu consectetur.
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .hentry -->
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