<!DOCTYPE html>
<html>
<head>
    <title>Đánh giá sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
        }
        .review-info {
            margin-top: 20px;
        }
        .review-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Đánh giá sản phẩm: {{ $reviewData['reviewData']['product_name'] }}</h1>
        <div class="review-info">
            <p><strong>Email:</strong> {{ $reviewData['reviewData']['email'] }} sao</p>
            <p><strong>Đánh giá:</strong> {{ $reviewData['reviewData']['rating'] }}</p>
            <p><strong>Số điện thoại:</strong> {{ $reviewData['reviewData']['phone'] }}</p>
            <p><strong>Nội dung đánh giá:</strong> {{ $reviewData['reviewData']['body'] }}</p>
            <p><strong>Mã sản phẩm:</strong> {{ $reviewData['reviewData']['sku'] }}</p>
        </div>
    </div>
</body>
</html>