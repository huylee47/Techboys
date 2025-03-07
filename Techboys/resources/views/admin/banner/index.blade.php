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
                    <h3>Tin tức</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách banner</li>
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
                    <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">Thêm banner</a>
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="col-1">STT</th>
                                <th class="col-2">Tiêu đề</th>
                                <th class="col-3">ảnh</th>
                                <th class="col-2">Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($loadAll as $key => $banner)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{$banner->title  }}</td>
                                    <td class="text-center"><img
                                            src="{{ url('admin/assets/images/banner') . '/' . $banner->image }}" alt=""
                                            style="width: 150px; height: auto;"></td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.banner.edit',['id'=>$banner['id']]) }}" class="btn btn-info">Sửa</a>
                                        <a href="{{ route('admin.banner.destroy',['id'=>$banner['id']]) }}" class="btn btn-warning" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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