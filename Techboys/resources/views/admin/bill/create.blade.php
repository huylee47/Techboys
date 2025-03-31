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
<div class="container mt-4">
    <h2 class="mb-4">Tạo Đơn Hàng</h2>
    
    <!-- Form nhập số điện thoại để kiểm tra khách hàng -->
    <div class="mb-3">
        <label for="customerPhone" class="form-label">Số điện thoại khách hàng</label>
        <input type="text" class="form-control" id="customerPhone" placeholder="Nhập số điện thoại">
        <button class="btn btn-primary mt-2" id="checkCustomer">Kiểm tra</button>
    </div>
    
    <!-- Hiển thị thông tin khách hàng nếu có -->
    <div id="customerInfo" class="d-none">
        <h5>Thông tin khách hàng</h5>
        <p><strong>Tên:</strong> <span id="customerName"></span></p>
        <p><strong>Email:</strong> <span id="customerEmail"></span></p>
    </div>
    
    <!-- Chuyển hướng nếu không tìm thấy khách hàng -->
    <div id="newCustomer" class="d-none">
        <p>Không tìm thấy khách hàng. <a href="{{ route('admin.customer.create') }}">Thêm khách hàng mới</a></p>
    </div>
    
    <!-- Chọn sản phẩm -->
    <div class="mb-3">
        <label for="productSelect" class="form-label">Chọn sản phẩm</label>
        <select class="form-select" id="productSelect">
            <option value="">-- Chọn sản phẩm --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }} - {{ number_format($product->price, 0, ',', '.') }}đ</option>
            @endforeach
        </select>
        <button class="btn btn-success mt-2" id="addProduct">Thêm vào đơn hàng</button>
    </div>
    
    <!-- Danh sách sản phẩm đã chọn -->
    <div id="orderDetails" class="d-none">
        <h5>Chi tiết đơn hàng</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="orderList"></tbody>
        </table>
        <h4 class="text-end">Tổng tiền: <span id="totalPrice">0</span>đ</h4>
        <button class="btn btn-primary" id="createOrder">Tạo đơn hàng</button>
    </div>
</div>

<script>
    let orderItems = [];
    
    document.getElementById('checkCustomer').addEventListener('click', function() {
        let phone = document.getElementById('customerPhone').value;
        fetch(`/admin/customers/check?phone=${phone}`)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    document.getElementById('customerInfo').classList.remove('d-none');
                    document.getElementById('newCustomer').classList.add('d-none');
                    document.getElementById('customerName').textContent = data.name;
                    document.getElementById('customerEmail').textContent = data.email;
                } else {
                    document.getElementById('customerInfo').classList.add('d-none');
                    document.getElementById('newCustomer').classList.remove('d-none');
                }
            });
    });

    document.getElementById('addProduct').addEventListener('click', function() {
        let productSelect = document.getElementById('productSelect');
        let productId = productSelect.value;
        let productName = productSelect.options[productSelect.selectedIndex].text;
        let productPrice = parseInt(productSelect.options[productSelect.selectedIndex].getAttribute('data-price'));
        
        if (!productId) return;
        
        let existingItem = orderItems.find(item => item.id === productId);
        if (existingItem) {
            existingItem.quantity++;
        } else {
            orderItems.push({ id: productId, name: productName, price: productPrice, quantity: 1 });
        }
        
        renderOrderList();
    });
    
    function renderOrderList() {
        let orderList = document.getElementById('orderList');
        orderList.innerHTML = '';
        let totalPrice = 0;
        
        orderItems.forEach((item, index) => {
            let itemTotal = item.price * item.quantity;
            totalPrice += itemTotal;
            orderList.innerHTML += `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.price.toLocaleString()}đ</td>
                    <td><input type="number" min="1" value="${item.quantity}" data-index="${index}" class="quantityInput"></td>
                    <td>${itemTotal.toLocaleString()}đ</td>
                    <td><button class="btn btn-danger btn-sm removeItem" data-index="${index}">Xóa</button></td>
                </tr>
            `;
        });
        
        document.getElementById('totalPrice').textContent = totalPrice.toLocaleString();
        document.getElementById('orderDetails').classList.remove('d-none');
        
        document.querySelectorAll('.quantityInput').forEach(input => {
            input.addEventListener('change', function() {
                let index = this.getAttribute('data-index');
                orderItems[index].quantity = parseInt(this.value);
                renderOrderList();
            });
        });
        
        document.querySelectorAll('.removeItem').forEach(button => {
            button.addEventListener('click', function() {
                let index = this.getAttribute('data-index');
                orderItems.splice(index, 1);
                renderOrderList();
            });
        });
    }
    
    document.getElementById('createOrder').addEventListener('click', function() {
        fetch('/admin/orders/store', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                customerPhone: document.getElementById('customerPhone').value,
                products: orderItems
            })
        }).then(response => response.json()).then(data => {
            if (data.success) {
                alert('Đơn hàng đã được tạo!');
                location.reload();
            }
        });
    });
</script>
            
   </div>





    @endsection
