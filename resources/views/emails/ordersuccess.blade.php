<!DOCTYPE html>
@php
$settings = App\Models\Setting::first(); // Truy vấn model Settings
@endphp
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            color: #333;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #4365c3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
        .links a {
            color: #8EC343;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cảm ơn bạn đã đặt hàng!</h1>
        <p>
            Đơn hàng: <strong><a href="https://hoatuoituquy247.com/thanks/{{ $order->order_code }}">{{ $order->order_code }}</a></strong><br>
            Tổng cộng: <strong>{{ number_format($order->grand_total + $order->shipping_amount, 0, ',', '.') }}₫</strong>
        </p>

        <h2>Thông tin người nhận</h2>
        <table>
            <tr>
                <td><strong>Tên người đặt:</strong></td>
                <td>{{ $order->full_name }}</td>
            </tr>
            <tr>
                <td><strong>Điện thoại người đặt:</strong></td>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <td><strong>Email người đặt:</strong></td>
                <td>{{ $order->email }}</td>
            </tr>

            <tr>
                <td><strong>Tên người nhận:</strong></td>
                <td>{{ $order->ho_ten_nguoi_nhan }}</td>
            </tr>
            <tr>
                <td><strong>Điện thoại người nhận:</strong></td>
                <td>{{ $order->sdt_nguoi_nhan }}</td>
            </tr>
            <tr>
                <td><strong>Ngày giao hoa:</strong></td>
                <td>{{ $order->ngay_giao_hoa }}</td>
            </tr>
            <tr>
                <td><strong>Thời gian giao hoa:</strong></td>
                <td>{{ $order->time_giao_hoa }}</td>
            </tr>
            <tr>
                <td><strong>Thông điệp:</strong></td>
                <td>{{ $order->thong_diep }}</td>
            </tr>
            <tr>
                <td><strong>Ghi chú:</strong></td>
                <td>{{ $order->notes }}</td>
            </tr>
            <tr>
                <td><strong>Tổng tiền:</strong></td>
                <td>{{ number_format($order->grand_total + $order->shipping_amount, 0, ',', '.') }}₫</td>
            </tr>
            <tr>
                <td><strong>Phương thức thanh toán:</strong></td>
                <td>{{ $order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng (COD)' : ($order->payment_method == 'bank' ? 'Thanh toán qua ngân hàng' : $order->payment_method) }}</td>
            </tr>
            <tr>
                <td><strong>Trạng thái thanh toán:</strong></td>
                <td>{{ $order->payment_status == 'pending' ? 'Đang chờ thanh toán' : ($order->payment_status == 'paid' ? 'Đã thanh toán' : $order->payment_status) }}</td>
            </tr>
        </table>

        <h2>Chi tiết sản phẩm</h2>
        <table>
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>SL</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr>
                    <td>
                        <a href="https://hoatuoituquy247.com/product/{{ $item->product->slug }}">
                            <img src="{{ url(Storage::url($item->product->images[0])) }}" alt="" width="30px">
                        </a>
                    </td>
                    <td>
                        <a href="https://hoatuoituquy247.com/product/{{ $item->product->slug }}">
                            {{ $item->product->name }}
                        </a>
                    </td>
                    <td>x {{ $item->quantity }}</td>
                    <td>{{ number_format($item->unit_amount, 0, ',', '.') }}₫</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="links">
            <p><a href="https://hoatuoituquy247.com/">Trở về trang chính</a></p>
            <p><a href="https://hoatuoituquy247.com/thanks/{{ $order->order_code }}">Xem đơn hàng của bạn</a></p>
        </div>
    </div>
</body>

</html>
