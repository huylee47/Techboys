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
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{ route('admin.product.index') }}">Danh sách Sản Phẩm</a>
                            </li>
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
                <label for="userPhone" class="form-label">Số điện thoại khách hàng</label>
                <input type="text" class="form-control" id="userPhone" placeholder="Nhập số điện thoại">
                <button class="btn btn-primary mt-2" id="checkUser">Kiểm tra</button>
            </div>

            <!-- Hiển thị thông tin khách hàng nếu có -->
            <div id="userInfo" class="d-none">
                <h5>Thông tin khách hàng</h5>
                <p><strong>Tên:</strong> <span id="userName"></span></p>
                <p><strong>Email:</strong> <span id="userEmail"></span></p>
            </div>

            <!-- Chuyển hướng nếu không tìm thấy khách hàng -->
            <div id="newUser" class="d-none">
                <p>Không tìm thấy khách hàng. <a href="{{ route('admin.user.create') }}">Thêm khách hàng mới</a></p>
            </div>

            <!-- Chọn sản phẩm (Ẩn ban đầu) -->
            <div id="productSelection" class="d-none mt-4">
                <h4>Chọn sản phẩm</h4>
                <input type="text" id="productSearch" class="form-control" placeholder="Tìm kiếm sản phẩm" data-lightsearch>
                <div id="productList" class="mt-3">
                    <!-- Danh sách sản phẩm sẽ được hiển thị ở đây -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Kiểm tra thông tin khách hàng theo số điện thoại
        document.getElementById('checkUser').addEventListener('click', function() {
            let phone = document.getElementById('userPhone').value;

            fetch('{{ route('admin.user.check') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ phone: phone })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'exists') {
                    document.getElementById('userInfo').classList.remove('d-none');
                    document.getElementById('newUser').classList.add('d-none');
                    document.getElementById('userName').textContent = data.user.name;
                    document.getElementById('userEmail').textContent = data.user.email;
                    document.getElementById('productSelection').classList.remove('d-none');
                } else {
                    document.getElementById('userInfo').classList.add('d-none');
                    document.getElementById('newUser').classList.remove('d-none');
                    document.getElementById('productSelection').classList.add('d-none');
                }
            });
        });

        // Tìm kiếm sản phẩm qua AJAX
        document.getElementById('productSearch').addEventListener('input', function() {
            let query = this.value;

            if (query.length > 2) { // Chỉ gửi request khi người dùng nhập ít nhất 3 ký tự
                fetch('{{ route('admin.product.search') }}?query=' + query)
                    .then(response => response.json())
                    .then(data => {
                        let productList = document.getElementById('productList');
                        productList.innerHTML = ''; // Xóa danh sách cũ

                        if (data.length > 0) {
                            data.forEach(product => {
                                let productItem = document.createElement('div');
                                productItem.classList.add('product-item');
                                productItem.innerHTML = `
                                    <div>${product.name}</div>
                                    <button class="btn btn-primary add-product-btn" data-id="${product.id}">Chọn</button>
                                `;
                                productList.appendChild(productItem);
                            });
                        } else {
                            productList.innerHTML = '<p>Không tìm thấy sản phẩm nào.</p>';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

        // Xử lý khi người dùng chọn sản phẩm
        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('add-product-btn')) {
                let productId = e.target.getAttribute('data-id');
                console.log('Sản phẩm đã chọn có ID: ' + productId);
                // Ở đây bạn có thể xử lý việc thêm sản phẩm vào đơn hàng
                // Ví dụ: gửi ID sản phẩm vào form hoặc vào database
            }
        });

        // Sử dụng DataLightSearch để tìm kiếm
document.getElementById('productSearch').addEventListener('input', function() {
    let query = this.value;

    if (query.length > 2) { // Chỉ tìm khi có ít nhất 3 ký tự
        fetch('{{ route('admin.product.search') }}?query=' + query)
            .then(response => response.json())
            .then(data => {
                let productList = document.getElementById('productList');
                productList.innerHTML = ''; // Xóa danh sách cũ

                if (data.length > 0) {
                    data.forEach(product => {
                        let productItem = document.createElement('div');
                        productItem.classList.add('product-item');
                        productItem.innerHTML = `
                            <div class="product-name">${product.name}</div>
                            <button class="btn btn-primary add-product-btn" data-id="${product.id}">Chọn</button>
                            <div class="product-variants" id="variants-${product.id}" style="display:none;">
                                <!-- Các biến thể sẽ được hiển thị ở đây -->
                            </div>
                        `;
                        productList.appendChild(productItem);

                        // Hiển thị biến thể nếu có
                        if (product.variants && product.variants.length > 0) {
                            let variantsContainer = document.getElementById('variants-' + product.id);
                            product.variants.forEach(variant => {
                                let variantItem = document.createElement('div');
                                variantItem.innerHTML = `
                                    <div class="variant-name">${variant.name}</div>
                                    <div class="variant-price">${variant.price} VND</div>
                                `;
                                variantsContainer.appendChild(variantItem);
                            });

                            // Hiển thị biến thể khi người dùng nhấn "Chọn"
                            document.querySelector(`.add-product-btn[data-id="${product.id}"]`).addEventListener('click', function() {
                                variantsContainer.style.display = 'block';
                            });
                        }
                    });

                    // Tạo đối tượng DataLightSearch cho sản phẩm tìm được
                    new DataLightSearch({
                        element: document.querySelector('#productSearch'),
                        listItems: productList.querySelectorAll('.product-item'),
                        searchField: 'product-name', // Cái này cần phải là tên field bạn muốn tìm kiếm
                    });
                } else {
                    productList.innerHTML = '<p>Không tìm thấy sản phẩm nào.</p>';
                }
            })
            .catch(error => console.error('Error:', error));
    }
});
    </script>
@endsection
