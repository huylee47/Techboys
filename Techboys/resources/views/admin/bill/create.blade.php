@extends('admin.layouts.master')

@section('main')
<div id="main">
    <div class="container mt-4">
        <h2 class="mb-4">Tạo Đơn Hàng</h2>

        <!-- Chọn số điện thoại khách hàng -->
        <div class="mb-3">
            <label for="userPhone" class="form-label">Số điện thoại khách hàng</label>
            <select id="userPhone" class="form-control selectpicker" data-live-search="true">
                <option value="">Chọn số điện thoại</option>
                @foreach($users as $user)
                    <option value="{{ $user->phone }}">{{ $user->phone }}</option>
                @endforeach
            </select>
        </div>

        <!-- Thông tin khách hàng -->
        <div id="userInfo">
            <h5>Thông tin khách hàng</h5>
            <div class="mb-2">
                <label for="userName" class="form-label">Họ Tên</label>
                <input type="text" id="userName" class="form-control" placeholder="Nhập họ tên">
            </div>
            <div class="mb-2">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" id="userEmail" class="form-control" placeholder="Nhập email">
            </div>
            <div class="mb-2">
                <label for="userAddress" class="form-label">Địa chỉ chi tiết</label>
                <input type="text" id="userAddress" class="form-control" placeholder="Nhập địa chỉ">
            </div>
        </div>

        <!-- Nếu không tìm thấy khách hàng -->
        <div id="newUser" class="d-none">
            <p>Không tìm thấy khách hàng. <a href="{{ route('admin.user.create') }}">Thêm khách hàng mới</a></p>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.selectpicker').selectpicker(); // Kích hoạt selectpicker

    $('#userPhone').on('change', function() {
        let phone = $(this).val();

        if (phone) {
            $.ajax({
                url: '{{ route('admin.user.check') }}',
                type: 'POST',
                data: {
                    phone: phone,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 'exists') {
                        $('#userName').val(response.user.name);
                        $('#userEmail').val(response.user.email);
                        $('#userAddress').val(response.user.address);
                        $('#newUser').addClass('d-none');
                    } else {
                        $('#userName').val('');
                        $('#userEmail').val('');
                        $('#userAddress').val('');
                        $('#newUser').removeClass('d-none');
                    }
                }
            });
        } else {
            $('#userName').val('');
            $('#userEmail').val('');
            $('#userAddress').val('');
            $('#newUser').addClass('d-none');
        }
    });
});
</script>
@endsection
