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
                                        <!-- Search Order Number -->
                                        <div class="search-order">
                                            <input type="text" id="searchOrder" placeholder="Tìm kiếm mã đơn hàng">
                                            <button class="btn btn-primary" onclick="searchOrder()">Tìm kiếm</button>
                                        </div>
                                        <br>
                                        <!-- End of Search Order Number -->
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Mã đơn hàng</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>PT thanh toán</th>
                                                    <th>TT thanh toán</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng cộng</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($loadAll as $bill)
                                                    @if ($bill->user_id == auth()->id())
                                                        <tr>
                                                            <td>{{ $bill->order_id }}</td>
                                                            <td>
                                                                @foreach ($bill->billDetails as $detail)
                                                                    {{ $detail->product->name }}<br>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach ($bill->billDetails as $detail)
                                                                    {{ $detail->quantity }}<br>
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $bill->payment_method == 2 ? 'Tiền mặt' : 'Chuyển khoản' }}</td>
                                                            <td>{{ $bill->payment_status }}</td>
                                                            <td>{{ $bill->status->name }}</td>
                                                            <td>{{ number_format($bill->total, 0, ',', '.') }} VND</td>
                                                            <td><button class="btn btn-danger">Hủy đơn</button></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
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