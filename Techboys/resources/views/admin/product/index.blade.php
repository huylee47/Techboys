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
                        <h3>Danh sách sản phẩm</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
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
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-1">Ảnh hiển thị</th>
                                    <th class="col-2">Tên</th>
                                    <th class="col-1">Hãng</th>
                                    <th class="col-1">Danh mục</th>
                                    <th class="col-1">Đánh giá</th>
                                    <th class="col-1">Trạng thái</th>
                                    <th class="col-1">Biến thể?</th>
                                    <th class="col-1">Ngày tạo</th>
                                    <th class="col-2">Chức năng</th>
                                </tr>
                            </thead>
                            <p class="visually-hidden">{{ $index = 1 }}</p>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $index++ }}</td>
                                        <td>
                                            <img src="{{ url('') }}/admin/assets/images/product/{{ $product->img }}"
                                                alt="{{ $product->name }}" class="img-fluid"
                                                style="max-width: 100px; height: auto;">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->rate_average }}/5</td>
                                        <td class="text-center">
                                            @if ($product->deleted_at)
                                                <span class="badge bg-danger">Đã ẩn</span>
                                            @else
                                                <span class="badge bg-success">Đang bán</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($product->is_featured = 1)
                                                <span class="badge bg-success">Có</span>
                                            @else
                                                <span class="badge bg-info">Không</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            <a href="{{ $product->deleted_at ? route('admin.product.restore', $product->id) : route('admin.product.hide', $product->id) }}"
                                                title="Nhấn để {{ $product->deleted_at ? 'HIỆN' : 'ẨN' }} sản phẩm"
                                                class=" {{ $product->deleted_at ? 'bi-eye-fill text-success' : 'bi-eye-slash text-danger' }} fs-4">
                                            </a>
                                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                                class="bi-pencil-fill text-warning  fs-4"
                                                title="Nhấn để sửa sản phẩm"></a>
                                            <a href="{{ route('admin.product.imageIndex', ['productId' => $product->id]) }}"
                                                class="bi-images fs-4" title="Kho ảnh của sản phẩm {{ $product->name }} "></a>
                                            <a href="{{ route('admin.product.destroy', ['id' => $product->id]) }}"
                                                onclick="return confirm('Bạn có chắc chắn xoá sản phẩm {{ $product->name }} không?')"
                                                class="bi-trash-fill text-danger fs-4"
                                                title="Nhấn để xoá sản phẩm"></a>
                                            <a href="{{ route('admin.stock.index', ['id' => $product->id]) }}"
                                                class="bi-box-seam text-success fs-4"
                                                title="Nhấn để cập nhập số lượng sản phẩm {{ $product->name }}"></a>
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
