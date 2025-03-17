<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Hóa Đơn - Techboys</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/DejaVuSans.ttf') }}") format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        h1, h2, h3 {
            text-align: center;
            color: #333;
        }

        .store-name {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #0056b3;
            margin-bottom: 5px;
        }

        .line {
            border-top: 2px solid #0056b3;
            margin: 10px 0;
        }

        .invoice-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .total {
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            color: #555;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="store-name">Techboys</div>
        <h2>Hóa Đơn Mua Hàng</h2>
        <div class="line"></div>

        <div class="invoice-info">
            <p><strong>Mã Hóa Đơn:</strong> {{ $bill->order_id ?? $bill->phone }}</p>
            <p><strong>Khách Hàng:</strong> {{ $bill->full_name }}</p>
            <p><strong>Email:</strong> {{ $bill->email }}</p>
            <p><strong>Ngày Tạo:</strong> {{ $bill->created_at->format('d/m/Y') }}</p>
            <p><strong>Địa Chỉ:</strong> {{ $bill->address }}</p>
            <p><strong>Phương Thức Thanh Toán:</strong> {{ $bill->payment_method == 1 ? 'VNPAY' : 'COD' }}</p>
            <p><strong>Trạng Thái Thanh Toán:</strong> 
                <span style="color: {{ $bill->payment_status == 1 ? 'green' : 'red' }}">
                    {{ $bill->payment_status == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}
                </span>
            </p>
        </div>

        <h3>Chi Tiết Đơn Hàng</h3>
        <table>
            <thead>
                <tr>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Tổng</th>
                    <th>Khuyến Mại</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($billDetails as $billDetail)
                <tr>
                    <td>{{ $billDetail->product->name }} {{ $billDetail->variant->color->name }} {{ $billDetail->variant->model->name }}</td>
                    <td>{{ $billDetail->quantity }}</td>
                    <td>{{ number_format($billDetail->price, 0, ',', '.') }} đ</td>
                    <td>{{ number_format($billDetail->price * $billDetail->quantity, 0, ',', '.') }} đ</td>
                    @php
                        $isPromotionActive = $productPromotions->contains(function ($promotion) use ($billDetail) {
                            return $promotion->product_id == $billDetail->product->id &&
                                   $billDetail->created_at <= $promotion->end_date;
                        });
                    @endphp
                    <td>{{ $isPromotionActive ? 'Có' : 'Không' }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="total">Tổng cộng</td>
                    <td colspan="2" class="total">{{ number_format($bill->total, 0, ',', '.') }} đ</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Hóa đơn được tạo tự động và có hiệu lực mà không cần chữ ký.</p>
            <p>Cảm ơn quý khách đã mua hàng tại <strong>Techboys</strong>!</p>
        </div>
    </div>
</body>
</html>