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
                                        <h2>Thông tin đơn hàng cần hủy</h2>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Hình ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->billDetails as $detail)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $detail->product->image }}" alt="{{ $detail->product->name }}" width="50">
                                                        </td>
                                                        <td>{{ $detail->product->name }}</td>
                                                        <td>{{ $detail->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <p><strong>Mã đơn hàng:</strong> {{ $order->order_id }}</p>
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="cancel_reason">Lý do hủy đơn:</label>
                                                <textarea id="cancel_reason" name="cancel_reason" class="form-control" rows="4" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-danger">Hủy đơn</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection