@extends('admin.layouts.master')

@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Tổng quan doanh thu</h3>
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
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldActivity"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Doanh thu ngày</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($revenueDay, 0, ',', '.') }} VNĐ</h6>
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
                                            <h6 class="text-muted font-semibold">Doanh thu tuần</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($revenueWeek, 0, ',', '.') }} VNĐ</h6>
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
                                            <h6 class="text-muted font-semibold">Doanh thu tháng</h6>
                                            <h6 class="font-extrabold mb-0">{{ number_format($revenueMonth, 0, ',', '.') }} VNĐ</h6>
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
                                    
                                            document.getElementById('filterButton').addEventListener('click', function () {
                                                let startDate = document.getElementById('startDate').value;
                                                let endDate = document.getElementById('endDate').value;
                                    
                                                fetch(`{{ route('admin.revenue.filter') }}?start_date=${startDate}&end_date=${endDate}`)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        let labels = Object.keys(data).map(date => date);
                                                        let revenueData = Object.values(data);
                                    
                                                        updateChart(labels, revenueData);
                                                    })
                                                    .catch(error => console.error('Error:', error));
                                            });
                                        });
                                    </script>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                    </div>
                    
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sản phẩm bán chạy</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Product A <span class="badge bg-primary rounded-pill">$5,000</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Product B <span class="badge bg-success rounded-pill">$3,200</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Product C <span class="badge bg-danger rounded-pill">$2,750</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
