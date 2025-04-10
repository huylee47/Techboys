@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/summernote/summernote-lite.min.css">
@endsection

@section('main')
    <div id="main">
        <header class="col-md-6 mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thêm Voucher</h4>
                            </div>
                            <div class="card-body">
                                {{-- Hiển thị thông báo lỗi --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{-- Form thêm dự án --}}
                                <form action="{{ route('admin.voucher.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="voucherCodeField">VOUCHER CODE</label>
                                            <input maxlength="255" type="text" class="form-control" id="code"
                                                aria-describedby="" name="code" placeholder="Nhập mã "
                                                value="{{ old('code') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="description">Tên</label>
                                            <input type="text" class="form-control" id="name" aria-describedby=""
                                                name="name" placeholder="Nhập Tên" value="{{ old('name') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="discount_amount">giảm(%)</label>
                                            <input type="number" class="form-control" id="discount_percent"
                                                aria-describedby="" name="discount_percent"
                                                placeholder="Nhập giá giảm theo %" value="{{ old('discount_percent') }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="min_price">Giảm(VNĐ)</label>
                                            <input type="number" class="form-control" id="discount_amount"
                                                aria-describedby="" name="discount_amount"
                                                placeholder="Nhập giá giảm theo VNĐ" value="{{ old('discount_amount') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="description">Giá tối thiểu để áp dụng voucher</label>
                                            <input type="number" class="form-control" id="min_price" aria-describedby=""
                                                name="min_price" placeholder="Nhập giá" value="{{ old('min_price') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="description">Giá giảm tối đa</label>
                                            <input type="number" class="form-control" id="max_discount" aria-describedby=""
                                                name="max_discount" placeholder="Nhập giá"
                                                value="{{ old('max_discount') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="start_date">Ngày bắt đầu (Định dạng: Năm/Tháng/Ngày)</label>
                                            <input type="datetime-local" class="form-control" id="start_date"
                                                name="start_date" placeholder="Ngày và giờ bắt đầu"
                                                value="{{ old('start_date', now()->format('Y-m-d\TH:i:s')) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="end-time">Ngày hết hạn (Định dạng: Năm/Tháng/Ngày)</label>
                                            <input type="datetime-local" class="form-control" id="end_date"
                                                aria-describedby="" name="end_date" placeholder="Ngày kết thúc"
                                                value="{{ old('end_date', now()->format('Y-m-d')) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="min_price">Số lượng</label>
                                            <input type="number" class="form-control" id="quantity" aria-describedby=""
                                                name="quantity" placeholder="Nhập số lượng" value="{{ old('quantity') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <a class="btn btn-primary" href="{{ route('admin.voucher.index') }}">Quay lại</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection

    @section('scripts')
        <script src="{{ url('') }}/admin/assets/vendors/summernote/summernote-lite.min.js"></script>
        <script>
            $(document).ready(function() {
                // Initialize selectpicker
                // $('.selectpicker').selectpicker();


                // Initialize Summernote
                $('#summernote').summernote({
                    tabsize: 2,
                    height: 300,
                    placeholder: 'Nhập nội dung chi tiết của dự án...',
                    callbacks: {
                        onChange: function(contents, $editable) {
                            // Cập nhật giá trị của trường ẩn mỗi khi có thay đổi
                            $('#content').val(contents);
                        }
                    }
                });

                // Trước khi submit form, đảm bảo nội dung Summernote được lưu vào trường ẩn
                $('form').on('submit', function() {
                    var content = $('#summernote').summernote('code'); // Lấy nội dung HTML từ Summernote
                    $('#content').val(content); // Gán nội dung vào trường ẩn
                });
            });
            document.addEventListener('DOMContentLoaded', function() {
                const element = document.querySelector('.selectpicker');
                const choices = new Choices(element, {
                    searchEnabled: true, // Bật tìm kiếm
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const discountAmountField = document.getElementById('discount_amount');
                const maxDiscountField = document.getElementById('max_discount');

                discountAmountField.addEventListener('input', function() {
                    maxDiscountField.value = discountAmountField.value;
                });
            });
        </script>
    @endsection
