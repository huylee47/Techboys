@extends('client.layouts.master')

<style>
    .login-container {
    
        padding: 40px 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-wrapper {
        display: flex;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        max-width: 1000px;
        width: 100%;
        margin: 0 40px;
        overflow: hidden;
    }
    .login-image {
        flex: 1;
        background: linear-gradient(rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8)),
                    url('https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-4.0.3');
        background-size: cover;
        background-position: center;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        text-align: center;
    }
    .login-image h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }
    .login-image p {
        font-size: 1.1rem;
        line-height: 1.6;
    }
    .login-box {
        flex: 1;
        padding: 40px;
        background: none;
        box-shadow: none;
        margin: 0;
    }
    .login-title {
        color: #2d3748;
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }
    .form-control {
        border-radius: 10px;
        padding: 12px 15px;
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.25);
    }
    .form-group {
        position: relative;
        margin-bottom: 25px;
    }
    .form-control-icon {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 15px;
        color: #667eea;
    }
    .btn-login {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        font-weight: 600;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    .alert {
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .auth-links {
        text-align: center;
        margin-top: 20px;
    }
    .auth-links a {
        color: #667eea;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }
    .auth-links a:hover {
        color: #764ba2;
    }
    @media (max-width: 768px) {
        .login-wrapper {
            flex-direction: column;
        }
        .login-image {
            display: none;
        }
    }
</style>

@section('main')
<div class="login-container">
    <div class="login-wrapper">
        <div class="login-image">
            <h2>Chào mừng trở lại!</h2>
            <p>Khám phá thế giới công nghệ cùng chúng tôi</p>
            <img src="https://cdn-icons-png.flaticon.com/512/1997/1997780.png" 
                 alt="Tech illustration" 
                 style="max-width: 300px; margin: 20px auto;">
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
                </div>
            </form>
        </div>
    </div>
</div>
@endsection