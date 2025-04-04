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
                        <h3>Danh sách khuyến mãi</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Khuyến mãi</li>
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
                        <a href="{{ route('admin.promotion.create') }}" class="btn btn-primary">Thêm khuyến mãi</a>
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Phần trăm giảm</th>
                                    <th>Kết thúc</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $index => $promotion)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $promotion->product->name }}</td>
                                        <td>{{ $promotion->discount_percent }}%</td>
                                        <td>{{ date('d/m/Y', strtotime($promotion->end_date)) }}</td>

                                        <td>
                                            <a href="{{ route('admin.promotion.edit', $promotion->id) }}"
                                                class="bi-pencil-fill text-warning fs-4" title="Sửa khuyến mãi"></a>
                                            <a href="javascript:void(0);" class="bi-trash-fill text-danger fs-4" title="Xóa khuyến mãi"
                                                onclick="openDeleteModal('{{ route('admin.promotion.destroy', $promotion->id) }}');">
                                            </a>
                                            
                                            <script>
                                                function openDeleteModal(actionUrl) {
                                                    let deleteForm = document.getElementById('deleteForm');
                                                    if (deleteForm) {
                                                        deleteForm.action = actionUrl;
                                                        let modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
                                                        modal.show();
                                                    } else {
                                                        console.error("Không tìm thấy form deleteForm!");
                                                    }
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xác nhận xóa</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Bạn có chắc chắn muốn xóa khuyến mãi này không?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form id="deleteForm" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
