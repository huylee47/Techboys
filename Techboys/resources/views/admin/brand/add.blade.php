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
                            <h4 class="card-title">Thêm Thương Hiệu</h4>
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

                            <form action="{{ route('admin.brand.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="voucherCodeField">Tên Thương Hiệu</label>
                                    <input maxlength="255"  type="text" class="form-control"
                                        id="name" aria-describedby="" name="name"
                                        placeholder="Nhập Tên " value="{{ old('name')  }}">
                                </div>
                                <button type="submit"  class="btn btn-primary">Thêm</button>
                                <a class="btn btn-primary" href="{{ route('admin.brand.index') }}">Quay lại</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @endsection
