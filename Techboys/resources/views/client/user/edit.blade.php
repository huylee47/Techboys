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
        <h4 class="card-title">Profile</h4>
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
        <form action="{{ route('client.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="id" value="{{$user->id}}">

            <div class="text-center mb-4">
                <label for="profile_image" class="profile-image-label">
                    <img src="{{ asset('home/assets/images/user.png') }}" alt="Profile Picture" class="profile-picture">
                </label>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="description">Họ và Tên</label>
                    <input type="text" class="form-control" id="name" aria-describedby="" name="name" placeholder="Nhập họ và tên"
                        value="{{ old('name', $user->name) }}">                      
                </div>

                <div class="col-md-6 mb-3">
                    <label for="description">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" aria-describedby="" name="address"
                        placeholder="Nhập địa chỉ" value="{{ old('address', $user->address) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="" name="email"
                        placeholder="Nhập Email" value="{{ old('email', $user->email) }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="description">SĐT</label>
                    <input type="number" class="form-control" id="phone" aria-describedby="" name="phone"
                        placeholder="Nhập sô điện thoại" value="{{ old('phone', $user->phone) }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a class="btn btn-primary" href="{{ route('home') }}">Quay lại</a>
    </div>

    </form>

    </div>

@endsection