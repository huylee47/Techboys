@extends('client.layouts.master')

@section('main')
<div class="container margin_30">
    <div class="row">
        <!-- Sidebar bộ lọc -->
        <aside class="col-lg-3">
            <div class="filter_col">
                <form action="{{ route('client.product.filter') }}" method="GET" id="filter-form">
                    <!-- Lọc theo thương hiệu -->
                    <div class="filter_type version_2">
                        <h4><a href="#filter_brand" data-bs-toggle="collapse" class="opened">Thương hiệu</a></h4>
                        <div class="collapse show" id="filter_brand">
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
                    <!-- Bộ lọc theo giá -->
                    <div class="filter_type version_2">
                        <h4><a href="#filter_price" data-bs-toggle="collapse" class="opened">Khoảng giá</a></h4>
                        <div class="collapse show" id="filter_price">
                            <div class="range-slider">
                                <input type="range" id="price_range" name="price_range" min="1000" max="10000000" step="1000"
                                    value="{{ request()->price_range ?? 10000000 }}" oninput="updatePriceDisplay()">
                                <p>Giá: <span id="price_display">{{ number_format(request()->price_range ?? 10000000, 0, ',', '.') }} đ</span></p>
                            </div>
                        </div>
                    </div>
                    <!-- Nút Lọc & Reset -->
                    <div class="buttons">
                        <button type="submit" class="btn_1">Lọc</button>
                        <a href="{{ route('client.product.index') }}" class="btn_1 gray">Đặt lại</a>
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
                            <img src="{{ url('') }}/admin/assets/images/product/{{ $product->img }}" class="product-image fix-image" style="width: 200px; height: 200px;">
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
                            <li><a href="#" class="tooltip-1" title="Thêm vào yêu thích"><i class="ti-heart"></i></a></li>
                            <li><a href="#" class="tooltip-1" title="So sánh"><i class="ti-control-shuffle"></i></a></li>
                            <li><a href="#" class="tooltip-1" title="Thêm vào giỏ hàng"><i class="ti-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Phân trang -->
            <div class="pagination__wrapper">
                <ul class="pagination">
                    <li><a href="{{ $products->previousPageUrl() }}" class="prev" title="Trang trước">&#10094;</a></li>
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li><a href="{{ $products->url($i) }}" class="{{ $i == $products->currentPage() ? 'active' : '' }}">{{ $i }}</a></li>
                    @endfor
                    <li><a href="{{ $products->nextPageUrl() }}" class="next" title="Trang sau">&#10095;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
function updatePriceDisplay() {
    let priceInput = document.getElementById("price_range").value;
    document.getElementById("price_display").textContent = new Intl.NumberFormat('vi-VN').format(priceInput) + " đ";
}
</script>
@endsection
