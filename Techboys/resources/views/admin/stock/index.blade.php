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
                    <h3>Danh sách sản phẩm tồn khoss</h3>
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
    <a href="#" data-bs-toggle="modal" data-bs-target="#stockModal{{$stock->id}}">
        <img src="{{ url('') }}/admin/assets/images/product/{{$stock->product->img}}" 
            style="width: 100px; height: 130px;">
    </a>
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
@foreach ($stocks as $stock)
<div class="modal fade" id="stockModal{{$stock->id}}" tabindex="-1" aria-labelledby="stockModalLabel{{$stock->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stockModalLabel{{$stock->id}}">Thông tin tồn kho</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Sản phẩm:</strong> {{$stock->product->name}}</p>
                <p><strong>Màu sắc:</strong> {{$stock->color->name}}</p>
                <p><strong>Giá:</strong> {{ number_format($stock->price, 0, ',', '.') }} đ</p>
                <p><strong>Số lượng tồn kho:</strong> {{ $stock->calculated_stock }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
