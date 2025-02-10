@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/css/custom.css">
@endsection

@section('main')
<div id="main">
    <header class="col-md-6 mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Chi Tiết Hóa Đơn</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Thông tin hóa đơn --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="billCode">Mã Hóa Đơn</label>
                                    <input type="text" class="form-control" id="billCode" value="{{ $bill->code }}" disabled>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="billDate">Ngày tạo</label>
                                    <input type="text" class="form-control" id="billDate" value="{{ $bill->created_at }}" disabled>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="totalAmount">Tổng tiền</label>
                                    <input type="number" class="form-control" id="totalAmount" value="{{ $bill->total_amount }}" disabled>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="status">Trạng thái</label>
                                    <input type="text" class="form-control" id="status" value="{{ $bill->status }}" disabled>
                                </div>
                            </div>

                            <h5 class="mt-4">Chi Tiết Sản Phẩm</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Biến Thể</th>
                                        <th>Số Lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $variant->name }}</td>
                                        <td>{{ $billDetail->quantity }}</td>
                                        <td>{{ number_format($billDetail->price, 2) }}</td>
                                        <td>{{ number_format($billDetail->price * $billDetail->quantity, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <a class="btn btn-primary" href="{{ route('admin.bill.index') }}">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
