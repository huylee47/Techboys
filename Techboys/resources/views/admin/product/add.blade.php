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
                        <h3>Thêm Dự Án</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Dự Án</li>
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
                                <h4 class="card-title">Thông Tin Dự Án</h4>
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
                                <form action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên Dự Án</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Địa Điểm</label>
                                        <input type="text" class="form-control" id="location" name="location"
                                            value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="handover_date" class="form-label">Ngày Bàn Giao</label>
                                        <input type="date" class="form-control" id="handover_date" name="handover_date"
                                            value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Tình Trạng</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="ongoing" >Đang
                                                tiến hành</option>
                                            <option value="completed" >
                                                Đã hoàn thành</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Mô Tả</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Ảnh dự án</label>
                                        <input class="form-control" type="file" id="image" name="image"
                                            accept="image/*" required>
                                        <div id="image-preview-container" class="mt-3"
                                            style="display:none; text-align: center;">
                                            <img id="image-preview" src="" alt="Image preview"
                                                style="max-width: 100%; max-height: 500px; display: block; margin: 0 auto; object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Nội Dung Chi Tiết</label>
                                        <div id="summernote" class="form-control" name="content"></div>
                                    </div>
                                    <input type="hidden" name="content" id="content">
                                    <button type="submit" class="btn btn-primary">Thêm Dự Án</button>
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

            document.getElementById('image').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const previewContainer = document.getElementById('image-preview-container');
                const previewImage = document.getElementById('image-preview');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result; // Cập nhật src của ảnh
                        previewContainer.style.display = 'block'; // Hiển thị khu vực xem trước
                    };

                    reader.readAsDataURL(file); // Đọc tệp ảnh và chuyển đổi thành URL để hiển thị
                } else {
                    previewContainer.style.display = 'none'; // Ẩn khu vực xem trước nếu không có tệp ảnh
                }
            });
        </script>
    @endsection
