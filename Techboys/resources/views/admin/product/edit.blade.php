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
                                <h4 class="card-title">Thông Tin Sản Phẩm
                                </h4>
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

                                <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="category_id" class="form-label">Danh mục sản phẩm</label>
                                            <select class="form-select" id="category_id" name="category_id">
                                                <option value="{{ $product->category_id }}" selected>
                                                    {{ $product->category->name }}</option>

                                                @foreach ($categories as $category)
                                                    @if ($category->id != $product->category->id)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
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
                                                <option value="{{ $product->brand->id }}" selected>
                                                    {{ $product->brand->name }}</option>

                                                @foreach ($brands as $brand)
                                                    @if ($brand->id != $product->brand->id)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('brand_id'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('brand_id') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="name" class="form-label">Tên Sản Phẩm</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $product->name }}" required>
                                            @if ($errors->has('name'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('name') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="base_price" class="form-label">Giá gốc</label>
                                            <input type="text" class="form-control" id="base_price" name="base_price"
                                                value="{{ number_format($product->base_price, 0, ',', '.') }}">
                                            @if ($errors->has('base_price'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('base_price') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="images" class="form-label">Ảnh Sản Phẩm</label>
                                            <input class="form-control" type="file" id="images" name="img"
                                                accept="image/*">
                                            <div id="current-image-container" class="mt-2"
                                                style="display: {{ $product->img ? 'block' : 'none' }};">
                                                <img src="{{ asset('admin/assets/images/product/' . $product->img) }}"
                                                    alt="Product Image" style="max-width: 200px;">
                                            </div>
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
                                            <div id="summernote" class="form-control" name="description">
                                                {!! $product->description !!}

                                            </div>
                                        </div>
                                        <input type="hidden" name="description" id="description"
                                            value="{{ old('description') }}">
                                        {{-- Vrriant --}}
                                        <div class="mb-3 form-check" id="emptyVariant" style="display: none;">
                                            <input type="hidden" name="is_featured" value="0">
                                            <input type="checkbox" id="is_featured" name="is_featured" value="1"
                                                class="form-check-input" {{ $product->is_featured ? 'checked' : '' }}>

                                            <label class="form-check-label">Sản phẩm có biến thể?</label>

                                        </div>

                                        <div id="variant-container" style="display: none;">
                                            <h4>Thông tin biến thể</h4>

                                            <!-- Chọn thuộc tính cho biến thể đầu tiên -->
                                            <div class="mb-3" id="attribute-selection">
                                                <label class="form-label">Chọn thuộc tính biến thể</label>
                                                <select id="attribute-select" class="form-control selectpicker" multiple
                                                    data-live-search="true" title="Chọn thuộc tính" data-max-options="2"
                                                    data-max-options-text="Bạn chỉ có thể chọn tối đa 2 mục!">
                                                    @foreach ($attributesList as $attribute)
                                                        <option value="{{ $attribute->name }}">{{ $attribute->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-success mb-3" id="add-variant">Tạo mới
                                                biến thể</button>
                                            <div id="variantsadd"></div>

                                        </div>
                                        <div class="d-inline-block">
                                            <button type="button" class="btn btn-success mb-3" id="update-variant">Thêm
                                                biến thể</button>
                                        </div>
                                        <div id="variants"></div>
                                        {{-- End Variant --}}


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
            document.addEventListener("DOMContentLoaded", function() {
                let priceInputs = document.querySelectorAll('input[name="base_price"]');

                priceInputs.forEach(input => {
                    input.addEventListener('input', function(e) {
                        let value = e.target.value;

                        value = value.replace(/[^0-9]/g, '');

                        value = new Intl.NumberFormat('vi-VN').format(value);

                        e.target.value = value;
                    });
                });

                document.querySelector("form").addEventListener("submit", function() {
                    priceInputs.forEach(input => {
                        input.value = input.value.replace(/\./g, '');
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#is_featured').change(function() {
                    if (this.checked) {
                        $('#variant-container').show();
                        $('#attribute-selection').show();
                    } else {
                        $('#variant-container').hide();
                        $('#attribute-selection').hide();
                    }
                });

                function toggleRemoveButtons() {
                    if ($('.variant-item').length > 0) {
                        $('.remove-variant').show();
                        $('#emptyVariant').hide();
                    } else {
                        $('.remove-variant').hide();
                        $('#emptyVariant').show();
                        $('#update-variant').hide();

                    }
                }

                let variantData = {!! json_encode($formattedVariants) !!};
                let attributeData = {!! json_encode($attributes) !!};
                let attributeArray = Array.isArray(attributeData) ? attributeData : Object.values(attributeData);
                let variantAttributes = {!! json_encode($variantAttributes) !!};
                let attributeNewData = {!! json_encode($attributesList) !!};


                console.log("thuộc tính hiện có :", variantAttributes);
                console.log(variantData);


                variantData.forEach(variant => {
                    variant.variable_attributes = variant.variable_attributes;
                });

                function loadExistingVariants() {
                    $('#variants').empty();

                    variantData.forEach((variant, index) => {
                        appendVariantForm(index, variant);
                    });

                    $('.selectpicker').selectpicker();
                    toggleRemoveButtons();
                }

                function appendVariantForm(index, variant = null) {
                    let selectedAttributes = variant ? Object.keys(variant.variable_attributes) : [];
                    let selectedValues = variant ? Object.values(variant.variable_attributes) : [];

                    let variantHtml = `<div class="variant-item border p-3 mb-3">
                <h5>Biến thể ${index + 1}</h5>
                <button type="button" class="btn btn-danger btn-sm remove-variant">Xóa</button>`;

                    let filteredAttributes = attributeArray.filter(attribute =>
                        variantAttributes.some(attr => Object.keys(attr).includes(attribute.name))
                    );
                    console.log("variantAttributes:", variantAttributes);

                    console.log("filteredAttributes:", filteredAttributes);

                    filteredAttributes.forEach(attribute => {
                        let selectedValueId = variant && selectedAttributes.includes(attribute.name) ?
                            selectedValues[selectedAttributes.indexOf(attribute.name)] :
                            null;

                        console.log(`Thuộc tính: ${attribute.name}, Giá trị:`, selectedValueId);

                        variantHtml += `<div class="mb-3">
                    <label class="form-label">${attribute.name}</label>`;

                        if (attribute.is_multiple == 1) {
                            variantHtml += `<select name="variants[${index}][attributes][${attribute.name}][]" 
                                        class="form-control selectpicker" multiple data-live-search="true">`;
                        } else {
                            variantHtml += `<select name="variants[${index}][attributes][${attribute.name}]" 
                                        class="form-control single-select">
                                        <option value="" disabled selected>Chọn</option>`;
                        }

                        attribute.values.forEach(value => {
                            let selected = (Array.isArray(selectedValueId) && selectedValueId.includes(
                                    value.id.toString())) ?
                                "selected" : "";
                            variantHtml +=
                                `<option value="${value.id}" ${selected}>${value.value}</option>`;
                        });

                        variantHtml += `</select></div>`;
                    });

                    variantHtml += `
                <div class="mb-3">
                    <label class="form-label">Giá biến thể</label>
                    <input type="number" name="variants[${index}][price]" class="form-control" value="${variant ? variant.price : ''}" required>
                </div>
                 </div>`;

                    $('#variants').prepend(variantHtml);
                }
                loadExistingVariants();

                $('#update-variant').on('click', function() {
                    let newIndex = $('.variant-item').length;
                    let lastVariant = variantData.length > 0 ? variantData[variantData.length - 1] : null;

                    // Lấy danh sách thuộc tính của biến thể cuối cùng
                    let lastAttributes = lastVariant ? Object.keys(lastVariant.variable_attributes) : [];

                    appendVariantForm(newIndex, null, lastAttributes);

                    $('.selectpicker').selectpicker();
                    toggleRemoveButtons();
                });

                $('#add-variant').click(function() {
                    let index = $('.variant-item').length;
                    let selectedNewAttributes = [];
                    if (index === 0) {
                        selectedNewAttributes = $('#attribute-select').val() || [];
                        console.log("Danh sách thuộc tính đã chọn:", selectedNewAttributes);

                        if (selectedNewAttributes.length === 0) {
                            alert('Vui lòng chọn ít nhất một thuộc tính.');
                            return;
                        }
                        $('#attribute-selection').hide();
                    } else {
                        let firstVariantAttributes = $('.variant-item:first').attr('data-attributes');
                        selectedNewAttributes = firstVariantAttributes ? JSON.parse(firstVariantAttributes) :
                    [];
                        console.log("Thuộc tính của biến thể đầu tiên:", selectedNewAttributes);
                    }

                    if (!Array.isArray(selectedNewAttributes)) {
                        console.error("selectedNewAttributes không phải là một mảng:", selectedNewAttributes);
                        return;
                    }

                    let variantHtml = `<div class="variant-item border p-3 mb-3" data-attributes='${JSON.stringify(selectedNewAttributes)}'>
                        <h5>Biến thể ${index + 1}</h5>
                        <button type="button" class="btn btn-danger btn-sm remove-variant">Xóa</button>`;

                    selectedNewAttributes.forEach(attr => {
                        console.log("Tạo biến thể với thuộc tính:", attr);
                        let attribute = attributeNewData.find(a => a.name === attr);

                        if (!attribute) {
                            console.warn(`Không tìm thấy dữ liệu thuộc tính cho: ${attr}`);
                            return;
                        }

                        if (!attribute.values || !Array.isArray(attribute.values)) {
                            console.warn(`Thuộc tính ${attr} không có danh sách giá trị.`);
                            return;
                        }

                        variantHtml += `<div class="mb-3">
                        <label class="form-label">${attribute.name}</label>`;

                        if (attribute.is_multiple == 1) {
                            variantHtml +=
                                `<select name="variants[${index}][attributes][${attribute.name}][]" class="form-control selectpicker" multiple data-live-search="true">`;
                        } else {
                            variantHtml += `<select name="variants[${index}][attributes][${attribute.name}]" class="form-control single-select">
                                    <option value="">Chọn</option>`;
                        }

                        attribute.values.forEach(value => {
                            variantHtml +=
                                `<option value="${value.id}">${value.value}</option>`;
                        });

                        variantHtml += `</select></div>`;
                    });

                    variantHtml += `
                    <div class="mb-3">
                    <label class="form-label">Giá biến thể</label>
                    <input type="number" name="variants[${index}][price]" class="form-control" required>
                    </div>
                    </div>`;

                    $('#variantsadd').prepend(variantHtml);
                    $('.selectpicker').selectpicker();
                    toggleRemoveButtons();
                });


                // Remove variant
                $(document).on('click', '.remove-variant', function() {
                    let removedAttributes = $(this).closest('.variant-item').find('select').map(function() {
                        return $(this).val();
                    }).get();

                    $(this).closest('.variant-item').remove();

                    if ($('.variant-item').length === 0) {
                        $('#is_featured').prop('checked', false).trigger('change');
                        $('#attribute-selection').hide();

                        $('.single-select, .selectpicker').each(function() {
                            $(this).val('');
                            $(this).find('option').prop('disabled', false);
                        });
                    } else {
                        $('.single-select').each(function() {
                            let select = $(this);
                            let currentValue = select.val();

                            if (removedAttributes.includes(currentValue)) {
                                select.val('');
                            }
                        });
                    }

                    $('.selectpicker').selectpicker('refresh');
                    toggleRemoveButtons();
                });


                toggleRemoveButtons();
            });
        </script>
    @endsection
