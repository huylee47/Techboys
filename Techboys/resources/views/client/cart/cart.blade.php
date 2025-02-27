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
                                        <form method="" action="" class="woocommerce-cart-form">
                                            @csrf
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
                                                            <tr class="cart-item">
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
                                                        <div class="voucher">
                                                            <label for="voucher_code">Voucher:</label>
                                                            <input type="text" placeholder="Nhập voucher"
                                                                value="{{ old('voucher_code', session('voucher.code') ?? '') }}"
                                                                id="voucher_code" class="input-text" name="voucher_code">
                                                            <button type="submit" id="apply-voucher" class="button">Sử
                                                                dụng</button>
                                                        </div>
                                                        <p id="voucher-error" class="text-danger small"></p>
                                                        <p id="voucher-success" class="text-success small"></p>
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
                                                        @if ($discountAmount > 0)
                                                            <tr class="cart-subtotal">
                                                                <th>Giảm giá</th>
                                                                <td data-title="Discount">
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span
                                                                            class="discount-amount">{{ number_format($discountAmount, 0, ',', '.') }}</span>
                                                                        <span
                                                                            class="woocommerce-Price-currencySymbol">đ</span>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @else
                                                        <tr class="cart-subtotal">
                                                            <th>Giảm giá</th>
                                                            <td data-title="Discount">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="discount-amount">0</span>
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">đ</span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        @endif
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
                                                        href="{{ route('client.checkout.index') }}">Thanh toán</a>
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
    <!--.MODAL Empty -->
    <div id="cartEmptyModal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                </div>
                <div class="modal-body">
                    <p>Giỏ hàng trống. Vui lòng thêm sản phẩm trước khi thanh toán!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- #content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateCart(cartId, quantity) {
                let maxStock = parseInt($(".stock-quantity-" + cartId).text(), 10);
                if (quantity > maxStock) {
                    alert("Số lượng bạn nhập vượt quá số lượng tồn kho. Số lượng tối đa là " + maxStock + ".");
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
                            $(".subtotal-price").text(response.subtotal);
                            $(".total-price").text(response.total);

                            if (response.discount_amount) {
                                $(".discount-amount").text(response.discount_amount);
                            }

                            let voucherCode = $("#voucher_code").val();
                            if (voucherCode) {
                                applyVoucher(voucherCode);
                            }
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert("Có lỗi xảy ra, vui lòng thử lại xem!");
                    }
                });
            }


            function applyVoucher(voucherCode) {
    $.ajax({
        url: "{{ route('client.cart.applyVoucher') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            voucher_code: voucherCode
        },
        success: function(response) {
            if (response.success) {
                $(".subtotal-price").text(response.total_before_discount);
                $(".discount-amount").text(response.discount_amount);
                $(".total-price").text(response.total_after_discount);

                $("#voucher-error").text("");
                $("#voucher-success").text(response.message);
            } else {
                $("#voucher-error").text(response.message);
                $("#voucher-success").text("");

                $(".discount-amount").text("0");
                $(".total-price").text(response.total_before_discount);
            }
        },
        error: function(xhr) {
            let errorMessage = "Có lỗi xảy ra, vui lòng thử lại!";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            $("#voucher-error").text(errorMessage);
            $("#voucher-success").text("");
            // Xóa giảm giá và cập nhật tổng tiền về giá gốc
            $(".discount-amount").text("0");
            let subtotalText = $(".subtotal-price").text();
            $(".total-price").text(subtotalText);
        }
    });
}

$(document).ready(function() {
    $("#apply-voucher").click(function() {
        let voucherCode = $("#voucher_code").val().trim();
        // Nếu không nhập voucher, hiển thị lỗi ngay
        if(voucherCode === "") {
            $("#voucher-error").text("Vui lòng nhập voucher");
            $("#voucher-success").text("");
            $(".discount-amount").text("0");
            let subtotalText = $(".subtotal-price").text();
            $(".total-price").text(subtotalText);
            return;
        }
        applyVoucher(voucherCode);
    });
});
function applyVoucher(voucherCode) {
    $.ajax({
        url: "{{ route('client.cart.applyVoucher') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            voucher_code: voucherCode
        },
        success: function(response) {
            if (response.success) {
                $(".subtotal-price").text(response.total_before_discount);
                $(".discount-amount").text(response.discount_amount);
                $(".total-price").text(response.total_after_discount);

                $("#voucher-error").text("");
                $("#voucher-success").text(response.message);
            } else {
                $("#voucher-error").text(response.message);
                $("#voucher-success").text("");

                $(".discount-amount").text("0");
                $(".total-price").text(response.total_before_discount);
            }
        },
        error: function(xhr) {
            let errorMessage = "Có lỗi xảy ra, vui lòng thử lại!";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            $("#voucher-error").text(errorMessage);
            $("#voucher-success").text("");
                $(".discount-amount").text("0");
            let subtotalText = $(".subtotal-price").text();
            $(".total-price").text(subtotalText);
        }
    });
}

$(document).ready(function() {
    $("#apply-voucher").click(function() {
        let voucherCode = $("#voucher_code").val().trim();
        if(voucherCode === "") {
            $("#voucher-error").text("Vui lòng nhập voucher");
            $("#voucher-success").text("");
            $(".discount-amount").text("0");
            let subtotalText = $(".subtotal-price").text();
            $(".total-price").text(subtotalText);
            return;
        }
        applyVoucher(voucherCode);
    });
});



            $(".update-cart").on("change", function() {
                let cartId = $(this).data("id");
                let quantity = $(this).val();
                updateCart(cartId, quantity);
            });

            $("#apply-voucher").on("click", function(e) {
                e.preventDefault();
                let voucherCode = $("#voucher_code").val();
                applyVoucher(voucherCode);
            });
        });
    </script>
@endsection
