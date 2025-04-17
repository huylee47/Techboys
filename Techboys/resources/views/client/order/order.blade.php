@extends('client.layouts.master')
<link rel="stylesheet" href="{{ url('') }}/admin/assets/vendors/simple-datatables/style.css">
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
                                                @guest
                                                    <input type="text" name="phone" placeholder="Nhập số điện thoại" required>
                                              
                                                 <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                                @endguest
                                               
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
                                        @if(isset($searchedOrders) && $searchedOrders->isNotEmpty())
                                            <!-- Display search results -->
                                            <table class="table table-bordered" id="table1">
                                                @if(!Auth::check())
                                                    <h5>Nếu bạn muốn hủy đơn hàng vui lòng liên hệ với chúng tôi: 0901234567</h5>
                                                @endif
                                                <thead>
                                                    <tr>
                                                        @auth
                                                        <th>Mã đơn hàng</th>
                                                        @endauth
                                                        <th>Sản phẩm</th>
                                                        <th>Trạng thái</th>
                                                        <th>Tổng cộng</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($searchedOrders->sortByDesc('created_at') as $searchedOrder)
                                                        <tr>
                                                            @auth
                                                            <td>{{ $searchedOrder->order_id }}</td>
                                                            @endauth
                                                            <td>
                                                                @foreach ($searchedOrder->billDetails as $detail)
                                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                                        <img src="{{ url('') }}/admin/assets/images/product/{{ $detail->product->img }}" alt="{{ $detail->product->name }}" style="width: 120px; height: 120px; object-fit: cover;">
                                                                        {{ $detail->product->name }}
                                                                        @if($detail->variant_id)
                                                                            ({{ $detail->attributes }})
                                                                        @endif
                                                                        <span style="margin-left: auto;">x{{ $detail->quantity }}</span>
                                                                    </div>
                                                                    <br>
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
                                                            <td>
                                                                <div style="display: flex; gap: 10px;">
                                                                    @auth
                                                                        @if($searchedOrder->status_id == 1)
                                                                            <form action="{{ route('client.orders.cancel') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="order_id" value="{{ $searchedOrder->id }}">
                                                                                <button class="btn btn-danger" type="submit">Hủy đơn</button>
                                                                            </form>
                                                                        @endif
                                                                        @if($searchedOrder->status_id == 3)
                                                                            <form action="{{ route('client.orders.confirm', $searchedOrder->id) }}" method="POST">
                                                                                @csrf
                                                                                <button class="btn btn-success"  onclick="return confirm('Bạn có chắc chắn muốn xác nhận đơn hàng này?')" type="submit">Xác nhận</button>
                                                                            </form>
                                                                        @endif
                                                                    @endauth
                                                                    <form action="{{ route('client.orders.detail') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="order_id" value="{{ $searchedOrder->id }}">
                                                                        <button class="btn btn-warning" type="submit">Chi tiết</button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @elseif(Auth::check() && isset($loadAll))
                                            <!-- Display all orders -->
                                            <table class="table table-bordered" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>Mã đơn hàng</th>
                                                        <th>Sản phẩm</th>
                                                 
                                                        {{-- <th>PT thanh toán</th>
                                                        <th>TT thanh toán</th> --}}
                                                        <th>Trạng thái</th>
                                                        <th>Tổng cộng</th>
                                                     
                                                            <th>Hành động</th>
                                                   
                                                    </tr>
                                                </thead>
                                                <tbody id="orderTableBody">
                                                    @foreach ($loadAll->sortByDesc('created_at') as $bill)
                                                        <tr>
                                                            <td>{{ $bill->order_id }}</td>
                                                            <td>
                                                                @foreach ($bill->billDetails as $detail)
                                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                                        <img src="{{ url('') }}/admin/assets/images/product/{{ $detail->product->img }}" alt="{{ $detail->product->name }}" style="width: 120px; height: 120px; object-fit: cover;">
                                                                        {{ $detail->product->name }}
                                                                        @if($detail->variant_id)
                                                                            ({{ $detail->attributes }})
                                                                        @endif
                                                                        <span style="margin-left: auto;">x{{ $detail->quantity }}</span>
                                                                    </div>
                                                                    <br>
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
                                                                <div style="display: flex; gap: 10px;">
                                                                    @if($bill->status_id == 1)
                                                                        <form action="{{ route('client.orders.cancel') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="order_id" value="{{ $bill->id }}">
                                                                            <button class="btn btn-danger" type="submit">Hủy đơn</button>
                                                                        </form>
                                                                    @elseif($bill->status_id == 3)
                                                                        <form action="{{ route('client.orders.confirm', $bill->id) }}" method="POST">
                                                                            @csrf
                                                                            <button class="btn btn-success" onclick="return confirm('Bạn có chắc chắn muốn xác nhận đơn hàng này?')" type="submit">Xác nhận</button>
                                                                        </form>
                                                                    @endif   
                                                                    <form action="{{ route('client.orders.detail') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="order_id" value="{{ $bill->id }}">
                                                                        <button class="btn btn-warning" type="submit">Chi tiết</button>
                                                                    </form>
                                                                </div>
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

<script src="{{ url('') }}/admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    let table1 = document.querySelector('#table1');
    if (table1) {
        let dataTable = new simpleDatatables.DataTable(table1);
    }
</script>
<script src="{{ url('') }}/admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
@endsection