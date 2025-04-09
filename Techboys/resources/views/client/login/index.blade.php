<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/login.css" media="all" />


<body>
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-image">
                <h2>Chào mừng đến với TechBoys!</h2>
                <p>Khám phá thế giới công nghệ với những sản phẩm chất lượng hàng đầu</p>
                <img src="https://cdn-icons-png.flaticon.com/512/3659/3659898.png" 
                     alt="Tech Store" 
                     style="max-width: 250px; margin: 20px auto;">
            </div>
            <div class="login-box">
                <h1 class="login-title">Đăng nhập</h1>
                
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
    
                <form action="{{ route('loginClient.auth') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Tài khoản">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
    
                    <button type="submit" class="btn btn-login">Đăng nhập</button>
    
                    <div class="auth-links">
                        <p>Bạn chưa có tài khoản? 
                            <a href="{{ route('client.log.create') }}">Đăng ký</a>
                        </p>
                        <p>
                            <a href="{{ route('client.forgot-password') }}">Quên mật khẩu?</a>
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