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
                <input type="text" id="productSearch" class="form-control" placeholder="Tìm kiếm sản phẩm">
                <div id="productList" class="mt-3">
                    <!-- Danh sách sản phẩm sẽ được hiển thị ở đây -->
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>
@endsection
