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
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Phương thức thanh toán</th>
                                                <th>Trạng thái thanh toán</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng cộng</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3001</td>
                                                <td>aptop 6GB W10 Infinity Edge Display</td>
                                                <td>1</td>
                                                <td>Chuyển khoản ngân hàng</td>
                                                <td>Đã hoàn thành</td>
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