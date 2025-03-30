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
                                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
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
                                                        @auth
                                                            <th>Hành động</th>
                                                        @endauth
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
                                                        <td>
                                                            @switch($searchedOrder->status_id)
                                                                @case(0)
                                                                    Đã hủy đơn
                                                                    @break
                                                                @case(1)
                                                                    Đang xử lý
                                                                    @break
                                                                @case(2)
                                                                    Đang giao
                                                                    @break
                                                                @case(3)
                                                                    Đã giao
                                                                    @break
                                                                @case(4)
                                                                    Giao hàng thành công
                                                                    @break
                                                                @case(5)
                                                                    Giao hàng thất bại
                                                                    @break
                                                                @default
                                                                    Không xác định
                                                            @endswitch
                                                        </td>
                                                        <td>{{ number_format($searchedOrder->total, 0, ',', '.') }} VND</td>
                                                        @auth
                                                            <td>
                                                                @if($searchedOrder->status_id == 1)
                                                                    <form action="{{ route('client.orders.cancel') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="order_id" value="{{ $searchedOrder->id }}">
                                                                        <button class="btn btn-danger" type="submit">Hủy đơn</button>
                                                                    </form>
                                                                @elseif($searchedOrder->status_id == 3)
                                                                    <form action="{{ route('client.orders.confirm', $searchedOrder->id) }}" method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-success" type="submit">Xác nhận</button>
                                                                    </form>
                                                                @endif
                                                            </td>
                                                        @endauth
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

                                                            <td>
                                                                @switch($bill->status_id)
                                                                    @case(0)
                                                                    Đã hủy đơn
                                                                        @break
                                                                    @case(1)
                                                                        Đang xử lý
                                                                        @break
                                                                    @case(2)
                                                                        Đang giao
                                                                        @break
                                                                    @case(3)
                                                                        Đã giao
                                                                        @break
                                                                    @case(4)
                                                                        Giao hàng thành công
                                                                        @break
                                                                    @case(5)
                                                                        Giao hàng thất bại
                                                                        @break
                                                                    @default
                                                                        Không xác định
                                                                @endswitch
                                                            </td>
                                                            <td>{{ number_format($bill->total, 0, ',', '.') }} VND</td>
                                                          
                                                                <td>
                                                                    @if($bill->status_id == 1)
                                                                        <form action="{{ route('client.orders.cancel') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="order_id" value="{{ $bill->id }}">
                                                                            <button class="btn btn-danger" type="submit">Hủy đơn</button>
                                                                        </form>
                                                                    @elseif($bill->status_id == 3)
                                                                        <form action="{{ route('client.orders.confirm', $bill->id) }}" method="POST">
                                                                            @csrf
                                                                            <button class="btn btn-success" type="submit">Xác nhận</button>
                                                                        </form>
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