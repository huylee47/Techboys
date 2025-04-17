<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tài khoản của bạn đã được cập nhật</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        .header { border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .changes { background-color: #f9f9f9; padding: 15px; border-radius: 5px; }
        .footer { margin-top: 20px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>TechBoys Shop</h2>
            <h3>Thông báo cập nhật tài khoản</h3>
        </div>

        <p>Xin chào {{ $user->name }},</p>
        <p>Tài khoản với tên đăng nhập: <strong>{{ $username }}</strong> của bạn vừa được cập nhật:</p>

        <div class="changes">
            @foreach($changes as $field => $value)
                @php
                    $fieldNames = [
                        'email' => 'Địa chỉ email',
                        'password' => 'Mật khẩu'
                    ];
                    $fieldName = $fieldNames[$field] ?? $field;
                @endphp
                <p><strong>{{ $fieldName }}:</strong> {{ $value }}</p>
            @endforeach
        </div>

        <p>Nếu bạn không thực hiện thay đổi này, vui lòng liên hệ ngay với quản trị viên.</p>

        <div class="footer">
            <p>Đây là email tự động, vui lòng không trả lời.</p>
            <p>© {{ date('Y') }} TechBoys</p>
        </div>
    </div>
</body>
</html>