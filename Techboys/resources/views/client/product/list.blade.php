@extends('client.layouts.master')

@section('main')
<body>
    <div id="page" class="theia-exception">
        <main>
            <div class="container margin_30">
                <div class="row">
                    <aside class="col-lg-3" id="sidebar_fixed">
                        <div class="filter_col">
                            <div class="inner_bt">
                                <a href="#" class="open_filters"><i class="ti-close"></i></a>
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
                                    <a href="{{ route('client.product.show', ['slug' => $product->slug]) }}">
                                        <img src="{{ url('') }}/admin/assets/images/product/{{ $product->img }}" 
                                             class="product-image fix-image" 
                                             style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center;">
                                    </a>
                                    <a href="{{ route('client.product.show', ['slug' => $product->slug]) }}">
                                        <h3>{{ $product->name }}</h3>
                                    </a>
                                    <div class="price_box">
                                        <span class="new_price">{{ number_format($product->variant->min('price'), 0, ',', '.') . ' đ' }}</span>
                                        @if($product->old_price)
                                            <span class="old_price">{{ number_format($product->variant->min('price'), 0, ',', '.') . ' đ' }}</span>
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
    checkFilterState();

    $('.brand-filter, .model-filter').on('change', function() {
        checkFilterState();
    });

    $('#filter-button').on('click', function(e) {
        e.preventDefault();
        if (!$(this).hasClass('disabled')) {
            applyFilters();
        }
    });

    $('#reset-button').on('click', function(e) {
        e.preventDefault();
        $('.brand-filter, .model-filter').prop('checked', false);
        checkFilterState();
        applyFilters();
    });

    function checkFilterState() {
        var hasChecked = $('.brand-filter:checked, .model-filter:checked').length > 0;
        $('#filter-button').toggleClass('disabled', !hasChecked);
    }

    function applyFilters() {
        var brandIds = $('.brand-filter:checked').map(function() { return $(this).data('id'); }).get();
        var modelIds = $('.model-filter:checked').map(function() { return $(this).data('id'); }).get();

        $.ajax({
            url: '{{ route('client.product.filter') }}',
            method: 'GET',
            data: { brand_id: brandIds, model_id: modelIds },
            beforeSend: function() {
                $('#product_list').html('<p>Loading...</p>');
            },
            success: function(response) {
                $('#product_list').html($(response).find('#product_list').html());
                $('#pagination').html($(response).find('#pagination').html());
            },
            error: function() {
                alert('Đã xảy ra lỗi. Vui lòng thử lại!');
            }
        });
    }
});
</script>
@endsection