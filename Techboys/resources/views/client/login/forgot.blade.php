<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/home/assets/css/forgot.css" media="all" />
</head>
<body>
    <div class="page-container">
        <div class="image-section">
            <h2>Đặt lại mật khẩu của bạn</h2>
            <p>Đừng lo lắng! Chúng tôi sẽ giúp bạn khôi phục mật khẩu</p>
            <img src="https://cdni.iconscout.com/illustration/premium/thumb/forgot-password-4268029-3551772.png" 
                 alt="Forgot Password" 
                 style="max-width: 320px;">
        </div>
        <div class="form-section">
            <h1>Quên mật khẩu</h1>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('client.check_forgot_password') }}" method="POST" onsubmit="return disableButton(this);">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{ old('email') }}">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>

                <button class="btn btn-primary" id="submitButton">Gửi</button>
            </form>
            
            <div class="text-center">
                <p>Bạn chưa có tài khoản? 
                    <a href="{{ route('client.log.create') }}">Đăng ký</a>
                </p>
                <p>
                    <a href="{{ route('home') }}" class="home-link">
                        <i class="bi bi-house-door"></i> Về trang chủ
                    </a>
                </p>
            </div>
        </div>
    </div>
    <script>
        function disableButton(form) {
            var button = form.querySelector('#submitButton');
            button.disabled = true;
            button.innerHTML = 'Đang xử lý...';
            return true;
        }
    </script>
</body>
</html>