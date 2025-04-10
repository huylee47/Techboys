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
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->billDetails as $detail)
                                                    <tr>
                                                        <td>{{ $detail->product->name }}</td>
                                                        <td>{{ $detail->quantity }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <p><strong>Mã đơn hàng:</strong> {{ $order->order_id }}</p>
                                        <form action="{{ route('client.orders.cancel.submit', ['id' => $order->id]) }}"
                                            method="POST" onsubmit="return validateCancelReason()">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                            <div class="form-group">
                                                <label for="cancel_reason">Lý do hủy đơn:</label>
                                                <textarea id="cancel_reason" name="cancel_reason" class="form-control"
                                                    rows="4"></textarea>
                                                <small id="cancel_reason_error" class="text-danger"
                                                    style="display: none; font-size: 1.2em;">Vui lòng nhập lý do hủy đơn.</small>
                                            </div>
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy
                                                đơn</button>
                                            <a href="{{ route('client.orders') }}" class="btn btn-secondary">Quay lại</a>
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
<script>
    function validateCancelReason() {
        const reason = document.getElementById('cancel_reason').value.trim();
        const errorElement = document.getElementById('cancel_reason_error');
        if (!reason || reason.length < 10) {
            errorElement.textContent = 'Vui lòng nhập lý do hủy đơn ít nhất 10 ký tự.';
            errorElement.style.display = 'block';
            return false;
        }
        errorElement.style.display = 'none';
        return true;
    }
</script>