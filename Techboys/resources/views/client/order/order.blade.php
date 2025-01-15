@extends('client.layouts.master')

@section('main')
<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="home-v1.html">Home</a>
                <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
                <a href="checkout.html">Checkout</a>
                <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>Order received
            </nav>
            <!-- .woocommerce-breadcrumb -->

            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="page hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-order">
                            
                                    <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you. Your order has been received.</p>

                                    <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                        <li class="woocommerce-order-overview__order order">
                                            Order number:<strong>3001</strong>
                                        </li>

                                        <li class="woocommerce-order-overview__date date">
                                            Date:<strong>November 6, 2017</strong>
                                        </li>

                                        
                                        <li class="woocommerce-order-overview__total total">
                                            Total:<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1,476.99</span></strong>
                                        </li>

                                        <li class="woocommerce-order-overview__payment-method method">
                                                Payment method: <strong>Direct bank transfer</strong>
                                        </li>
                                        
                                    </ul>
                                    <!-- .woocommerce-order-overview -->

                                
                                    <section class="woocommerce-order-details">
                                        <h2 class="woocommerce-order-details__title">Order details</h2>

                                        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                            <thead>
                                                <tr>
                                                    <th class="woocommerce-table__product-name product-name">Product</th>
                                                    <th class="woocommerce-table__product-table product-total">Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr class="woocommerce-table__line-item order_item">

                                                    <td class="woocommerce-table__product-name product-name">
                                                        <a href="single-product-fullwidth.html">Snap White Instant Digital Camera in White</a> 
                                                        <strong class="product-quantity">× 1</strong>
                                                    </td>

                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>179.99</span>  
                                                    </td>

                                                </tr>

                                                <tr class="woocommerce-table__line-item order_item">

                                                    <td class="woocommerce-table__product-name product-name">
                                                        <a href="single-product-fullwidth.html">XPS 13 Laptop 6GB W10 Infinity Edge Display</a>
                                                        <strong class="product-quantity">× 1</strong>   
                                                    </td>

                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1,197.00</span>
                                                    </td>

                                                </tr>

                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <th scope="row">Subtotal:</th>
                                                    <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1,376.99</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Shipping:</th>
                                                    <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>100.00</span>&nbsp;<small class="shipped_via">via Normal Delivery</small></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Payment method:</th>
                                                    <td>Direct bank transfer</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Total:</th>
                                                    <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1,476.99</span></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <!-- .woocommerce-table -->
                                    </section>
                                    <!-- .woocommerce-order-details -->

                            
                                </div>
                                <!-- .woocommerce-order -->
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
@endsection