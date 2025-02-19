@extends('client.layouts.master')

<style>
    <style>.alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
</style>
@section('main')
    <div class="container">
        <h1>Đăng ký</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach 
                </ul>
            </div>
        @endif
    </div>


    <form action="{{ route('client.log.store') }}" method="POST">
        @csrf
        <div class="container">
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl" name="name" placeholder="nhập tên"
                value="{{old('name')  }}">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl" name="username" placeholder="nhập tài khoản"
                value="{{old('username')  }}">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-xl" name="email" placeholder="nhập email"
                value="{{old('email')  }}">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="number" class="form-control form-control-xl" name="phone" placeholder="nhập số điện thoại"
                value="{{old('phone')  }}">
            <div class="form-control-icon">
                <i class="bi bi-phone"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl" name="password" placeholder="Nhập mật khẩu">
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
        <div class="form-check form-check-lg d-flex align-items-end">
            @if (session('error'))
                <p class="text-danger small ">
                    <i> {{ session('error') }}
                    </i>
                </p>
            @endif
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Đăng ký</button>
    </div>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">Bạn đã có tài khoản? <a href="{{ route('login.client') }}" style="color: blue" class="font-bold">Đăng nhập</a>.</p>
    </div>
@endsection