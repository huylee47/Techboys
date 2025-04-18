<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản của bạn đã được cập nhật</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .changes { background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0; }
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
        <p>Tài khoản trong Techboys với tên đăng nhập: "<strong>{{ $user->username }}</strong>" của bạn vừa được cập nhật mật khẩu mới. Để bảo đảm an toàn cho tài khoản hãy đăng nhập lại và xóa email này sau khi đăng nhập xong!</p>

        <div class="changes">
            @foreach($changes as $field => $value)
                @php
                    $fieldNames = [
                        'password' => 'Mật khẩu'
                    ];
                    $fieldName = $fieldNames[$field] ?? $field;
                @endphp
                <p><strong>{{ $fieldName }}:</strong> {{ $value }}</p>
            @endforeach
        </div>
        <a href="http://127.0.0.1:8000/login" style="display: inline-block; padding: 10px 20px; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; margin-top: 20px;"> Đăng nhập lại</a>
        <p>Nếu bạn không thực hiện thay đổi này, vui lòng liên hệ ngay với quản trị viên.</p>
        <p>
            <strong>Email:</strong> techboyspoly@gmail.com<br>
            <strong>Hotline:</strong> 1900 9999
        </p>
        
        <div class="footer">
            <p>Trân trọng,<br>Đội ngũ TechBoys</p>
            <p>Kết nối với chúng tôi:</p>
            <div class="social-icons">
                <a href="https://facebook.com/" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Facebook_F_icon.svg/2048px-Facebook_F_icon.svg.png" 
                         alt="Facebook" width="24" height="24" style="vertical-align: middle;">
                </a>
                <a href="https://twitter.com/" target="_blank">
                    <img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/x-social-media-logo-icon.png" 
                         alt="Twitter" width="24" height="24" style="vertical-align: middle;">
                </a>
            </div>
        </div>

        <div class="footer">
            <p>Đây là email tự động, vui lòng không trả lời.</p>
            <p>© {{ date('Y') }} TechBoys</p>
        </div>
    </div>
</body>
</html>