@extends('client.layouts.master')

@section('main')
<div class="container margin_30">
    <div class="row">
        <!-- Sidebar Bộ Lọc -->
        <aside class="col-lg-3">
            <div class="filter_col">
                <form action="{{ route('client.product.filter') }}" method="GET" id="filter-form">
                    <!-- Lọc theo thương hiệu -->
                    <div class="filter_type version_2">
                        <h4>
                            <a href="#filter_2" data-bs-toggle="collapse" class="opened">Brands</a>
                        </h4>
                        <div class="collapse show" id="filter_2">
                            <ul>
                                @foreach($brands as $brand)
                                <li>
                                    <label class="container_check">
                                        {{ $brand->name }}
                                        <input type="checkbox" name="brand_id[]" value="{{ $brand->id }}"
                                            {{ in_array($brand->id, request()->brand_id ?? []) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Lọc theo model -->
                    <div class="filter_type version_2">
                        <h4>
                            <a href="#filter_4" data-bs-toggle="collapse" class="opened">Models</a>
                        </h4>
                        <div class="collapse show" id="filter_4">
                            <ul>
                                @foreach($models as $model)
                                <li>
                                    <label class="container_check">
                                        {{ $model->name }}
                                        <input type="checkbox" name="model_id[]" value="{{ $model->id }}" 
                                            {{ in_array($model->id, request()->model_id ?? []) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Nút Lọc & Reset -->
                    <div class="buttons">
                        <button type="submit" class="btn_1">Filter</button>
                        <a href="{{ route('client.product.index') }}" class="btn_1 gray">Reset</a>
                    </div>
                </form>
            </div>
        </aside>

        <!-- Danh sách sản phẩm -->
        <div class="col-lg-9">
            <div class="row small-gutters product" id="product_list">
                @foreach($products as $product)
                <div class="col-6 col-md-4">
                    <div class="grid_item">
                        <a href="{{ route('client.product.show', ['slug' => $product->slug]) }}">
                            <img src="{{ url('') }}/admin/assets/images/product/{{ $product->img }}" 
                                 class="product-image fix-image"
                                 style="width: 200px; height: 200px;">
                        </a>
                        <a href="{{ route('client.product.show', ['slug' => $product->slug]) }}">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <div class="price_box">
                            @if($product->promotion && $product->promotion->discount_percent > 0)
                                <span class="new_price">Chỉ từ {{ number_format($product->variant->min('discounted_price'), 0, ',', '.') }} đ</span>
                                <br>
                                <span class="old_price" style="text-decoration: line-through;">
                                    {{ number_format($product->variant->min('price'), 0, ',', '.') }} đ
                                </span>
                            @else
                                <span class="new_price">
                                    {{ number_format($product->variant->min('price'), 0, ',', '.') }} đ
                                </span>
                            @endif
                        </div>
                        <ul>
                            <li>
                                <a href="#" class="tooltip-1" title="Add to favorites">
                                    <i class="ti-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltip-1" title="Add to compare">
                                    <i class="ti-control-shuffle"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tooltip-1" title="Add to cart">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Phân trang -->
            <div class="pagination__wrapper">
                <ul class="pagination">
                    <li>
                        <a href="{{ $products->previousPageUrl() }}" class="prev" title="previous page">&#10094;</a>
                    </li>
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li>
                        <a href="{{ $products->url($i) }}" 
                           class="{{ $i == $products->currentPage() ? 'active' : '' }}">
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
@endsection