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
                    <h3>Danh sách hóa đơn</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách hóa đơn</li>
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
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="col-1">STT</th>
                                <th class="col-2">Tên khách hàng</th>
                                <th class="col-2">Số điện thoại</th>
                                <th class="col-1">Tổng tiền</th>
                                <th class="col-1">Trạng thái</th>
                                <th class="col-4">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bills as $bill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bill->full_name }}</td>
                                    <td>{{ $bill->phone }}</td>
                                    <td>{{ number_format($bill->total, 0, ',', '.') }} VND</td>
                                    <td>
                                        @if ($bill->status_id == 1)
                                            <span class="badge bg-success">Đang xử lý</span>
                                        @elseif ($bill->status_id == 2)
                                            <span class="badge bg-warning">Đang giao</span>
                                        @else
                                            <span class="badge bg-danger">Đã hoàn thành</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.bill.download', $bill->id) }}" class="btn btn-primary">Tải về</a>
                                        <a href="{{ route('admin.bill.show', $bill->id) }}" class="btn btn-primary">Chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Phân trang -->
                    <div class="d-flex justify-content-center">
                        {{ $bills->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
