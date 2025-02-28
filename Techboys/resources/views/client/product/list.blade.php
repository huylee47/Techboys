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
	                    <div class="filter_type version_2">
	                        <h4><a href="#filter_1" data-bs-toggle="collapse" class="opened">Categories</a></h4>
	                        <div class="collapse show" id="filter_1">
	                            <ul>
	                                <li>
	                                    <label class="container_check">Men <small>12</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Women <small>24</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Running <small>23</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Training <small>11</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>

	                    <div class="filter_type version_2">
	                        <h4><a href="#filter_2" data-bs-toggle="collapse" class="opened">Color</a></h4>
	                        <div class="collapse show" id="filter_2">
	                            <ul>
	                                <li>
	                                    <label class="container_check">Blue <small>06</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Red <small>12</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Orange <small>17</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Black <small>43</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>

	                    <div class="filter_type version_2">
	                        <h4><a href="#filter_3" data-bs-toggle="collapse" class="closed">Brands</a></h4>
	                        <div class="collapse" id="filter_3">
	                            <ul>
	                                <li>
	                                    <label class="container_check">Adidas <small>11</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Nike <small>08</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Vans <small>05</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">Puma <small>18</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>

	                    <div class="filter_type version_2">
	                        <h4><a href="#filter_4" data-bs-toggle="collapse" class="closed">Price</a></h4>
	                        <div class="collapse" id="filter_4">
	                            <ul>
	                                <li>
	                                    <label class="container_check">$0 — $50<small>11</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">$50 — $100<small>08</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">$100 — $150<small>05</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                                <li>
	                                    <label class="container_check">$150 — $200<small>18</small>
	                                        <input type="checkbox">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                    <!-- /filter_type -->
	                    <div class="buttons">
	                        <a href="#0" class="btn_1">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
	                    </div>
	                </div>
	            </aside>
	            <div class="col-lg-9">
	               <div class="row small-gutters product">
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


{{-- <div class="pagination">
    {{ $paginatedProducts->links() }}
</div> --}}

					<!-- /row -->
	                <div class="pagination__wrapper">
	                    <ul class="pagination">
	                        <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
	                        <li>
	                            <a href="#0" class="active">1</a>
	                        </li>
	                        <li>
	                            <a href="#0">2</a>
	                        </li>
	                        <li>
	                            <a href="#0">3</a>
	                        </li>
	                        <li>
	                            <a href="#0">4</a>
	                        </li>
	                        <li><a href="#0" class="next" title="next page">&#10095;</a></li>
	                    </ul>
	                </div>
	            </div>
	            <!-- /col -->
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</main>
	<!-- /main -->
	
	
		
</body>
</html>
@endsection
