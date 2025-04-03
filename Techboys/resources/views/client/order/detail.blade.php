@extends('client.layouts.master')

@section('main')
<div class="container mt-5">
    <h2 class="mb-4">Sửa Thông Tin Đặt Hàng</h2>
    <style>
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .flex-row {
            display: flex;
            gap: 15px;
        }
        .flex-row > p {
            flex: 1;
        }
    </style>
    <form action="" method="POST">
        @csrf
        @method('POST')
        <div id="customer_details">
            <div>
                <p>
                    <label for="billing_first_name">Họ và Tên Người nhận</label>
                    <input type="text" value="{{ $order->user->name }}" id="billing_first_name" name="full_name" disabled>
                </p>              
                <div class="flex-row">
                    <p>
                        <label for="billing_phone">Số điện thoại
                            <abbr title="required" class="required">*</abbr>
                        </label>
                        <input type="tel" value="{{ $order->phone }}" id="billing_phone" name="phone" disabled>
                    </p>
                </div>
                <div class="flex-row">
                    <p>
                        <label for="payment_method">Phương thức thanh toán</label>
                        <input type="text" 
                               value="{{ $order->payment_method == 1 ? 'Chuyển khoản' : ($order->payment_method == 2 ? 'Tiền mặt' : 'Không xác định') }}" 
                               id="payment_method" 
                               name="payment_method" 
                               disabled>
                    </p>
                </div>
                <div class="flex-row">
                    <p>
                        <label for="voucher">Voucher đã áp dụng</label>
                        <input type="text" 
                               value="{{ $order->voucher_code ?? 'Không áp dụng' }}" 
                               id="voucher" 
                               name="voucher" 
                               disabled>
                    </p>
                </div>
                <div class="flex-row">
                    <p>
                        <label for="shipping_fee">Phí vận chuyển</label>
                        <input type="text" 
                               value="{{ number_format($order->fee_shipping, 0, ',', '.') }} VNĐ" 
                               id="shipping_fee" 
                               name="shipping_fee" 
                               disabled>
                    </p>
                </div>
                <p>
                    <label for="order_comments">Địa chỉ chi tiết
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <textarea cols="5" rows="3" id="order_comments" name="address" disabled>{{ $order->address }}</textarea>
                </p>
            </div>
        </div>
        <a href="{{ route('client.orders') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
