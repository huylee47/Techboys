@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/summernote/summernote-lite.min.css">

<style>
    img {
        max-width: 300px;
        max-height: 200px;
    }
</style>
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
                            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ old('title') }}">
                                    </div>
                                    {{-- <div class="col-md-6 mb-3">
                                        <label for="image">Hình ảnh</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image"
                                                accept="image/*" onchange="displayImage(event)"
                                                value="{{ old('image') }}">
                                        </div>
                                    </div>
                                    <div id="image-preview" style="float: right"></div> --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="images" class="form-label">Ảnh </label>
                                        <input class="form-control" type="file" id="images" name="image"
                                            accept="image/*">
                                        <div id="image-preview-container" class="mt-3"
                                            style="display: flex; gap: 10px; flex-wrap: wrap;"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội Dung</label>
                                        <textarea name="content" id="summernote"> {{ old('content') }}</textarea>

                                        {{-- <div id="summernote" name="content" class="form-control">{!! old('content')
                                            !!}
                                        </div> --}}
                                    </div>
                                </div>
                                {{-- <input type="hidden" id="content" name="content" value=""> --}}

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <a class="btn btn-primary" href="{{ route('admin.blogs.index') }}">Quay lại</a>
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
        document.getElementById('images').addEventListener('change', function (event) {
            let previewContainer = document.getElementById('image-preview-container');
            previewContainer.innerHTML = '';

            Array.from(event.target.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 300,
            placeholder: 'Nhập nội dung chi tiết của dự án...',
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

        document.addEventListener('DOMContentLoaded', function () {
            const previewContainer = document.getElementById('image-preview-container');
            const previewImage = document.getElementById('image-preview');
            const imageInput = document.getElementById('image');

            // Hiển thị ảnh mặc định khi mở form
            if (previewImage.src && previewImage.src !== 'https://placehold.co/600x400') {
                previewContainer.style.display = 'block'; // Hiển thị ảnh nếu có ảnh mặc định
            }

            // Lắng nghe sự kiện change khi người dùng chọn ảnh mới
            imageInput.addEventListener('change', function (event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        previewImage.src = e.target.result; // Cập nhật src của ảnh mới
                        previewContainer.style.display = 'block'; // Hiển thị khu vực xem trước
                    };

                    reader.readAsDataURL(file); // Đọc tệp ảnh và chuyển đổi thành URL để hiển thị
                } else {
                    // Nếu không có tệp ảnh mới, kiểm tra xem có ảnh cũ không
                    if (previewImage.src) {
                        previewContainer.style.display = 'block'; // Giữ ảnh cũ hiển thị
                    } else {
                        previewContainer.style.display = 'none'; // Ẩn khu vực xem trước nếu không có ảnh
                    }
                }
            });
        });
    </script>
    @endsection