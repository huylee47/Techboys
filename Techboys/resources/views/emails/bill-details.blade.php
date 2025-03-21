<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #eeeeee;
        }
        .header h2 {
            color: #333;
            margin: 0;
        }
        .content {
            padding: 20px 0;
        }
        .info {
            background: #fafafa;
            padding: 10px;
            border-radius: 5px;
        }
        .info p {
            margin: 5px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .table th, .table td {
            border: 1px solid #dddddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background: #f8f8f8;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h2>🎉 Chi Tiết Đơn Hàng 🎉</h2>
            <p>Cảm ơn {{ $bill->full_name }} đã đặt hàng tại cửa hàng của chúng tôi!</p>
        </div>

        <!-- Nội dung -->
        <div class="content">
            <p><strong>Ngày đặt:</strong> {{ date('d/m/Y H:i', strtotime($bill->created_at)) }}</p>

            <div class="info">
                <p><strong>Mã đơn hàng:</strong> {{ $bill->order_id }}</p>
                <p><strong>Người nhận:</strong> {{ $bill->full_name }}</p>
                <p><strong>Địa chỉ:</strong> {{ $bill->address }}</p>
                <p><strong>Số điện thoại:</strong> {{ $bill->phone }}</p>
                <p><strong>Email:</strong> {{ $bill->email }}</p>
            </div>

            <h3>Chi Tiết Đơn Hàng:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billDetails as $detail)
                    <tr>
                        <td>{{ $detail->variant->product->name }} ({{ $detail->variant->model->name }},{{ $detail->variant->color->name }})</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ number_format($detail->variant->discounted_price, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($detail->quantity * $detail->variant->discounted_price, 0, ',', '.') }} VND</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p><strong>Áp dụng voucher:</strong> 
                @if($bill->total < $detail->quantity * $detail->variant->discounted_price)
                {{ number_format($detail->quantity * $detail->variant->discounted_price - $bill->total, 0, ',', '.') }}
                @else
                    Không áp dụng
                @endif
            </p>
            <p class="total">Tổng tiền: {{ number_format($bill->total, 0, ',', '.') }} VND</p>

            <p><strong>Phương thức thanh toán:</strong> 
                @if($bill->payment_method == 1)
                    Thanh toán qua VNPay
                @else
                    Thanh toán khi nhận hàng (COD)
                @endif
            </p>


        </div>

        <!-- Footer -->
        <div class="footer">
            <p>📞 Hỗ trợ khách hàng: <a href="tel:{{$config->hotline}}">{{$config->hotline}}</a></p>
            <p>🌐 <a href="#">Techboys</a></p>
            <p><em>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi! ❤️</em></p>
        </div>
    </div>
</body>
</html>
