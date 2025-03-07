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
                                <h4 class="card-title">Sửa Voucher</h4>
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
                                <form action="{{ route('admin.voucher.update', ['id' => $show->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="form-control" name="id" value="{{ $show->id }}">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="voucherCodeField">VOUCHER CODE</label>
                                            <input maxlength="255" type="text" class="form-control" id="code"
                                                aria-describedby="" name="code" placeholder="Nhập mã "
                                                value="{{ $show->code }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="description">Tên</label>
                                            <input type="text" class="form-control" id="name" aria-describedby=""
                                                name="name" placeholder="Nhập Tên" value="{{ $show->name }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="discount_amount">giảm(%)</label>
                                            <input type="number" class="form-control" id="discount_percent"
                                                aria-describedby="" name="discount_percent"
                                                placeholder="Nhập giá giảm theo %" value="{{ $show->discount_percent }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="min_price">Giảm(VNĐ)</label>
                                            <input type="number" class="form-control" id="discount_amount"
                                                aria-describedby="" name="discount_amount"
                                                placeholder="Nhập giá giảm theo VNĐ" value="{{ $show->discount_amount }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="description">Giá tối thiểu để áp dụng voucher</label>
                                            <input type="number" class="form-control" id="min_price" aria-describedby=""
                                                name="min_price" placeholder="Nhập giá" value="{{ $show->min_price }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="description">Giá tối đa để áp dụng voucher</label>
                                            <input type="number" class="form-control" id="max_discount" aria-describedby=""
                                                name="max_discount" placeholder="Nhập giá"
                                                value="{{ $show->max_discount }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="start_datetime">Ngày giờ bắt đầu (Định dạng: Năm/Tháng/Ngày
                                                Giờ:Phút)</label>
                                            <input type="datetime-local" class="form-control" id="start_datetime"
                                                aria-describedby="" name="start_date" placeholder="Ngày giờ bắt đầu"
                                                value="{{ $show->start_date }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="end_datetime">Ngày giờ kết thúc (Định dạng: Năm/Tháng/Ngày
                                                Giờ:Phút)</label>
                                            <input type="datetime-local" class="form-control" id="end_datetime"
                                                aria-describedby="" name="end_date" placeholder="Ngày giờ kết thúc"
                                                value="{{ $show->end_date }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="min_price">Số lượng</label>
                                            <input type="number" class="form-control" id="quantity" aria-describedby=""
                                                name="quantity" placeholder="Nhập số lượng"
                                                value="{{ $show->quantity }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sửa</button>
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
        </script>
    @endsection
