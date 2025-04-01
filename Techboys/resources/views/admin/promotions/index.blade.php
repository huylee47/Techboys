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
                        <h3>Danh sách khuyến mãi</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Khuyến mãi</li>
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
                        <a href="{{ route('admin.promotion.create') }}" class="btn btn-primary">Thêm khuyến mãi</a>
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá gốc</th>
                                    <th>Phần trăm giảm</th>
                                    <th>Giá sau giảm</th>                                    
                                    <th>Kết thúc</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions as $index => $promotion)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $promotion->product->name }}</td>
                                        <td>
                                            @if($promotion->product && $promotion->product->variant->count())
                                            {{ $promotion->product->variant->first()->price ?? 'Chưa có giá' }} 
                                            @else
                                                Chưa có giá
                                            @endif
                                        </td>
                                        <td>{{ $promotion->discount_percent }}%</td>
                                        <td>
                                            @if($promotion->product && $promotion->product->variant->first())
                                                {{ number_format($promotion->product->variant->first()->price * (1 - $promotion->discount_percent / 100)) }} VNĐ
                                            @else
                                                Chưa có giá
                                            @endif
                                        </td>
                                        <td>{{ date('d/m/Y', strtotime($promotion->end_date)) }}</td>

                                        <td>
                                            <a href="{{ route('admin.promotion.edit', $promotion->id) }}"
                                                class="bi-pencil-fill text-warning fs-4" title="Sửa khuyến mãi"></a>
                                            <a href="{{ route('admin.promotion.destroy', $promotion->id) }}"
                                                class="bi-trash-fill text-danger fs-4" title="Xóa khuyến mãi"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này?');"></a>
                                        </td>
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
