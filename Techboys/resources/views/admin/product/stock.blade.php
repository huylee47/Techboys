@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><i class="bi bi-box-seam"></i> Tồn kho sản phẩm {{ $product->name }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Sản phẩm</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tồn kho</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
        <div class="page-heading">

            <div class="container mt-4">
                <h4 class="mb-3">Bảng tồn kho</h4>

                @if ($variants)
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>Thuộc Tính</th>
                            <th>Tồn Kho</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($variants as $variant)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $variant->attribute_values }}</td>
                                <td class="{{ $variant->stock > 0 ? 'text-success' : 'text-danger' }}">
                                    {{ $variant->stock > 0 ? $variant->stock : 'Hết hàng' }}
                                </td>
                                <td>{{ $variant->created_at->format('Y-m-d') }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success " data-bs-toggle="modal" data-bs-target="#updateStockModal_{{ $variant->id }}">
                                        </i> <span>Thêm số lượng</span>

                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>Tồn Kho</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="{{ $base_stock > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $base_stock > 0 ? $base_stock : 'Chưa có hàng' }}
                            </td>
                            <td>{{ $product->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-success " data-bs-toggle="modal" data-bs-target="#updateStockModal_{{ $product->id }}">
                                   <span>Thêm số lượng</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</section>
    </div>

    <!-- Modal cập nhật tồn kho -->
    @if ($variants)
        @foreach ($variants as $variant)
            <div class="modal fade" id="updateStockModal_{{ $variant->id }}" tabindex="-1" aria-labelledby="updateStockModalLabel_{{ $variant->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cập nhật tồn kho - {{ $variant->attribute_values }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.stock.update', $product->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Số lượng tồn kho hiện tại : {{$variant->stock}}</label>
                                    <input type="number" class="form-control" name="stock[{{ $variant->id }}]"  min="1"
                                        oninvalid="this.setCustomValidity('Số lượng không thể nhỏ hơn 1!')" 
                                        oninput="this.setCustomValidity('')">
                                    <input type="hidden" name="variant_id[]" value="{{ $variant->id }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="modal fade" id="updateStockModal_{{ $product->id }}" tabindex="-1" aria-labelledby="updateStockModalLabel_{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cập nhật tồn kho - {{ $product->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.stock.update', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Số lượng tồn kho hiện tại : {{$product->base_stock}}</label>
                                <input type="number" class="form-control" name="base_stock" min="1"
                                    oninvalid="this.setCustomValidity('Thêm mới không thể nhỏ hơn 1!')" 
                                    oninput="this.setCustomValidity('')">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
