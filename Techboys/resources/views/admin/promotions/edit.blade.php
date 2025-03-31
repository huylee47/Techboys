@extends('admin.layouts.master')

@section('main')
    <div class="container">
        <h2>Sửa khuyến mãi</h2>
        <form action="{{ route('admin.promotion.update', $promotion->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên khuyến mãi:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $promotion->name }}" required>
            </div>

            <div class="form-group">
                <label for="product_id">Sản phẩm:</label>
                <select name="product_id" id="product_id" class="form-control">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $promotion->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="discount_percent">Giảm giá (%):</label>
                <input type="number" name="discount_percent" id="discount_percent" class="form-control"
                    value="{{ $promotion->discount_percent }}" required min="1" max="100">
            </div>

            <div class="form-group">
                <label for="end_date">Ngày kết thúc:</label>
                <input type="date" name="end_date" id="end_date" class="form-control"
                    value="{{ $promotion->end_date->format('Y-m-d') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.promotion.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
