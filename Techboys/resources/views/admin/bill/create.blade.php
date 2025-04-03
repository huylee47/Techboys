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

        <form action="{{ route('admin.bill.store') }}" method="POST">
            @csrf
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Thông tin khách hàng</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userPhone">Chọn số điện thoại</label>
                            <select id="userPhone" name="user_id" class="form-control selectpicker" data-live-search="true" required>
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
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên khách hàng:</label>
                                <input type="text" class="form-control" id="name" name="name" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" name="address" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Thông tin sản phẩm</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="product">Chọn sản phẩm</label>
                            <select id="product" name="product_id" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Chọn sản phẩm</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" 
                                            data-price="{{ $product->base_price }}"
                                            data-stock="{{ $product->base_stock }}">
                                        {{ $product->name }} ({{ number_format($product->base_price) }}đ)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6" id="variantContainer" style="display:none;">
                            <label for="variant">Chọn biến thể</label>
                            <select id="variant" name="variant_id" class="form-control selectpicker" data-live-search="true">
                                <option value="">Chọn biến thể</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quantity">Số lượng:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="price">Giá:</label>
                                <input type="text" class="form-control" id="price" name="price" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="stock">Tồn kho:</label>
                                <input type="text" class="form-control" id="stock" readonly>
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
                    
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="productsTable">
                                <thead class="bg-light">
                                    <tr>
                                        <th width="30%">Sản phẩm</th>
                                        <th width="15%">Giá</th>
                                        <th width="15%">Số lượng</th>
                                        <th width="15%">Thành tiền</th>
                                        <th width="10%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sản phẩm sẽ được thêm vào đây bằng JS -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-right">Tổng cộng:</th>
                                        <th id="totalAmount">0 đ</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
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
    
    // Xử lý khi chọn khách hàng
    $('#userPhone').on('change', function() {
        const selectedOption = $(this).find('option:selected');
        $('#name').val(selectedOption.data('name'));
        $('#email').val(selectedOption.data('email'));
        $('#address').val(selectedOption.data('address'));
    });
    
    // Xử lý khi chọn sản phẩm
    $('#product').on('changed.bs.select', function(e) {
        const productId = $(this).val();
        const $variantContainer = $('#variantContainer');
        const $variantSelect = $('#variant');
        
        // Reset các giá trị
        $variantSelect.empty().append('<option value="">Chọn biến thể</option>');
        $variantContainer.hide();
        
        if (productId) {
            // Hiển thị giá và tồn kho sản phẩm gốc
            const selectedOption = $(this).find('option:selected');
            $('#price').val(selectedOption.data('price'));
            $('#stock').val(selectedOption.data('stock'));
            calculateSubtotal();
            
            // Gọi AJAX lấy biến thể
            $.ajax({
                url: "{{ route('admin.product.getVariants') }}",
                method: "GET",
                data: { product_id: productId },
                beforeSend: function() {
                    $variantSelect.prop('disabled', true);
                    $variantSelect.selectpicker('refresh');
                },
                success: function(response) {
                    if (response.variants && response.variants.length > 0) {
                        // Thêm options biến thể
                        $.each(response.variants, function(index, variant) {
                            $variantSelect.append(
                                `<option value="${variant.id}" 
                                  data-price="${variant.price}" 
                                  data-stock="${variant.stock}">
                                    ${variant.name} (${new Intl.NumberFormat().format(variant.price)}đ)
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
        }
    });
    
    // Xử lý khi chọn biến thể
    $('#variant').on('changed.bs.select', function() {
        const selectedOption = $(this).find('option:selected');
        if (selectedOption.val()) {
            $('#price').val(selectedOption.data('price'));
            $('#stock').val(selectedOption.data('stock'));
            calculateSubtotal();
        }
    });
    
    // Xử lý thay đổi số lượng
    $('#quantity').on('change', function() {
        const stock = parseInt($('#stock').val());
        const quantity = parseInt($(this).val());
        
        if (quantity > stock) {
            alert('Số lượng vượt quá tồn kho!');
            $(this).val(stock);
        }
        
        if (quantity < 1) {
            $(this).val(1);
        }
        
        calculateSubtotal();
    });
    
    // Tính thành tiền
    function calculateSubtotal() {
        const price = parseFloat($('#price').val()) || 0;
        const quantity = parseInt($('#quantity').val()) || 0;
        const subtotal = price * quantity;
        
        $('#subtotal').val(subtotal.toLocaleString() + ' đ');
    }
    
    // Thêm sản phẩm vào bảng
    $('#addProductBtn').on('click', function() {
        const productId = $('#product').val();
        const productName = $('#product option:selected').text().split('(')[0].trim();
        const variantId = $('#variant').val();
        let variantName = '';
        
        if (variantId) {
            variantName = ' - ' + $('#variant option:selected').text().split('(')[0].trim();
        }
        
        const price = parseFloat($('#price').val());
        const quantity = parseInt($('#quantity').val());
        const stock = parseInt($('#stock').val());
        
        if (!productId) {
            alert('Vui lòng chọn sản phẩm');
            return;
        }
        
        if (quantity < 1) {
            alert('Số lượng phải lớn hơn 0');
            return;
        }
        
        if (quantity > stock) {
            alert('Số lượng vượt quá tồn kho');
            return;
        }
        
        // Kiểm tra sản phẩm đã tồn tại chưa
        const existingIndex = selectedProducts.findIndex(item => 
            item.productId === productId && item.variantId === variantId
        );
        
        if (existingIndex >= 0) {
            // Cập nhật số lượng nếu sản phẩm đã tồn tại
            selectedProducts[existingIndex].quantity += quantity;
        } else {
            // Thêm sản phẩm mới
            selectedProducts.push({
                productId,
                productName,
                variantId,
                variantName,
                price,
                quantity
            });
        }
        
        // Render lại bảng sản phẩm
        renderProductsTable();
        
        // Reset form chọn sản phẩm
        $('#product').val('').selectpicker('refresh');
        $('#variantContainer').hide();
        $('#variant').val('').selectpicker('refresh');
        $('#price').val('');
        $('#stock').val('');
        $('#quantity').val(1);
        $('#subtotal').val('');
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
                    <td>${product.productName}${product.variantName}</td>
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
        
        // Cập nhật tổng tiền
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
            
            $('<input>').attr({
                type: 'hidden',
                name: `products[${index}][variant_id]`,
                value: product.variantId || ''
            }).appendTo('form');
            
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
</style>
@endsection