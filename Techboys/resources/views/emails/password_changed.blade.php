<!DOCTYPE html>
<html>
<head>
    <title>Thông báo thay đổi mật khẩu</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #f8f9fa; padding: 15px; text-align: center; }
        .content { padding: 20px; }
        .footer { margin-top: 20px; font-size: 12px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>TechBoys - Thông báo thay đổi mật khẩu</h2>
        </div>
        
        <div class="content">
            <p>Xin chào <strong>{{ $username }}</strong>,</p>
            
            <p>Mật khẩu tài khoản của bạn tại TechBoys đã được thay đổi theo yêu cầu.</p>
            
            <p><strong>Thông tin đăng nhập mới:</strong></p>
            <ul>
                <li>Tên đăng nhập: <strong>{{ $username }}</strong></li>
                <li>Mật khẩu mới: <strong>{{ $newPassword }}</strong></li>
            </ul>
            
            <p>Vui lòng đăng nhập và thay đổi mật khẩu ngay sau khi nhận được email này để đảm bảo an toàn tài khoản.</p>
            
            <p>Nếu bạn không yêu cầu thay đổi này, vui lòng liên hệ ngay với bộ phận hỗ trợ của chúng tôi.</p>
        </div>
        
        <div class="footer">
            <p>Trân trọng,</p>
            <p>Đội ngũ hỗ trợ TechBoys</p>
            <p>Email: support@techboys.com</p>
        </div>
    </div>
</body>
</html>