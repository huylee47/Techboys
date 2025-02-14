<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Cảm ơn đã liên hệ với chúng tôi, quý khách {{ $data['name'] }}!</h1>
    <p>Chúng tôi đã nhận được phản hồi của bạn. Đội ngũ TechBoys chúng tôi sẽ xử lý yêu cầu của bạn sớm nhất có thể. </p>
    <p>Dưới đây là chi tiêt tin nhắn của bạn:</p>
    <ul>
        <li><strong>Họ và tên:</strong> {{ $data['name'] }}</li>
        <li><strong>Email:</strong> {{ $data['email'] }}</li>
        <li><strong>Số điện thoại:</strong> {{ $data['phone'] }}</li>
        <li><strong>Tin nhắn của bạn:</strong> {{ $data['message'] }}</li>
    </ul>
    <p>Thân mến!<br>Đội ngũ TechBoys</p>
</body>
</html>