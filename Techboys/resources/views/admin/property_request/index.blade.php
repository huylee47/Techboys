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
                        <h3>Danh sách yêu cầu khách hàng</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách yêu cầu khách hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Tabs Navigation -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1"
                                    type="button" role="tab" aria-controls="tab1" aria-selected="true"
                                    data-tab-id="tab1">Tư vấn</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2"
                                    type="button" role="tab" aria-controls="tab2" aria-selected="false"
                                    data-tab-id="tab2">Tham quan</button>
                            </li>
                        </ul>

                        <!-- Tabs Content -->
                        <div class="tab-content" id="myTabContent">

                            <!-- Tab 1 Content -->
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                aria-labelledby="tab1-tab">
                                <a href=""
                                    class="btn btn-primary mt-3">Đánh dấu tất
                                    cả đã xem</a>
                                <table class="table table-striped table-bordered custom-table">
                                    <thead>
                                        <tr>
                                            <th class="col-2">Bất Động Sản</th>
                                            <th class="col-1">Họ Tên</th>
                                            <th class="col-2">Địa chỉ Email</th>
                                            <th class="col-1">Số Điện Thoại</th>
                                            <th class="col-1">Thời gian</th>
                                            <th class="col-1">Mục đích mua</th>
                                            <th class="col-2">Ghi chú</th>
                                            <th class="col-1">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($consultationRequests as $consultationRequest) --}}
                                            <tr>
                                                <td>df</td>
                                                <td>qwe</td>
                                                <td>fsf</td>
                                                <td>wqe</td>
                                                <td>assf</td>
                                                <td>
                                                    {{-- @if ($consultationRequest->purpose == 'residential')
                                                        Mua để ở
                                                    @elseif ($consultationRequest->purpose == 'investment')
                                                        Mua để đầu tư
                                                    @endif --}}
                                                <td>dfss</td>
                                                <td>
                                                    <a href=""
                                                        {{-- class="{{ $consultationRequest->status == 0 ? 'btn btn-danger' : 'btn btn-success' }}"--}}> 
                                                        {{-- {{ $consultationRequest->status == 0 ? 'Chưa xem' : 'Đã xem' }} --}}
                                                    </a>
                                                </td>
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div>

                            <!-- Tab 2 Content -->
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <a href=""
                                    class="btn btn-primary mt-3">Đánh dấu tất
                                    cả đã xem</a>
                                <table class="table table-striped table-bordered custom-table">
                                    <thead>
                                        <tr>
                                            <th class="col-2">Bất Động Sản</th>
                                            <th class="col-1">Họ Tên</th>
                                            <th class="col-2">Địa chỉ Email</th>
                                            <th class="col-1">Số Điện Thoại</th>
                                            <th class="col-1">Thời gian</th>
                                            <th class="col-1">Hình thức thăm quan</th>
                                            <th class="col-2">Ghi chú</th>
                                            <th class="col-1">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($visistRequests as $visistRequest) --}}
                                            <tr>
                                                <td>asd</td>
                                                <td>qwe</td>
                                                <td>zxczxc</td>
                                                <td>qweqwe</td>
                                                <td>dddfs</td>
                                                <td>
                                                    {{-- @if ($visistRequest->visit_type == 'direct')
                                                        Trải nghiệm thực tế
                                                    @elseif ($visistRequest->visit_type == 'video call')
                                                        Call video trực tiếp
                                                    @endif --}}
                                                </td>
                                                <td>xxxxxxxxxxx</td>
                                                <td>
                                                    {{-- <a href=""
                                                        class="{{ $visistRequest->status == 0 ? 'btn btn-danger' : 'btn btn-success' }}">
                                                        {{ $visistRequest->status == 0 ? 'Chưa xem' : 'Đã xem' }}
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.custom-table').forEach((table) => {
            new simpleDatatables.DataTable(table);
        });

        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll('[data-tab-id]');
            const tabContents = document.querySelectorAll('.tab-pane');

            // Lấy trạng thái tab từ localStorage hoặc mặc định là tab1
            const activeTabId = localStorage.getItem('activeTab') || 'tab1';

            // Đặt tất cả các tab và nội dung tab về trạng thái mặc định (ẩn)
            tabs.forEach(tab => tab.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('show', 'active'));

            // Kích hoạt tab và nội dung tab từ trạng thái đã lưu
            const activeTab = document.getElementById(`${activeTabId}-tab`);
            const activeContent = document.getElementById(activeTabId);

            if (activeTab && activeContent) {
                activeTab.classList.add('active');
                activeContent.classList.add('show', 'active');
            }

            // Lưu trạng thái khi người dùng nhấp vào tab
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab-id');
                    localStorage.setItem('activeTab', tabId);
                });
            });
        });
    </script>
@endsection
