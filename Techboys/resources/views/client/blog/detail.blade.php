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
                <a href="product-category.html">Laptops</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>Tech Terms you should know before your adventure
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article class="post format-image">
                        <div class="media-attachment">
                            <div class="post-thumbnail">
                                <img width="1433" height="560" alt="" class="wp-post-image" src="{{ asset('home/assets/images/blog/1.jpg') }} ">
                            </div>
                        </div>
                        <header class="entry-header">
                            <h1 class="entry-title">Tech Terms you should know before your adventure
                                <span class="comments-link">
                                    <a href="#comments">3</a>
                                </span>
                            </h1>
                            <!-- .entry-title -->
                            <div class="entry-meta">
                                <span class="cat-links">
                                    <a rel="category tag" href="#">Laptops</a>
                                </span>
                                <!-- .cat-links -->
                                <span class="posted-on">
                                    <a rel="bookmark" href="#">
                                        <time datetime="2017-03-23T08:06:09+00:00" class="entry-date published">March 23, 2017</time>
                                    </a>
                                </span>
                                <!-- .posted-on -->
                                <span class="author">
                                    <a rel="author" title="Posts by Jane Smith" href="#">Jane Smith</a>
                                </span>
                                <!-- .author -->
                            </div>
                            <!-- .entry-meta -->
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content" itemprop="articleBody">
                            <p>A desktop computer is a computer that is designed to stay in a single location. It may be a tower or an all-in-one PC. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p class="highlight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, erat in malesuada aliquam, est erat faucibus purus, eget viverra nulla sem vitae neque. Quisque id sodales libero. In nec enim nisi, in ultricies quam. Sed lacinia feugiat velit, cursus molestie lectus mollis et.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, erat in malesuada aliquam, est erat faucibus purus, eget viverra nulla sem vitae neque. Quisque id sodales libero. In nec enim nisi, in ultricies quam. Sed lacinia feugiat velit, cursus molestie lectus mollis et.</p>
                            <p>Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum. Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus. Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue. Pellentesque vitae eros eget enim mollis placerat.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="highlight-light">Mauris tempus erat laoreet turpis lobortis, eu tincidunt erat fermentum.</p>
                                    <p>Aliquam non tincidunt urna. Integer tincidunt nec nisl vitae ullamcorper. Proin sed ultrices erat. Praesent varius ultrices massa at faucibus. Aenean dignissim, orci sed faucibus pharetra, dui mi dignissim tortor, sit amet condimentum mi ligula sit amet augue. Pellentesque vitae eros eget enim mollis placerat.
                                    </p>
                                </div>
                                <!-- .col -->
                                <div class="col-md-6">
                                    <blockquote>
                                        <p>Pellentesque sodales augue eget ultricies ultricies. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur sagittis ultrices condimentum.</p>
                                        <p>Pellentesque ullamcorper libero in enim pellentesque lobortis. Praesent ut dui ac metus iaculis scelerisque at eget metus.</p>
                                    </blockquote>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .entry-content -->
                    </article>
                    <!-- .post -->
                    <div class="post-author-info">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img src="{{ asset('home/assets/images/blog/author.jpg') }} " alt="">
                                </a>
                            </div>
                            <!-- .media-left -->
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="#">Jane Smith</a>
                                </h4>
                            </div>
                            <!-- .media-body -->
                        </div>
                        <!-- .media -->
                    </div>
                    <!-- .post-author-info -->
                    <nav aria-label="Post Navigation" class="navigation post-navigation" id="post-navigation">
                        <span class="screen-reader-text">Post navigation</span>
                        <div class="nav-links">
                            <div class="nav-previous">
                                <a rel="prev" href="#">
                                    <span class="meta-nav">←</span>&nbsp;How to build your first 4k ready Desktop PC</a>
                            </div>
                            <!-- /.nav-previous -->
                            <div class="nav-next">
                                <a href="#" rel="next">Robot Wars – Now Closed – Post with Gallery &nbsp;
    <span class="meta-nav">→</span>
</a>
                            </div>
                            <!-- /.nav-next -->
                        </div>
                        <!-- /.nav-links -->
                    </nav>
                    <!-- /.post-navigation -->
                    <div id="comments" class="comments-area">
                        <h2 class="comments-title"> 3 Comment</h2>
                        <ol class="commentlist">
                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                <div class="comment_container">
                                    <img width="100" height="100" class="avatar avatar-100 photo" src="{{ asset('home/assets/images/blog/author.jpg') }} " alt="">
                                    <div class="comment-text">
                                        <div class="meta">
                                            <strong class="woocommerce-review__author" itemprop="author">Jane Smith</strong>
                                            <time datetime="2017-03-23T08:06:09+00:00" class="woocommerce-review__published-date">July 24, 2017</time>
                                        </div>
                                        <div class="comment-content">
                                            <div class="description">
                                                <p>good</p>
                                            </div>
                                            <div class="reply">
                                                <a class="comment-edit-link" href="#">Edit</a>
                                                <a href="#respond" class="comment-reply-link" rel="nofollow">Reply</a>
                                            </div>
                                            <!-- .reply -->
                                        </div>
                                        <!-- .comment-content -->
                                    </div>
                                    <!-- .comment-text -->
                                </div>
                                <!-- .comment_container -->
                            </li>
                            <!-- .comment -->
                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                <div class="comment_container">
                                    <img width="100" height="100" class="avatar avatar-100 photo" src="{{ asset(' home/assets/images/blog/author.jpg') }}" alt="">
                                    <div class="comment-text">
                                        <div class="meta">
                                            <strong class="woocommerce-review__author" itemprop="author">Jane Smith</strong>
                                            <time datetime="2017-03-23T08:06:09+00:00" class="woocommerce-review__published-date">July 24, 2017</time>
                                        </div>
                                        <div class="comment-content">
                                            <div class="description">
                                                <p>Awesome</p>
                                            </div>
                                            <div class="reply">
                                                <a class="comment-edit-link" href="#">Edit</a>
                                                <a href="#respond" class="comment-reply-link" rel="nofollow">Reply</a>
                                            </div>
                                            <!-- .reply -->
                                        </div>
                                        <!-- .comment-content -->
                                    </div>
                                    <!-- .comment-text -->
                                </div>
                                <!-- .comment_container -->
                            </li>
                            <!-- .comment -->
                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                <div class="comment_container">
                                    <img width="100" height="100" class="avatar avatar-100 photo" src="{{ asset('home/assets/images/blog/author.jpg') }} " alt="">
                                    <div class="comment-text">
                                        <div class="meta">
                                            <strong class="woocommerce-review__author" itemprop="author">Jane Smith</strong>
                                            <time datetime="2017-03-23T08:06:09+00:00" class="woocommerce-review__published-date">July 24, 2017</time>
                                        </div>
                                        <div class="comment-content">
                                            <div class="description">
                                                <p>Nice</p>
                                            </div>
                                            <div class="reply">
                                                <a class="comment-edit-link" href="#">Edit</a>
                                                <a href="#respond" class="comment-reply-link" rel="nofollow">Reply</a>
                                            </div>
                                            <!-- .reply -->
                                        </div>
                                        <!-- .comment-content -->
                                    </div>
                                    <!-- .comment-text -->
                                </div>
                                <!-- .comment_container -->
                            </li>
                            <!-- .comment -->
                        </ol>
                        <!-- .commentlist -->
                        <div class="comment-respond" id="respond">
                            <h3 class="comment-reply-title" id="reply-title">Leave a Reply</h3>
                            <form novalidate="" class="comment-form" id="commentform" method="post" action="#">
                                <p class="comment-notes">
                                    <span id="email-notes">Your email address will not be published.</span> Required fields are marked
                                    <span class="required">*</span>
                                </p>
                                <p class="comment-form-comment">
                                    <label for="comment">Comment</label>
                                    <textarea required="required" maxlength="65525" rows="8" cols="45" name="comment" id="comment"></textarea>
                                </p>
                                <p class="comment-form-author">
                                    <label for="author">Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" required="required" aria-required="true" maxlength="245" size="30" value="" name="author" id="author">
                                </p>
                                <p class="comment-form-email">
                                    <label for="email">Email
                                        <span class="required">*</span>
                                    </label>
                                    <input type="email" required="required" aria-required="true" aria-describedby="email-notes" maxlength="100" size="30" value="" name="email" id="email">
                                </p>
                                <p class="comment-form-url">
                                    <label for="url">Website</label>
                                    <input type="url" maxlength="200" size="30" value="" name="url" id="url">
                                </p>
                                <p class="form-submit">
                                    <input type="submit" value="Post Comment" class="submit">
                                </p>
                            </form>
                        </div>
                        <!-- #respond -->
                    </div>
                    <!-- .comments-area -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div id="secondary" class="sidebar-blog widget-area" role="complementary">
                <div class="widget widget_search" id="search-2">
                    <form action="#" class="search-form" method="get" role="search">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" name="s" value="" placeholder="Search …" class="search-field">
                        </label>
                        <input type="submit" value="Search" class="search-submit">
                    </form>
                    <!-- .search-form -->
                </div>
                <!-- .widget_search -->
                <div class="widget widget_text" id="text-2">
                    <span class="gamma widget-title">About</span>
                    <div class="textwidget">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, erat in malesuada aliquam, est erat faucibus purus, eget viverra nulla sem vitae neque. Quisque id sodales libero.</p>
                    </div>
                    <!-- .textwidget -->
                </div>
                <!-- .widget_text -->
                <div class="widget widget_categories" id="categories-2">
                    <span class="gamma widget-title">Categories</span>
                    <ul>
                        <li class="cat-item cat-item-53">
                            <a href="product-category.html">Accessories</a>
                        </li>
                        <li class="cat-item cat-item-101">
                            <a href="product-category.html">Design</a>
                        </li>
                        <li class="cat-item cat-item-51">
                            <a href="product-category.html">Desktop PCs</a>
                        </li>
                        <li class="cat-item cat-item-96">
                            <a href="product-category.html">Events</a>
                        </li>
                        <li class="cat-item cat-item-52">
                            <a href="product-category.html">Laptops</a>
                        </li>
                        <li class="cat-item cat-item-93">
                            <a href="product-category.html">Links &amp; Quotes</a>
                        </li>
                        <li class="cat-item cat-item-88">
                            <a href="product-category.html">News</a>
                        </li>
                        <li class="cat-item cat-item-54">
                            <a href="product-category.html">PC Components</a>
                        </li>
                        <li class="cat-item cat-item-89">
                            <a href="product-category.html">Social</a>
                        </li>
                        <li class="cat-item cat-item-102">
                            <a href="product-category.html">Technology</a>
                        </li>
                        <li class="cat-item cat-item-1">
                            <a href="product-category.html">Uncategorized</a>
                        </li>
                        <li class="cat-item cat-item-99">
                            <a href="product-category.html">Videos</a>
                        </li>
                    </ul>
                </div>
                <!-- .widget_categories -->
                <div class="widget techmarket_posts_carousel_widget">
                    <section class="section-posts-carousel" id="sidebar-posts-carousel">
                        <header class="section-header">
                            <h2 class="section-title">Recent Posts</h2>
                            <div class="custom-slick-nav"></div>
                            <!-- .custom-slick-nav -->
                        </header>
                        <!-- .post-items -->
                        <div class="post-item-carousel" data-ride="tm-slick-carousel" data-wrap=".posts" data-slick="{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#sidebar-posts-carousel .custom-slick-nav&quot;}">
                            <div class="posts">
                                <div class="post-item">
                                    <a href="blog-single.html" class="post-thumbnail">
                                        <div class="post-thumbnail">
                                            <img width="270" height="270" alt="" class="attachment-techmarket-blog-carousel wp-post-image" src="{{ asset('home/assets/images/blog/sm-4.jpg') }} ">
                                        </div>
                                    </a>
                                    <!-- .post-thumbnail -->
                                    <div class="post-content">
                                        <a href="blog-single.html" class="post-name" tabindex="-1">Why you should choose dedicated Desktop PC Computer</a>
                                        <span class="comments-link">
                                            <a href="#">Leave a comment</a>
                                        </span>
                                    </div>
                                    <!-- .post-content -->
                                </div>
                                <!-- .post-items -->
                                <div class="post-item">
                                    <a href="blog-single.html" class="post-thumbnail">
                                        <div class="post-thumbnail">
                                            <img width="270" height="270" alt="" class="attachment-techmarket-blog-carousel wp-post-image" src="{{ asset('home/assets/images/blog/sm-1.jpg') }} ">
                                        </div>
                                    </a>
                                    <!-- .post-thumbnail -->
                                    <div class="post-content">
                                        <a href="blog-single.html" class="post-name" tabindex="-1">Tech Terms you should know before your adventure</a>
                                        <span class="comments-link">
                                            <a href="#">Leave a comment</a>
                                        </span>
                                    </div>
                                    <!-- .post-content -->
                                </div>
                                <!-- .post-items -->
                                <div class="post-item">
                                    <a href="blog-single.html" class="post-thumbnail">
                                        <div class="post-thumbnail">
                                            <img width="270" height="270" alt="" class="attachment-techmarket-blog-carousel wp-post-image" src="{{ asset('home/assets/images/blog/sm-2.jpg') }} ">
                                        </div>
                                    </a>
                                    <!-- .post-thumbnail -->
                                    <div class="post-content">
                                        <a href="blog-single.html" class="post-name" tabindex="-1">How to build your first 4k ready Desktop PC</a>
                                        <span class="comments-link">
                                            <a href="#">Leave a comment</a>
                                        </span>
                                    </div>
                                    <!-- .post-content -->
                                </div>
                                <!-- .post-items -->
                                <div class="post-item">
                                    <a href="blog-single.html" class="post-thumbnail">
                                        <div class="post-thumbnail">
                                            <img width="270" height="270" alt="" class="attachment-techmarket-blog-carousel wp-post-image" src="{{ asset('home/assets/images/blog/sm-3.jpg') }} ">
                                        </div>
                                    </a>
                                    <!-- .post-thumbnail -->
                                    <div class="post-content">
                                        <a href="blog-single.html" class="post-name" tabindex="-1">Top 10 Best Graphical Games for testing your Hardware</a>
                                        <span class="comments-link">
                                            <a href="#">Leave a comment</a>
                                        </span>
                                    </div>
                                    <!-- .post-content -->
                                </div>
                                <!-- .post-items -->
                            </div>
                            <!-- .posts-->
                        </div>
                        <!-- .post-item-carousel -->
                    </section>
                    <!-- .section-posts-carousel -->
                </div>
                <!-- .techmarket_posts_carousel_widget -->
                <div class="widget widget_tag_cloud">
                    <span class="gamma widget-title">Tags Clouds</span>
                    <div class="tagcloud">
                        <a style="font-size: 22pt;" class="tag-cloud-link" href="#">amazon like</a>
                        <a style="font-size: 22pt;" class="tag-cloud-link" href="#">Awesome</a>
                        <a style="font-size: 22pt;" class="tag-cloud-link" href="#">bootstrap</a>
                        <a style="font-size: 22pt;" class="tag-cloud-link" href="#">buy it</a>
                        <a style="font-size: 22pt;" class="tag-cloud-link" href="#">clean design</a>
                        <a style="font-size: 8pt;" class="tag-cloud-link" href="#">electronics</a>
                        <a style="font-size: 22pt;" class="tag-cloud-link" href="#">theme</a>
                        <a style="font-size: 8pt;" class="tag-cloud-link" href="#">video post format</a>
                        <a style="font-size: 22pt;" class="tag-cloud-link" href="#">woocommerce</a>
                        <a style="font-size: 22pt;" class="tag-cloud-link" href="#">wordpress</a>
                    </div>
                    <!-- .tagcloud -->
                </div>
                <!-- .widget_tag_cloud -->
            </div>
            <!-- .sidebar-blog -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
@endsection