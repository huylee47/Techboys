@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Danh Sách Thuộc Tính</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách thuộc tính</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="page-heading">
                    <div class="container mt-4">
                        <h2 class="mb-4">Cập Nhật Thuộc Tính</h2>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form id="update-form" action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST">
                            @csrf
                            
                            <!-- Tên thuộc tính -->
                            <div class="mb-3">
                                <label class="form-label">Tên Thuộc Tính</label>
                                <input type="text" class="form-control" value="{{ $attribute->name }}" readonly> 
                                <input type="hidden" name="name" value="{{ $attribute->name }}">
                            </div>

                            <!-- Giá trị thuộc tính -->
                            <div class="mb-3">
                                <label class="form-label">Giá Trị Thuộc Tính</label>
                                <div id="values-container">
                                    @foreach ($values as $id => $value)
                                        <div class="input-group mb-2">
                                            <input type="text" name="values[{{ $id }}]" class="form-control" value="{{ $value }}" required>
                                            
                                            @if (!in_array($id, $usedValuesArray))
                                                <button type="button" class="btn btn-danger remove-value">X</button>
                                            @else
                                                <button type="button" class="btn btn-secondary" disabled>Thuộc tính đang được sử dụng, không thể xóa</button>
                                            @endif
                                            
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-success" id="add-value">+ Thêm Giá Trị</button>
                            </div>

                            <!-- Nút cập nhật -->
                            <button type="button" class="btn btn-primary" id="save-btn">Cập Nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Xác Nhận Xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa giá trị này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xác Nhận Lưu -->
    <div class="modal fade" id="confirmSaveModal" tabindex="-1" aria-labelledby="confirmSaveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmSaveModalLabel">Xác nhận lưu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn lưu thay đổi không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="confirmSave">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-value').addEventListener('click', function() {
            let container = document.getElementById('values-container');
            let newInput = document.createElement('div');
            newInput.classList.add('input-group', 'mb-2');
            newInput.innerHTML = `
                <input type="text" name="values[]" class="form-control" placeholder="Nhập giá trị..." required>
                <button type="button" class="btn btn-danger remove-value">X</button>
            `;
            container.appendChild(newInput);
        });

        let deleteTarget = null;

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-value')) {
                deleteTarget = e.target.parentElement;
                let modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                modal.show();
            }
        });

        document.getElementById('confirmDelete').addEventListener('click', function() {
            if (deleteTarget) {
                deleteTarget.remove();
                deleteTarget = null;
                let modal = bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal'));
                modal.hide();
            }
        });

        document.getElementById('save-btn').addEventListener('click', function() {
            let modal = new bootstrap.Modal(document.getElementById('confirmSaveModal'));
            modal.show();
        });

        document.getElementById('confirmSave').addEventListener('click', function() {
            document.getElementById('update-form').submit();
        });
    </script>
@endsection
