@extends('client.layouts.master')

@section('main')
<div id="content" class="site-content" tabindex="-1">
    <div class="col-full">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="page hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-order">
                                    <h2>Theo dõi đơn hàng</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Ngày</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng cộng</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3001</td>
                                                <td>6 Tháng 11, 2017</td>
                                                <td>Đang xử lý</td>
                                                <td>$1,476.99</td>
                                                <td><button class="btn btn-danger">Hủy đơn</button></td>
                                            </tr>
                                            <!-- Thêm các hàng khác nếu cần -->
                                        </tbody>
                                    </table>
                                </div>
                                <!-- .woocommerce-order -->
                            </div>
                            <!-- .woocommerce -->
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .hentry -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
@endsection