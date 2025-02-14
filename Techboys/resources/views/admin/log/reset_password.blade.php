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
                    <h1 class="auth-title">Quên mật khẩu</h1>
                  
                    {{-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
                    --}}
                    <form action="{{ route('admin.check_reset_password', ['token' => $token]) }}" method="POST">                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password"
                                placeholder="Nhập mật khẩu mới" >
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password-confirm"
                                placeholder="Xác nhận mật khẩu" >
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
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Xác nhận</button>
                    </form>                
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