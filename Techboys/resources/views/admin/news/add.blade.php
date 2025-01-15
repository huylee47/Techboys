@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/summernote/summernote-lite.min.css">
@endsection

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
                        <h3>Thêm Tin tức</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Tin tức</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thêm tin tức</h4>
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
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="published_at" class="form-label">Ngày đăng bài</label>
                                        <input type="date" class="form-control" id="published_at" name="published_at"
                                            value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image">Hình ảnh</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_id">Chọn dự án</label>
                                        <select class="form-control" id="product_id" name="project_id">
                                          
                                                <option value="">
                                                  ads
                                                </option>
                                          
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tags">Thẻ liên quan</label>
                                        <select class="form-control selectpicker" id="tags" name="tags[]" multiple
                                            data-live-search="true">
                                          
                                                <option value="">1as</option>
                                          
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội Dung Chi Tiết</label>
                                        <div id="summernote" class="form-control"></div>
                                        <input type="hidden" id="content" name="content" value="">
                                    </div>



                                    {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                                    <button type="submit" class="btn btn-primary">Thêm</button>
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
