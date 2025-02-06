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
                    <h3>Danh Mục</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh Mục</li>
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
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Thêm Danh mục</a>
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="col-4">STT</th>
                                <th class="col-4">Tên Danh Mục</th>
                              
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="col-4">STT</th>
                                <th class="col-4">Tên Danh Mục</th>
                               
                              
                        </tfoot>
                        <tbody>
                            @foreach ($loadAll as $key => $category)

                                <tr>
                                    <td class="col-4">{{ ++$key }}</td>
                                    <td class="col-4">{{ $category->name }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{ route('admin.category.edit',['id'=>$category['id']]) }}">Sửa</a>
                                        <a class="btn btn-primary" href="{{ route('admin.category.destroy',['id'=>$category['id']]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
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