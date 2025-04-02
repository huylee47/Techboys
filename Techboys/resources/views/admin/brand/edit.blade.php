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
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sửa Thương Hiệu</h4>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.brand.update',['id'=>$brand->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="voucherCodeField">Sửa Thương Hiệu</label>
                                    <input maxlength="255"  type="text" class="form-control"
                                        id="name" aria-describedby="" name="name"
                                        placeholder="Nhập Tên " value="{{$brand->name}}">
                                </div>
                                <button type="submit"  class="btn btn-primary">Sửa</button>
                                <a class="btn btn-primary" href="{{ route('admin.brand.index') }}">Quay lại</a>

                                
                                @php
                                $canDelete = !in_array($brand->id, $usedBrandArray);
                            @endphp

                            @if ($canDelete)
                            <button class="btn btn-danger">
                                <a class="bi-trash-fill text-light  delete-btn"
                                   href="#" 
                                   data-id="{{ $brand->id }}" 
                                   data-name="{{ $brand->name }}"
                                   title="Nhấn để xoá thương hiệu">
                                  Xoá
                                </a>
                            </button>

                            @else
                            <button class="btn btn-secondary" disabled title="Thương hiệu này này đang được sử dụng, không thể xoá">
                                <a class="bi-trash-fill text-light"  
                                   >Không thể xoá</a>
                            </button>

                            @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa thương hiệu <strong id="brandName"></strong> không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form id="deleteForm" method="GET">
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            let brandName = document.getElementById('brandName');
            let deleteForm = document.getElementById('deleteForm');

            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function () {
                    let id = this.getAttribute('data-id');
                    let name = this.getAttribute('data-name');

                    brandName.textContent = name;
                    deleteForm.setAttribute('action', `/admin/brand/destroy/${id}`);

                    deleteModal.show();
                });
            });
        }); 
    </script>
    @endsection