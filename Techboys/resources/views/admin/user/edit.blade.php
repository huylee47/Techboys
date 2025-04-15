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
                    <h3>Chỉnh sửa tài khoản</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Tài khoản</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Chi tiết tài khoản</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                        @csrf @method('PUT')
                        
                        <div class="row">
                            <!-- Cột thông tin cơ bản -->
                            <div class="col-md-6">
                                <div class="info-section mb-4">
                                    <h6 class="section-title bg-light p-2 mb-3">Thông tin cá nhân</h6>
                                    
                                    <div class="form-group mb-3">
                                        <label class="form-label">Tên đầy đủ</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                    </div>
    
                                    <div class="form-group mb-3">
                                        <label class="form-label">Tên đăng nhập</label>
                                        <input type="text" class="form-control bg-light" value="{{ $user->username }}" readonly>
                                    </div>
    
                                    <div class="form-group mb-3">
                                        <label class="form-label">Ngày sinh</label>
                                        <input type="date" class="form-control" name="dob" value="{{ $user->dob }}">
                                    </div>
    
                                    <div class="form-group mb-3">
                                        <label class="form-label">Giới tính</label>
                                        <select class="form-select" name="gender">
                                            <option value="1" {{ $user->gender ? 'selected' : '' }}>Nam</option>
                                            <option value="0" {{ !$user->gender ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md-6">
                                <div class="info-section mb-4">
                                    <h6 class="section-title bg-light p-2 mb-3">Thông tin liên hệ</h6>
                                    
                                    <div class="form-group mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                    </div>
    
                                    <div class="form-group mb-3">
                                        <label>Xác thực email</label>
                                        <input type="text" class="form-control" 
                                               value="{{ $user->email_verified_at ? 'Đã xác thực' : 'Chưa xác thực' }}" disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                    </div>
    
                                    <div class="form-group mb-3">
                                        <label class="form-label">Địa chỉ</label>
                                        <textarea class="form-control" name="address" rows="2">{{ $user->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-12">
                                <div class="info-section mb-4">
                                    <h6 class="section-title bg-light p-2 mb-3">Thông tin tài khoản</h6>
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Số dư ví</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">VND</span>
                                                    <input type="text" class="form-control bg-light" value="{{ number_format($user->wallet) }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Trạng thái</label>
                                                <select class="form-select" name="status">
                                                    <option value="1" {{ $user->status ? 'selected' : '' }}>Hoạt động</option>
                                                    <option value="0" {{ !$user->status ? 'selected' : '' }}>Đã khóa</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Vai trò</label>
                                                <select class="form-select" name="role_id" {{ $user->username === 'admin' ? 'disabled' : '' }}>
                                                    <option value="0" {{ $user->role_id == 0 ? 'selected' : '' }}>Người dùng</option>
                                                    <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="action-buttons mt-4 d-flex justify-content-between border-top pt-3">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Quay lại
                            </a>
                            
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Lưu thay đổi
                                </button>
                                
                                @if(
                                    (auth()->user()->username === 'admin' && $user->username !== 'admin') || 
                                    (auth()->user()->role_id == 1 && $user->role_id == 0)
                                )
                                    <button type="button" class="btn btn-danger" onclick="handleDelete({{ $user->id }})">
                                        <i class="bi bi-trash"></i> Xóa tài khoản
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                    
                    @if(
                        (auth()->user()->username === 'admin' && $user->username !== 'admin') || 
                        (auth()->user()->role_id == 1 && $user->role_id == 0)
                    )
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
    
    <script>
        function handleDelete(userId) {
            if (confirm('Bạn có chắc chắn muốn xóa tài khoản này? Toàn bộ dữ liệu liên quan sẽ bị mất!')) {
                event.preventDefault();
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>
@endsection