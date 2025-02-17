@extends('client.layouts.master')

<style>
  <style>
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    </style>
</style>
@section('main')
<div class="container">
  <h1 >Đăng nhập</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@elseif (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
</div>



<form action="{{ route('loginClient.auth') }}" method="POST">
  @csrf
<div class="container">

  <div class="form-group position-relative has-icon-left mb-4">
    <input type="text" class="form-control form-control-xl" name="username"
        placeholder="nhập tài khoản">
    <div class="form-control-icon">
        <i class="bi bi-person"></i>
    </div>
</div>

<div class="form-group position-relative has-icon-left mb-4">
  <input type="password" class="form-control form-control-xl" name="password"
      placeholder="Nhập mật khẩu">
  <div class="form-control-icon">
      <i class="bi bi-shield-lock"></i>
  </div>
</div>
  <div class="col-md-6 mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Ghi nhớ tôi</label>
  </div>
  <button type="submit" class="btn btn-primary">Đăng nhập</button>
  <div>
    <p class="text-gray-600">Bạn chưa có tài khoản? <a href="{{ route('client.log.create') }}"
            class="font-bold" style="color: rgb(0, 64, 255)">Đăng ký</a>.</p>
</div>
<div >
    <p class="text-gray-600"><a href="{{ route('client.forgot-password') }}"
            class="font-bold" style="color: rgb(0, 64, 255)">Quên mật khẩu</a>.</p>
</div>
</div>
</form>
@endsection