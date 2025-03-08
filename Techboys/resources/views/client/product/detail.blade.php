@extends('client.layouts.master')

@section('main')
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
                                        <div class="single-product-meta">
                                            <div class="brand">
                                                <a href="#">
                                                    <img alt="galaxy" src="{{ url('') }}/home/assets/images/brands/5.png">
                                                </a>
                                            </div>
                                            <div class="cat-and-sku">
                                                <span class="posted_in categories">
                                                    <a rel="tag" href="product-category.html">{{ $product->category->name }}
                                                        |</a>
                                                    <a rel="tag"
                                                        href="product-category.html">{{ $product->brand->name }}</a>
                                                </span>
                                            </div>
                                            {{-- <div class="product-label">
                                                <div class="ribbon label green-label">
                                                    <span>A+</span>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <!-- .single-product-meta -->
                                        <div class="rating-and-sharing-wrapper">
                                            <div class="woocommerce-product-rating">
                                                <div class="star-rating">
                                                    <span style="width:100%">Đánh giá
                                                        <strong class="rating">3.00</strong> out of 5 based on
                                                        <span class="rating">1</span> customer rating</span>
                                                </div>
                                                <a rel="nofollow" class="woocommerce-review-link" href="#reviews">(<span
                                                        class="count">1</span> customer
                                                    review)</a>
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
                                                    <span class="avg-rating-number">5.0</span>
                                                    <div title="Rated 5.0 out of 5" class="star-rating">
                                                        <span style="width:100%"></span>
                                                    </div>
                                                </div>
                                                <!-- /.avg-rating -->
                                                <div class="rating-histogram">
                                                    <div class="rating-bar">
                                                        <div title="Rated 5 out of 5" class="star-rating">
                                                            <span style="width:100%"></span>
                                                        </div>
                                                        <div class="rating-count">1</div>
                                                        <div class="rating-percentage-bar">
                                                            <span class="rating-percentage" style="width:100%"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-bar">
                                                        <div title="Rated 4 out of 5" class="star-rating">
                                                            <span style="width:80%"></span>
                                                        </div>
                                                        <div class="rating-count zero">0</div>
                                                        <div class="rating-percentage-bar">
                                                            <span class="rating-percentage" style="width:0%"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-bar">
                                                        <div title="Rated 3 out of 5" class="star-rating">
                                                            <span style="width:60%"></span>
                                                        </div>
                                                        <div class="rating-count zero">0</div>
                                                        <div class="rating-percentage-bar">
                                                            <span class="rating-percentage" style="width:0%"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-bar">
                                                        <div title="Rated 2 out of 5" class="star-rating">
                                                            <span style="width:40%"></span>
                                                        </div>
                                                        <div class="rating-count zero">0</div>
                                                        <div class="rating-percentage-bar">
                                                            <span class="rating-percentage" style="width:0%"></span>
                                                        </div>
                                                    </div>
                                                    <div class="rating-bar">
                                                        <div title="Rated 1 out of 5" class="star-rating">
                                                            <span style="width:20%"></span>
                                                        </div>
                                                        <div class="rating-count zero">0</div>
                                                        <div class="rating-percentage-bar">
                                                            <span class="rating-percentage" style="width:0%"></span>
                                                        </div>
                                                    </div>
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
                                                            <form novalidate="" class="comment-form" id="commentform"
                                                                method="post" action="#">
                                                                <div class="comment-form-rating">
                                                                    <label>Đánh giá của bạn</label>
                                                                    <p class="stars">
                                                                        <span><a href="#" class="star-1">1</a><a href="#"
                                                                                class="star-2">2</a><a href="#"
                                                                                class="star-3">3</a><a href="#"
                                                                                class="star-4">4</a><a href="#"
                                                                                class="star-5">5</a></span>
                                                                    </p>
                                                                </div>
                                                                <p class="comment-form-comment">
                                                                    <label for="comment">Bình luận của bạn</label>
                                                                    <textarea aria-required="true" rows="8" cols="45"
                                                                        name="comment" id="comment"></textarea>
                                                                </p>
                                                                <p class="comment-form-author">
                                                                    <label for="author">Tên
                                                                    </label>
                                                                    <input type="text" aria-required="true" size="30"
                                                                        value="" name="author" id="author">
                                                                </p>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="images" class="form-label">Ảnh </label>
                                                                    <input class="form-control" type="file" id="images"
                                                                        name="image" accept="image/*">
                                                                    <div id="image-preview-container" class="mt-3"
                                                                        style="display: flex; gap: 10px; flex-wrap: wrap;">
                                                                    </div>
                                                                </div>
                                                                <p class="form-submit">
                                                                    <input type="submit" value="Bình luận" class="submit"
                                                                        id="submit" name="submit">
                                                                    <input type="hidden" id="comment_post_ID" value="185"
                                                                        name="comment_post_ID">
                                                                    <input type="hidden" value="0" id="comment_parent"
                                                                        name="comment_parent">
                                                                </p>
                                                            </form>
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
                                                                <div class="star-rating" style="margin-top: -110px">
                                                                    <span style="width:{{ $commments->rate *20}}%">Rated
                                                                        <strong class="rating">5</strong> out of 5</span>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong itemprop="author"
                                                                        class="woocommerce-review__author">{{ $commments->user->name }}</strong>
                                                                    <span class="woocommerce-review__dash">&ndash;</span>
                                                                    <time datetime="2017-06-21T08:05:40+00:00"
                                                                        itemprop="datePublished"
                                                                        class="woocommerce-review__published-date">{{ $commments->created_at }}</time>
                                                                </p>
                                                                <div class="description">
                                                                     <p>{{ $commments->content }}</p>
                                                                    <p >     @if(strtolower(pathinfo($commments->storage->file, PATHINFO_EXTENSION)) === 'mp4')
                                                                        <video width="150" height="100" controls>
                                                                            <source src="{{ asset('admin/assets/images/comment/' . $commments->storage->file) }}"
                                                                                type="video/mp4">
                                                                            Trình duyệt của bạn không hỗ trợ thẻ video.
                                                                        </video>
                                                                    @else
                                                                        <img src="{{ asset('admin/assets/images/comment/' . $commments->storage->file) }}" alt=""
                                                                            style="width: 150px; height: auto;">
                                                                    @endif</p>
                                                                   
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
        document.getElementById('images').addEventListener('change', function (event) {
            let previewContainer = document.getElementById('image-preview-container');
            previewContainer.innerHTML = '';

            Array.from(event.target.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
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
@endsection