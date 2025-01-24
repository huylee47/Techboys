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
                    <h3>Voucher</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">voucher</li>
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
                    <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary">Thêm voucher</a>
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="col-1">STT</th>
                                <th class="col-1">Code</th>
                                <th class="col-1">Tên</th>
                                <th class="col-1">Giảm(%)</th>
                                <th class="col-1">Giảm(VNĐ)</th>
                                <th class="col-1">Giá tối thiểu để áp dụng voucher</th>
                                <th class="col-1">Giá tối đa để áp dụng voucher</th>
                                {{-- <th class="col-1">Ngày hiệu lực</th>
                                <th class="col-1">Ngày hết hạn</th>
                                <th class="col-1">Số lượng dùng</th> --}}
                                <th class="col-2">Chức năng</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="col-1">STT</th>
                                <th class="col-1">Code</th>
                                <th class="col-1">Tên</th>
                                <th class="col-1">Giảm(%)</th>
                                <th class="col-1">Giảm(VNĐ)</th>
                                <th class="col-1">Giá tổi thiểu để áp dụng voucher</th>
                                <th class="col-1">Giá tổi đa để áp dụng voucher</th>
                                {{-- <th class="col-1">Ngày hiệu lực</th>
                                <th class="col-1">Ngày hết hạn</th>
                                <th class="col-1">Số lượng dùng</th> --}}
                                <th class="col-2">Chức năng</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($loadAll as $key => $voucher)

                                <tr>
                                    <td class="col-1">{{ ++$key }}</td>
                                    <td class="col-1">{{ $voucher->code }}</td>
                                    <td class="col-1">{{ $voucher->name }}</td>
                                    <td class="col-1">{{ number_format($voucher->discount_percent) }}%</td>
                                    <td class="col-1">{{ number_format($voucher->discount_amount) }}Đ</td>
                                    <td class="col-1">{{ number_format($voucher->min_price) }}Đ</td>
                                    <td class="col-1">{{ number_format($voucher->max_price) }}Đ</td>
                                    {{-- <td class="col-1">{{ $voucher->start_date }}</td>
                                    <td class="col-1">{{ $voucher->end_date }}</td>
                                    <td class="col-1">{{ $voucher->quantity }}</td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('admin.voucher.edit',['id'=>$voucher['id']]) }}" class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('admin.voucher.show',['id'=>$voucher['id']]) }}" class="btn btn-warning">chi tiết</a>
                                        <a href="{{ route('admin.voucher.destroy',['id'=>$voucher['id']]) }}" class="btn btn-info">Xóa</a>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    @endsection