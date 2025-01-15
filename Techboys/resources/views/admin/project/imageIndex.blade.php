@extends('admin.layouts.master')
@section('styles')
    <style>
        .row-image {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            /* Các cột tự động điều chỉnh */
            gap: 10px;
            /* Khoảng cách giữa các ảnh */
            justify-items: stretch;
            /* Căn đều các ảnh trong lưới */
        }

        .thumbnail-container {
            position: relative;
            width: 200px;
            height: 200px;
            display: inline-block;
            margin: 10px;
            cursor: pointer;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .thumbnail-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border: none;
            transition: transform 0.3s ease;
        }

        .thumbnail-img:hover {
            transform: scale(1.1);
        }

        .thumbnail-caption {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
            font-size: 14px;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .thumbnail-container:hover .thumbnail-caption {
            opacity: 1;
        }

        .delete-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 0, 0, 0.7);
            border: none;
            color: white;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
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
                        <h3></h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách ảnh dự án</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section class="section">
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

                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary me-2" data-bs-toggle="modal"
                                data-bs-target="#addImagesModal">Thêm Ảnh</button>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteAllModal">Xóa tất cả</button>
                        </div>

                        <div class="row row-image">
                          
                                <div class="thumbnail-container">
                                    <img src="" class="thumbnail-img" alt="Tên ảnh"
                                        data-bs-toggle="modal" data-bs-target="#imageModal"
                                        data-bs-image="">
                                    {{-- <div class="thumbnail-caption">{{ basename($image->image_path) }}</div> --}}
                                    <div>
                                        <button class="delete-btn" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal" data-project-id=""
                                            data-image-id="">Xóa</button>
                                    </div>
                                </div>
                       
                        </div>

                        <!-- Modal thêm ảnh -->
                        <div class="modal fade" id="addImagesModal" tabindex="-1" aria-labelledby="addImagesModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addImagesModalLabel">Thêm ảnh</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="images" class="form-label">Chọn ảnh</label>
                                                <input type="file" class="form-control" id="images" name="images[]"
                                                    multiple>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Tải lên</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal xác nhận xóa từng ảnh -->
                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                            aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa ảnh này không?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        <a href="#" class="btn btn-danger delete-image">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal xác nhận xóa tất cả -->
                        <div class="modal fade" id="confirmDeleteAllModal" tabindex="-1"
                            aria-labelledby="confirmDeleteAllModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteAllModalLabel">Xác nhận xóa tất cả</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa tất cả ảnh không?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Hủy</button>
                                        <a href=""
                                            class="btn btn-danger">Xóa tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal phóng to ảnh -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img id="modalImage" src="" class="img-fluid" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    @endsection

    @section('scripts')
        <script>
            // Khi mở modal phóng to ảnh
            var modal = document.getElementById('imageModal');
            var modalImage = document.getElementById('modalImage');

            modal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var imageUrl = button.getAttribute('data-bs-image');
                modalImage.src = imageUrl;
            });

            // Gán URL xóa cho modal xác nhận xóa ảnh
            var confirmDeleteModal = document.getElementById('confirmDeleteModal');

            confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Nút vừa được nhấn
                var projectId = button.getAttribute('data-project-id'); // Lấy projectId
                var imageId = button.getAttribute('data-image-id'); // Lấy imageId

                // Gán đường dẫn xóa ảnh vào modal (có cả projectId và imageId)
                var deleteUrl = `/admin/project/${projectId}/images/delete/${imageId}`;
                confirmDeleteModal.querySelector('.btn-danger').setAttribute('href', deleteUrl);
            });
        </script>
    @endsection
