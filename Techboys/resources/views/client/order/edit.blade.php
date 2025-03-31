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
                        <label for="billing_city">Thành phố
                            <abbr title="required" class="required">*</abbr>
                        </label>
                        <select name="province_id" id="province">
                            <option value="" disabled>Chọn tỉnh/thành phố</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ $province->id == $order->province_id ? 'selected' : '' }}>
                                    {{ $province->name }}
                                </option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <label for="billing_district">Quận
                            <abbr title="required" class="required">*</abbr>
                        </label>
                        <select name="district_id" id="district">
                            <option value="" disabled>Chọn quận/huyện</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}" {{ $district->id == $order->district_id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </p>
                </div>
                <div class="flex-row">
                    <p>
                        <label for="billing_ward">Phường/Xã
                            <abbr title="required" class="required">*</abbr>
                        </label>
                        <select name="ward_id" id="ward">
                            <option value="" disabled>Chọn phường/xã</option>
                            @foreach ($wards as $ward)
                                <option value="{{ $ward->id }}" {{ $ward->id == $order->ward_id ? 'selected' : '' }}>
                                    {{ $ward->name }}
                                </option>
                            @endforeach
                        </select>
                    </p>
                    <p>
                        <label for="billing_phone">Số điện thoại
                            <abbr title="required" class="required">*</abbr>
                        </label>
                        <input type="tel" value="{{ $order->phone }}" id="billing_phone" name="phone">
                    </p>
                </div>
                <p>
                    <label for="order_comments">Địa chỉ chi tiết
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <textarea cols="5" rows="3" id="order_comments" name="address">{{ $order->address }}</textarea>
                </p>
            </div>
        </div>
        <button type="submit">Cập Nhật</button>
        <a href="{{ route('client.orders') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
