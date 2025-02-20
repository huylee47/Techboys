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
        <p class="text-muted">Vui lòng nhập email của bạn để đặt lại mật khẩu.</p>
    </div>
    
    <form action="{{ route('client.check_forgot_password') }}" method="POST" onsubmit="return disableButton(this);">
        @csrf
        <div class="container">
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl" name="email" placeholder="Nhập email"
                    value="{{ old('email') }}">
            </div>

            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" id="submitButton">Gửi</button>
        </div>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class="text-gray-600">Bạn chưa có tài khoản? <a href="{{ route('client.log.create') }}" style="color: blue"
                class="font-bold">Đăng ký</a>.
        </p>
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
