<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007BFF;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
        }
        strong {
            color: #007BFF;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
                padding: 10px;
            }
            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            {{-- <img src="https://png.png" alt="TechBoys Logo" style="max-width: 150px;"> --}}
        </div>
        <h1>Cảm ơn đã liên hệ với chúng tôi, quý khách {{ $data['name'] }}!</h1>
        <p>Xin chào quý khách {{ $data['name'] }}!</p>
        <p>Cảm ơn bạn đã dành thời gian chia sẻ ý kiến với chúng tôi. Phản hồi của bạn rất quan trọng và giúp chúng tôi không ngừng cải thiện dịch vụ.</p>
        <p>Chúng tôi đã ghi nhận ý kiến phản hồi của bạn: <strong>{{ $data['message'] }}</strong>. Đội ngũ TechBoys chúng tôi sẽ xử lý yêu cầu của bạn sớm nhất có thể.</p>
        <p>Nếu có bất kỳ thắc mắc nào khác, đừng ngần ngại liên hệ với chúng tôi qua:</p>
        <p>
            <strong>Email:</strong> techboyspoly@gmail.com<br>
            <strong>Hotline:</strong> 1900 9999
        </p>
        <a href="http://127.0.0.1:8000/" style="display: inline-block; padding: 10px 20px; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px; margin-top: 20px;">
            Truy cập Website của Chúng Tôi
        </a>
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
    </div>
</body>
</html>
