@extends('client.layouts.master')
@section('main')
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="home-v1.html">Home</a> 
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span> {{$detailBlog->title}}
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="post format-image">
                        <div class="media-attachment">
                            <div class="post-thumbnail">
                                <img width="500"  alt="" class="wp-post-image"  src="{{ url('admin/assets/images/blog') . '/' . $detailBlog->image }}">
                            </div>
                        </div>
                        <header class="entry-header">
                            <h1 class="entry-title">{{$detailBlog->title}}
                                
                            </h1>
                            <!-- .entry-title -->
                            <div class="entry-meta">
                              
                                <!-- .cat-links -->
                                <span class="posted-on">
                                    <a rel="bookmark" href="#">
                                        <time datetime="2017-03-23T08:06:09+00:00" class="entry-date published">{{$detailBlog->published_at }}</time>
                                    </a>
                                </span>
                                <!-- .posted-on -->
                                <span class="author">
                                    <a rel="author" title="{{ $detailBlog->user->name }}" href="#">{{ $detailBlog->user->name }}</a>
                                </span>
                                <!-- .author -->
                            </div>
                            <!-- .entry-meta -->
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content" itemprop="articleBody">
                            <p>{{ $detailBlog->content }}</p>
                            
                            <!-- .row -->
                        </div>
                        <!-- .entry-content -->
                    </article>
                    <!-- .post -->
              
                    <!-- .post-author-info -->
                    
                    <!-- /.post-navigation -->
                    
                    <!-- .comments-area -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            
            <!-- .sidebar-blog -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>

@endsection