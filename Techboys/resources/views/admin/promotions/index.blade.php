@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading d-flex justify-content-between">
            <h3>Quản lý khuyến mãi</h3>
            <a href="{{ route('admin.promotion.create') }}" class="btn btn-primary">+ Thêm khuyến mãi</a>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sản phẩm đang khuyến mãi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Sản phẩm</th>
                                            <th>Khuyến mãi (%)</th>
                                            <th>Giá trước-sau khuyến mãi</th>
                                            <th>Bắt đầu</th>
                                            <th>Kết thúc</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($promotions as $index => $promotion)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $promotion->product->name }}</td>
                                                <td>{{ $promotion->discount_percent }}%</td>
                                                <td>
                                                    {{ number_format($promotion->product->base_price, 0, ',', '.') }} đ →
                                                    <strong>{{ number_format($promotion->product->discounted_price, 0, ',', '.') }} đ</strong>
                                                </td>
                                                <td>{{ $promotion->start_date->format('d/m/Y') }}</td>
                                                <td>{{ $promotion->end_date->format('d/m/Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.promotion.edit', $promotion->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                                    <form action="{{ route('admin.promotion.destroy', $promotion->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $promotions->links() }} <!-- Pagination nếu có nhiều khuyến mãi -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
