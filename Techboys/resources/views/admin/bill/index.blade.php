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

            <!-- Dropdown lọc trạng thái đơn hàng -->
            <div class="row mb-3">
                <div class="col d-flex justify-content-between align-items-center">
                    <div class="col-md-4">
                        <select id="filter-status" class="form-select">
                            <option value="" selected disabled>-- Chọn trạng thái --</option>
                            <option value="">Tất cả </option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Đang giao</option>
                            <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Đã giao</option>
                            <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>Đã nhận hàng</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Đã huỷ</option>
                        </select>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('admin.bill.create') }}">Tạo hoá đơn</a>
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
                                    <th class="col-1">Thời gian tạo đơn</th>
                                    <th class="col-1">Mã đơn hàng</th>
                                    <th class="col-2">Tên khách hàng</th>
                                    <th class="col-1">Số điện thoại</th>
                                    <th class="col-1">Tổng tiền</th>
                                    <th class="col-1">PT Thanh toán</th>
                                    <th class="col-1">TT Đơn hàng</th>
                                    <th class="col-1">TT Thanh toán</th>
                                    <th class="col-2">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bill->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $bill->order_id }}</td>
                                        <td>{{ $bill->full_name }}</td>
                                        <td>{{ $bill->phone }}</td>
                                        <td>{{ number_format($bill->total, 0, ',', '.') }} đ</td>
                                        <td>
                                            @if ($bill->payment_method == 1)
                                                <span class="badge bg-success">VNPAY/Banking</span>
                                            @elseif ($bill->payment_method == 2)
                                                <span class="badge bg-success">COD</span>
                                            @else
                                                <span class="badge bg-success">Thanh toán tại quầy</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bill->status_id == 1)
                                                <span class="badge bg-warning">Chờ xử lý</span>
                                            @elseif ($bill->status_id == 2)
                                                <span class="badge bg-info">Đang giao</span>
                                            @elseif ($bill->status_id == 3)
                                                <span class="badge bg-success">Đã giao</span>
                                            @elseif ($bill->status_id == 4)
                                                <span class="badge bg-success">Đã nhận hàng</span>
                                            @else
                                                <span class="badge bg-danger">Đã huỷ</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($bill->payment_status == 1)
                                                <span class="badge bg-success">Đã thanh toán</span>
                                            @else
                                                <span class="badge bg-warning">Chưa thanh toán</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.bill.download', $bill->id) }}"
                                                class="bi-file-earmark-arrow-down-fill text-success fs-4 mx-2"
                                                title="Nhấn để tải hoá đơn"></a>
                                            <a href="{{ route('admin.bill.show', $bill->id) }}"
                                                class="bi-plus-square-fill text-info fs-4 mx-2" title="Xem chi tiết"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.getElementById('filter-status').addEventListener('change', function() {
            let status = this.value;
            let url = new URL(window.location.href);
            if (status) {
                url.searchParams.set('status', status);
            } else {
                url.searchParams.delete('status');
            }
            window.location.href = url.toString();
        });
    </script>
@endsection
