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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

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

                                        <div class="mb-3 form-check">
                                            <span>
                                                <h4 class="form-check-label">
                                                    <input type="checkbox" id="is_featured" name="is_featured"
                                                        value="1" class="form-check-input">Sản phẩm có biến thể?
                                                </h4>
                                            </span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="base_price" class="form-label">Giá </label>
                                            <input type="text" class="form-control" id="base_price" name="base_price"
                                                value="{{ old('base_price') !== null ? number_format(old('base_price'), 2, '.', '') : '' }}">
                                            @if ($errors->has('base_price'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('base_price') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="base_stock" class="form-label">Số lượng</label>
                                            <input type="text" class="form-control" id="base_stock" name="base_stock"
                                                value="{{ old('base_stock') }}">
                                            @if ($errors->has('base_stock'))
                                                <p class="text-danger small ">
                                                    <i>{{ $errors->first('base_stock') }}</i>
                                                </p>
                                            @endif
                                        </div>
                                        <div id="variant-container" style="display: none;">
                                            <h4>Thông tin biến thể</h4>

                                            <!-- Chọn thuộc tính cho biến thể đầu tiên -->
                                            <div class="mb-3" id="attribute-selection">
                                                <label class="form-label">Chọn thuộc tính biến thể</label>
                                                <select id="attribute-select" class="form-control selectpicker" multiple
                                                    data-live-search="true" title="Chọn thuộc tính" data-max-options="2"
                                                    data-max-options-text="Bạn chỉ có thể chọn tối đa 2 mục!">
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->name }}">{{ $attribute->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-success mb-3" id="add-variant">Thêm
                                                biến thể</button>
                                            <div id="variants"></div>
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
        {{-- NOTEPAD --}}
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
        {{-- IMG --}}
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
                        let cursorPosition = e.target.selectionStart;
                        let oldLength = e.target.value.length;

                        let value = e.target.value;

                        value = value.replace(/[^0-9.]/g, '');
                        value = value.replace(/^(\d*\.)(.*)\./g, '$1$2'); // Chỉ giữ một dấu .

                        // Không cho phép nhập số bắt đầu bằng .
                        if (value.startsWith('.')) {
                            value = '';
                        }

                        // Tách phần nguyên và phần thập phân
                        let parts = value.split('.');
                        parts[0] = parts[0].replace(/,/g, ''); // Xóa dấu , cũ trước khi định dạng
                        parts[0] = parts[0].length > 0 ? new Intl.NumberFormat('en-US').format(parts[
                            0]) : '';

                        // Giới hạn tối đa 2 số sau dấu .
                        if (parts[1] !== undefined) {
                            parts[1] = parts[1].substring(0, 2);
                            value = parts.join('.');
                        } else {
                            value = parts[0];
                        }

                        e.target.value = value;

                        // Điều chỉnh vị trí con trỏ sau khi định dạng
                        let newLength = e.target.value.length;
                        cursorPosition = cursorPosition + (newLength - oldLength);
                        e.target.setSelectionRange(cursorPosition, cursorPosition);
                    });
                });

                // Xóa dấu , trước khi submit form
                document.querySelector("form").addEventListener("submit", function() {
                    priceInputs.forEach(input => {
                        input.value = input.value.replace(/,/g, '');
                    });
                });
            });
        </script>
        {{-- VARIANT --}}
        <script>
            $(document).ready(function() {
                let maxOptions = $('#attribute-select').data('max-options') || 2;

                $('#attribute-select').change(function() {
                    let selectedCount = $(this).val() ? $(this).val().length : 0;

                    if (selectedCount >= maxOptions) {
                        $('#attribute-select option').each(function() {
                            if (!$(this).is(':selected')) {
                                $(this).prop('disabled', true);
                            }
                        });
                    } else {
                        $('#attribute-select option').prop('disabled', false);
                    }

                    $('.selectpicker').selectpicker('refresh');
                });

                function toggleBasePrice() {
                    if ($('#is_featured').prop('checked')) {
                        $('input[name="base_price"]').closest('.mb-3').hide();
                        $('input[name="base_stock"]').closest('.mb-3').hide();
                    } else {
                        $('input[name="base_price"]').closest('.mb-3').show();
                        $('input[name="base_stock"]').closest('.mb-3').show();

                    }
                }

                $('#is_featured').change(function() {
                    if (this.checked) {
                        $('#variant-container').show();
                        $('#attribute-selection').show();
                    } else {
                        $('#variant-container').hide();
                        $('#attribute-selection').hide();
                    }
                    toggleBasePrice();
                });

                function toggleRemoveButtons() {
                    if ($('.variant-item').length > 0) {
                        $('.remove-variant').show();
                        $('#newVariant').hide();

                    } else {
                        $('#newVariant').show();
                        $('.remove-variant').hide();
                    }
                }

                let attributeData = {!! json_encode($attributes) !!};

                $('#add-variant').click(function() {
                    let index = $('.variant-item').length;
                    let selectedAttributes = [];

                    if (index === 0) {
                        selectedAttributes = $('#attribute-select').val() || [];
                        console.log("Danh sách thuộc tính đã chọn:", selectedAttributes);

                        if (selectedAttributes.length === 0) {
                            alert('Vui lòng chọn ít nhất một thuộc tính.');
                            return;
                        }
                        $('#attribute-selection').hide();
                    } else {
                        let firstVariantAttributes = $('.variant-item:first').attr('data-attributes');
                        selectedAttributes = firstVariantAttributes ? JSON.parse(firstVariantAttributes) : [];
                        console.log("Thuộc tính của biến thể đầu tiên:", selectedAttributes);
                    }

                    if (!Array.isArray(selectedAttributes)) {
                        console.error("selectedAttributes không phải là một mảng:", selectedAttributes);
                        return;
                    }

                    let variantHtml = `<div class="row variant-item border p-3 mb-3" data-attributes='${JSON.stringify(selectedAttributes)}'>
                         <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h5>Biến thể ${index + 1}</h5>
            <button type="button" class="btn btn-danger btn-sm remove-variant">Xóa</button>
             </div>`;

                    selectedAttributes.forEach(attr => {
                        console.log("Tạo biến thể với thuộc tính:", attr);

                        let attribute = attributeData.find(a => a.name === attr);

                        if (!attribute) {
                            console.warn(`Không tìm thấy dữ liệu thuộc tính cho: ${attr}`);
                            return;
                        }

                        if (!attribute.values || !Array.isArray(attribute.values)) {
                            console.warn(`Thuộc tính ${attr} không có danh sách giá trị.`);
                            return;
                        }

                        variantHtml += `<div class="col-md-6 mb-3">
                <label class="form-label">${attribute.name}</label>`;

                        if (attribute.is_multiple == 1) {
                            variantHtml +=
                                `<select name="variants[${index}][attributes][${attribute.name}][]" class="form-control selectpicker" multiple data-live-search="true"  >`;
                        } else {
                            variantHtml += `<select name="variants[${index}][attributes][${attribute.name}]" class="form-control single-select" required oninvalid="this.setCustomValidity('Vui lòng chọn giá trị cho trường này!')" 
        oninput="this.setCustomValidity('')">
                                <option value="">Chọn</option>`;
                        }

                        attribute.values.forEach(value => {
                            variantHtml +=
                                `<option value="${value.id}">${value.value}</option>`;
                        });

                        variantHtml += `</select></div>`;
                    });

                    variantHtml += `
            <div class="col-md-6 mb-3">
                <label class="form-label">Giá biến thể</label>
                <input type="text" name="variants[${index}][price]" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng chọn giá cho biến thể này!')" 
        oninput="this.setCustomValidity('')">
            </div>
        </div>`;

                    $('#variants').prepend(variantHtml);
                    $('.selectpicker').selectpicker();
                    toggleRemoveButtons();
                });


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
                $(document).on('input', 'input[name^="variants"][name$="[price]"]', function() {
                    let value = $(this).val();

                    value = value.replace(/[^0-9.,]/g, '');

                    value = value.replace(/,/g, '');

                    let parts = value.split('.');

                    if (parts.length > 2) {
                        value = parts[0] + '.' + parts[1].substring(0, 2);
                    } else if (parts.length === 2) {
                        parts[1] = parts[1].substring(0, 2);
                        value = parts.join('.');
                    }

                    let integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                    $(this).val(parts.length === 2 ? integerPart + '.' + parts[1] : integerPart);
                });
                $('form').on('submit', function() {
    $('input[name^="variants"][name$="[price]"]').each(function() {
        let rawValue = $(this).val();
        let cleanedValue = rawValue.replace(/,/g, ''); // Loại bỏ dấu phẩy
        $(this).val(cleanedValue);
    });
});

            });
        </script>
    @endsection
