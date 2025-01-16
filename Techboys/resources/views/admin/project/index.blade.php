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
                        <h3>Danh sách dự án</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách dự án</li>
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
                        <a href="" class="btn btn-primary">Thêm dự án</a>
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-1">Tên</th>
                                    <th class="col-1">Địa điểm</th>
                                    <th class="col-6">Mô tả</th>
                                    <th class="col-1">Ngày bàn giao</th>
                                    <th class="col-1">Tình trạng</th>
                                    <th class="col-2">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                    <tr>
                                        <td>dasd</td>
                                        <td>sadad</td>
                                        <td>ada</td>
                                        <td>asda</td>
                                        <td>
                                            {{-- <span
                                                class="badge
                                                @if ($project->status == 'completed') bg-success
                                                @elseif($project->status == 'ongoing') bg-primary @endif">
                                                {{ ucfirst($project->status) }}
                                            </span> --}}
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-info">Ẩn</a>
                                            <a href=""
                                                class="btn btn-warning">Sửa</a>
                                            <a href=""
                                                class="btn btn-info">Kho ảnh</a>
                                        </td>
                                    </tr>
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    @endsection
