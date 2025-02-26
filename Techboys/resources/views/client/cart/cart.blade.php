@extends('client.layouts.master')

@section('main')
    <div id="content" class="site-content">
        <div class="col-full">
            <div class="row">
                <nav class="woocommerce-breadcrumb">
                    <a href="{{ route('home') }}">Trang chủ</a>
                    <span class="delimiter">
                        <i class="tm tm-breadcrumbs-arrow-right"></i>
                    </span>
                    Giỏ hàng
                </nav>
                <!-- .woocommerce-breadcrumb -->
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <div class="type-page hentry">
                            <div class="entry-content">
                                <div class="woocommerce">
                                    <div class="cart-wrapper">
                                        <form method="get" action="{{route('client.checkout.index')}}" class="woocommerce-cart-form">
                                            <table class="shop_table shop_table_responsive cart">
                                                @if ($cartItems->isEmpty())
                                                    <p class="text-center text-muted">Giỏ hàng trống</p>
                                                @else
                                                    <thead>
                                                        <tr>
                                                            <th class="product-remove">&nbsp;</th>
                                                            <th class="product-thumbnail">&nbsp;</th>
                                                            <th class="product-name">Sản phẩm</th>
                                                            <th class="product-price">Giá</th>
                                                            <th class="product-quantity">Số lượng</th>
                                                            <th class="product-subtotal">Tổng tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($cartItems as $cart)
                                                            <tr>
                                                                <td class="product-remove">
                                                                    <a class="remove" href="#">×</a>
                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <a href="single-product-fullwidth.html">
                                                                        <img width="180" height="180" alt=""
                                                                            class="wp-post-image"
                                                                            src=" {{ asset('home/single-product-fullwidth.html') }}">
                                                                    </a>
                                                                </td>
                                                                <td data-title="Product" class="product-name">
                                                                    <div class="media cart-item-product-detail">
                                                                        <a href="single-product-fullwidth.html">
                                                                            <img width="180" height="180"
                                                                                alt="" class="wp-post-image"
                                                                                src="{{ url('') }}/admin/assets/images/product/{{ $cart->variant->product->img }}">
                                                                        </a>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="single-product-fullwidth.html">{{ $cart->variant->product->name }}
                                                                                {{ $cart->variant->model->name }}
                                                                                {{ $cart->variant->color->name }}
                                                                            </a>
                                                                            <p data-title="Stock" class="product-stock">
                                                                                <span>Tồn Kho :</span>
                                                                                <span
                                                                                    class="stock-quantity-{{ $cart->id }}">
                                                                                    {{ $cart->variant->stock }}
                                                                                </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td data-title="Price" class="product-price">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span
                                                                            class="woocommerce-Price-currencySymbol">{{ number_format($cart->variant->price, 0, ',', '.') }}
                                                                            đ</span>
                                                                    </span>
                                                                </td>
                                                                <td class="product-quantity" data-title="Quantity">
                                                                    <div class="quantity">
                                                                        <label for="quantity-input-1">Số lượng</label>
                                                                        <input id="quantity-input-{{ $cart->id }}"
                                                                            type="number" name="quantity"
                                                                            value="{{ $cart->quantity }}"
                                                                            class="input-text qty text update-cart"
                                                                            data-id="{{ $cart->id }}" min="1">

                                                                    </div>


                                                                </td>
                                                                <td data-title="Total" class="product-subtotal">
                                                                    <span
                                                                        class="woocommerce-Price-amount amount total-price-{{ $cart->id }}">
                                                                        {{ number_format($cart->variant->price * $cart->quantity, 0, ',', '.') }}
                                                                        đ
                                                                    </span>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                @endif
                                                <tr>
                                                    <td class="actions" colspan="6">
                                                        <div class="coupon">
                                                            <label for="coupon_code">Voucher:</label>
                                                            <input type="text" placeholder="Nhập voucher" value=""
                                                                id="coupon_code" class="input-text" name="coupon_code">
                                                            <input type="submit" value="Sử dụng" name="apply_coupon"
                                                                class="button">
                                                        </div>
                                                        <input type="submit" value="Tiếp tục mua hàng" name="update_cart"
                                                            class="button">
                                                    </td>
                                                </tr>
                                                </tbody>

                                            </table>
                                            <!-- .shop_table shop_table_responsive -->
                                        </form>
                                        <!-- .woocommerce-cart-form -->
                                        <div class="cart-collaterals">
                                            <div class="cart_totals">
                                                <h2>Tổng tiền</h2>
                                                <table class="shop_table shop_table_responsive">
                                                    <tbody>
                                                        <tr class="cart-subtotal">
                                                            <th>Sản phẩm</th>
                                                            <td data-title="Subtotal">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="subtotal-price">{{ number_format($subtotal, 0, ',', '.') }}</span>
                                                                    <span class="woocommerce-Price-currencySymbol">đ</span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr class="shipping">
                                                            <td data-title="Shipping">voucher</td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Thanh toán</th>
                                                            <td data-title="Total">
                                                                <strong>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span
                                                                            class="total-price">{{ number_format($total, 0, ',', '.') }}</span>
                                                                        <span
                                                                            class="woocommerce-Price-currencySymbol">đ</span>
                                                                    </span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="wc-proceed-to-checkout">
                                                    <a class="checkout-button button alt wc-forward"
                                                        href="{{route('client.checkout.index')}}">Thanh toán</a>
                                                    {{-- <a class="back-to-shopping" href="shop.html">tiếp tục mua hàng</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .cart-collaterals -->
                                    </div>
                                    <!-- .cart-wrapper -->
                                </div>
                                <!-- .woocommerce -->
                            </div>
                            <!-- .entry-content -->
                        </div>
                        <!-- .hentry -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- .col-full -->
    </div>
    <!-- #content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".update-cart").on("change", function() {
                let cartId = $(this).data("id");
                let quantity = $(this).val();
                let maxStock = parseInt($(".stock-quantity-" + cartId).text(), 10);

                if (quantity > maxStock) {
                    alert("Số lượng bạn nhập vượt quá số lượng tồn kho. Số lượng tối đa là " + maxStock +
                        ".");
                    $(this).val(maxStock);
                    return;
                }

                $.ajax({
                    url: "{{ route('client.cart.update') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: cartId,
                        quantity: quantity
                    },
                    success: function(response) {
                        if (response.success) {
                            $(".total-price-" + cartId).text(response.new_total_price);
                            $(".cart-subtotal .woocommerce-Price-amount").text(response
                                .subtotal);
                            $(".order-total .woocommerce-Price-amount").text(response.total);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert("Có lỗi xảy ra, vui lòng thử lại!");
                    }
                });
            });
        });
    </script>
@endsection
