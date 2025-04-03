@extends('admin.layouts.master')

@section('main')
<div id="main">
    <div class="container mt-4">
        <h2 class="mb-4">Tạo Đơn Hàng Tại Quầy</h2>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                            <label for="userPhone">Tìm kiếm khách hàng bằng SĐT</label>
                            <select id="userPhone" class="form-control selectpicker" data-live-search="true" title="Nhập số điện thoại tìm kiếm...">
                                <option value="">Nhập số điện thoại tìm kiếm...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->phone }}" 
                                            data-userid="{{ $user->id }}"
                                            data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-address="{{ $user->address }}">
                                        {{ $user->phone }} - {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="user_id" id="userId">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="full_name">Họ tên*</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Số điện thoại*</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address">
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
                                            data-name="{{ $product->name }}"
                                            data-base-price="{{ $product->base_price }}"
                                            data-base-stock="{{ $product->base_stock }}">
                                        {{ $product->name }} ({{ number_format($product->base_price) }}đ)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6" id="variantContainer">
                            <label for="variant">Chọn biến thể</label>
                            <select id="variant" class="form-control selectpicker" data-live-search="true">
                                <option value="">Chọn biến thể (nếu có)</option>
                                <!-- Biến thể sẽ được load bằng AJAX -->
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quantity">Số lượng*</label>
                                <input type="number" class="form-control" id="quantity" min="1" value="1" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="price">Giá*</label>
                                <input type="text" class="form-control" id="price" readonly>
                                <input type="hidden" id="priceValue" name="price">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="stock">Tồn kho</label>
                                <input type="text" class="form-control" id="stock" readonly>
                                <input type="hidden" id="stockValue">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="subtotal">Thành tiền</label>
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
                                        <th colspan="4" class="text-right">Tổng tiền hàng:</th>
                                        <th id="subtotalAmount">0 đ</th>
                                        <th></th>
                                    </tr>
                                    <tr id="discountRow" style="display:none;">
                                        <th colspan="4" class="text-right">Giảm giá:</th>
                                        <th id="discountAmount">0 đ</th>
                                        <th></th>
                                    </tr>
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
                                <label for="payment_method">Phương thức thanh toán*</label>
                                <select class="form-control" id="payment_method" name="payment_method" required>
                                    <option value="1">Tiền mặt</option>
                                    <option value="2">Chuyển khoản</option>
                                    <option value="3">Thẻ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="voucher_code">Mã giảm giá</label>
                                <select class="form-control selectpicker" id="voucher_code" name="voucher_code" data-live-search="true">
                                    <option value="">Chọn mã giảm giá</option>
                                    @foreach($vouchers as $voucher)
                                        <option value="{{ $voucher->code }}" 
                                                data-discount-percent="{{ $voucher->discount_percent }}"
                                                data-discount-amount="{{ $voucher->discount_amount }}"
                                                data-max-discount="{{ $voucher->max_discount }}"
                                                data-min-price="{{ $voucher->min_price }}">
                                            {{ $voucher->name }} ({{ $voucher->code }})
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="discount_value" name="discount_value" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="note">Ghi chú đơn hàng</label>
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
<!-- Bootstrap Selectpicker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
$(document).ready(function() {
    // Khởi tạo selectpicker với live search
    $('.selectpicker').selectpicker({
        liveSearch: true,
        style: 'btn-default',
        size: 10
    });
    
    // Mảng lưu trữ sản phẩm đã chọn
    let selectedProducts = [];
    let currentProduct = null;
    let currentDiscount = 0;
    
    // ========== PHẦN KHÁCH HÀNG ==========
    // Xử lý khi chọn khách hàng từ dropdown
    $('#userPhone').on('changed.bs.select', function() {
        const selectedOption = $(this).find('option:selected');
        const phone = selectedOption.val();
        
        if (phone) {
            // Nếu tìm thấy khách hàng
            $('#full_name').val(selectedOption.data('name'));
            $('#phone').val(phone);
            $('#email').val(selectedOption.data('email'));
            $('#address').val(selectedOption.data('address'));
            $('#userId').val(selectedOption.data('userid'));
        } else {
            // Nếu không chọn khách hàng
            $('#full_name').val('');
            $('#phone').val('');
            $('#email').val('');
            $('#address').val('');
            $('#userId').val('');
        }
    });
    
    // Cho phép nhập thủ công khi không chọn từ danh sách
    $('#full_name, #phone, #email, #address').on('input', function() {
        if ($(this).attr('id') === 'phone') {
            // Khi nhập số điện thoại, tìm kiếm khách hàng
            const phone = $(this).val();
            if (phone.length >= 10) {
                $.get('{{ route("admin.bill.getUserByPhone") }}', {phone: phone}, function(response) {
                    if (response.found) {
                        $('#full_name').val(response.user.name);
                        $('#email').val(response.user.email);
                        $('#address').val(response.user.address);
                        $('#userId').val(response.user.id);
                        $('#userPhone').selectpicker('val', phone);
                    }
                });
            }
        } else {
            // Xóa user_id nếu nhập thủ công thông tin khác
            $('#userId').val('');
        }
    });
    
    // ========== PHẦN SẢN PHẨM ==========
    // Xử lý khi chọn sản phẩm
    $('#product').on('changed.bs.select', function(e) {
        const productId = $(this).val();
        const $variantSelect = $('#variant');
        
        // Reset các giá trị
        $variantSelect.empty().append('<option value="">Chọn biến thể (nếu có)</option>');
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
                name: selectedOption.data('name'),
                base_price: selectedOption.data('base-price'),
                base_stock: selectedOption.data('base-stock'),
                variants: []
            };
            
            // Gọi AJAX lấy thông tin biến thể
            $.ajax({
                url: "{{ route('admin.product.getVariants') }}",
                method: "GET",
                data: { product_id: productId },
                beforeSend: function() {
                    $variantSelect.prop('disabled', true);
                    $variantSelect.selectpicker('refresh');
                },
                success: function(response) {
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
                    
                    // Nếu sản phẩm không có biến thể, sử dụng giá và tồn kho mặc định
                    if (response.variants.length === 0) {
                        $('#price').val(currentProduct.base_price.toLocaleString() + ' đ');
                        $('#priceValue').val(currentProduct.base_price);
                        $('#stock').val(currentProduct.base_stock);
                        $('#stockValue').val(currentProduct.base_stock);
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
    
    // Xử lý khi chọn voucher giảm giá
    $('#voucher_code').on('changed.bs.select', function() {
        const selectedOption = $(this).find('option:selected');
        const subtotal = calculateSubtotal();
        
        if (!selectedOption.val()) {
            // Nếu không chọn voucher
            currentDiscount = 0;
            $('#discountRow').hide();
            $('#discount_value').val(0);
            updateTotals();
            return;
        }
        
        const minPrice = selectedOption.data('min-price');
        if (subtotal < minPrice) {
            alert('Đơn hàng chưa đạt giá trị tối thiểu để áp dụng voucher này');
            $(this).selectpicker('val', '');
            return;
        }
        
        // Tính toán giảm giá
        const discountPercent = selectedOption.data('discount-percent');
        const discountAmount = selectedOption.data('discount-amount');
        const maxDiscount = selectedOption.data('max-discount');
        
        if (discountPercent) {
            currentDiscount = subtotal * discountPercent / 100;
            if (maxDiscount && currentDiscount > maxDiscount) {
                currentDiscount = maxDiscount;
            }
        } else if (discountAmount) {
            currentDiscount = discountAmount;
        } else {
            currentDiscount = 0;
        }
        
        // Hiển thị thông tin giảm giá
        $('#discountAmount').text(currentDiscount.toLocaleString() + ' đ');
        $('#discount_value').val(currentDiscount);
        $('#discountRow').show();
        updateTotals();
    });
    
    // Tính tổng tiền hàng từ các sản phẩm đã chọn
    function calculateSubtotal() {
        return selectedProducts.reduce((sum, product) => {
            return sum + (product.price * product.quantity);
        }, 0);
    }
    
    // Cập nhật tổng tiền
    function updateTotals() {
        const subtotal = calculateSubtotal();
        const total = subtotal - currentDiscount;
        
        $('#subtotalAmount').text(subtotal.toLocaleString() + ' đ');
        $('#totalAmount').text(total.toLocaleString() + ' đ');
    }
    
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
        
        selectedProducts.forEach((product, index) => {
            const subtotal = product.price * product.quantity;
            
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
        
        // Cập nhật tổng tiền
        updateTotals();
        
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
        if (!$('#phone').val()) {
            e.preventDefault();
            alert('Vui lòng nhập số điện thoại khách hàng');
            return false;
        }
        
        if (selectedProducts.length === 0) {
            e.preventDefault();
            alert('Vui lòng thêm ít nhất một sản phẩm vào đơn hàng');
            return false;
        }
        
        // Tính tổng tiền cuối cùng
        const subtotal = calculateSubtotal();
        const total = subtotal - currentDiscount;
        
        $('<input>').attr({
            type: 'hidden',
            name: 'total',
            value: total
        }).appendTo('form');
    });
});
</script>
@endsection

@section('styles')
<style>
    .bootstrap-select .dropdown-toggle {
        height: 38px;
        padding: 6px 12px;
    }
    .bootstrap-select .dropdown-menu {
        max-height: 300px;
        overflow-y: auto;
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
    #productsTable tfoot th {
        font-weight: bold;
        background-color: #f8f9fa;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    #variantContainer {
        display: block !important;
    }
</style>
@endsection