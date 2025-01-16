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
                    <h3>Danh sách bất động sản</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách bất động sản</li>
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
                    <a href="" class="btn btn-primary">Thêm bất động sản</a>
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="col-1">Dự án</th>
                                <th class="col-1">Loại BDS</th>
                                <th class="col-2">Tên BDS</th>
                                {{-- <th class="col-1">Giá (VND)</th> --}}
                                <th class="col-1">Tổng diện tích (m2)</th>
                                <th class="col-3">Mô tả</th>
                                <th class="col-1">Tình trạng</th>
                                <th class="col-1">Loại giao dịch</th>
                                <th class="col-2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($properties as $property) --}}
                            <tr>
                                <td>jl</td>
                                <td>jlj;</td>
                                <td>jjjj</td>
                                {{-- <td>{{ round($property->price) }}</td> --}}
                                <td>yhhhj</td>
                                <td>yuiyui</td>
                                <td>
                                    {{-- <span class="badge
                                                @if ($property->status == 'red book') bg-success
                                                @elseif($property->status == 'sale contract') bg-primary
                                                @elseif($property->status == 'pending red book') bg-warning
                                                @else bg-danger @endif">
                                        {{ ucfirst($property->status) }}
                                    </span> --}}
                                </td>
                                <td>ZX</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-info">Kho ảnh</a>
                                    <a href="" class="btn btn-warning">Sửa</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-id=" {{--{{ $property->id }}--}}">Xóa</a>
                                </td>
                            </tr>
                            {{-- @endforeach --}}

                        </tbody>
                    </table>

                    <!-- Modal xác nhận xóa -->
                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc chắn muốn xóa bất động sản này không?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                    <a href="#" class="btn btn-danger">Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection

    @section('scripts')
    <script>
        // Khi mở modal xác nhận xóa
        var confirmDeleteModal = document.getElementById('confirmDeleteModal');

        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Nút vừa được nhấn
            var propertyId = button.getAttribute('data-id'); // Lấy ID bất động sản

            // Gán đường dẫn xóa bất động sản
            var deleteUrl = `/admin/property/${propertyId}/delete`;
            confirmDeleteModal.querySelector('.btn-danger').setAttribute('href', deleteUrl);
        });
    </script>
    @endsection