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
                Contact
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="stretch-full-width-map">
                                <iframe height="514" allowfullscreen="" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.593303940039!2d-0.15470444843858283!3d51.53901886611164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761ae62edd5771%3A0x27f2d823e2be0249!2sPrincess+Rd%2C+London+NW1+8JR%2C+UK!5e0!3m2!1sen!2s!4v1458827996435"></iframe>
                            </div>
                            <!-- .stretch-full-width-map -->
                            <div class="row contact-info">
                                <div class="col-md-9 left-col">
                                    <div class="text-block">
                                        <h2 class="contact-page-title">Để lại cho chúng tôi một tin nhắn</h2>
                                        <p>Chúng tôi luôn sẵn lòng hỗ trợ bạn! Nếu bạn có bất kỳ câu hỏi nào hoặc cần tư vấn, đừng ngần ngại liên hệ với chúng tôi qua thông tin bên dưới. Đội ngũ của chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất!</p>
                                    </div>
                                    <div class="contact-form">
                                        <div role="form" class="wpcf7" id="wpcf7-f425-o1" lang="en-US" dir="ltr">
                                            <div class="screen-reader-response"></div>
                                            <form class="wpcf7-form" novalidate="novalidate" action="" method="post">
                                                @csrf
                                                <div style="display: none;">
                                                    <input type="hidden" name="_wpcf7" value="425" />
                                                    <input type="hidden" name="_wpcf7_version" value="4.5.1" />
                                                    <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f425-o1" />
                                                    <input type="hidden" name="_wpnonce" value="e6363d91dd" />
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <label>Họ và tên
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap first-name">
                                                            <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="name">
                                                        </span>
                                                    </div>
                                                    <!-- .col -->
                                                    <div class="col-xs-12 col-md-6">
                                                        <label>Số điện thoại
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap last-name">
                                                            <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="phone">
                                                        </span>
                                                    </div>
                                                    <!-- .col -->
                                                </div>
                                                <!-- .form-group -->
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap subject">
                                                        <input type="email" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" name="email">
                                                    </span>
                                                </div>
                                                <!-- .form-group -->
                                                <div class="form-group">
                                                    <label>Tin nhắn của bạn</label>
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-message">
                                                        <textarea aria-invalid="false" class="wpcf7-form-control wpcf7-textarea" rows="10" cols="40" name="message"></textarea>
                                                    </span>
                                                </div>
                                                <!-- .form-group-->
                                                <div class="form-group clearfix">
                                                    <p>
                                                        <input type="submit" value="Gửi tin nhắn" class="wpcf7-form-control wpcf7-submit" />
                                                    </p>
                                                </div>
                                                <!-- .form-group-->
                                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                                            </form>
                                            <!-- .wpcf7-form -->
                                        </div>
                                        <!-- .wpcf7 -->
                                    </div>
                                    <!-- .contact-form7 -->
                                </div>
                                <!-- .col -->
                                <div class="col-md-3 store-info">
                                    <div class="text-block">
                                        <h2 class="contact-page-title">Cửa hàng của chúng tôi</h2>
                                        <address>
                                            17 Princess Road
                                            <br> London, Greater London
                                            <br> NW1 8JR, UK
                                        </address>
                                        <h3>Giờ mở cửa</h3>
                                        <ul class="list-unstyled operation-hours inner-right-md">
                                            <li class="clearfix">
                                                <span class="day">Thứ Hai:</span>
                                                <span class="pull-right flip hours">12-6 PM</span>
                                            </li>
                                            <li class="clearfix">
                                                <span class="day">Thứ Ba:</span>
                                                <span class="pull-right flip hours">12-6 PM</span>
                                            </li>
                                            <li class="clearfix">
                                                <span class="day">Thứ Tư:</span>
                                                <span class="pull-right flip hours">12-6 PM</span>
                                            </li>
                                            <li class="clearfix">
                                                <span class="day">Thứ Năm:</span>
                                                <span class="pull-right flip hours">12-6 PM</span>
                                            </li>
                                            <li class="clearfix">
                                                <span class="day">Thứ Sáu:</span>
                                                <span class="pull-right flip hours">12-6 PM</span>
                                            </li>
                                            <li class="clearfix">
                                                <span class="day">Thứ Bảy:</span>
                                                <span class="pull-right flip hours">12-6 PM</span>
                                            </li>
                                            <li class="clearfix">
                                                <span class="day">Chủ Nhật</span>
                                                <span class="pull-right flip hours">Đóng cửa</span>
                                            </li>
                                        </ul>
                                        <h3>Cơ hội nghề nghiệp</h3>
                                        <p class="inner-right-md">Nếu bạn quan tâm đến các cơ hội việc làm tại Techboys, vui lòng gửi email cho chúng tôi: <a href="techboyspoly@gmail.com">techboyspoly@gmail.com</a></p>
                                    </div>
                                    <!-- .text-block -->
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- .contact-info -->
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