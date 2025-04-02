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
                        <h3>Danh Mục</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh Mục</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Thêm Danh mục</a>

                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-4">STT</th>
                                    <th class="col-4">Tên Danh Mục</th>
                                    <th class="col-4">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loadAll as $key => $category)
                                    <tr>
                                        <td class="col-4">{{ ++$key }}</td>
                                        <td class="col-4">{{ $category->name }}</td>
                                        <td class="text-center">
                                            <a class="bi-pencil-fill text-warning fs-4 mx-2" title="Nhấn để sửa danh mục"
                                               href="{{ route('admin.category.edit', ['id' => $category->id]) }}"></a>

                                            @php
                                                $canDelete = !in_array($category->id, $usedCategoryArray);
                                            @endphp

                                            @if ($canDelete)
                                                <a class="bi-trash-fill text-danger fs-4 mx-2 delete-btn"
                                                   href="#" 
                                                   data-id="{{ $category->id }}" 
                                                   data-name="{{ $category->name }}"
                                                   title="Nhấn để xoá danh mục">
                                                </a>
                                            @else
                                                <a class="bi-trash-fill text-secondary fs-4 mx-2" disabled 
                                                   title="Danh mục này đang được sử dụng, không thể xoá"></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <!-- Modal Xác Nhận Xóa -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa danh mục <strong id="categoryName"></strong> không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <form id="deleteForm" method="GET">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @section('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                let categoryName = document.getElementById('categoryName');
                let deleteForm = document.getElementById('deleteForm');

                document.querySelectorAll('.delete-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        let id = this.getAttribute('data-id');
                        let name = this.getAttribute('data-name');

                        categoryName.textContent = name;
                        deleteForm.setAttribute('action', `/admin/category/destroy/${id}`);

                        deleteModal.show();
                    });
                });
            }); 
        </script>
        @endsection
@endsection
