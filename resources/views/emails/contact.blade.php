<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
</head>
<body>
    <h1>Thông tin liên hệ</h1>
    <p><strong>Họ và tên:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Điện thoại:</strong> {{ $data['phone'] }}</p>
    <p><strong>Nội dung:</strong> {{ $data['body'] }}</p>
</body>
</html>