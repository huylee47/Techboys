@extends('admin.layouts.master')

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
                        <h3>Chỉnh sửa cấu hình Website</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cấu hình</li>
                                <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12">
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

                                <form action="{{ route('admin.config.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="favicon">Favicon:</label>
                                        <input type="file" name="favicon" id="favicon" class="form-control">
                                    </div>
                                    @if ($errors->has('favicon'))
                                            <p class="text-danger small ">
                                                <i>{{ $errors->first('favicon') }}</i>
                                            </p>
                                            @endif
                                    
                                    <div class="form-group">
                                        <label for="logo">Logo:</label>
                                        <input type="file" name="logo" id="logo" class="form-control">
                                    </div>
                                    @if ($errors->has('logo'))
                                            <p class="text-danger small ">
                                                <i>{{ $errors->first('logo') }}</i>
                                            </p>
                                            @endif

                                    <div class="form-group">
                                        <label for="title">Tiêu đề Website:</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $config->title) }}">
                                    </div>
                                    @if ($errors->has('title'))
                                            <p class="text-danger small ">
                                                <i>{{ $errors->first('title') }}</i>
                                            </p>
                                            @endif

                                    <div class="form-group">
                                        <label for="address">Địa chỉ:</label>
                                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $config->address) }}">
                                    </div>
                                    @if ($errors->has('address'))
                                            <p class="text-danger small ">
                                                <i>{{ $errors->first('address') }}</i>
                                            </p>
                                            @endif

                                    <div class="form-group">
                                        <label for="map">Bản đồ nhúng:</label>
                                        <textarea name="map" id="map" class="form-control" rows="4">{{ $config->map }}</textarea>
                                    </div>
                                    @if ($errors->has('map'))
                                            <p class="text-danger small ">
                                                <i>{{ $errors->first('map') }}</i>
                                            </p>
                                            @endif

                                    <div class="form-group">
                                        <label for="hotline">Hotline:</label>
                                        <input type="text" name="hotline" id="hotline" class="form-control" value="{{ old('hotline', $config->hotline) }}">
                                    </div>
                                    @if ($errors->has('hotline'))
                                            <p class="text-danger small ">
                                                <i>{{ $errors->first('hotline') }}</i>
                                            </p>
                                            @endif

                                    <div class="form-group">
                                        <label for="facebook">Facebook Page:</label>
                                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', $config->facebook) }}">
                                    </div>
                                    @if ($errors->has('facebook'))
                                            <p class="text-danger small ">
                                                <i>{{ $errors->first('facebook') }}</i>
                                            </p>
                                            @endif

                                    <button type="submit" class="btn btn-primary">Cập nhật cấu hình</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
