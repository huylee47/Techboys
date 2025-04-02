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
                        <h3>Thêm Khuyến Mãi</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{ route('admin.promotion.index') }}">Khuyến mãi</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Thêm khuyến mãi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
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

                                    <form action="{{ route('admin.promotion.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên khuyến mãi:</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                        </div>
                                        @if ($errors->has('name'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('name') }}</i>
                                                </p>
                                            @endif
                                    
                                        <div class="form-group">
                                            <label for="product_id">Sản phẩm:</label>
                                            <select name="product_id" id="product_id" class="form-control selectpicker" data-live-search="true">
                                                <option value="" disabled selected>Chọn sản phẩm </option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('product_id'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('product_id') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="discount_percent">Giảm giá (%):</label>
                                            <input type="number" name="discount_percent" id="discount_percent" class="form-control"  min="1" max="100" value="{{ old(key: 'discount_percent') }}">
                                        </div>
                                        @if ($errors->has('discount_percent'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('discount_percent') }}</i>
                                                </p>
                                            @endif
                                    
                                        <div class="form-group">
                                            <label for="end_date">Ngày kết thúc:</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" >
                                        </div>
                                        @if ($errors->has('end_date'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('end_date') }}</i>
                                                </p>
                                            @endif
                                    
                                        <button type="submit" class="btn btn-primary">Lưu khuyến mãi</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
