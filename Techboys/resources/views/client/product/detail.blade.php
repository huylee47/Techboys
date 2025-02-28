@extends('client.layouts.master')

@section('main')
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
                                                            class="attachment-shop_thumbnail size-shop_thumbnail"
                                                            alt="">
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
                                                    <img alt="galaxy"
                                                        src="{{ url('') }}/home/assets/images/brands/5.png">
                                                </a>
                                            </div>
                                            <div class="cat-and-sku">
                                                <span class="posted_in categories">
                                                    <a rel="tag"
                                                        href="product-category.html">{{ $product->category->name }} |</a>
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
                $isActive = $modelName == $defaultVariant->model->name ? 'active' : '';
            @endphp
            <div class="choice storage-choice {{ $isActive }}"
                data-value="{{ $modelName }}"
                data-price="{{ $variantGroup->first()->price }}"
                data-model-value="{{ $variantGroup->first()->model->id }}"
                data-stock="{{ $variantGroup->first()->stock }}"> <!-- Thêm thuộc tính data-stock -->
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
                data-price="{{ $variant->price }}"
                data-stock="{{ $variant->stock }}"> <!-- Thêm thuộc tính data-stock -->
                <span>{{ $variant->color->name }}</span>
            </div>
        @endforeach
    </div>
</div>
                                                    <p>Số lượng tồn kho: <span
                                                            id="stockQuantity">{{ $defaultVariant->stock }}</span></p>

                                                    <p class="price">
                                                        <span class="woocommerce-Price-amount amount" id="productPrice">
                                                            {{ number_format($defaultVariant->price, 0, ',', '.') }} đ
                                                        </span>
                                                    </p>



                                                    <!-- .single-product-header -->

                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="variant_id" id="variant_id"
                                                        value="">

                                                    <!-- .quantity -->
                                                    
                                                    <button class="single_add_to_cart_button button alt"
                                                        type="submit">Thêm vào giỏ hàng</button>
                                                        <p id="outOfStockMessage" class="text-danger small">Sản phẩm đã hết hàng</p>
                                                    <!-- .cart -->
                                                </div>
                                                <!-- .product-actions -->
                                            </div>
                                        </form>

                                        <!-- .product-actions-wrapper -->
                                    </div>
                                    <!-- .entry-summary -->
                                </div>
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
    <div class="modal fade" id="stockWarningModal" tabindex="-1" role="dialog"
    aria-labelledby="stockWarningModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stockWarningModalLabel">Cảnh báo</h5>
            </div>
            <div class="modal-body">
                <p>
                    Bạn đã mua quá số lượng tồn kho hiện tại.
                    
                    Số lượng tồn kho hiện tại : <span id="maxStockValue"></span> sản phẩm
                    
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
    <script>
        document.querySelectorAll(".choice").forEach(choice => {
            choice.addEventListener("click", function() {
                let parent = this.parentElement;
                parent.querySelectorAll(".choice").forEach(c => c.classList.remove("selected"));
                this.classList.add("selected");
            });
        });
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    const variants = @json($variants);
    let selectedStorage = null;
    let selectedColor = null;

    const addToCartButton = document.querySelector(".single_add_to_cart_button");
    const productPriceElement = document.getElementById("productPrice");
    const variantIdInput = document.getElementById("variant_id");
    const stockQuantityElement = document.getElementById("stockQuantity");

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
                productPriceElement.innerText = new Intl.NumberFormat('vi-VN').format(selectedVariant.price) + " đ";
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
                color.style.display = "block";
                if (!firstColorSelected) {
                    color.classList.add("selected");
                    selectedColor = color.getAttribute("data-value");
                    firstColorSelected = true;
                }
            } else {
                color.style.display = "none";
                color.classList.remove("selected");
            }
        });
    }

    document.querySelectorAll(".color-choice").forEach(choice => {
        choice.addEventListener("click", function() {
            selectedColor = this.getAttribute("data-value");
            document.querySelectorAll(".color-choice").forEach(c => c.classList.remove("selected"));
            this.classList.add("selected");
            updatePriceAndVariantId();
        });
    });

    document.querySelectorAll(".storage-choice").forEach(choice => {
        choice.addEventListener("click", function() {
            selectedStorage = this.getAttribute("data-value");
            const selectedPrice = this.getAttribute("data-price");

            showColorsForModel(selectedStorage);
            productPriceElement.innerText = new Intl.NumberFormat('vi-VN').format(selectedPrice) + " đ";

            document.querySelectorAll(".storage-choice").forEach(item => item.classList.remove("active"));
            this.classList.add("active");

            updatePriceAndVariantId();
        });
    });

    let minModelId = Math.min(...variants.map(v => v.model.id));
    let defaultModelChoice = document.querySelector(`.storage-choice[data-model-value="${minModelId}"]`);

    if (defaultModelChoice) {
        defaultModelChoice.click();
    }
    const defaultModel = document.querySelector(".storage-choice.active");
    if (defaultModel) {
        selectedStorage = defaultModel.getAttribute("data-value");
        const selectedPrice = defaultModel.getAttribute("data-price");

        showColorsForModel(selectedStorage);
        productPriceElement.innerText = new Intl.NumberFormat('vi-VN').format(selectedPrice) + " đ";
        updatePriceAndVariantId();
    }
});
   </script>
@endsection
