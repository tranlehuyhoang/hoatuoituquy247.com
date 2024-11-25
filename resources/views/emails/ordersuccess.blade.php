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

        h1,
        h2 {
            color: #4365c3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        .links {
            margin-top: 20px;
            font-size: 14px;
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
            Đơn hàng của bạn: <strong><a href="{{ url('account/orders/' . $order->order_code) }}">{{ $order->order_code }}</a></strong><br>
            Tổng cộng: <strong>{{ number_format($order->grand_total +  $order->shipping_amount, 0, ',', '.') }}₫</strong>
        </p>
        
        <h2>Thông tin người nhận</h2>
        <table>
            <tr>
                <td><strong>Tên:</strong></td>
                <td>{{ $shippingAddress->full_name }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $order->user->email }}</td>
            </tr>
            <tr>
                <td><strong>Điện thoại:</strong></td>
                <td>{{ $shippingAddress->phone }}</td>
            </tr>
        </table>
        
        <h2>Địa chỉ nhận hàng</h2>
        <table>
            <tr>
                <td>{{ $shippingAddress->detailed_address }}</td>
            </tr>
            <tr>
                <td>{{ $shippingAddress->ward }}</td>
            </tr>
            <tr>
                <td>{{ $shippingAddress->district }}, {{ $shippingAddress->province }}</td>
            </tr>
        </table>
        <h2>Chi tiết sản phẩm</h2>
        <table>
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên  </th>
                    <th>SL</th>
                    <th>Giá</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $item)
                <tr>
                    <td>
                        <a href="{{ url('products/' . $item->product_variant->product->slug) }}">
                            <img src="{{ url(Storage::url($item->product_variant->image)) }}" alt="" srcset="" width="30px">
                        </a>
                    </td>
                    <td>
                        <a href="{{ url('products/' . $item->product_variant->product->slug) }}">
                            {{ $item->product_variant->product->name }} ({{ $item->product_variant->name }})
                        </a>
                    </td>
                    <td>x {{ $item->quantity }}</td>
                    <td>{{ number_format($item->unit_amount, 0, ',', '.') }}₫</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Tổng kết</h2>
        <table>
            <tr>
                <td>Tạm tính:</td>
                <td class="total">{{ number_format($order->grand_total, 0, ',', '.') }}₫</td>
            </tr>
            <tr>
                <td>Ship:</td>
                <td class="total">{{ number_format($order->shipping_amount, 0, ',', '.') }}₫</td>
            </tr>
            <tr>
                <td>Tổng cộng:</td>
                <td class="total">{{ number_format($order->grand_total + $order->shipping_amount, 0, ',', '.') }}₫</td>
            </tr>
        </table>
        
        <h2>Phương thức thanh toán</h2>
        <table>
            <tr>
                <td>
                    @if ($order->payment_method === 'cod')
                        Thanh toán khi nhận hàng (COD)
                    @elseif ($order->payment_method === 'bank')
                        Thanh toán qua ngân hàng
                    @else
                        {{ $order->payment_method }}
                    @endif
                </td>
            </tr>
        </table>
        
        @if ($order->payment_method !== 'cod')
            <h2>Trạng thái thanh toán</h2>
            <table>
                <tr>
                    <td>
                        @if ($order->payment_status === 'pending')
                            Đang Chờ
                        @elseif ($order->payment_status === 'paid')
                            Đã Thanh Toán
                        @elseif ($order->payment_status === 'failed')
                            Thất Bại
                        @else
                            {{ $order->payment_status }}
                        @endif
                    </td>
                </tr>
            </table>
            
            <div>
                <table>
                    <tr>
                        <td>
                            <img src="https://vietqr.co/api/generate/{{ $settings->ngan_hang }}/{{ $settings->so_tai_khoan }}/VIETQR.CO/{{ number_format($order->grand_total + $order->shipping_amount , 0, ',', '.') }}/{{ $order->order_code }}?style=2&logo=1&isMask=1&bg=61"
                                alt="QR Code" width="100px">
                        </td>
                    </tr>
                    <tr>
                        <td>Quét mã QR để thanh toán.</td>
                    </tr>
                </table>
            </div>
        @endif
        
        <div class="links">
            <table>
                <tr>
                    <td><a href="{{ url('/') }}">Trở về trang chính</a></td>
                </tr>
                <tr>
                    <td><a href="{{ url('account/orders/' . $order->id) }}">Xem đơn hàng của bạn</a></td>
                </tr>
            </table>
        </div>
        
    </div>
</body>

</html>