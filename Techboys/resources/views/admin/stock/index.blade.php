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
                    <h3>Danh sách sản phẩm tồn kho</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm tồn kho</li>
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
                                <th class="col-2">Ảnh hiển thị</th>
                                <th class="col-1">Tên</th>
                                <th class="col-1">Màu sắc</th>
                                <th class="col-1">Giá</th>
                                <th class="col-1">Số lượng tồn kho</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($stocks as $index => $stock)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ url('') }}/admin/assets/images/product/{{$stock->product->img}}" style="width: 100px; height: 130px;">
                                </td>
                                <td>{{$stock->product->name}}</td>
                                <td>{{$stock->color->name}}</td>
                                <td>{{ number_format($stock->price, 0, ',', '.') }} đ</td>
                                <td>{{$stock->stock}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
