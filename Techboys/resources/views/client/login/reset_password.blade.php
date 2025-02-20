@extends('client.layouts.master')
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

@section('main')
    <div class="container">
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
        
    </div>
<div class="container">
    
<form action="{{ route('client.check_reset_password', ['token' => $token]) }}" method="POST">                        @csrf

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
@endsection
<script>
    function disableButton(form) {
        var button = form.querySelector('#submitButton');
        button.disabled = true;
        button.innerHTML = 'Đang xử lý...';
        return true;
    }
</script>
