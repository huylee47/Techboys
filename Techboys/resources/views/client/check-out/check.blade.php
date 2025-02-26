@extends('client.layouts.master')

@section('main')
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="home-v1.html">Home</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Checkout
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div class="content-area" id="primary">
                <main class="site-main" id="main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">

                                <!-- .collapse -->
                                {{-- <div class="woocommerce-info">Have a coupon? <a data-toggle="collapse" href="#checkoutCouponForm" aria-expanded="false" aria-controls="checkoutCouponForm" class="showlogin">Click here to enter your code</a>
                                </div>
                                <div class="collapse" id="checkoutCouponForm">
                                    <form method="post" class="checkout_coupon">
                                        <p class="form-row form-row-first">
                                            <input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code">
                                        </p>
                                        <p class="form-row form-row-last">
                                            <input type="submit" value="Apply coupon" name="apply_coupon" class="button">
                                        </p>
                                        <div class="clear"></div>
                                    </form>
                                </div> --}}
                                <!-- .collapse -->
                                
                                <form action="{{route('client.checkout.store')}}" class="checkout woocommerce-checkout" method="post" name="checkout">
                                    @csrf
                                    <div id="customer_details" class="col2-set">
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Thông tin chi tiết</h3>
                                                <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                    <div class="woocommerce-billing-fields__field-wrapper">
                                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required woocommerce woocommerce-invalid-required-field">
                                                            <label class="" for="billing_first_name">Họ và Tên Người nhận
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="text" value="" placeholder="" id="billing_first_name" name="full_name" class="input-text ">
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p id="billing_city_field" class="form-row form-row-last validate-required validate-city">
                                                            <label class="" for="billing_city">Thành phố
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <select name="province_id" id="province">
                                                                <option value="" selected disabled>Chọn tỉnh/thành phố</option>
                                                                @foreach($provinces as $province)
                                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </p>
                                                        <div class="clear"></div>
                                                        <p id="billing_district_field" class="form-row form-row-first validate-required validate-district">
                                                            <label class="" for="billing_district">Quận
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <select name="district_id" id="district">
                                                                <option value="" selected disabled>Chọn quận/huyện</option>
                                                            </select>
                                                        </p>
                                                        <p id="billing_ward_field" class="form-row form-row-last validate-required validate-ward">
                                                            <label class="" for="billing_ward">Phường
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <select name="ward_id" id="ward">
                                                                <option value="" selected disabled>Chọn phường/xã</option>
                                                            </select>
                                                        </p>
                                                        <p id="billing_phone_field" class="form-row form-row-first validate-required validate-phone">
                                                            <label class="" for="billing_phone">Số điện thoại
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="tel" value="" placeholder="" id="billing_phone" name="phone" class="input-text ">
                                                        </p>
                                                        <p id="billing_email_field" class="form-row form-row-last validate-required validate-email">
                                                            <label class="" for="billing_email">Email
                                                                <abbr title="required" class="required">*</abbr>
                                                            </label>
                                                            <input type="email" value="" placeholder="" id="billing_email" name="email" class="input-text ">
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                            </div>
                                        </div>
                                        <!-- .col-1 -->
                                        <div class="col-2">
                                            <!-- .woocommerce-shipping-fields -->
                                            <div class="woocommerce-additional-fields">
                                                <div class="woocommerce-additional-fields__field-wrapper">
                                                    <p id="order_comments_field" class="form-row notes">
                                                        <label class="" for="order_comments">Địa chỉ chi tiết</label>
                                                        <textarea cols="5" rows="2" placeholder="Viết địa chỉ chi tiết của quý khách" id="order_comments" class="input-text " name="address"></textarea>
                                                    </p>
                                                </div>
                                                <!-- .woocommerce-additional-fields__field-wrapper-->
                                            </div>
                                            <!-- .woocommerce-additional-fields -->
                                        </div>
                                        <!-- .col-2 -->
                                    </div>
                                    <!-- .col2-set -->
                                    <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                                    <div class="woocommerce-checkout-review-order" id="order_review">
                                        <div class="order-review-wrapper">
                                            <h3 class="order_review_heading">Đơn hàng của bạn</h3>
                                            <table class="shop_table woocommerce-checkout-review-order-table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-name">Sản phẩm</th>
                                                        <th class="product-total">đơn giá</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($checkout['cartItems'] as $item)
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            <strong class="product-quantity">{{$item->quantity}} x </strong> {{ $item->variant->product->name }} {{$item->variant->model->name }} {{$item->variant->color->name }}
                                                            <input type="hidden" name="variant_id" value="{{$item->variant->id}}">
                                                            <input type="hidden" name="quantity" value="{{$item->quantity}}">
                                                            <input type="hidden" name="price" value="{{$item->variant->price}}">


                                                        </td>
                                                        <td class="product-total">
                                                            <span class="woocommerce-Price-amount amount">
                                                                {{ number_format($item->variant->price * $item->quantity, 0, ',', '.') }}</span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr class="cart-subtotal">
                                                        <th>Sản phẩm</th>
                                                        <td>
                                                            <span class="woocommerce-Price-amount amount">
                                                                {{ number_format($checkout['subtotal'], 0, ',', '.') }}<span class="woocommerce-Price-currencySymbol"></span>đ</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart-subtotal">
                                                        <th>Voucher</th>
                                                        <td>
                                                            <span class="woocommerce-Price-amount amount">0<span class="woocommerce-Price-currencySymbol"></span>đ</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="order-total">
                                                        <th>Thành tiền</th>
                                                        <td>
                                                            <strong>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    {{ number_format($checkout['total'], 0, ',', '.') }}<span class="woocommerce-Price-currencySymbol">đ</span></span>
                                                            </strong>
                                                            <input type="hidden" name="total" value="{{$checkout['total']}}">
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!-- /.woocommerce-checkout-review-order-table -->
                                            <div class="woocommerce-checkout-payment" id="payment">
                                                <ul class="wc_payment_methods payment_methods methods">
                                                    <h3 id="order_review_heading">Phương thức thanh toán</h3>
                                                    <li class="wc_payment_method payment_method_bacs">
                                                        <input type="radio" data-order_button_text="" checked="checked" value="1" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                        <label for="payment_method_bacs">VNPAY</label>
                                                    </li>
                                                    <li class="wc_payment_method payment_method_cheque">
                                                        <input type="radio" data-order_button_text="" value="2" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                        <label for="payment_method_cheque">MOMO</label>
                                                        
                                                    </li>
                                                    <li class="wc_payment_method payment_method_cod">
                                                        <input type="radio" data-order_button_text="" value="3" name="payment_method" class="input-radio" id="payment_method_cod">
                                                        <label for="payment_method_cod">Ship COD</label>
                                                        
                                                    </li>
                                                </ul>
                                                <div class="form-row place-order">
                                                    <button type="submit"class="button wc-forward text-center">Xác nhận đặt hàng</button>
                                                    {{-- <a href="" ></a> --}}
                                                </div>
                                            </div>
                                            <!-- /.woocommerce-checkout-payment -->
                                        </div>
                                        <!-- /.order-review-wrapper -->
                                    </div>
                                    <!-- .woocommerce-checkout-review-order -->
                                </form>
                                <!-- .woocommerce-checkout -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- #post-## -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
    $('#province').change(function () {
        var province_id = $(this).val();
        console.log("Province ID: ", province_id);
        if (province_id) {
            $.ajax({
                url: 'checkout/get-districts/' + province_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#district').empty().append('<option value="" selected disabled>Chọn quận/huyện</option>');
                    $.each(data, function (key, value) {
                        $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    console.log("Danh sách quận/huyện: ", data);
                }
            });
        } else {
            $('#district').empty().append('<option value="" selected disabled>Chọn quận/huyện</option>');
            $('#ward').empty().append('<option value="" selected disabled>Chọn phường/xã</option>');
        }
    });

    $('#district').change(function () {
        var district_id = $(this).val();
        console.log("District ID: ", district_id);
        if (district_id) {
            $.ajax({
                url: 'checkout/get-wards/' + district_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#ward').empty().append('<option value="" selected disabled>Chọn phường/xã</option>');
                    $.each(data, function (key, value) {
                        $('#ward').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    console.log("Danh sách phường/xã: ", data);
                }
            });
        } else {
            $('#ward').empty().append('<option value="" selected disabled>Chọn phường/xã</option>');
        }
    });

    $('#ward').change(function () {
        var ward_id = $(this).val();
        console.log("Ward ID: ", ward_id);
    });
});

</script>
@endsection