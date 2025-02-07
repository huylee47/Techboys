<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techboys | Trang quản trị</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/css/app.css">
    <link rel="shortcut icon" href="{{ url('') }}/admin/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/admin/assets/styles/choices.min.css">

    <!-- Thêm CSS từ section 'styles' nếu có -->
    @yield('styles')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="#"><img src="{{ url('') }}/admin/cassets/img/logo.png" alt="Logo"
                                    srcset=""></a>
                        </div>
                        {{-- <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i> Techboys</a>
                        </div> --}}
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  {{-- {{ request()->routeIs('index') ? 'active' : '' }} --}}">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('admin.category*') ? 'active' : '' }}">
                            <a href="{{route('admin.category.index')}}" class='sidebar-link'>
                                <i class="bi bi-grid"></i>
                                <span>Danh mục</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('admin.product*') ? 'active' : '' }}">
                            <a href="{{route('admin.product.index')}}" class='sidebar-link'>
                                <i class="bi bi-shop"></i>
                                <span>Sản phẩm</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{-- {{ request()->routeIs('admin.property-request.index') ? 'active' : '' }} --}}">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-truck"></i>
                                <span>Tình trạng đơn hàng</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->routeIs('admin.voucher*') ? 'active' : '' }}">
                            <a href="{{route('admin.voucher.index')}}" class='sidebar-link'>
                                <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket" viewBox="0 0 16 16">
                                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5z"/>
                                  </svg></i>
                                <span>Voucher</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{-- {{ request()->routeIs('admin.property-request.index') ? 'active' : '' }} --}}">
                            <a href="{{route('admin.user.index')}}" class='sidebar-link'>
                                <i class="bi bi-person"></i>
                                <span>Tài khoản người dùng</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{-- {{ request()->routeIs('admin.property-request.index') ? 'active' : '' }} --}}">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-calendar-event"></i>
                                <span>Sự kiện giảm giá</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{-- {{ request()->routeIs('admin.property-request.index') ? 'active' : '' }} --}}">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Phản hồi</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        @yield('main')
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>Techboys </p>
                </div>
                <div class="float-end">
                    <p>Thiết kế <span class="text-danger"><i class="bi bi-heart"></i></span> bởi <a
                            href="https://caodang.fpt.edu.vn/">WD K18.4 FPL Hải Phòng</a></p>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="{{ url('') }}/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ url('') }}/admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ url('') }}/admin/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{ url('') }}/admin/assets/vendors/jquery/jquery.min.js"></script>
    <script src="{{ url('') }}/admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ url('') }}/admin/assets/js/main.js"></script>

    <!-- Thêm script JS từ section 'scripts' nếu có -->
    @yield('scripts')
</body>

</html>
