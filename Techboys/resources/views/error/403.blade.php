{{-- resources/views/errors/403.blade.php --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>403 - Truy cập bị từ chối</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #ef4444;
        }
        .message {
            font-size: 24px;
            margin-bottom: 30px;
            color: #374151;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">403</div>
        <div class="message">Bạn không có quyền truy cập vào trang này.</div>
        <a href="{{ route('admin.index') }}" class="btn">Quay lại trang quản trị</a>
    </div>
</body>
</html>
