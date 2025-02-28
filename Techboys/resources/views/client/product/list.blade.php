@extends('client.layouts.master')

@section('main')

<body>
    <div id="page" class="theia-exception">
        <main>
            <div class="container margin_30">
                <div class="row">
                    <aside class="col-lg-3" id="sidebar_fixed">
                        <div class="filter_col">
                            <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>

                            <!-- Bộ lọc Categories -->
                            <div class="filter_type version_2">
                                <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Categories</a></h4>
                                <div class="collapse show" id="filter_1">
                                    <ul>
                                        @foreach($categories as $category)
                                        <li>
                                            <label class="container_check">{{ $category->name }}
                                                <input type="checkbox" class="category-filter" data-id="{{ $category->id }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Bộ lọc Brands -->
                            <div class="filter_type version_2">
                                <h4><a href="#filter_2" data-bs-toggle="collapse" class="opened">Brands</a></h4>
                                <div class="collapse show" id="filter_2">
                                    <ul>
                                        @foreach($brands as $brand)
                                        <li>
                                            <label class="container_check">{{ $brand->name }}
                                                <input type="checkbox" class="brand-filter" data-id="{{ $brand->id }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Bộ lọc Colors -->
                            <div class="filter_type version_2">
                                <h4><a href="#filter_3" data-bs-toggle="collapse" class="opened">Colors</a></h4>
                                <div class="collapse show" id="filter_3">
                                    <ul>
                                        @foreach($colors as $color)
                                        <li>
                                            <label class="container_check">{{ $color->name }}
                                                <input type="checkbox" class="color-filter" data-id="{{ $color->id }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Bộ lọc Models -->
                            <div class="filter_type version_2">
                                <h4><a href="#filter_4" data-bs-toggle="collapse" class="opened">Models</a></h4>
                                <div class="collapse show" id="filter_4">
                                    <ul>
                                        @foreach($models as $model)
                                        <li>
                                            <label class="container_check">{{ $model->name }}
                                                <input type="checkbox" class="model-filter" data-id="{{ $model->id }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="buttons">
                                <a href="#" class="btn_1" id="filter-button">Filter</a>
                                <a href="#" class="btn_1 gray" id="reset-button">Reset</a>
                            </div>
                        </div>
                    </aside>

                    <div class="col-lg-9">
                        <div class="row small-gutters product" id="product_list">
                            @foreach($products as $product)
                            <div class="col-6 col-md-4">
                                <div class="grid_item">
                                    <span class="ribbon off">-30%</span>
                                    <a href="{{ route('client.product.show', ['slug' => $product->slug]) }}">
                                        <img src="{{ url('') }}/admin/assets/images/product/{{ $product->img }}" class="product-image fix-image" style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center;" >
                                    </a>
                                    <a href="{{ route('client.product.show', ['slug' => $product->slug]) }}">
                                        <h3>{{ $product->name }}</h3>
                                    </a>
                                    <div class="price_box">
                                        <span class="new_price">${{ number_format($product->rate_average, 2) }}</span>
                                        @if($product->old_price)
                                            <span class="old_price">${{ number_format($product->old_price, 2) }}</span>
                                        @endif
                                    </div>
                                    <ul>
                                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Phân trang -->
                        <div class="pagination__wrapper" id="pagination">
                            <ul class="pagination">
                                <li>
                                    <a href="{{ $products->previousPageUrl() }}" class="prev" title="previous page">&#10094;</a>
                                </li>
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    <li>
                                        <a href="{{ $products->url($i) }}" class="{{ $i == $products->currentPage() ? 'active' : '' }}">
                                            {{ $i }}
                                        </a>
                                    </li>
                                @endfor
                                <li>
                                    <a href="{{ $products->nextPageUrl() }}" class="next" title="next page">&#10095;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
    $(document).ready(function() {
    // Khi checkbox thay đổi, gửi yêu cầu AJAX
    $('.category-filter, .brand-filter, .color-filter, .model-filter').on('change', function() {
        applyFilters();
    });

    // Khi nút "Filter" được nhấn, gửi yêu cầu AJAX với bộ lọc hiện tại
    $('#filter-button').on('click', function(e) {
        e.preventDefault();
        applyFilters();
    });

    // Khi nút "Reset" được nhấn, reset các bộ lọc và gửi yêu cầu AJAX
    $('#reset-button').on('click', function(e) {
        e.preventDefault();
        resetFilters();
    });

    // Hàm gửi yêu cầu AJAX với bộ lọc hiện tại
    function applyFilters() {
        var categoryIds = [];
        var brandIds = [];
        var colorIds = [];
        var modelIds = [];

        // Lấy các category đã chọn
        $('.category-filter:checked').each(function() {
            categoryIds.push($(this).data('id'));
        });

        // Lấy các brand đã chọn
        $('.brand-filter:checked').each(function() {
            brandIds.push($(this).data('id'));
        });

        // Lấy các color đã chọn
        $('.color-filter:checked').each(function() {
            colorIds.push($(this).data('id'));
        });

        // Lấy các model đã chọn
        $('.model-filter:checked').each(function() {
            modelIds.push($(this).data('id'));
        });

        // Gửi AJAX để lấy danh sách sản phẩm mới
        $.ajax({
            url: '{{ route('client.product.index') }}', // Thay đổi route tại đây
            method: 'GET',
            data: {
                category_id: categoryIds,
                brand_id: brandIds,
                color_id: colorIds,
                model_id: modelIds
            },
            success: function(response) {
                $('#product_list').html(response.products);
                $('#pagination').html(response.pagination);
            }
        });
    }

    // Hàm reset bộ lọc
    function resetFilters() {
        // Bỏ chọn tất cả các checkbox
        $('.category-filter, .brand-filter, .color-filter, .model-filter').prop('checked', false);

        // Gửi AJAX để lấy lại danh sách sản phẩm mà không có bộ lọc
        $.ajax({
            url: '{{ route('client.product.index') }}', // Thay đổi route tại đây
            method: 'GET',
            success: function(response) {
                $('#product_list').html(response.products);
                $('#pagination').html(response.pagination);
            }
        });
    }
});

</script>

@endsection
