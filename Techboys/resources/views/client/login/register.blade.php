<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/register.css" media="all" />
</head>

<body>
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-image">
                <h2>Tham gia cùng TechBoys!</h2>
                <p>Nơi công nghệ gặp gỡ sự tiện lợi - Đăng ký ngay để trải nghiệm</p>
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-registration-4489363-3723270.png" 
                     alt="Tech Register" 
                     style="max-width: 320px; margin: 20px auto;">
            </div>
            <div class="login-box">
                <h1 class="login-title">Đăng ký</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach 
                        </ul>
                    </div>
                @endif

                <form action="{{ route('client.log.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên"
                            value="{{ old('name') }}">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Nhập tài khoản"
                            value="{{ old('username') }}">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Nhập email"
                            value="{{ old('email') }}">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                            value="{{ old('phone') }}">
                        <div class="form-control-icon">
                            <i class="bi bi-phone"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password-confirm"
                            placeholder="Xác nhận mật khẩu">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login">Đăng ký</button>

                    <div class="auth-links">
                        <p>Bạn đã có tài khoản? 
                            <a href="{{ route('login.client') }}">Đăng nhập</a>
                        </p>
                        <p>
                            <a href="{{ route('home') }}" class="home-link">
                                <i class="bi bi-house-door"></i> Về trang chủ
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>