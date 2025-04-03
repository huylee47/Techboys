@extends('admin.layouts.master')

@section('main')
<div id="main">
    <div class="container mt-4">
        <h2 class="mb-4">Tạo Đơn Hàng</h2>

        
<div class="form-group">
    <label for="userPhone">Chọn số điện thoại</label>
    <select id="userPhone" class="form-control selectpicker" data-live-search="true">
        <option value="">Chọn số điện thoại</option>
        @foreach($users as $user)
            <option value="{{ $user->phone }}">{{ $user->phone }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">Tên:</label>
    <input type="text" class="form-control" id="name" placeholder="Tên khách hàng">
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Email">
</div>

<div class="form-group">
    <label for="address">Địa chỉ:</label>
    <input type="text" class="form-control" id="address" placeholder="Địa chỉ">
</div>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script>
    jQuery(document).ready(function () {
    jQuery('#userPhone').on('change', function () {
        let phone = jQuery(this).val();
        if (phone) {
            jQuery.ajax({
                url: "{{ route('admin.user.check') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                data: { phone: phone },
                success: function (response) {
                    if (response.status === "exists") {
                        jQuery('#name').val(response.user.name);
                        jQuery('#email').val(response.user.email);
                        jQuery('#address').val(response.user.address);
                    } else {
                        jQuery('#name, #email, #address').val('');
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        } else {
            jQuery('#name, #email, #address').val('');
        }
    });
});
</script> --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const userPhoneSelect = document.getElementById("userPhone");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const addressInput = document.getElementById("address");
    
    userPhoneSelect.addEventListener("change", function () {
        const phone = this.value;
        if (phone) {
            fetch("{{ route('admin.user.check') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content
                },
                body: JSON.stringify({ phone: phone })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "exists") {
                    nameInput.value = data.user.name;
                    emailInput.value = data.user.email;
                    addressInput.value = data.user.address;
                } else {
                    nameInput.value = "";
                    emailInput.value = "";
                    addressInput.value = "";
                }
            })
            .catch(error => console.error("Lỗi khi lấy dữ liệu người dùng:", error));
        } else {
            nameInput.value = "";
            emailInput.value = "";
            addressInput.value = "";
        }
    });
});

</script>

@endsection
