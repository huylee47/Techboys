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
                        <h2>Kết quả tìm kiếm cho: "{{ $keyword }}"</h2>
                        <div class="row small-gutters product" id="product_list">
                            @if($products->count() > 0)
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
                                            <span class="new_price">{{ number_format($product->variant->min('price'), 0, ',', '.') . ' đ' }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p>Không tìm thấy sản phẩm nào.</p>
                            @endif
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
</body>

@endsection
