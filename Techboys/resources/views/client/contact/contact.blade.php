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
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <div class="entry-content">
                            <div class="stretch-full-width-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d634.1549045120821!2d106.70951524863375!3d20.865679643682185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7bf67d69c9c7%3A0x4341c6cef1813f18!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1740505370576!5m2!1svi!2s" height="514" style="border:0;" allowfullscreen="" ></iframe>
                            </div>
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
                                                        <span class="wpcf7-form-control-wrap name">
                                                            <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" id="name" name="name">
                                                        </span>
                                                        <div class="error-message" style="color: red; margin-top: 5px;"></div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <label>Số điện thoại
                                                            <abbr title="required" class="required">*</abbr>
                                                        </label>
                                                        <br>
                                                        <span class="wpcf7-form-control-wrap phone">
                                                            <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" id="phone" name="phone">
                                                        </span>
                                                        <div class="error-message" style="color: red; margin-top: 5px;"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap email">
                                                        <input type="email" aria-invalid="false" class="wpcf7-form-control wpcf7-text input-text" size="40" value="" id="email" name="email">
                                                    </span>
                                                    <div class="error-message" style="color: red; margin-top: 5px;"></div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Tin nhắn của bạn</label>
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-message">
                                                        <textarea aria-invalid="false" class="wpcf7-form-control wpcf7-textarea" rows="10" cols="40" id="message" name="message"></textarea>
                                                    </span>
                                                    <div class="error-message" style="color: red; margin-top: 5px;"></div>
                                                </div>
                                                
                                                <div class="form-group clearfix">
                                                    <p>
                                                        <input type="submit" value="Gửi phản hồi" class="wpcf7-form-control wpcf7-submit" id="submitBtn" onclick="disableSubmit()" />
                                                    </p>
                                                </div>
                                                
                                                <script>
                                                    function disableSubmit() {
                                                        let btn = document.getElementById("submitBtn");
                                                        btn.style.pointerEvents = "none";
                                                        btn.style.opacity = "0.5";
                                                        btn.value = "Đang gửi phản hồi...";
                                                        setTimeout(function () {
                                                            btn.style.pointerEvents = "auto";
                                                            btn.style.opacity = "1";
                                                            btn.value = "Gửi phản hồi";
                                                        }, 5000);
                                                    }
                                                
                                                    document.querySelector('.wpcf7-form').addEventListener('submit', function(e) {
                                                        e.preventDefault();  
                                                        let isValid = true;
                                                
                                                        document.querySelectorAll('.error-message').forEach(errorDiv => errorDiv.textContent = '');
                                                        document.querySelectorAll('input, textarea').forEach(input => input.classList.remove('error-border'));
                                                
                                                        function showError(input, message) {
                                                            let errorDiv = input.closest('.form-group, .col-xs-12').querySelector('.error-message');
                                                            if (errorDiv) {
                                                                errorDiv.textContent = message;
                                                            }
                                                            input.classList.add('error-border');
                                                        }
                                                
                                                        let name = document.querySelector('input[name="name"]');
                                                        if (!name.value.trim()) {
                                                            showError(name, 'Tên không được để trống.');
                                                            isValid = false;
                                                        }
                                                
                                                        let phone = document.querySelector('input[name="phone"]');
                                                        if (!phone.value.trim()) {
                                                            showError(phone, 'Số điện thoại không được để trống.');
                                                            isValid = false;
                                                        } else if (!/^\d{10,11}$/.test(phone.value.trim())) {
                                                            showError(phone, 'Số điện thoại không hợp lệ.');
                                                            isValid = false;
                                                        }
                                                
                                                        let email = document.querySelector('input[name="email"]');
                                                        if (!email.value.trim()) {
                                                            showError(email, 'Email không được để trống.');
                                                            isValid = false;
                                                        } else if (!validateEmail(email.value.trim())) {
                                                            showError(email, 'Email không hợp lệ.');
                                                            isValid = false;
                                                        }
                                                
                                                        let message = document.querySelector('textarea[name="message"]');
                                                        if (!message.value.trim()) {
                                                            showError(message, 'Tin nhắn không được để trống.');
                                                            isValid = false;
                                                        }
                                                
                                                        if (isValid) {
                                                            this.submit();
                                                        }
                                                    });
                                                
                                                    function validateEmail(email) {
                                                        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                                        return regex.test(email);
                                                    }
                                                
                                                    document.querySelectorAll('input, textarea').forEach(input => {
                                                        input.addEventListener('input', function() {
                                                            let errorDiv = this.closest('.form-group, .col-xs-12').querySelector('.error-message');
                                                            if (errorDiv) {
                                                                errorDiv.textContent = '';
                                                            }
                                                            this.classList.remove('error-border');
                                                        });
                                                    });
                                                </script>
                                                
                                                <style>
                                                    .error-border {
                                                        border: 1px solid red !important;
                                                    }
                                                </style>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 store-info">
                                    <div class="text-block">
                                        <h2 class="contact-page-title">Cửa hàng của chúng tôi</h2>
                                        <address>
                                            271 Đường Lê Thánh Tông
                                            <br> Má Chai, Ngô Quyền 
                                            <br> Hải Phòng, Việt Nam
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
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
