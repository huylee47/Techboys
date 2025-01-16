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
                        <h3>Thẻ</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách thẻ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        {{-- Thông báo --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        {{-- Nút thêm thẻ --}}
                        <a href="" class="btn btn-primary mb-3">Thêm thẻ</a>

                        {{-- Bảng danh sách thẻ --}}
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-5">Tên thẻ</th>
                                    <th class="col-3">Trạng thái</th>
                                    <th class="col-3">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($tags as $index => $tag) --}}
                                    <tr>
                                        <td>qwe</td>
                                        <td>asd</td>
                                        <td>
                                            {{-- @if ($tag->status == 1)
                                                <span class="badge bg-success">Hoạt động</span>
                                            @else
                                                <span class="badge bg-secondary">Đã ẩn</span>
                                            @endif --}}
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-info">Sửa</a>
                                            <form action="" 
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('POST')
                                                {{-- <button type="submit" class="btn btn-{{ $tag->status == 1 ? 'danger' : 'success' }}">
                                                    {{ $tag->status == 1 ? 'Ẩn' : 'Hiện' }}
                                                </button> --}}
                                            </form>
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
