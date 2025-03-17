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
            margin-left: 100px;
            padding: 5px 15px;
            border: none;
            background: none;
            color: #007bff;
            cursor: pointer;
            border-radius: 20px;
        }

        .reply-button:hover {
            background: none; /* Ensure no background change on hover */
            color: #007bff; /* Ensure no color change on hover */
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
                                                                    class="attachment-shop_single size-shop_single" alt="">
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
                                                    $averageRating = app('App\Http\Controllers\CommentController')->calculateAverageRating($product->id);
                                                    $ratingCount = $commment->count();
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
                                                    @php
                                                        $defaultVariant = $variants->sortBy('model.value')->first();
                                                    @endphp

                                                    <div class="choice-group">
                                                        <span class="label">Dung lượng</span>
                                                        <div class="choice-buttons">
                                                            @foreach ($variants->groupBy('model.name') as $modelName => $variantGroup)
                                                                                                                    @php
                                                                                                                        $isActive =
                                                                                                                            $modelName == $defaultVariant->model->name
                                                                                                                            ? 'active'
                                                                                                                            : '';
                                                                                                                    @endphp
                                                                                                                    <div class="choice storage-choice {{ $isActive }}"
                                                                                                                        data-value="{{ $modelName }}"
                                                                                                                        data-price="{{ optional($variantGroup->first())->discounted_price }}"
                                                                                                                        data-model-value="{{ $variantGroup->first()->model->id }}"
                                                                                                                        data-stock="{{ $variantGroup->first()->stock }}">
                                                                                                                        {{ $modelName }}
                                                                                                                    </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="choice-group">
                                                        <span class="label">Màu sắc</span>
                                                        <div class="choice-buttons">
                                                            @foreach ($variants->sortBy('color.name') as $variant)
                                                                <div class="choice color-choice"
                                                                    data-value="{{ $variant->color->name }}"
                                                                    data-model="{{ $variant->model->name }}"
                                                                    data-price="{{ optional($variantGroup->first())->discounted_price }}"
                                                                    data-stock="{{ $variant->stock }}" style="display: none;">
                                                                    <span>{{ $variant->color->name }}</span>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <p>Số lượng tồn kho: <span
                                                            id="stockQuantity">{{ $defaultVariant->stock }}</span></p>

                                                    <p class="price">
                                                        <span class="woocommerce-Price-amount amount" id="productPrice">
                                                            {{ number_format($defaultVariant->discounted_price, 0, ',', '.') }}
                                                            đ
                                                        </span>
                                                    </p>



                                                    <!-- .single-product-header -->

                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="variant_id" id="variant_id" value="">

                                                    <!-- .quantity -->

                                                    <button class="single_add_to_cart_button button alt" type="submit">Thêm
                                                        vào giỏ hàng</button>
                                                    <p id="outOfStockMessage" class="text-danger small">Sản phẩm đã hết
                                                        hàng</p>
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
                                                                                                        $count = $commment->where('rate', $i)->count();
                                                                                                        $total = $commment->count();
                                                                                                        $percentage = ($total > 0) ? ($count / $total) * 100 : 0;
                                                                                                    @endphp
                                                                                                    <div class="rating-bar">
                                                                                                        <div title="Rated {{ $i }} out of 5" class="star-rating">
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
                                                            <h3 class="comment-reply-title" id="reply-title">Thêm bình luận
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
                                                                <form novalidate="" class="comment-form" id="commentform"
                                                                    method="post" action="{{ route('client.comment.store') }}"
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
                                                                        <input type="hidden" name="rate" id="rating-value"
                                                                            value="0">
                                                                        @error('rate')
                                                                            @php $message = $message ?? ''; @endphp
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <p class="comment-form-comment">
                                                                        <label for="comment">Bình luận của bạn</label>
                                                                        <textarea aria-required="true" rows="8" cols="45"
                                                                            name="comment" id="comment"></textarea>
                                                                        @error('comment')
                                                                            @php $message = $message ?? ''; @endphp
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </p>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label for="media" class="form-label">Ảnh/Video</label>
                                                                        <input class="form-control" type="file" id="media"
                                                                            name="media" accept="image/*,video/*">
                                                                        <div id="media-preview-container" class="mt-3"
                                                                            style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                                        </div>
                                                                    </div>
                                                                    <p class="form-submit">
                                                                        <input type="submit" value="Bình luận" class="submit"
                                                                            id="submit" name="submit">
                                                                        <input type="hidden" id="comment_post_ID"
                                                                            value="{{ $product->id }}" name="product_id">
                                                                        <input type="hidden" value="0" id="comment_parent"
                                                                            name="comment_parent">
                                                                        <input type="hidden" name="file_id" id="file_id"
                                                                            value="">
                                                                    </p>
                                                                </form>

                                                            @else
                                                                <p>Bạn phải <a href="{{ route('login.client') }}">đăng nhập</a>
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
                                        @foreach ($commment as $commments)
                                            <div id="comments">
                                                <ol class="commentlist">
                                                    <li id="li-comment-83"
                                                        class="comment byuser comment-author-admin bypostauthor even thread-even depth-1">
                                                        <div class="comment_container" id="comment-83">
                                                            <div class="comment-text">
                                                                <div class="comment-body">

                                                                    <div class="comment-content">
                                                                        <p class="comment-author" style="width: max-content;">
                                                                            {{ $commments->user->name  }}
                                                                        </p>
                                                                        <p class="comment-meta">
                                                                            <time datetime="2017-06-21T08:05:40+00:00"
                                                                                itemprop="datePublished"
                                                                                class="woocommerce-review__published-date">{{ $commments->created_at }}</time>
                                                                        <div class="star-rating">
                                                                            <span
                                                                                style="width:{{ $commments->rate * 20}}%">Rated
                                                                                <strong class="rating">5</strong> out of
                                                                                5</span>
                                                                        </div>
                                                                        </p>
                                                                        <div class="description">
                                                                            <p style="width: 1000px;">{{ $commments->content }}
                                                                            </p>
                                                                            <p>
                                                                                @if($commments->storage && strtolower(pathinfo($commments->storage->file, PATHINFO_EXTENSION)) === 'mp4')
                                                                                    <video width="auto" height="100" controls>
                                                                                        <source src="{{ asset('admin/assets/images/comment/' . $commments->storage->file) }}"
                                                                                            type="video/mp4">
                                                                                        Trình duyệt của bạn không hỗ trợ thẻ video.
                                                                                    </video>
                                                                                @elseif($commments->storage)
                                                                                    <img src="{{ asset('admin/assets/images/comment/' . $commments->storage->file) }}"
                                                                                        alt=""
                                                                                        style="width: auto; max-height: 150px;">
                                                                                @endif
                                                                            </p>
                                                                            <button class="reply-button" data-comment-id="{{ $commments->id }}">Trả lời</button>
                                                                            <div class="reply-input" id="reply-input-{{ $commments->id }}" style="display: none;">
                                                                                <textarea rows="3" placeholder="Nhập câu trả lời của bạn..."></textarea>
                                                                                <button class="submit-reply" data-comment-id="{{ $commments->id }}">Gửi</button>
                                                                            </div>
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
        document.getElementById('media').addEventListener('change', function (event) {
            let previewContainer = document.getElementById('media-preview-container');
            previewContainer.innerHTML = '';

            Array.from(event.target.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function (e) {
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
        document.addEventListener('DOMContentLoaded', function () {
            let rating = document.getElementById('rating-value').value;
            if (rating > 0) {
                document.querySelector('.star-' + rating).classList.add('selected');
            }
        });
    </script>
    <script>
        document.querySelectorAll(".choice").forEach(choice => {
            choice.addEventListener("click", function () {
                let parent = this.parentElement;
                parent.querySelectorAll(".choice").forEach(c => c.classList.remove("selected"));
                this.classList.add("selected");
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const variants = @json($variants);
            console.log(variants);
            let selectedStorage = null;
            let selectedColor = null;

            const addToCartButton = document.querySelector(".single_add_to_cart_button");
            const productPriceElement = document.getElementById("productPrice");
            const variantIdInput = document.getElementById("variant_id");
            const stockQuantityElement = document.getElementById("stockQuantity");
            const outOfStockMessage = document.getElementById("outOfStockMessage");

            function updateAddToCartButton(stock) {
                if (stock === 0) {
                    addToCartButton.style.display = "none";
                    outOfStockMessage.style.display = "block";
                } else {
                    addToCartButton.style.display = "block";
                    outOfStockMessage.style.display = "none";
                }
            }

            function updatePriceAndVariantId() {
                if (selectedStorage && selectedColor) {
                    const selectedVariant = variants.find(v =>
                        v.model.name === selectedStorage && v.color.name === selectedColor
                    );
                    if (selectedVariant) {
                        productPriceElement.innerText = new Intl.NumberFormat('vi-VN').format(selectedVariant
                            .discounted_price) + " đ";
                        variantIdInput.value = selectedVariant.id;
                        stockQuantityElement.innerText = selectedVariant.stock;

                        updateAddToCartButton(selectedVariant.stock);
                    }
                }
            }

            function showColorsForModel(model) {
                let firstColorSelected = false;
                document.querySelectorAll(".color-choice").forEach(color => {
                    if (color.getAttribute("data-model") === model) {
                        color.style.display = "block"; // Show the color choice
                        if (!firstColorSelected) {
                            color.classList.add("selected");
                            selectedColor = color.getAttribute("data-value");
                            firstColorSelected = true;
                        }
                    } else {
                        color.style.display = "none"; // Hide irrelevant colors
                        color.classList.remove("selected");
                    }
                });
            }

            // Add event listeners for color choices
            document.querySelectorAll(".color-choice").forEach(choice => {
                choice.addEventListener("click", function () {
                    selectedColor = this.getAttribute("data-value");
                    document.querySelectorAll(".color-choice").forEach(c => c.classList.remove(
                        "selected"));
                    this.classList.add("selected");
                    updatePriceAndVariantId();
                });
            });

            // Add event listeners for storage choices
            document.querySelectorAll(".storage-choice").forEach(choice => {
                choice.addEventListener("click", function () {
                    selectedStorage = this.getAttribute("data-value");
                    // const selectedPrice = this.getAttribute("data-price");
                    const selectedPrice = parseFloat(this.getAttribute("data-price")) || 0;


                    showColorsForModel(selectedStorage);
                    productPriceElement.innerText = new Intl.NumberFormat('vi-VN').format(
                        selectedPrice) + " đ";

                    document.querySelectorAll(".storage-choice").forEach(item => item.classList
                        .remove("active"));
                    this.classList.add("active");

                    updatePriceAndVariantId();
                });
            });

            // Set the default model and show its colors
            let minModelId = Math.min(...variants.map(v => v.model.id));
            let defaultModelChoice = document.querySelector(`.storage-choice[data-model-value="${minModelId}"]`);

            if (defaultModelChoice) {
                defaultModelChoice.click(); // Simulate a click to trigger the filtering
            } else {
                // Fallback in case no default model is found
                const defaultModel = document.querySelector(".storage-choice.active");
                if (defaultModel) {
                    selectedStorage = defaultModel.getAttribute("data-value");
                    const selectedPrice = defaultModel.getAttribute("data-price");

                    showColorsForModel(selectedStorage);
                    productPriceElement.innerText = new Intl.NumberFormat('vi-VN').format(selectedPrice) + " đ";
                    updatePriceAndVariantId();
                }
            }
        });
    </script>
    <script>
        document.querySelectorAll('.stars a').forEach(star => {
            star.addEventListener('click', function (event) {
                event.preventDefault();
                let rating = this.classList[0].split('-')[1];
                document.getElementById('rating-value').value = rating;
                document.querySelectorAll('.stars a').forEach(s => s.classList.remove('selected'));
                this.classList.add('selected');
            });

            star.addEventListener('mouseover', function () {
                document.querySelectorAll('.stars a').forEach(s => s.classList.remove('hover'));
                this.classList.add('hover');
            });

            star.addEventListener('mouseout', function () {
                document.querySelectorAll('.stars a').forEach(s => s.classList.remove('hover'));
            });
        });

        document.querySelector('.stars').addEventListener('mouseout', function () {
            let rating = document.getElementById('rating-value').value;
            document.querySelectorAll('.stars a').forEach(s => s.classList.remove('selected'));
            if (rating > 0) {
                document.querySelector('.star-' + rating).classList.add('selected');
            }
        });

        // Ensure the selected rating is displayed correctly on page load
        document.addEventListener('DOMContentLoaded', function () {
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

        document.querySelectorAll('.submit-reply').forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                const replyInput = document.getElementById(`reply-input-${commentId}`).querySelector('textarea').value;
                // Handle the reply submission logic here
                console.log(`Reply to comment ${commentId}: ${replyInput}`);
            });
        });
    </script>
@endsection