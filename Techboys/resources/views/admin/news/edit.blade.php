@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/summernote/summernote-lite.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/admin/assets/styles/choices.min.css">
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
                    <h3>Chỉnh sửa Tin tức</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa Tin tức</li>
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
                            <h4 class="card-title">Chỉnh sửa tin tức</h4>
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

                            {{-- Form chỉnh sửa tin tức --}}
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') {{-- Dùng PUT cho chỉnh sửa --}}

                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title" name="title" value="" required>
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

                                    <img src="" alt="Image" style="width: 100px; height: auto;" class="mt-2">

                                </div>

                                <div class="form-group">
                                    <label for="product_id">Chọn dự án</label>
                                    <select class="form-control" id="product_id" name="project_id">

                                        <option value="">

                                        </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Thẻ liên quan</label>
                                    <select class="form-control selectpicker" id="tags" name="tags[]" multiple>

                                        <option value="">

                                        </option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Nội Dung Chi Tiết</label>
                                    <div id="summernote" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="content" id="content">
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/admin/assets/scripts/choices.min.js"></script>
    <script>
        $(document).ready(function () {
            // Khởi tạo Choices.js
            const element = document.querySelector('.selectpicker');
            const choices = new Choices(element, {
                searchEnabled: true, // Bật tìm kiếm
            });

            // Khởi tạo Summernote
            $('#summernote').summernote({
                tabsize: 2,
                height: 300,
                placeholder: 'Nhập nội dung chi tiết...',
                callbacks: {
                    onChange: function (contents, $editable) {
                        // Cập nhật giá trị của trường ẩn mỗi khi có thay đổi
                        $('#content').val(contents);
                    }
                }
            });

            // Trước khi submit form, đảm bảo nội dung Summernote được lưu vào trường ẩn
            $('form').on('submit', function () {
                var content = $('#summernote').summernote('code'); // Lấy nội dung HTML từ Summernote
                $('#content').val(content); // Gán nội dung vào trường ẩn
            });
        });
    </script>
    @endsection