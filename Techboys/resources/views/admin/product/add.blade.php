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
                        <h3>Thêm Sản Phẩm</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{ route('admin.product.index') }}">Danh sách Sản Phẩm</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
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
                                <h4 class="card-title">Thông Tin Sản Phẩm</h4>
                            </div>
                            <div class="card-body">
                                {{-- Hiển thị thông báo lỗi --}}
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}

                                {{-- Form thêm Sản Phẩm --}}
                                <form action="{{ route('admin.product.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="category_id" class="form-label">Danh mục sản phẩm</label>
                                            <select class="form-select" id="category_id" name="category_id">
                                                <option value="" selected disabled>Chọn danh mục</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('category_id') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="brand" class="form-label">Hãng</label>
                                            <select class="form-select" id="brand_id" name="brand_id">
                                                <option value="" selected disabled>Chọn hãng</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('brand_id'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('brand_id') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Tên Sản Phẩm</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('name') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="images" class="form-label">Ảnh Sản Phẩm</label>
                                            <input class="form-control" type="file" id="images" name="img"
                                                accept="image/*">
                                            <div id="image-preview-container" class="mt-3"
                                                style="display: flex; gap: 10px; flex-wrap: wrap;"></div>
                                            @if ($errors->has('img'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('img') }}</i>
                                                </p>
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô tả</label>
                                            <div id="summernote" class="form-control" name="description"></div>
                                        </div>
                                        <input type="hidden" name="description" id="description"
                                            value="{{ old('description') }}">
                                        <div>
                                            <h4 class="card-title">Thông Tin Biến Thể</h4>
                                            <div id="variant-container">
                                                <div class="variant-row row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="color" class="form-label">Màu</label>
                                                        <select class="form-select" name="color_id[]">
                                                            <option value="" selected disabled>Chọn màu</option>
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->id }}">{{ $color->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('color_id'))
                                                            <p class="text-danger small ">
                                                                <i>{{ $errors->first('color_id') }}</i>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="model" class="form-label">Dung lượng</label>
                                                        <select class="form-select" name="model_id[]">
                                                            <option value="" selected disabled>Chọn dung lượng
                                                            </option>
                                                            @foreach ($P_Models as $P_Model)
                                                                <option value="{{ $P_Model->id }}">{{ $P_Model->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('model_id'))
                                                            <p class="text-danger small ">
                                                                <i>{{ $errors->first('model_id') }}</i>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="price" class="form-label">Giá bán</label>
                                                        <input type="number" class="form-control" name="price[]">
                                                        @foreach (old('price', []) as $index => $value)
                                                            @error("price.$index")
                                                                <p class="text-danger small"><i>{{ $message }}</i></p>
                                                            @enderror
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="stock" class="form-label">Số lượng</label>
                                                        <input type="number" class="form-control" name="stock[]">
                                                        @foreach (old('stock', []) as $index => $value)
                                                            @error("stock.$index")
                                                                <p class="text-danger small"><i>{{ $message }}</i></p>
                                                            @enderror
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-12 text-end">
                                                        <button type="button"
                                                            class="btn btn-danger remove-variant">Xóa</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" id="add-variant" class="btn btn-success mt-2">Thêm
                                                Biến Thể</button>

                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
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
                placeholder: 'Nhập nội dung chi tiết của Sản Phẩm...',
                callbacks: {
                    onChange: function(descriptions, $editable) {
                        $('#description').val(descriptions);
                    }
                }
            });

            $('form').on('submit', function() {
                var description = $('#summernote').summernote('code');
                $('#description').val(description);
            });

            document.getElementById('image').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const previewContainer = document.getElementById('image-preview-container');
                const previewImage = document.getElementById('image-preview');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.style.display = 'block';
                    };

                    reader.readAsDataURL(file);
                } else {
                    previewContainer.style.display = 'none';
                }
            });
        </script>
        <script>
            document.getElementById('images').addEventListener('change', function(event) {
                let previewContainer = document.getElementById('image-preview-container');
                previewContainer.innerHTML = '';

                Array.from(event.target.files).forEach(file => {
                    let reader = new FileReader();
                    reader.onload = function(e) {
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
            document.addEventListener('DOMContentLoaded', function() {
                let variantContainer = document.getElementById('variant-container');
                let addVariantButton = document.getElementById('add-variant');
                let form = document.getElementById('product-form'); // Lấy form

                addVariantButton.addEventListener('click', function() {
                    let firstVariant = document.querySelector('.variant-row');
                    if (!firstVariant) return;

                    let newVariant = firstVariant.cloneNode(true);

                    newVariant.querySelectorAll('input, select').forEach(input => {
                        input.value = '';
                    });

                    let removeButton = newVariant.querySelector('.remove-variant');
                    if (removeButton) {
                        removeButton.style.display = 'inline-block';
                        removeButton.addEventListener('click', function() {
                            newVariant.remove();
                            updateRemoveButtons();
                        });
                    }

                    variantContainer.appendChild(newVariant);
                    updateRemoveButtons();
                    updateValidation();
                });

                function attachRemoveEvents() {
                    document.querySelectorAll('.remove-variant').forEach(button => {
                        button.style.display = 'inline-block';
                        button.addEventListener('click', function() {
                            this.closest('.variant-row').remove();
                            updateRemoveButtons();
                        });
                    });
                }

                function updateRemoveButtons() {
                    let variants = document.querySelectorAll('.variant-row');
                    let removeButtons = document.querySelectorAll('.remove-variant');

                    removeButtons.forEach(btn => {
                        btn.style.display = variants.length > 1 ? 'inline-block' : 'none';
                    });
                }

                function updateValidation() {
                    document.querySelectorAll('.variant-row').forEach(variant => {
                        let colorSelect = variant.querySelector('.color-select');
                        let modelSelect = variant.querySelector('.model-select');

                        colorSelect.addEventListener('change', checkDuplicate);
                        modelSelect.addEventListener('change', checkDuplicate);
                    });
                }

                function checkDuplicate() {
                    let variants = document.querySelectorAll('.variant-row');
                    let variantSet = new Set();

                    for (let variant of variants) {
                        let color = variant.querySelector('.color-select').value;
                        let model = variant.querySelector('.model-select').value;
                        let key = `${color}-${model}`;

                        if (color && model && variantSet.has(key)) {
                            alert('⚠️ Biến thể này đã tồn tại! Vui lòng chọn khác.');
                            this.value = '';
                            return false;
                        }

                        variantSet.add(key);
                    }
                    return true;
                }


                attachRemoveEvents();
                updateRemoveButtons();
                updateValidation();
            });
        </script>
    @endsection
