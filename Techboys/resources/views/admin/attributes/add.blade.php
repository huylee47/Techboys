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
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
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
                        <h2 class="mb-4">Thêm Thuộc Tính</h2>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <!-- Form thêm thuộc tính -->
                        <form action="{{ route('admin.attributes.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Tên Thuộc Tính</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Nhập tên thuộc tính" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="is_multiple" class="form-label">Cho phép thêm nhiều?</label>
                                    <select class="form-control @error('is_multiple') is-invalid @enderror"
                                        name="is_multiple">
                                        <option value="0" selected disabled>Chọn phương thức</option>
                                        <option value="0" {{ old('is_multiple') == '0' ? 'selected' : '' }}>Không</option>
                                        <option value="1" {{ old('is_multiple') == '1' ? 'selected' : '' }}>Có</option>
                                    </select>
                                    @error('is_multiple')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Giá Trị Thuộc Tính</label>
                                    <div id="values-container">
                                        @if (old('values'))
                                            @foreach (old('values') as $key => $value)
                                                <div class="input-group mb-2">
                                                    <input type="text" name="values[]"
                                                        class="form-control @error("values.{$key}") is-invalid @enderror"
                                                        value="{{ $value }}">
                                                    <button type="button" class="btn btn-danger remove-value">X</button>
                                                    @error("values.{$key}")
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="input-group mb-2">
                                                <input type="text" name="values[]" class="form-control">
                                                <button type="button" class="btn btn-danger remove-value" style="display: none;">X</button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-success" id="add-value">+ Thêm Giá Trị</button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Lưu Thuộc Tính</button>
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

    <script>
        document.getElementById('add-value').addEventListener('click', function() {
            let container = document.getElementById('values-container');
            let newInput = document.createElement('div');
            newInput.classList.add('input-group', 'mb-2');
            newInput.innerHTML = `
                <input type="text" name="values[]" class="form-control" placeholder="Nhập giá trị..." >
                <button type="button" class="btn btn-danger remove-value">X</button>
            `;
            container.appendChild(newInput);
            updateRemoveButtons();
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
                updateRemoveButtons();
            }
        });

        function updateRemoveButtons() {
            let removeButtons = document.querySelectorAll('.remove-value');
            if (removeButtons.length === 1) {
                removeButtons[0].style.display = 'none';
            } else {
                removeButtons.forEach(button => button.style.display = 'inline-block');
            }
        }

        updateRemoveButtons();
    </script>
@endsection
