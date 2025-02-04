@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>User</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        {{-- Thông báo --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- Nút thêm thẻ --}}
                        <a href="" class="btn btn-primary mb-3">Thêm User</a>

                        {{-- Bảng danh sách thẻ --}}
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-3">Tên </th>
                                    <th class="col-2">Email</th>
                                    <th class="col-1">Username </th>
                                    <th class="col-1">SĐT</th>  
                                    <th class="col-1">Trạng thái</th>
                                    <th class="col-1">Vai trò</th>
                                    <th class="col-4">Chức năng</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loadAll as $key => $user)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                     

                                        <td>
                                            @if ($user->status == 1)
                                                <span class="badge bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge bg-secondary">Đã ẩn</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->role_id == 1)
                                                <span class="badge bg-success">Admin</span>
                                            @else
                                                <span class="badge bg-secondary">Khách</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-info">Sửa</a>
                                            <form action="" 
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-{{ $user->status == 1 ? 'danger' : 'success' }}">
                                                    {{ $user->status == 1 ? 'Khóa' : 'Mở' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    @endsection
