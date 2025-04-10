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
                        <h3>Cấu hình Website</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cấu hình</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container">
                <table class="table mt-3">
                    <tr>
                        <th>Favicon</th>
                        <td><img src="{{ asset('admin/assets/images/config/' . $config->favicon) }}" width="100"
                            alt="Favicon Image" ></td>
                    </tr>
                    <tr>
                        <th>Logo</th>
                        <td ><img src="{{ asset('admin/assets/images/config/' . $config->logo) }}" width="100"
                            alt="Logo Image" ></td>
                    </tr>
                    <tr>
                        <th>Tiêu đề trang web</th>
                        <td>{{ $config->title }}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{ $config->address }}</td>
                    </tr>
                    <tr>
                        <th>Bản đồ</th>
                        <div ><td>{!! $config->map !!}</td></div>
                    </tr>
                    <tr>
                        <th>Hotline</th>
                        <td>{{ $config->hotline }}</td>
                    </tr>
                    <tr>
                        <th>Facebook</th>
                        <td><a href="{{ $config->facebook }}" target="_blank">Xem trang</a></td>
                    </tr>
                    <tr>
                        <th>Ngày cập nhật gần nhất</th>
                        <td>{{ \Carbon\Carbon::parse($config->updated_at)->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <a href="{{ route('admin.config.edit') }}" class="btn btn-primary">Chỉnh sửa</a>
    </div>
@endsection
