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
    .profile-image-label {
        display: inline-block;
        cursor: pointer;
        position: relative;
    }

    .profile-picture {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ccc;
        transition: opacity 0.3s ease;
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
            {{-- <div class="form-check form-check-lg d-flex align-items-end">
                @if (session('error'))
                    <p class="text-danger small ">
                        <i> {{ session('error') }}
                        </i>
                    </p>
                @endif
            </div> --}}
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a class="btn btn-primary" href="{{ route('home') }}">Quay lại</a>

        </form>
    </div>

@endsection