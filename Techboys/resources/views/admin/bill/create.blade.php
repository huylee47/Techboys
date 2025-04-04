@extends('admin.layouts.master')

@section('main')
<div id="main">
    <div class="container mt-4">
        <h2 class="mb-4">Tạo Đơn Hàng</h2>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

        <form action="{{ route('admin.bill.store') }}" method="POST" id="orderForm">
            @csrf
            
            <!-- Phần thông tin khách hàng -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Thông tin khách hàng</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userPhone">Chọn số điện thoại</label>
                            <select id="userPhone" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Chọn số điện thoại</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" 
                                            data-name="{{ $user->name }}" 
                                            data-email="{{ $user->email }}" 
                                            data-address="{{ $user->address }}">
                                        {{ $user->phone }} - {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="user_id" id="userId">
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên khách hàng:</label>
                                <input type="text" class="form-control" id="name" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Phần thông tin sản phẩm -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Thông tin sản phẩm</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="product">Chọn sản phẩm</label>
                            <select id="product" class="form-control selectpicker" data-live-search="true">
                                <option value="">Chọn sản phẩm</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" 
                                            data-name="{{ $product->name }}">
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6" id="variantContainer" style="display:none;">
                            <label for="variant">Chọn biến thể</label>
                            <select id="variant" class="form-control selectpicker" data-live-search="true">
                                <option value="">Chọn biến thể</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quantity">Số lượng:</label>
                                <input type="number" class="form-control" id="quantity" min="1" value="1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="price">Giá:</label>
                                <input type="text" class="form-control" id="price" readonly>
                                <input type="hidden" id="priceValue">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="stock">Tồn kho:</label>
                                <input type="text" class="form-control" id="stock" readonly>
                                <input type="hidden" id="stockValue">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="subtotal">Thành tiền:</label>
                                <input type="text" class="form-control" id="subtotal" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="button" id="addProductBtn" class="btn btn-success">
                                <i class="fas fa-plus"></i> Thêm sản phẩm
                            </button>
                        </div>
                    </div>
                    
                    <!-- Bảng sản phẩm đã chọn -->
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="productsTable">
                                <thead class="bg-light">
                                    <tr>
                                        <th width="25%">Sản phẩm</th>
                                        <th width="25%">Biến thể</th>
                                        <th width="15%">Giá</th>
                                        <th width="10%">SL</th>
                                        <th width="15%">Thành tiền</th>
                                        <th width="10%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sản phẩm sẽ được thêm vào đây bằng JS -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right">Tổng cộng:</th>
                                        <th id="totalAmount">0 đ</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Phần thông tin thanh toán -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Thông tin thanh toán</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment_method">Phương thức thanh toán:</label>
                                <select class="form-control" id="payment_method" name="payment_method" required>
                                    <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                                    <option value="bank">Chuyển khoản ngân hàng</option>
                                    <option value="vnpay">VNPay</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shipping_fee">Phí vận chuyển:</label>
                                <input type="number" class="form-control" id="shipping_fee" name="shipping_fee" value="30000" min="0">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">Ghi chú đơn hàng:</label>
                                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Tạo đơn hàng
                </button>
                <a href="{{ route('admin.bill.index') }}" class="btn btn-secondary btn-lg">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- Select2 CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Bootstrap Selectpicker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
$(document).ready(function() {
    // Khởi tạo selectpicker
    $('.selectpicker').selectpicker();
    
    // Mảng lưu trữ sản phẩm đã chọn
    let selectedProducts = [];
    let currentProduct = null;
    
    // Xử lý khi chọn khách hàng
    $('#userPhone').on('change', function() {
        const selectedOption = $(this).find('option:selected');
        $('#name').val(selectedOption.data('name'));
        $('#email').val(selectedOption.data('email'));
        $('#address').val(selectedOption.data('address'));
        $('#userId').val(selectedOption.val());
    });
    
    // Xử lý khi chọn sản phẩm
    $('#product').on('changed.bs.select', function(e) {
        const productId = $(this).val();
        const $variantContainer = $('#variantContainer');
        const $variantSelect = $('#variant');
        
        // Reset các giá trị
        $variantSelect.empty().append('<option value="">Chọn biến thể</option>');
        $variantContainer.hide();
        $('#price').val('');
        $('#priceValue').val('');
        $('#stock').val('');
        $('#stockValue').val('');
        $('#subtotal').val('');
        
        if (productId) {
            const selectedOption = $(this).find('option:selected');
            
            // Lưu thông tin sản phẩm hiện tại
            currentProduct = {
                id: productId,
                name: selectedOption.text().trim(),
                variants: []
            };
            
            // Gọi AJAX lấy thông tin sản phẩm và biến thể
            $.ajax({
                url: "{{ route('admin.product.getVariants') }}",
                method: "GET",
                data: { product_id: productId },
                beforeSend: function() {
                    $variantSelect.prop('disabled', true);
                    $variantSelect.selectpicker('refresh');
                },
                success: function(response) {
                    // Lưu thông tin sản phẩm gốc
                    currentProduct.base_price = response.product.base_price;
                    currentProduct.base_stock = response.product.base_stock;
                    
                    // Hiển thị giá và tồn kho mặc định (sản phẩm gốc)
                    $('#price').val(response.product.base_price.toLocaleString() + ' đ');
                    $('#priceValue').val(response.product.base_price);
                    $('#stock').val(response.product.base_stock);
                    $('#stockValue').val(response.product.base_stock);
                    calculateSubtotal();
                    
                    if (response.variants && response.variants.length > 0) {
                        // Lưu thông tin biến thể
                        currentProduct.variants = response.variants;
                        
                        // Thêm options biến thể
                        $.each(response.variants, function(index, variant) {
                            // Parse attribute_values từ JSON
                            let variantName = 'Không có thông tin';
                            try {
                                const attributes = JSON.parse(variant.attribute_values);
                                variantName = Object.values(attributes).join(' / ');
                            } catch (e) {
                                console.error('Error parsing attribute_values:', e);
                            }
                            
                            $variantSelect.append(
                                `<option value="${variant.id}" 
                                  data-price="${variant.price}" 
                                  data-stock="${variant.stock}"
                                  data-name="${variantName}">
                                    ${variantName} (${new Intl.NumberFormat().format(variant.price)}đ)
                                </option>`
                            );
                        });
                        
                        // Hiển thị container biến thể
                        $variantContainer.show();
                    }
                    $variantSelect.prop('disabled', false);
                    $variantSelect.selectpicker('refresh');
                },
                error: function(xhr) {
                    console.error('Error loading variants:', xhr.responseText);
                    $variantSelect.prop('disabled', false);
                    $variantSelect.selectpicker('refresh');
                }
            });
        } else {
            currentProduct = null;
        }
    });
    
    // Xử lý khi chọn biến thể
    $('#variant').on('changed.bs.select', function() {
        const selectedOption = $(this).find('option:selected');
        if (selectedOption.val()) {
            // Cập nhật giá và tồn kho từ biến thể
            $('#price').val(selectedOption.data('price').toLocaleString() + ' đ');
            $('#priceValue').val(selectedOption.data('price'));
            $('#stock').val(selectedOption.data('stock'));
            $('#stockValue').val(selectedOption.data('stock'));
        } else {
            // Nếu không chọn biến thể, dùng giá và tồn kho sản phẩm gốc
            if (currentProduct) {
                $('#price').val(currentProduct.base_price.toLocaleString() + ' đ');
                $('#priceValue').val(currentProduct.base_price);
                $('#stock').val(currentProduct.base_stock);
                $('#stockValue').val(currentProduct.base_stock);
            }
        }
        calculateSubtotal();
    });
    
    // Tính thành tiền
    function calculateSubtotal() {
        const price = parseFloat($('#priceValue').val()) || 0;
        const quantity = parseInt($('#quantity').val()) || 0;
        const subtotal = price * quantity;
        
        $('#subtotal').val(subtotal.toLocaleString() + ' đ');
    }
    
    // Xử lý thay đổi số lượng
    $('#quantity').on('change', function() {
        const stock = parseInt($('#stockValue').val());
        let quantity = parseInt($(this).val()) || 1;
        
        if (quantity > stock) {
            alert('Số lượng vượt quá tồn kho!');
            quantity = stock;
            $(this).val(quantity);
        }
        
        if (quantity < 1) {
            $(this).val(1);
            quantity = 1;
        }
        
        calculateSubtotal();
    });
    
    // Thêm sản phẩm vào bảng
    $('#addProductBtn').on('click', function() {
        if (!currentProduct) {
            alert('Vui lòng chọn sản phẩm');
            return;
        }
        
        const variantId = $('#variant').val();
        const variantOption = $('#variant option:selected');
        const quantity = parseInt($('#quantity').val()) || 1;
        const stock = parseInt($('#stockValue').val());
        const price = parseFloat($('#priceValue').val());
        
        if (quantity < 1) {
            alert('Số lượng phải lớn hơn 0');
            return;
        }
        
        if (quantity > stock) {
            alert('Số lượng vượt quá tồn kho');
            return;
        }
        
        // Xác định tên biến thể
        let variantName = 'Không có biến thể';
        if (variantId && variantOption.length > 0) {
            variantName = variantOption.data('name');
        }
        
        // Tạo đối tượng sản phẩm đã chọn
        const selectedProduct = {
            productId: currentProduct.id,
            productName: currentProduct.name,
            variantId: variantId || null,
            variantName: variantName,
            price: price,
            quantity: quantity,
            stock: stock
        };
        
        // Kiểm tra xem sản phẩm đã tồn tại chưa
        const existingIndex = selectedProducts.findIndex(item => 
            item.productId === selectedProduct.productId && 
            item.variantId === selectedProduct.variantId
        );
        
        if (existingIndex >= 0) {
            // Cập nhật số lượng nếu sản phẩm đã tồn tại
            selectedProducts[existingIndex].quantity += quantity;
        } else {
            // Thêm sản phẩm mới vào danh sách
            selectedProducts.push(selectedProduct);
        }
        
        // Render lại bảng sản phẩm
        renderProductsTable();
        
        // Reset form chọn sản phẩm
        $('#product').val('').selectpicker('refresh');
        $('#variantContainer').hide();
        $('#variant').val('').selectpicker('refresh');
        $('#price').val('');
        $('#priceValue').val('');
        $('#stock').val('');
        $('#stockValue').val('');
        $('#quantity').val(1);
        $('#subtotal').val('');
        currentProduct = null;
    });
    
    // Render bảng sản phẩm
    function renderProductsTable() {
        const $tbody = $('#productsTable tbody');
        $tbody.empty();
        
        let total = 0;
        
        selectedProducts.forEach((product, index) => {
            const subtotal = product.price * product.quantity;
            total += subtotal;
            
            $tbody.append(`
                <tr>
                    <td>${product.productName}</td>
                    <td>${product.variantName}</td>
                    <td>${product.price.toLocaleString()} đ</td>
                    <td>${product.quantity}</td>
                    <td>${subtotal.toLocaleString()} đ</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-danger remove-product" data-index="${index}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `);
        });
        
        // Cập nhật tổng tiền (chưa bao gồm phí vận chuyển)
        $('#totalAmount').text(total.toLocaleString() + ' đ');
        
        // Thêm các trường input ẩn để submit
        updateHiddenInputs();
    }
    
    // Xóa sản phẩm khỏi bảng
    $(document).on('click', '.remove-product', function() {
        const index = $(this).data('index');
        selectedProducts.splice(index, 1);
        renderProductsTable();
    });
    
    // Cập nhật các trường input ẩn để submit form
    function updateHiddenInputs() {
        // Xóa các input cũ
        $('input[name^="products["]').remove();
        
        // Thêm input mới
        selectedProducts.forEach((product, index) => {
            $('<input>').attr({
                type: 'hidden',
                name: `products[${index}][product_id]`,
                value: product.productId
            }).appendTo('form');
            
            if (product.variantId) {
                $('<input>').attr({
                    type: 'hidden',
                    name: `products[${index}][variant_id]`,
                    value: product.variantId
                }).appendTo('form');
            }
            
            $('<input>').attr({
                type: 'hidden',
                name: `products[${index}][quantity]`,
                value: product.quantity
            }).appendTo('form');
            
            $('<input>').attr({
                type: 'hidden',
                name: `products[${index}][price]`,
                value: product.price
            }).appendTo('form');
        });
    }
    
    // Xử lý submit form
    $('form').on('submit', function(e) {
        if (!$('#userId').val()) {
            e.preventDefault();
            alert('Vui lòng chọn khách hàng');
            return false;
        }
        
        if (selectedProducts.length === 0) {
            e.preventDefault();
            alert('Vui lòng thêm ít nhất một sản phẩm vào đơn hàng');
            return false;
        }
    });
});
</script>
@endsection

@section('styles')
<style>
    .select2-container--default .select2-selection--single {
        height: 38px;
        padding: 6px 12px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }
    .bootstrap-select .dropdown-toggle {
        height: 38px;
    }
    #productsTable th {
        white-space: nowrap;
    }
    .card-header {
        font-weight: bold;
    }
    .form-control[readonly] {
        background-color: #f8f9fa;
    }
</style>
@endsection