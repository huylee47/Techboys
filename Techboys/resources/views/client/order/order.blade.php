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
                                            <form action="{{ route('client.orders.search') }}" method="GET">
                                                <input type="text" name="order_id" placeholder="Nhập mã đơn hàng" required>
                                                @guest
                                                    <input type="text" name="phone" placeholder="Nhập số điện thoại" required>
                                                @endguest
                                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                            </form>
                                        </div>
                                        <br>
                                        <!-- End of Search Order Number -->
                                        @if(session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        @if(isset($searchedOrder))
                                            <!-- Display search result -->
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Sản phẩm</th>
                                                        <th>Số lượng</th>
                                                        <th>Trạng thái</th>
                                                        <th>Tổng cộng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $searchedOrder->order_id }}</td>
                                                        <td>
                                                            @foreach ($searchedOrder->billDetails as $detail)
                                                                {{ $detail->product->name }}<br>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($searchedOrder->billDetails as $detail)
                                                                {{ $detail->quantity }}<br>
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $searchedOrder->status->name }}</td>
                                                        <td>{{ number_format($searchedOrder->total, 0, ',', '.') }} VND</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @elseif(Auth::check() && isset($loadAll))
                                            <!-- Display all orders -->
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Sản phẩm</th>
                                                        <th>Số lượng</th>
                                                        {{-- <th>PT thanh toán</th>
                                                        <th>TT thanh toán</th> --}}
                                                        <th>Trạng thái</th>
                                                        <th>Tổng cộng</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="orderTableBody">
                                                    @foreach ($loadAll as $bill)
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
                                                            {{-- <td>{{ $bill->payment_method == 2 ? 'Tiền mặt' : 'Chuyển khoản' }}
                                                            </td>
                                                            <td>{{ $bill->payment_status == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'
                                                                }}</td> --}}
                                                            <td>{{ $bill->status->name }}</td>
                                                            <td>{{ number_format($bill->total, 0, ',', '.') }} VND</td>
                                                            <td>
                                                                @if($bill->status->id == 1)
                                                                    <a href="{{ route('client.orders.cancel', ['id' => $bill->id]) }}">
                                                                        <button class="btn btn-danger">Hủy đơn</button>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                        @endif
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