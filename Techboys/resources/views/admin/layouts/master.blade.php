<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techboys Property</title>

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
                                <span>Chức năng</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{-- {{ request()->routeIs('admin.project.index') ? 'active' : '' }} --}}">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Dự án</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{-- {{ request()->routeIs('admin.property.index') ? 'active' : '' }} --}}">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Bất động sản</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{-- {{ request()->routeIs('admin.contact.index') ? 'active' : '' }} --}}">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Liên hệ</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{-- {{ request()->routeIs('admin.property-request.index') ? 'active' : '' }} --}}">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Yêu cầu</span>
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
                    <p>Xưởng thực hành FPT Polytechnic Hải Phòng</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="https://caodang.fpt.edu.vn/">FPL Hải Phòng</a></p>
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
