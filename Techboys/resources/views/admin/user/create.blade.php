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
                            <h4 class="card-title">Thêm user</h4>
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
                            <form action="{{ route('admin.user.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="description">Tên</label>
                                    <input type="text"  class="form-control" id="name" aria-describedby=""
                                        name="name" placeholder="Nhập Tên" value="{{ old('name')  }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="description">Email</label>
                                    <input type="email"  class="form-control" id="email" aria-describedby=""
                                        name="email" placeholder="Nhập Email" value="{{ old('email')  }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="description">Username</label>
                                    <input type="text"  class="form-control" id="username" aria-describedby=""
                                        name="username" placeholder="Nhập Username" value="{{ old('username')  }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="description">Password</label>
                                    <input type="password"  class="form-control" id="password" aria-describedby=""
                                        name="password" placeholder="Nhập Password">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="description">Confirm_Password</label>
                                    <input type="password"  class="form-control" id="confirm_Password" aria-describedby=""
                                        name="confirm_Password" placeholder="Nhập confirm_Password" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="description">SĐT</label>
                                    <input type="number"  class="form-control" id="phone" aria-describedby=""
                                        name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone')  }}">
                                </div>
                              
                             
                            </div>
                                <button type="submit"  class="btn btn-primary">Thêm</button>
                                <a class="btn btn-primary" href="{{ route('admin.user.index') }}">Quay lại</a>
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
        $(document).ready(function () {
            // Initialize selectpicker
            // $('.selectpicker').selectpicker();


            // Initialize Summernote
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
        });
        document.addEventListener('DOMContentLoaded', function () {
            const element = document.querySelector('.selectpicker');
            const choices = new Choices(element, {
                searchEnabled: true, // Bật tìm kiếm
            });
        });
 
       
    </script>
    @endsection