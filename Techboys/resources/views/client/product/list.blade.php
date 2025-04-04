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
                            <a href="#filter_2" data-bs-toggle="collapse" class="opened">Thương hiệu</a>
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
                    <div class="filter_type version_2">
                        <h4><a href="#filter_2" data-bs-toggle="collapse" class="opened">Giá</a></h4>
                        <div class="collapse show" id="filter_2">
                            <ul>
                                <li>
                                    <label class="container_check">
                                        Dưới 2 triệu
                                        <input type="checkbox" name="price_range[]" value="0-2000000" {{ in_array('0-2000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        2 - 5 triệu
                                        <input type="checkbox" name="price_range[]" value="2000000-5000000" {{ in_array('2000000-5000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        5 - 10 triệu
                                        <input type="checkbox" name="price_range[]" value="5000000-10000000" {{ in_array('5000000-10000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        10 - 15 triệu
                                        <input type="checkbox" name="price_range[]" value="10000000-15000000" {{ in_array('10000000-15000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        15 - 20 triệu
                                        <input type="checkbox" name="price_range[]" value="15000000-20000000" {{ in_array('15000000-20000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        20 - 30 triệu
                                        <input type="checkbox" name="price_range[]" value="20000000-30000000" {{ in_array('20000000-30000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        30 - 50 triệu
                                        <input type="checkbox" name="price_range[]" value="30000000-50000000" {{ in_array('30000000-50000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="container_check">
                                        Trên 50 triệu
                                        <input type="checkbox" name="price_range[]" value="50000000-100000000" {{ in_array('50000000-100000000', request()->input('price_range', [])) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Lọc theo model -->
                    <div class="buttons">
                        <input type="hidden" name="categoryId" value="{{$categoryId}}">

                        <button type="submit" class="btn_1">Lọc</button>
                        <a href="{{ route('client.category.products',['categoryId'=>$categoryId]) }}" class="btn_1 gray">Làm mới</a>
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
                                 style="max-width: 100%; max-height: 200px; width: auto; height: auto; object-fit: contain; display: block; margin: 0 auto;">
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