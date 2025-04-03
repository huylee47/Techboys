@extends('admin.layouts.master')

@section('main')
<div id="main">
    <div class="container mt-4">
        <h2 class="mb-4">Tạo Đơn Hàng</h2>
        <div class="row">
            <div class="form-group">
                <div class="form-group">
                    <label for="userPhone">Chọn số điện thoại</label>
                    <select id="userPhone" class="form-control selectpicker" data-live-search="true">
                        <option value="">Chọn số điện thoại</option>
                        @foreach($users->take(5) as $user)
                            <option value="{{ $user->phone }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-address="{{ $user->address }}">
                                {{ $user->phone }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control" id="name" placeholder="Tên khách hàng">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" placeholder="Địa chỉ">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const userPhoneSelect = document.getElementById("userPhone");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const addressInput = document.getElementById("address");
    
    jQuery(userPhoneSelect).on("change", function () {
        const selectedOption = jQuery(this).find("option:selected");
        nameInput.value = selectedOption.data("name") || "";
        emailInput.value = selectedOption.data("email") || "";
        addressInput.value = selectedOption.data("address") || "";
    });

    jQuery(userPhoneSelect).selectpicker({
        noneResultsText: 'Không tìm thấy kết quả',
        countSelectedText: '{0} số điện thoại được chọn',
        liveSearchPlaceholder: 'Tìm kiếm số điện thoại...'
    });
});
</script>
@endsection