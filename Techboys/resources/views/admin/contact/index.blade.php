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
                    <h3>Danh sách liên hệ</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách liên hệ</li>
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
                    {{-- <a href="{{ route('admin.contact.show_add') }}" class="btn btn-primary">Thêm liên hệ</a> --}}
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="col-2">Người liên hệ</th>
                                <th class="col-2">Địa chỉ Email</th>
                                <th class="col-2">Số điện thoại</th>
                                <th class="col-4">Tin nhắn</th>
                                <th class="col-2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>aaaaaaaqaaaaaaaq</td>
                                <td>aaaaaaaqaaaaaaaq</td>
                                <td>aaaaaaaqaaaaaaaq</td>
                                <td>aaaaaaaqaaaaaaaq</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-info">Ẩn</a>
                                    <a href="" class="btn btn-warning">Sửa</a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    @endsection