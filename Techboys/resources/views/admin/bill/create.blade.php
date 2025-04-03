{{-- @extends('admin.layouts.master')

@section('main')
<div id="main">
    <div class="container mt-4">
        <h2 class="mb-4">Tạo Đơn Hàng</h2>
        <div class="row">
            <div class="form-group">
                <div class="form-group">
                    <label for="userPhone">Chọn số điện thoại</label>
                    <select id="userPhone" class="form-control selectpicker" data-live-search="true">
                        <option value="">Chọn số điện thoại</option>
                        @foreach($users->take(5) as $user)
                            <option value="{{ $user->phone }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-address="{{ $user->address }}">
                                {{ $user->phone }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control" id="name" placeholder="Tên khách hàng">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" placeholder="Địa chỉ">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const userPhoneSelect = document.getElementById("userPhone");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const addressInput = document.getElementById("address");
    
    jQuery(userPhoneSelect).on("change", function () {
        const selectedOption = jQuery(this).find("option:selected");
        nameInput.value = selectedOption.data("name") || "";
        emailInput.value = selectedOption.data("email") || "";
        addressInput.value = selectedOption.data("address") || "";
    });

    jQuery(userPhoneSelect).selectpicker({
        noneResultsText: 'Không tìm thấy kết quả',
        countSelectedText: '{0} số điện thoại được chọn',
        liveSearchPlaceholder: 'Tìm kiếm số điện thoại...'
    });
});
</script>
@endsection --}}






@extends('admin.layouts.master')

@section('main')
<div id="main">
    <div class="container mt-4">
        <h2 class="mb-4">Tạo Đơn Hàng</h2>
        <form action="{{ route('admin.bill.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="userPhone">Chọn số điện thoại</label>
                    <select id="userPhone" class="form-control selectpicker" data-live-search="true">
                        <option value="">Chọn số điện thoại</option>
                        @foreach($users->take(5) as $user)
                            <option value="{{ $user->phone }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-address="{{ $user->address }}">
                                {{ $user->phone }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input type="text" class="form-control" id="name" placeholder="Tên khách hàng" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address" placeholder="Địa chỉ" required>
                    </div>
                </div>
            </div>

            <!-- Chọn sản phẩm -->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="product">Chọn sản phẩm</label>
                    <select id="product" class="form-control selectpicker" data-live-search="true" required>
                        <option value="">Chọn sản phẩm</option>
                        @foreach($products->take(5) as $product)
                            <option value="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->base_price }}" data-stock="{{ $product->base_stock }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Chọn biến thể sản phẩm nếu có -->
                <div class="form-group col-md-6" id="variantContainer" style="display: none;">
                    <label for="variant">Chọn biến thể</label>
                    <select id="variant" class="form-control selectpicker" data-live-search="true">
                        <option value="">Chọn biến thể</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Số lượng" required min="1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Giá:</label>
                        <input type="text" class="form-control" id="price" placeholder="Giá" readonly>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Tạo Đơn Hàng</button>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const userPhoneSelect = document.getElementById("userPhone");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const addressInput = document.getElementById("address");

    // Tự động điền thông tin khách hàng
    jQuery(userPhoneSelect).on("change", function () {
        const selectedOption = jQuery(this).find("option:selected");
        nameInput.value = selectedOption.data("name") || "";
        emailInput.value = selectedOption.data("email") || "";
        addressInput.value = selectedOption.data("address") || "";
    });

    // Tạo selectpicker cho userPhone
    jQuery(userPhoneSelect).selectpicker({
        noneResultsText: 'Không tìm thấy kết quả',
        countSelectedText: '{0} số điện thoại được chọn',
        liveSearchPlaceholder: 'Tìm kiếm số điện thoại...'
    });

    // Chọn sản phẩm
    const productSelect = document.getElementById("product");
    const variantContainer = document.getElementById("variantContainer");
    const variantSelect = document.getElementById("variant");
    const priceInput = document.getElementById("price");

    // Khi chọn sản phẩm, kiểm tra có biến thể không
    jQuery(productSelect).on("change", function () {
        const selectedProduct = jQuery(this).find("option:selected");
        const productId = selectedProduct.val();
        const productPrice = selectedProduct.data("price");
        const productStock = selectedProduct.data("stock");

        // Điền giá sản phẩm vào ô input
        priceInput.value = productPrice;

        // Kiểm tra nếu có biến thể
        if (productId) {
            // Gọi API hoặc tìm biến thể sản phẩm từ dữ liệu có sẵn
            jQuery.ajax({
                url: "{{ route('admin.product.getVariants') }}", // Đảm bảo có route này trong web.php
                method: "GET",
                data: { product_id: productId },
                success: function (response) {
                    const variants = response.variants;

                    if (variants && variants.length > 0) {
                        // Hiển thị các biến thể
                        variantContainer.style.display = "block";
                        variantSelect.innerHTML = "<option value=''>Chọn biến thể</option>"; // Reset variant options
                        variants.forEach(variant => {
                            variantSelect.innerHTML += `<option value="${variant.id}" data-price="${variant.price}">${variant.name}</option>`;
                        });
                        jQuery(variantSelect).selectpicker('refresh');
                    } else {
                        // Nếu không có biến thể, ẩn container biến thể
                        variantContainer.style.display = "none";
                    }
                }
            });
        }
    });

    // Chọn biến thể
    jQuery(variantSelect).on("change", function () {
        const selectedVariant = jQuery(this).find("option:selected");
        priceInput.value = selectedVariant.data("price");
    });

    // Cấu hình selectpicker
    jQuery(productSelect).selectpicker({
        noneResultsText: 'Không tìm thấy kết quả',
        countSelectedText: '{0} sản phẩm được chọn',
        liveSearchPlaceholder: 'Tìm kiếm sản phẩm...'
    });
});
</script>
@endsection
