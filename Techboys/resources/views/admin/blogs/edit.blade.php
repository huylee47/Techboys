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
                            <form action="{{ route('admin.blogs.update', ['id' => $show->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT') {{-- Dùng PUT cho chỉnh sửa --}}
                                <input type="hidden" class="form-control" name="id" value="{{$show->id}}">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $show->title) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Nội Dung</label>
                                    <textarea name="content" id="summernote" > {{ old('content',$show->content) }}</textarea>
                                    {{-- <div id="summernote" required name="content" class="form-control">{!! old('content', $show->content) !!}</div> --}}
                                </div>
                                {{-- <input type="hidden"  id="content" name="content" value=""> --}}
                                <div class="mb-3">
                                    <label for="published_at" class="form-label">Ngày đăng bài</label>
                                    <input type="datetime-local" required class="form-control" id="published_at"
                                        name="published_at" value="{{ old('published_at', $show->published_at)}}">
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình ảnh</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" onchange="previewImage(this)">
                                    </div>
                                    <img id="preview" src="{{ url('admin/assets/images/blog/' . $show->image) }}" alt="Image"
                                        style="width: 100px; height: auto;" class="mt-2">
                                </div>
                

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
        function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
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