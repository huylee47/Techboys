<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techboys | Đăng ký </title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/css/app.css">
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/css/pages/auth.css">
    <style>
        .alert-danger {
            color: #000000;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                    </div> 
                    @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach 
                                    </ul>
                                </div>
                            @endif
                    <h1 class="auth-title">Đăng ký</h1>
                  
                    {{-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                    --}}

                    <form action="{{ route('admin.log.store') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="name"
                                placeholder="nhập tên">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="username"
                                placeholder="nhập tài khoản">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" name="email"
                                placeholder="nhập email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="number" class="form-control form-control-xl" name="phone"
                                placeholder="nhập số điện thoại">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password"
                                placeholder="Nhập mật khẩu">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password1"
                                placeholder="Xác nhận mật khẩu">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            @if (session('error'))
                                <p class="text-danger small ">
                                    <i> {{ session('error') }}
                                    </i>
                                </p>
                            @endif
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Đăng ký</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Bạn đã có tài khoản? <a href="{{ route('login') }}" class="font-bold">Đăng nhập</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>