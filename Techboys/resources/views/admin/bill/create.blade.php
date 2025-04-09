@extends('admin.layouts.master')

@section('main')
<div id="main">
    <div class="container mt-4">
        <h2 class="mb-4">Tạo Đơn Hàng</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('admin.bill.store') }}" method="POST" id="orderForm">
            @csrf

            <!-- Customer Information Section -->
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
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" 
                                        data-name="{{ $user->name }}"
                                        data-email="{{ $user->email }}" 
                                        data-address="{{ $user->address }}"
                                        data-phone="{{ $user->phone }}">
                                        {{ $user->phone }} - {{ $user->name }}
                                    </option>
                                @endforeach
                                <option value="new">+ Nhập số điện thoại mới</option>
                            </select>
                            <input type="hidden" name="user_id" id="userId">
                            <input type="hidden" name="phone" id="phone">
                        </div>
                        
                        <div class="form-group col-md-6" id="newPhoneGroup" style="display: none;">
                            <label for="newPhone">Số điện thoại mới</label>
                            <input type="text" class="form-control" id="newPhone" name="phone">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Tên khách hàng:</label>
                                <input type="text" class="form-control" id="full_name" name="full_name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <input type="hidden" name="province_id" value="224">
                        <input type="hidden" name="district_id" value="1587">
                        <input type="hidden" name="ward_code" value="30301">
                    </div>
                </div>
            </div>

            <!-- Product Information Section -->
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
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-name="{{ $product->name }}">
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

                    <!-- Selected Products Table -->
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
                                    <!-- Products will be added here via JS -->
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

            <!-- Payment Information Section -->
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
                                    <option value="direct">Thanh toán trực tiếp</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="voucher_code">Mã giảm giá (Voucher):</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="voucher_code" name="voucher_code">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success" id="applyVoucherBtn">Áp dụng</button>
                                    </div>
                                </div>
                                <small id="voucher_message" class="form-text text-muted"></small>
                                <input type="hidden" id="discount_amount_hidden" name="discount_amount" value="0">
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
<!-- External Libraries -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
$(document).ready(function() {
    // Initialize selectpicker
    $('.selectpicker').selectpicker();

    // Array to store selected products
    let selectedProducts = [];
    let currentProduct = null;
    let voucherApplied = false;

    // Handle customer selection
    $('#userPhone').on('changed.bs.select', function() {
        const selectedOption = $(this).find('option:selected');
        const selectedValue = selectedOption.val();

        // Show/hide new phone input field
        if (selectedValue === 'new') {
            $('#newPhoneGroup').show();
            $('#userId').val('');
            $('#full_name').val('');
            $('#email').val('');
            $('#address').val('');
        } else {
            $('#newPhoneGroup').hide();
            if (selectedValue) {
                // Fill in customer information
                $('#userId').val(selectedValue);
                $('#full_name').val(selectedOption.data('name'));
                $('#email').val(selectedOption.data('email'));
                $('#address').val(selectedOption.data('address'));
                $('#newPhone').val(selectedOption.data('phone'));
            } else {
                // Reset form if empty option selected
                $('#userId').val('');
                $('#full_name').val('');
                $('#email').val('');
                $('#address').val('');
                $('#newPhone').val('');
            }
        }
    });

    // Handle product selection
    $('#product').on('changed.bs.select', function(e) {
        const productId = $(this).val();
        const $variantContainer = $('#variantContainer');
        const $variantSelect = $('#variant');

        // Reset values
        $variantSelect.empty().append('<option value="">Chọn biến thể</option>');
        $variantContainer.hide();
        $('#price').val('');
        $('#priceValue').val('');
        $('#stock').val('');
        $('#stockValue').val('');
        $('#subtotal').val('');

        if (productId) {
            const selectedOption = $(this).find('option:selected');

            // Store current product information
            currentProduct = {
                id: productId,
                name: selectedOption.text().trim(),
                variants: []
            };

            // AJAX call to get product and variant information
            $.ajax({
                url: "{{ route('admin.product.getVariants') }}",
                method: "GET",
                data: { product_id: productId },
                beforeSend: function() {
                    $variantSelect.prop('disabled', true);
                    $variantSelect.selectpicker('refresh');
                },
                success: function(response) {
                    // Store base product information
                    currentProduct.base_price = response.product.base_price;
                    currentProduct.base_stock = response.product.base_stock;

                    // Display base price and stock
                    $('#price').val(response.product.base_price.toLocaleString() + ' đ');
                    $('#priceValue').val(response.product.base_price);
                    $('#stock').val(response.product.base_stock);
                    $('#stockValue').val(response.product.base_stock);
                    calculateSubtotal();

                    // Check if product has variants
                    if (response.variants && response.variants.length > 0) {
                        currentProduct.variants = response.variants;

                        // Add variant options
                        $.each(response.variants, function(index, variant) {
                            let variantName = 'Không có thông tin';
                            if (variant.attributes) {
                                const values = Object.values(variant.attributes || {})
                                    .map(attr => attr.value);
                                variantName = values.join(' - ');
                            }

                            $variantSelect.append(
                                `<option value="${variant.id}" 
                                data-price="${variant.discounted_price}" 
                                data-stock="${variant.stock}"
                                data-name="${variantName}">
                                    ${variantName} : (${new Intl.NumberFormat().format(variant.discounted_price)}đ)
                                </option>`
                            );
                        });

                        // Show variant container
                        $variantContainer.show();
                    } else {
                        // Hide variant container if product has no variants
                        $variantContainer.hide();
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

    // Handle variant selection
    $('#variant').on('changed.bs.select', function() {
        const selectedOption = $(this).find('option:selected');
        if (selectedOption.val()) {
            // Update price and stock from variant
            $('#price').val(selectedOption.data('price').toLocaleString() + ' đ');
            $('#priceValue').val(selectedOption.data('price'));
            $('#stock').val(selectedOption.data('stock'));
            $('#stockValue').val(selectedOption.data('stock'));
        } else {
            // Use base product price and stock if no variant selected
            if (currentProduct) {
                $('#price').val(currentProduct.base_price.toLocaleString() + ' đ');
                $('#priceValue').val(currentProduct.base_price);
                $('#stock').val(currentProduct.base_stock);
                $('#stockValue').val(currentProduct.base_stock);
            }
        }
        calculateSubtotal();
    });

        // ============================== START VOUCHER ==============================

    $('#applyVoucherBtn').on('click', function() {
    const voucherCode = $('#voucher_code').val();
    const subtotal = calculateCurrentSubtotal();
    let voucherApplied = false;
    let appliedVoucherCode = null;
    let currentProduct = null;
    if (voucherApplied) {
        alert('Mã giảm giá đã được áp dụng cho đơn hàng này.');
        return; // Ngăn chặn việc thực hiện AJAX call lần nữa
    }

    if (voucherCode) {
        $.ajax({
            url: "{{ route('admin.bill.applyVoucher') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                voucher_code: voucherCode,
                subtotal: subtotal
            },
            dataType: 'json',
            success: function(response) {
                $('#voucher_message').removeClass('text-danger text-success');
                let currentPriceValue = parseFloat($('#priceValue').val());
        let discountedPriceValue = currentPriceValue;
                
                if (response.success) {
                    $('#voucher_message').addClass('text-success').text(response.message);
                    $('#discount_amount_hidden').val(response.discount_amount);
                    
                    // Cập nhật giá và tổng tiền sau giảm giá
                    updatePricesAfterDiscount(response.discount_amount, response.total_after_discount);
                     voucherApplied = true;
                     $('#applyVoucherBtn').prop('disabled', true);
                    $('#voucher_code').prop('readonly', true);
                } else {
                    $('#voucher_message').addClass('text-danger').text(response.message);
                    $('#discount_amount_hidden').val(0);
                    voucherApplied = false;
                    resetPricesToOriginal();
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi áp dụng voucher:', error);
                $('#voucher_message').removeClass('text-success').addClass('text-danger')
                    .text('Có lỗi xảy ra khi áp dụng mã giảm giá.');
                $('#discount_amount_hidden').val(0);
                voucherApplied = false;
                resetPricesToOriginal();
            }
        });
    } else {
        $('#voucher_message').removeClass('text-success text-danger').text('');
        $('#discount_amount_hidden').val(0);
        voucherApplied = false;
        resetPricesToOriginal();
    }
});

function updatePricesAfterDiscount(discountAmount, totalAfterDiscount) {
    const currentSubtotal = calculateCurrentSubtotal();
    const discountRatio = discountAmount / currentSubtotal;
    
    // Cập nhật giá cho từng sản phẩm trong bảng
    $('#productsTable tbody tr').each(function() {
        const originalPrice = parseFloat($(this).data('base-price'));
        const quantity = parseInt($(this).find('td:eq(3)').text()) || 0;
        const discountedPrice = originalPrice * (1 - discountRatio);
        
        $(this).find('td:eq(2)').text(discountedPrice.toLocaleString() + ' đ');
        $(this).find('td:eq(4)').text((discountedPrice * quantity).toLocaleString() + ' đ');
    });
    
    // Cập nhật tổng tiền
    $('#totalAmount').text(totalAfterDiscount.toLocaleString() + ' đ');
}

function resetPricesToOriginal() {
    // Cập nhật lại giá gốc cho từng sản phẩm
    $('#productsTable tbody tr').each(function() {
        const originalPrice = parseFloat($(this).data('base-price'));
        const quantity = parseInt($(this).find('td:eq(3)').text()) || 0;
        
        $(this).find('td:eq(2)').text(originalPrice.toLocaleString() + ' đ');
        $(this).find('td:eq(4)').text((originalPrice * quantity).toLocaleString() + ' đ');
    });
    
    // Tính lại tổng tiền
    const newTotal = calculateCurrentSubtotal();
    $('#totalAmount').text(newTotal.toLocaleString() + ' đ');
}

    // Helper Functions
    function calculateCurrentSubtotal() {
        let total = 0;
        $('#productsTable tbody tr').each(function() {
            const price = parseFloat($(this).find('td:eq(2)').text().replace(' đ', '').replace(/,/g, '')) || 0;
            const quantity = parseInt($(this).find('td:eq(3)').text()) || 0;
            total += price * quantity;
        });
        return total;
    }

    function calculateTotalQuantity() {
        let totalQuantity = 0;
        $('#productsTable tbody tr').each(function() {
            totalQuantity += parseInt($(this).find('td:eq(3)').text()) || 0;
        });
        return totalQuantity || 1;
    }

    function updateProductPricesWithDiscount(discountPerItem) {
        $('#productsTable tbody tr').each(function() {
            const originalPrice = parseFloat($(this).data('base-price'));
            const quantity = parseInt($(this).find('td:eq(3)').text()) || 0;
            const newPrice = Math.max(0, originalPrice - discountPerItem);

            if (!isNaN(newPrice)) {
                $(this).find('td:eq(2)').text(newPrice.toLocaleString() + ' đ');
                $(this).find('td:eq(4)').text((newPrice * quantity).toLocaleString() + ' đ');
            } else {
                console.error("Lỗi: Giá mới không phải là số", originalPrice, discountPerItem);
            }
        });
        recalculateTotalAmount();
    }

    function resetProductPrices() {
        $('#productsTable tbody tr').each(function() {
            const originalPrice = parseFloat($(this).data('base-price'));
            const quantity = parseInt($(this).find('td:eq(3)').text()) || 0;
            $(this).find('td:eq(2)').text(originalPrice.toLocaleString() + ' đ');
            $(this).find('td:eq(4)').text((originalPrice * quantity).toLocaleString() + ' đ');
        });
        recalculateTotalAmount();
    }

    function updateTotalAmountWithDiscount(newTotalAfterDiscount) {
    const currentSubtotal = calculateCurrentSubtotal(); // Lấy tổng tiền sản phẩm hiện tại
    const totalDiscount = currentSubtotal - newTotalAfterDiscount; // Tính tổng số tiền giảm giá

    if (totalDiscount > 0 && currentSubtotal > 0) {
        const discountRatio = totalDiscount / currentSubtotal; // Tính tỷ lệ giảm giá trên tổng đơn hàng

        $('#productsTable tbody tr').each(function() {
            const originalPrice = parseFloat($(this).data('base-price'));
            const quantity = parseInt($(this).find('td:eq(3)').text()) || 0;
            const discountedPrice = originalPrice * (1 - discountRatio); // Tính giá đã giảm cho từng sản phẩm

            if (!isNaN(discountedPrice)) {
                $(this).find('td:eq(2)').text(discountedPrice.toLocaleString() + ' đ'); // Cập nhật giá hiển thị
                $(this).find('td:eq(4)').text((discountedPrice * quantity).toLocaleString() + ' đ'); // Cập nhật thành tiền hiển thị
            } else {
                console.error("Lỗi: Giá đã giảm không phải là số", originalPrice, discountRatio);
            }
        });
    } else {
        resetProductPrices(); // Nếu không có giảm giá hoặc tổng tiền là 0, reset giá về ban đầu
    }

    // Cập nhật tổng tiền cuối cùng hiển thị ở footer của bảng
    $('#totalAmount').text(newTotalAfterDiscount.toLocaleString() + ' đ');
}

    function recalculateTotalAmount() {
        let total = 0;
        $('#productsTable tbody tr').each(function() {
            const price = parseFloat($(this).find('td:eq(2)').text().replace(' đ', '').replace(/,/g, '')) || 0;
            const quantity = parseInt($(this).find('td:eq(3)').text()) || 0;
            total += price * quantity;
        });
        $('#totalAmount').text(total.toLocaleString() + ' đ');
    }

    function calculateSubtotal() {
        const price = parseFloat($('#priceValue').val()) || 0;
        const quantity = parseInt($('#quantity').val()) || 0;
        const subtotal = price * quantity;

        $('#subtotal').val(subtotal.toLocaleString() + ' đ');
    }
    // ============================== END VOUCHER ==============================

    // Handle quantity change
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

    // Add product to table
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

        // Determine variant name
        let variantName = 'Không có biến thể';
        if (variantId && variantOption.length > 0) {
            variantName = variantOption.data('name');
        }

        // Create selected product object
        const selectedProduct = {
            productId: currentProduct.id,
            productName: currentProduct.name,
            variantId: variantId || null,
            variantName: variantName,
            price: price,
            quantity: quantity,
            stock: stock
        };

        // Check if product already exists
        const existingIndex = selectedProducts.findIndex(item =>
            item.productId === selectedProduct.productId &&
            item.variantId === selectedProduct.variantId
        );

        if (existingIndex >= 0) {
            // Update quantity if product exists
            selectedProducts[existingIndex].quantity += quantity;
        } else {
            // Add new product to list
            selectedProducts.push(selectedProduct);
        }

        // Refresh products table
        renderProductsTable();

        // Reset product selection form
        resetProductSelectionForm();
    });

    function resetProductSelectionForm() {
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
    }

    // Render products table
    function renderProductsTable() {
    const $tbody = $('#productsTable tbody');
    $tbody.empty();

    let total = 0;

    selectedProducts.forEach((product, index) => {
        const subtotal = product.price * product.quantity;
        total += subtotal;

        $tbody.append(`
            <tr data-base-price="${product.price}">
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

    // Update total amount
    $('#totalAmount').text(total.toLocaleString() + ' đ');
    updateHiddenInputs();
}

    // Remove product from table
    $(document).on('click', '.remove-product', function() {
        const index = $(this).data('index');
        selectedProducts.splice(index, 1);
        renderProductsTable();
    });

    // Update hidden inputs for form submission
    function updateHiddenInputs() {
        // Remove old inputs
        $('input[name^="products["]').remove();

        // Add new inputs
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

    // Handle form submission
    $('form').on('submit', function(e) {
        const selectedOption = $('#userPhone').find('option:selected');

        // Validate new phone number input
        if (selectedOption.val() === 'new' && !$('#newPhone').val()) {
            e.preventDefault();
            alert('Vui lòng nhập số điện thoại');
            return false;
        }

        // Validate customer selection
        if (!selectedOption.val()) {
            e.preventDefault();
            alert('Vui lòng chọn hoặc nhập số điện thoại');
            return false;
        }

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