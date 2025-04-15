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
                        <h3>Chỉnh sửa tài khoản </h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="{{ route('admin.user.index') }}">Tài khoản</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa tài khoản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                            @csrf @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vai trò</label>
                                        <select class="form-select" name="role_id" {{ $user->username === 'admin' ? 'disabled' : '' }}>
                                            <option value="0" {{ $user->role_id == 0 ? 'selected' : '' }}>Người dùng</option>
                                            <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-4 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                
                                @if(
                                (auth()->user()->username === 'admin' && $user->username !== 'admin') 
                                ||
                                (auth()->user()->role_id == 1 && $user->role_id == 0 && auth()->user()->username !== 'admin')
                    )
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">
                                         <i class="bi bi-trash"></i> Xóa tài khoản
                                    </button>
                                @endif
                            </div>
                        </form>
                        
                        @if(auth()->user()->username === 'admin' && $user->username !== 'admin')
                            <form id="delete-form-{{ $user->id }}" 
                                  action="{{ route('admin.user.destroy', $user->id) }}" 
                                  method="POST" class="d-none">
                                @csrf @method('DELETE')
                            </form>
                        @endif
                    </div>
                </div>
            </section>
        </div>
        
        @push('scripts')
        <script>
            function confirmDelete(userId) {
                if (confirm('Bạn có chắc chắn muốn xóa tài khoản này?')) {
                    document.getElementById('delete-form-' + userId).submit();
                }
            }
        </script>
        @endpush
        </div>
    </div>
@endsection