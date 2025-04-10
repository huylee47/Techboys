@extends('client.layouts.master')

<style>
    .container {
        max-width: 500px;
        margin: 40px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .card-title {
        color: #2c3e50;
        font-size: 24px;
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
        position: relative;
        padding-bottom: 10px;
    }

    .card-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: #3498db;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-control {
        height: 45px;
        border-radius: 8px;
        border: 2px solid #e0e0e0;
        padding-left: 45px !important;  /* Force left padding */
        font-size: 14px;
        transition: all 0.3s ease;
        text-indent: 5px;  /* Add space between icon and text */
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 10px rgba(52, 152, 219, 0.1);
    }

    .form-control-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;  /* Ensure icon stays above input */
        pointer-events: none;  /* Allow clicking through icon */
    }

    .form-control-icon i {
        font-size: 18px;
        color: #3498db;
        line-height: 45px;
        display: block;
    }

    .form-control:focus + .form-control-icon i {
        color: #2980b9;
    }

    .alert {
        border-radius: 8px;
        margin-bottom: 25px;
        padding: 15px 20px;
        border: none;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .btn {
        padding: 12px 25px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.2);
    }

    .btn-primary {
        background-color: #3498db;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.2);
    }
</style>
@section('main')
    <div class="container">
        <h4 class="card-title">Đổi mật khẩu</h4>
        {{-- Hiển thị thông báo lỗi --}}
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

        {{-- Form thêm dự án --}}
        <form action="{{ route('client.updatePassword',['id'=>$user->id]) }}" method="POST">
            @csrf 
            <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" name="passwordOld" placeholder="Nhập mật khẩu cũ">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" name="password" placeholder="Nhập mật khẩu mới">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" name="password-confirm"
                    placeholder="Xác nhận mật khẩu">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
           
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a class="btn btn-primary" href="{{ route('home') }}">Quay lại</a>

        </form>
    </div>

@endsection