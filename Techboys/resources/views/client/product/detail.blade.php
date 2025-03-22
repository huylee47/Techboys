@extends('client.layouts.master')

@section('main')
    <style>
        .commentlist .comment .star-rating {
            color: #ffcc00;
            margin-top: 5px;
            display: block;
            /* Ensure it takes full width */
        }

        .commentlist .comment .comment-meta .star-rating {
            display: inline-block;
            /* Keep it in line with the date */
            margin-top: 0;
            /* Reset any top margin */
            margin-left: 5px;
            /* Add some spacing */
        }

        .commentlist {
            list-style: none;
            padding: 0;
        }

        .commentlist .comment {
            margin-bottom: 20px;
            padding: 15px;
            /* border: 1px solid #e1e1e1; */
            border-radius: 5px;
            /* background-color: #f9f9f9; */
        }

        .commentlist .comment .comment-body {
            display: flex;
            align-items: flex-start;
            /* Align items to the top */
        }

        .commentlist .comment .comment-avatar {
            width: 50px;
            margin-right: 15px;
        }

        .commentlist .comment .comment-avatar img {
            width: 100%;
            border-radius: 50%;
        }

        .commentlist .comment .comment-content {
            flex-grow: 1;
            max-width: 80%;
            /* Adjust this value as needed */
        }

        .commentlist .comment .comment-author {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .commentlist .comment .comment-meta {
            font-size: 12px;
            color: #999;
            margin-bottom: 5px;
        }

        .commentlist .comment .star-rating {
            color: #ffcc00;
            margin-top: 5px;
            display: block;
        }

        .commentlist .comment img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }

        .commentlist .comment video {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .reply-input {
            margin-top: 10px;
            margin-left: 20px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: none;
        }

        .reply-input textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .reply-input button {
            margin-top: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .reply-button {
            margin-top: 5px;
            margin-left: 3px;
            padding: 5px 15px;
            border: none;
            background: none;
            color: #007bff;
            cursor: pointer;
            border-radius: 20px;
        }

        .reply-button:hover {
            background: none;
            color: #007bff;
        }

        .reply-input {
            margin-top: 10px;
            margin-left: 40px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: none;
        }

        .reply-input textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .reply-input button {
            margin-top: 5px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .reply-input button:hover {
            background-color: #0056b3;
        }

        .toggle-replies-button {
            margin-top: 5px;
            margin-left: 3px;
            padding: 5px 15px;
            border: none;
            background: none;
            color: #007bff;
            cursor: pointer;
            border-radius: 20px;
        }

        .toggle-replies-button:hover {
            background: none;
            color: #007bff;
        }
    </style>
    <div id="page" class="hfeed site">
        <div id="content" class="site-content" tabindex="-1">
            <div class="col-full">
                <div class="row">
                    <nav class="woocommerce-breadcrumb">
                        <a href="{{ route('home') }}">Trang chủ</a>
                        <span class="delimiter">
                            <i class="tm tm-breadcrumbs-arrow-right"></i>
                        </span><a href="product-category.html">{{ $product->category->name }}</a>
                        <span class="delimiter">
                            <i class="tm tm-breadcrumbs-arrow-right"></i>
                        </span>{{ $product->name }}
                    </nav>
                    <!-- .woocommerce-breadcrumb -->
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <div class="product product-type-simple">
                                <div class="single-product-wrapper">
                                    <div class="product-images-wrapper thumb-count-4">
                                        {{-- <span class="onsale">-
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">$</span>242.99</span>
                                        </span> --}}
                                        <!-- .onsale -->
                                        <div id="techmarket-single-product-gallery"
                                            class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images"
                                            data-columns="4">
                                            <div class="techmarket-single-product-gallery-images"
                                                data-ride="tm-slick-carousel"
                                                data-wrap=".woocommerce-product-gallery__wrapper"
                                                data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">
                                                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                                    data-columns="4">
                                                    <a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
                                                    <figure class="woocommerce-product-gallery__wrapper ">
                                                        @foreach ($images as $img)
                                                            <div data-thumb="{{ url('') }}/admin/assets/images/product/{{ $img->image }}"
                                                                class="woocommerce-product-gallery__image">
                                                                <a href="{{ url('') }}/admin/assets/images/product/{{ $img->image }}"
                                                                    tabindex="0">
                                                                    <img width="400" height="400"
                                                                        src="{{ url('') }}/admin/assets/images/product/{{ $img->image }}"
                                                                        class="attachment-shop_single size-shop_single wp-post-image"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                        @endforeach


                                                        <div data-thumb="{{ url('') }}/home/assets/images/products/sm-card-3.jpg"
                                                            class="woocommerce-product-gallery__image">
                                                            <a href="{{ url('') }}/home/assets/images/products/big-card-2.jpg"
                                                                tabindex="-1">
                                                                <img width="600" height="600"
                                                                    src="{{ url('') }}/home/assets/images/products/big-card-2.jpg"
                                                                    class="attachment-shop_single size-shop_single"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                    </figure>
                                                </div>
                                                <!-- .woocommerce-product-gallery -->
                                            </div>
                                            <!-- .techmarket-single-product-gallery-images -->
                                            <div class="techmarket-single-product-gallery-thumbnails"
                                                data-ride="tm-slick-carousel"
                                                data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper"
                                                data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
                                                <figure class="techmarket-single-product-gallery-thumbnails__wrapper">
                                                    @foreach ($images as $img)
                                                        <figure
                                                            data-thumb="{{ url('') }}/admin/assets/images/product/{{ $img->image }}">
                                                            <img width="180" height="180"
                                                                src="{{ url('') }}/admin/assets/images/product/{{ $img->image }}"
                                                                class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                                alt="">
                                                        </figure>
                                                    @endforeach
                                                    {{-- <figure
                                                        data-thumb="{{ url('') }}/home/assets/images/products/sm-card-3.jpg"
                                                        class="techmarket-wc-product-gallery__image">
                                                        <img width="180" height="180"
                                                            src="{{ url('') }}/home/assets/images/products/sm-card-3.jpg"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail" alt="">
                                                    </figure> --}}
                                                </figure>
                                                <!-- .techmarket-single-product-gallery-thumbnails__wrapper -->
                                            </div>
                                            <!-- .techmarket-single-product-gallery-thumbnails -->
                                        </div>
                                        <!-- .techmarket-single-product-gallery -->
                                    </div>
                                    <!-- .product-images-wrapper -->
                                    <div class="summary entry-summary">
                                        <div class="single-product-header">
                                            <h1 class="product_title entry-title">{{ $product->name }}</h1>
                                        </div>
                                        <!-- .single-product-header -->

                                        <!-- .single-product-meta -->
                                        <div class="rating-and-sharing-wrapper">
                                            <div class="woocommerce-product-rating">
                                                @php
                                                    $averageRating = app(
                                                        'App\Http\Controllers\CommentController',
                                                    )->calculateAverageRating($product->id);
                                                    $ratingCount = $comment->count();
                                                @endphp
                                                <div class="star-rating">
                                                    <span style="width:{{ ($averageRating / 5) * 100 }}%">Đánh giá
                                                        <strong class="rating">{{ $averageRating }}</strong> out of 5 based
                                                        on
                                                        <span class="rating">{{ $ratingCount }}</span> customer
                                                        rating</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .rating-and-sharing-wrapper -->
                                        <div class="woocommerce-product-details__short-description">
                                            <ul>
                                                {!! $product->description !!}
                                            </ul>
                                        </div>

                                        <!-- .woocommerce-product-details__short-description -->
                                        <form enctype="multipart/form-data" action="{{ route('client.cart.add') }}"
                                            method="post" class="cart">
                                            @csrf
                                            <div class="product-actions-wrapper">
                                                <div class="product-actions">
                                                    {{-- <del>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>1,239.99</span>
                                                    </del>
                                                    <ins>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span
                                                                class="woocommerce-Price-currencySymbol">$</span>997.00</span>
                                                    </ins> --}}


                                                    @if (!empty($formattedVariants) && count($formattedVariants) > 0)
                                                        @foreach ($groupedAttributes as $attributeName => $attributeData)
                                                            <div class="choice-group">
                                                                <span class="label">{{ $attributeName }}</span>
                                                                <div class="choice-buttons">
                                                                    @foreach ($attributeData['values'] as $value)
                                                                        @php
                                                                            // Kiểm tra nếu giá trị hiện tại trùng với defaultVariant
                                                                            $isActive =
                                                                                isset(
                                                                                    $defaultVariant['attributes'][
                                                                                        $attributeName
                                                                                    ],
                                                                                ) &&
                                                                                $defaultVariant['attributes'][
                                                                                    $attributeName
                                                                                ]['id'] == $value['id'];
                                                                        @endphp

                                                                        <div class="choice {{ $isActive ? 'active' : '' }}"
                                                                            data-value="{{ $value['value'] }}"
                                                                            data-id="{{ $value['id'] }}"
                                                                            data-attribute="{{ $attributeName }}">
                                                                            {{ $value['value'] }}
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                        <!-- Hiển thị giá và tồn kho -->
                                                        <p>Số lượng tồn kho: <span
                                                            id="stock-display">{{ $defaultVariant['stock'] }}</span>
                                                    </p>
                                                        <p class="price">
                                                            <span class="woocommerce-Price-amount amount"
                                                                id="price-display">
                                                                {{ number_format($defaultVariant['discounted_price'], 0, ',', '.') }}
                                                                đ
                                                            </span>
                                                        </p>

                                                    @else
                                                        <div class="choice storage-choice active" data-value="default"
                                                            data-price="{{ $defaultVariant['discounted_price'] }}"
                                                            data-stock="{{ $defaultVariant['stock'] }}">
                                                            Mặc định (Không có biến thể)
                                                        </div>
                                                        <p >Số lượng tồn kho: <span
                                                            id="stock-display">{{ $defaultVariant['stock'] }}</span>
                                                    </p>
                                                        <p class="price">
                                                            <span class="woocommerce-Price-amount amount"
                                                                id="price-display">
                                                                {{ number_format($defaultVariant['discounted_price'], 0, ',', '.') }}
                                                                đ
                                                            </span>
                                                        </p>

                                                    <br>

                                                    @endif
                                                    <!-- .single-product-header -->

                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="variant_id" id="variant_id"
                                                        value="">
                                                    <!-- .quantity -->
                                                    <div class="cart-button-container">
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="variant_id" id="variant_id" value="">
                                                    
                                                        <button class="single_add_to_cart_button button alt" type="submit">Thêm vào giỏ hàng</button>
                                                        <p id="outOfStockMessage" class="text-danger small">Sản phẩm đã hết hàng</p>
                                                    </div>
                                                    <!-- .cart -->
                                                </div>
                                                <!-- .product-actions -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab-reviews" role="tabpanel">
                                    <div class="techmarket-advanced-reviews" id="reviews">
                                        <div class="advanced-review row">
                                            <div class="advanced-review-rating">
                                                <h2 class="based-title">Đánh giá</h2>
                                                <div class="avg-rating">
                                                    <span class="avg-rating-number">{{ $averageRating }}</span>
                                                    <div title="Rated {{ $averageRating }} out of 5" class="star-rating">
                                                        <span style="width:{{ ($averageRating / 5) * 100 }}%"></span>
                                                    </div>
                                                </div>
                                                <!-- /.avg-rating -->
                                                <div class="rating-histogram">
                                                    @for ($i = 5; $i >= 1; $i--)
                                                        @php
                                                            $count = $comment->where('rate', $i)->count();
                                                            $total = $comment->count();
                                                            $percentage = $total > 0 ? ($count / $total) * 100 : 0;
                                                        @endphp
                                                        <div class="rating-bar">
                                                            <div title="Rated {{ $i }} out of 5"
                                                                class="star-rating">
                                                                <span style="width:{{ ($i / 5) * 100 }}%"></span>
                                                            </div>
                                                            <div class="rating-count">{{ $count }}</div>
                                                            <div class="rating-percentage-bar">
                                                                <span class="rating-percentage"
                                                                    style="width:{{ $percentage }}%"></span>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                                <!-- /.rating-histogram -->
                                            </div>
                                            <!-- /.advanced-review-rating -->
                                            <div class="advanced-review-comment">
                                                <div id="review_form_wrapper">
                                                    <div id="review_form">
                                                        <div class="comment-respond" id="respond">
                                                            <h3 class="comment-reply-title" id="reply-title">Thêm bình
                                                                luận
                                                            </h3>
                                                            @if (session('success'))
                                                                <div class="alert alert-success">
                                                                    {{ session('success') }}
                                                                </div>
                                                            @endif
                                                            @if (session('error'))
                                                                <div class="alert alert-danger">
                                                                    {{ session('error') }}
                                                                </div>
                                                            @endif
                                                            @if (Auth::check())
                                                                @php
                                                                    $existingComment = $comment
                                                                        ->where('user_id', Auth::id())
                                                                        ->first();
                                                                @endphp
                                                                @if ($existingComment)
                                                                    <p>Bạn đã bình luận cho sản phẩm này, mỗi người chỉ được
                                                                        bình luận một lần cho một sản phẩm.</p>
                                                                @else
                                                                    <form novalidate="" class="comment-form"
                                                                        id="commentform" method="post"
                                                                        action="{{ route('client.comment.store') }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="comment-form-rating">
                                                                            <label>Đánh giá của bạn</label>
                                                                            <p class="stars">
                                                                                <span>
                                                                                    <a href="#" class="star-1">1</a>
                                                                                    <a href="#" class="star-2">2</a>
                                                                                    <a href="#" class="star-3">3</a>
                                                                                    <a href="#" class="star-4">4</a>
                                                                                    <a href="#" class="star-5">5</a>
                                                                                </span>
                                                                            </p>
                                                                            <input type="hidden" name="rate"
                                                                                id="rating-value" value="0">
                                                                            @error('rate')
                                                                                @php $message = $message ?? ''; @endphp
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <p class="comment-form-comment">
                                                                            <label for="comment">Bình luận của bạn</label>
                                                                            <textarea aria-required="true" rows="8" cols="45" name="comment" id="comment"></textarea>
                                                                            @error('comment')
                                                                                @php $message = $message ?? ''; @endphp
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </p>
                                                                        <div class="col-md-6 mb-3">
                                                                            <label for="media"
                                                                                class="form-label">Ảnh/Video</label>
                                                                            <input class="form-control" type="file"
                                                                                id="media" name="media"
                                                                                accept="image/*,video/*">
                                                                            <div id="media-preview-container"
                                                                                class="mt-3"
                                                                                style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                                            </div>
                                                                        </div>
                                                                        <p class="form-submit">
                                                                            <input type="submit" value="Bình luận"
                                                                                class="submit" id="submit"
                                                                                name="submit">
                                                                            <input type="hidden" id="comment_post_ID"
                                                                                value="{{ $product->id }}"
                                                                                name="product_id">
                                                                            <input type="hidden" value="0"
                                                                                id="comment_parent" name="comment_parent">
                                                                            <input type="hidden" name="file_id"
                                                                                id="file_id" value="">
                                                                        </p>
                                                                    </form>
                                                                @endif
                                                            @else
                                                                <p>Bạn phải <a href="{{ route('login.client') }}">đăng
                                                                        nhập</a>
                                                                    để bình luận.</p>
                                                            @endif
                                                            <!-- /.comment-form -->
                                                        </div>
                                                        <!-- /.comment-respond -->
                                                    </div>
                                                    <!-- /#review_form -->
                                                </div>
                                                <!-- /#review_form_wrapper -->
                                            </div>
                                            <!-- /.advanced-review-comment -->
                                        </div>
                                        <!-- /.advanced-review -->
                                        @foreach ($comment as $comments)
                                            @if ($comments->status_id == 1)
                                                <div id="comments">
                                                    <ol class="commentlist">
                                                        <li id="li-comment-83"
                                                            class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                                            <div class="comment_container" id="comment-83">
                                                                <div class="comment-text">
                                                                    <div class="comment-body">

                                                                        <div class="comment-content">
                                                                            <p class="comment-author"
                                                                                style="width: max-content;">
                                                                                {{ $comments->user->name }}
                                                                            </p>
                                                                            <p class="comment-meta">
                                                                                <time datetime="2017-06-21T08:05:40+00:00"
                                                                                    itemprop="datePublished"
                                                                                    class="woocommerce-review__published-date">{{ $comments->created_at }}</time>
                                                                            <div class="star-rating">
                                                                                <span
                                                                                    style="width:{{ $comments->rate * 20 }}%">Rated
                                                                                    <strong class="rating">5</strong> out
                                                                                    of
                                                                                    5</span>
                                                                            </div>
                                                                            </p>
                                                                            <div class="description">
                                                                                <p style="width: 1000px;">
                                                                                    {{ $comments->content }}
                                                                                </p>
                                                                                <p>
                                                                                    @if ($comments->storage && strtolower(pathinfo($comments->storage->file, PATHINFO_EXTENSION)) === 'mp4')
                                                                                        <video width="auto"
                                                                                            height="100" controls>
                                                                                            <source
                                                                                                src="{{ asset('admin/assets/images/comment/' . $comments->storage->file) }}"
                                                                                                type="video/mp4">
                                                                                            Trình duyệt của bạn không hỗ trợ
                                                                                            thẻ video.
                                                                                        </video>
                                                                                    @elseif($comments->storage)
                                                                                        <img src="{{ asset('admin/assets/images/comment/' . $comments->storage->file) }}"
                                                                                            alt=""
                                                                                            style="width: auto; max-height: 150px;">
                                                                                    @endif
                                                                                    @if ($comments->replies->isNotEmpty() && $comments->replies->first()->rep_content)
                                                                                        <br>
                                                                                        <button
                                                                                            class="toggle-replies-button"
                                                                                            data-comment-id="{{ $comments->id }}">Hiển
                                                                                            thị phản hồi</button>
                                                                                        <div class="replies-container"
                                                                                            id="replies-container-{{ $comments->id }}"
                                                                                            style="display: none;">
                                                                                            @foreach ($comments->replies as $reply)
                                                                                                <div
                                                                                                    style="margin-left: 30px">
                                                                                                    <p class="comment-author"
                                                                                                        style="width: max-content;">
                                                                                                        Admin</p>
                                                                                                    <p
                                                                                                        style="width: 1000px;">
                                                                                                        {{ $reply->rep_content }}
                                                                                                    </p>
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    @else
                                                                                        <br>
                                                                                        @if (Auth::check() && Auth::user()->role_id == 1)
                                                                                            <button class="reply-button"
                                                                                                data-comment-id="{{ $comments->id }}">Phản
                                                                                                hồi</button>
                                                                                        @endif
                                                                                        <div class="reply-input"
                                                                                            id="reply-input-{{ $comments->id }}"
                                                                                            style="display: none;">
                                                                                            <form method="post"
                                                                                                action="{{ route('client.comment.reply') }}">
                                                                                                @csrf
                                                                                                <textarea rows="3" name="rep_content" placeholder="Nhập phản hồi"></textarea>
                                                                                                <input type="hidden"
                                                                                                    name="comment_id"
                                                                                                    value="{{ $comments->id }}">
                                                                                                <input type="hidden"
                                                                                                    name="comment_content"
                                                                                                    value="{{ $comments->content }}">
                                                                                                <input type="hidden"
                                                                                                    name="comment_rate"
                                                                                                    value="{{ $comments->rate }}">
                                                                                                <input type="hidden"
                                                                                                    name="comment_user_name"
                                                                                                    value="{{ $comments->user->name }}">
                                                                                                <input type="hidden"
                                                                                                    name="comment_created_at"
                                                                                                    value="{{ $comments->created_at }}">
                                                                                                <input type="hidden"
                                                                                                    name="comment_product_id"
                                                                                                    value="{{ $comments->product_id }}">
                                                                                                <input type="hidden"
                                                                                                    name="file_id"
                                                                                                    value="{{ $comments->file_id }}">
                                                                                                <button type="submit"
                                                                                                    class="submit-reply">Gửi</button>
                                                                                            </form>
                                                                                        </div>
                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.description -->
                                                                </div>
                                                                <!-- /.comment-text -->
                                                            </div>
                                                            <!-- /.comment_container -->
                                                        </li>
                                                        <!-- /.comment -->
                                                    </ol>
                                                    <!-- /.commentlist -->
                                                </div>
                                            @endif
                                        @endforeach

                                        <!-- /#comments -->
                                    </div>
                                    <!-- /.techmarket-advanced-reviews -->
                                </div>
                                <!-- .product-actions-wrapper -->

                                <!-- .entry-summary -->

                                <!-- .single-product-wrapper -->
                                {{-- OTHER --}}
                                <!-- .brands-carousel -->
                            </div>
                            <!-- .product -->
                        </main>
                        <!-- #main -->
                    </div>
                    <!-- #primary -->
                </div>
                <!-- .row -->
            </div>
            <!-- .col-full -->
        </div>
    </div>
    <script>
        document.getElementById('media').addEventListener('change', function(event) {
            let previewContainer = document.getElementById('media-preview-container');
            previewContainer.innerHTML = '';

            Array.from(event.target.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let element;
                    if (file.type.startsWith('image/')) {
                        element = document.createElement('img');
                        element.style.width = '100px';
                        element.style.height = '100px';
                        element.style.objectFit = 'cover';
                        element.style.borderRadius = '5px';
                    } else if (file.type.startsWith('video/')) {
                        element = document.createElement('video');
                        element.controls = true;
                        element.style.width = '150px';
                        element.style.height = '100px';
                    }
                    element.src = e.target.result;
                    previewContainer.appendChild(element);
                };
                reader.readAsDataURL(file);
            });
        });

        // Ensure the selected rating is displayed correctly on page load
        document.addEventListener('DOMContentLoaded', function() {
            let rating = document.getElementById('rating-value').value;
            if (rating > 0) {
                document.querySelector('.star-' + rating).classList.add('selected');
            }
        });
    </script>
    <script>
        document.querySelectorAll('.stars a').forEach(star => {
            star.addEventListener('click', function(event) {
                event.preventDefault();
                let rating = this.classList[0].split('-')[1];
                document.getElementById('rating-value').value = rating;
                document.querySelectorAll('.stars a').forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
            });

            star.addEventListener('mouseover', function() {
                document.querySelectorAll('.stars a').forEach(s => s.classList.remove('hover'));
                this.classList.add('hover');
            });

            star.addEventListener('mouseout', function() {
                document.querySelectorAll('.stars a').forEach(s => s.classList.remove('hover'));
            });
        });

        document.querySelector('.stars').addEventListener('mouseout', function() {
            let rating = document.getElementById('rating-value').value;
            document.querySelectorAll('.stars a').forEach(s => s.classList.remove('selected'));
            if (rating > 0) {
                document.querySelector('.star-' + rating).classList.add('selected');
            }
        });

        // Ensure the selected rating is displayed correctly on page load
        document.addEventListener('DOMContentLoaded', function() {
            let rating = document.getElementById('rating-value').value;
            if (rating > 0) {
                document.querySelector('.star-' + rating).classList.add('selected');
            }
        });
    </script>

    <script>
        document.querySelectorAll('.reply-button').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                const replyInput = document.getElementById(`reply-input-${commentId}`);
                replyInput.style.display = replyInput.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>

    <script>
        document.querySelectorAll('.toggle-replies-button').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                const repliesContainer = document.getElementById(`replies-container-${commentId}`);
                repliesContainer.style.display = repliesContainer.style.display === 'none' ? 'block' :
                    'none';
                this.textContent = repliesContainer.style.display === 'none' ? 'Hiển thị phản hồi' :
                    'Ẩn phản hồi';
            });
        });
    </script>

    {{-- Huy --}}
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const variants = @json($formattedVariants);
    let selectedAttributes = {};

    const productPriceElement = document.getElementById("price-display");
    const stockQuantityElement = document.getElementById("stock-display");

    function updateAvailableChoices() {
        console.log(" Cập nhật danh sách lựa chọn...");

        let firstGroup = document.querySelector(".choice-group:first-child");
        let firstAttribute = firstGroup.querySelector(".label").innerText.trim();

        let selectedFirstValue = selectedAttributes[firstAttribute];

        if (!selectedFirstValue) return;

        let filteredVariants = variants.filter(v =>
            v.attributes[firstAttribute]?.value === selectedFirstValue
        );

        console.log(" Biến thể hợp lệ sau khi lọc:", filteredVariants);

        let availableValues = {};
        filteredVariants.forEach(variant => {
            Object.keys(variant.attributes).forEach(attr => {
                if (attr !== firstAttribute) {
                    if (!availableValues[attr]) {
                        availableValues[attr] = new Set();
                    }
                    availableValues[attr].add(variant.attributes[attr].value);
                }
            });
        });

        document.querySelectorAll(".choice").forEach(choice => {
            let attribute = choice.getAttribute("data-attribute");
            let value = choice.getAttribute("data-value");

            if (attribute === firstAttribute) {
                choice.style.display = "inline-block";
                return;
            }

            if (availableValues[attribute] && availableValues[attribute].has(value)) {
                choice.style.display = "inline-block";
            } else {
                choice.style.display = "none";
            }
        });

        document.querySelectorAll(".choice-group").forEach((group, index) => {
            if (index > 0) {
                let choices = group.querySelectorAll(".choice");
                let firstVisibleChoice = Array.from(choices).find(choice => choice.style.display !== "none");
                if (firstVisibleChoice) {
                    let attribute = group.querySelector(".label").innerText.trim();
                    selectedAttributes[attribute] = firstVisibleChoice.getAttribute("data-value");

                    choices.forEach(c => c.classList.remove("selected"));
                    firstVisibleChoice.classList.add("selected");
                }
            }
        });

        updateVariantInfo();
    }

    function updateVariantInfo() {
        console.log("Kiểm tra biến thể...");
        console.log("Thuộc tính đã chọn:", selectedAttributes);

        let selectedVariant = variants.find(v =>
            Object.keys(selectedAttributes).every(attr => v.attributes[attr]?.value === selectedAttributes[attr])
        );

        if (selectedVariant) {
            console.log(" Biến thể tìm thấy:", selectedVariant);
            productPriceElement.innerText = new Intl.NumberFormat('vi-VN').format(selectedVariant.discounted_price) + " đ";
            stockQuantityElement.innerText = selectedVariant.stock;
        } else {
            console.warn("Không có biến thể phù hợp!");
            productPriceElement.innerText = "Không có biến thể này!";
            stockQuantityElement.innerText = "0";
        }
    }

    function initializeDefaultSelection() {
        // **Chọn phần tử đầu tiên của nhóm đầu tiên**
        let firstGroup = document.querySelector(".choice-group:first-child");
        if (firstGroup) {
            let firstChoice = firstGroup.querySelector(".choice");
            if (firstChoice) {
                let attribute = firstGroup.querySelector(".label").innerText.trim();
                selectedAttributes[attribute] = firstChoice.getAttribute("data-value");

                // Loại bỏ class 'selected' khỏi các lựa chọn khác
                firstGroup.querySelectorAll(".choice").forEach(c => c.classList.remove("selected"));
                firstChoice.classList.add("selected");
            }
        }

        updateAvailableChoices();
    }

    document.querySelectorAll(".choice").forEach(choice => {
        choice.addEventListener("click", function () {
            let group = this.closest(".choice-group");
            let attribute = group.querySelector(".label").innerText.trim();

            group.querySelectorAll(".choice").forEach(c => c.classList.remove("selected"));
            this.classList.add("selected");

            selectedAttributes[attribute] = this.getAttribute("data-value");

            updateAvailableChoices();
        });
    });

    initializeDefaultSelection();
    updateVariantInfo();
});

</script>


@endsection
