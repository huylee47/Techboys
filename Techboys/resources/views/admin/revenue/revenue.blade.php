@extends('admin.layouts.master')

@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Doanh thu</h3>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Đơn hàng thành công</h6>
                                            <h6 class="font-extrabold mb-0">{{($successfulOrders)}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Đơn hàng bị hủy</h6>
                                            <h6 class="font-extrabold mb-0">{{($cancelledOrders)}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldGraph"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Sản phẩm bán chạy</h6>
                                            <h6 class="font-extrabold mb-0">#</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Danh mục bán chạy</h6>
                                            <h6 class="font-extrabold mb-0">#</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldActivity"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold" id="revenueDayTitle">Doanh thu ngày</h6>
                                            <h6 class="font-extrabold mb-0" id="revenueDayValue">{{ number_format($revenueDay, 0, ',', '.') }} VNĐ</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldActivity"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold" id="revenueWeekTitle">Doanh thu tuần</h6>
                                            <h6 class="font-extrabold mb-0" id="revenueWeekValue">{{ number_format($revenueWeek, 0, ',', '.') }} VNĐ</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldActivity"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold" id="revenueMonthTitle">Doanh thu tháng</h6>
                                            <h6 class="font-extrabold mb-0" id="averageRevenueValue">{{ number_format($revenueMonth, 0, ',', '.') }} VNĐ</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldActivity"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Doanh thu quý</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($revenueQuarter, 0, ',', '.') }} VNĐ</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Biểu đồ doanh thu theo thời gian</h4>
                                </div>
                                <div class="d-flex gap-2 mb-3">
                                    <input type="date" id="startDate" class="form-control" value="{{ date('Y-m-01') }}">
                                    <input type="date" id="endDate" class="form-control" value="{{ date('Y-m-d') }}">
                                    <button id="filterButton" class="btn btn-primary">Lọc</button>
                                </div>
                                <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
                                <div class="card-body">
                                    <canvas id="revenueChart"></canvas>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            let ctx = document.getElementById('revenueChart').getContext('2d');
                                            let revenueChart;
                                    
                                            function updateChart(labels, data) {
                                                if (revenueChart) {
                                                    revenueChart.destroy();
                                                }
                                    
                                                revenueChart = new Chart(ctx, {
                                                    type: 'line',
                                                    data: {
                                                        labels: labels,
                                                        datasets: [{
                                                            label: 'Doanh thu (VNĐ)',
                                                            data: data,
                                                            borderColor: 'rgb(75, 192, 192)',
                                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                            borderWidth: 2
                                                        }]
                                                    },
                                                    options: {
                                                        responsive: true,
                                                        scales: {
                                                            y: {
                                                                beginAtZero: true
                                                            }
                                                        }
                                                    }
                                                });
                                            }
                                            
                                            document.getElementById('filterButton').addEventListener('click', function (event) {
                                            let startDate = document.getElementById('startDate').value;
                                            let endDate = document.getElementById('endDate').value;
                                            let today = new Date().toISOString().split('T')[0];
                                            let errorMessageDiv = document.getElementById('error-message');
                                    
                                            errorMessageDiv.classList.add('d-none');
                                            errorMessageDiv.innerHTML = ""; 
                                    
                                            let errorMessages = [];
                                    
                                            if (!startDate || !endDate) {
                                                errorMessages.push("Ngày bắt đầu hoặc ngày kết thúc không tồn tại! ");
                                            }
                                    
                                            if (startDate > endDate) {
                                                errorMessages.push("Ngày bắt đầu không thể lớn hơn ngày kết thúc!");
                                            }
                                    
                                            if (startDate > today || endDate > today) {
                                                errorMessages.push("Không thể chọn ngày trong tương lai!");
                                            }
                                    
                                            if (errorMessages.length > 0) {
                                                errorMessageDiv.innerHTML = errorMessages.join("<br>");
                                                errorMessageDiv.classList.remove('d-none');
                                                event.preventDefault();
                                            }
                                        });

                                            document.getElementById('filterButton').addEventListener('click', function () {
                                                let startDate = document.getElementById('startDate').value;
                                                let endDate = document.getElementById('endDate').value;
                                    
                                                fetch(`{{ route('admin.revenue.filter') }}?start_date=${startDate}&end_date=${endDate}`)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        let labels = Object.keys(data.revenue_by_date);
                                                        let revenueData = Object.values(data.revenue_by_date);
                                    
                                                        updateChart(labels, revenueData);
                                                    

                                                        document.getElementById('revenueDayTitle').innerText = "Doanh thu theo lọc";
                                                        document.getElementById('revenueDayValue').innerText =
                                                        new Intl.NumberFormat('vi-VN').format(data.total_revenue || 0) + " VNĐ";


                                                        document.getElementById('revenueWeekTitle').innerText = "Ngày doanh thu top";
                                                        document.getElementById('revenueWeekValue').innerText =
                                                        data.max_revenue_day ? 
                                                        `${data.max_revenue_day} (${new Intl.NumberFormat('vi-VN').format(data.max_revenue_value || 0)} VNĐ)` 
                                                        : "Không có doanh thu";

                                                        document.getElementById('revenueMonthTitle').innerText = "Doanh thu trung bình";
                                                        document.getElementById('averageRevenueValue').innerText = 
                                                        new Intl.NumberFormat('vi-VN').format(data.average_revenue_per_day) + " VNĐ";
                                                })
                                                    .catch(error => console.error('Error:', error));
                                            });
                                        });
                                    </script>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Thống kê đơn hàng</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-profile-visit"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Doanh thu theo thời gian</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-profile-visit"></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sản phẩm bán chạy</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($bestSellingProducts as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $products[$item->product_id]->name ?? 'Sản phẩm không tồn tại' }}
                                        <span class="badge bg-primary rounded-pill">{{ $item->total_sold }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
