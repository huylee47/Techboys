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

                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Thêm user</a>

                    {{-- Bảng danh sách thẻ --}}
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="col-1">STT</th>
                                <th class="col-3">Tên </th>
                                <th class="col-2">Email</th>
                                <th class="col-1">SĐT</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-1">Vai trò</th>
                                <th style="text-align: center" class="col-4">Chức năng</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loadAll as $key => $user)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                            
                                <td>
                                    @if ($user->status == 1)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-secondary">Đã khóa</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->role_id == 1)
                                        <span class="badge bg-success">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">User</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(auth()->user()->username === 'admin' || $user->role_id != 1)
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                @endif
                                    <form action="{{ $user->status == 1 ? route('admin.user.block', ['id' => $user->id]) : route('admin.user.open', ['id' => $user->id]) }}"
                                          method="POST" style="display:inline;">
                                        @csrf                                    
                                        <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                                        <button type="submit" 
                                        class="{{ $user->status == 1 ? 'bi-lock' : 'bi-unlock' }}"
                                        @if($user->id == 1 || $user->id == auth()->id() || ($user->role_id == 1 && auth()->user()->id != 1))
                                            disabled
                                            title="{{ $user->id == 1 ? 'Không thể khoá tài khoản ADMIN gốc.' 
                                                    : ($user->id == auth()->id() ? 'Không thể khoá tài khoản của chính mình.' 
                                                    : 'Chỉ ADMIN gốc có quyền khóa/mở ADMIN phụ.') }}"
                                        @endif>
                                        {{ $user->status == 1 ? 'Khóa tài khoản' : 'Mở tài khoản' }}
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