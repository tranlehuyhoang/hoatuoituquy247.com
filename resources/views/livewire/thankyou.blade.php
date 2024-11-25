<div>
    @php
    $settings = App\Models\Setting::first(); // Truy vấn model Settings
    @endphp
    <div class="thankyou-page">

        <head>
            <title>Cảm ơn</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
            <link rel="stylesheet" href="/bizweb.dktcdn.net/checkout.vendor.min.css?v=4fcd86c">
            <link rel="stylesheet" href="/bizweb.dktcdn.net/checkout.min.css?v=f6401e8">
            <script src="/bizweb.dktcdn.net/assets/themes_support/libphonenumber-v3.2.30.min.js?1721662888170"></script>
            <script src="/bizweb.dktcdn.net/checkout.vendor.min.js?v=11006c9"></script>
            <script src="/bizweb.dktcdn.net/checkout.min.js?v=4cdb0f8"></script>
        </head>

        <body data-no-turbolink>

            <header class="banner">
                <div class="wrap">
                    <div class="logo logo--left">

                        <h1 class="shop__name">
                            <a href="/"><img src="{{ Storage::url($settings->logo) }}" width="150px" alt=""></a>

                        </h1>

                    </div>
                </div>
            </header>
            <div class="content">
                <form>
                    <div class="wrap wrap--mobile-fluid">
                        <main class="main main--nosidebar">
                            <header class="main__header">
                                <div class="logo logo--left">

                                    <h1 class="shop__name">
                                        <a href="/"><img src="{{ Storage::url($settings->logo) }}" width="150px" alt=""></a>

                                    </h1>

                                </div>
                            </header>
                            <div class="main__content">
                                <article class="row">
                                    <div class="col col--primary">
                                        <section class="section section--icon-heading">
                                            <div class="section__icon unprintable">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                                                    <g fill="none" stroke="#8EC343" stroke-width="2">
                                                        <circle cx="36" cy="36" r="35"
                                                            style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;">
                                                        </circle>
                                                        <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                                            style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="thankyou-message-container">
                                                <h2 class="section__title">Cảm ơn bạn đã đặt hàng</h2>

                                                <p class="section__text">
                                                    Một email xác nhận đã được gửi tới {{ auth()->user()->email }}.
                                                    <br />
                                                    Xin vui lòng kiểm tra email của bạn.
                                                </p>


                                                <p>
                                                    <script crossorigin='anonymous' class='bk-pf-js'
                                                        src='https://pc.baokim.vn/platform/platform.js?t=Ko9gFUG8v8r0fIYBvsZOWdZW5iKZR4SffOvlppG9DCeMsWd+N5FTCx5lqM8Hm44V6hIKh7Ivx6xxaza0QwDgHVxziLsCGxLQ'>
                                                    </script>
                                                </p>

                                            </div>
                                        </section>
                                    </div>
                                    <div class="col col--secondary">
                                        <aside class="order-summary order-summary--bordered order-summary--is-collapsed"
                                            id="order-summary">
                                            <div class="order-summary__header">
                                                <div class="order-summary__title">
                                                    Đơn hàng {{ $order->order_code }}
                                                    <span class="unprintable">({{ $orderItems->count() }})</span>
                                                </div>
                                                <div class="order-summary__action hide-on-desktop unprintable">
                                                    <a data-toggle="#order-summary"
                                                        data-toggle-class="order-summary--is-collapsed"
                                                        class="expandable">
                                                        Xem chi tiết
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="order-summary__sections">
                                                <div
                                                    class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                                    <table class="product-table">
                                                        <tbody>
                                                            @foreach ($orderItems as $item)
                                                            <tr class="product">
                                                                <td class="product__image">
                                                                    <div class="product-thumbnail">
                                                                        <div class="product-thumbnail__wrapper">
                                                                            <img src="{{Storage::url($item->product_variant->image)  }}"
                                                                                alt=""
                                                                                class="product-thumbnail__image" />
                                                                        </div>
                                                                        <span
                                                                            class="product-thumbnail__quantity unprintable">{{
                                                                            $item->quantity }}</span>
                                                                    </div>
                                                                </td>
                                                                <th class="product__description">
                                                                    <span class="product__description__name">{{
                                                                        $item->product_variant->product->name }}</span>
                                                                    <span class="product__description__property">{{
                                                                        $item->product_variant->name }}</span>
                                                                </th>
                                                                <td class="product__quantity printable-only">
                                                                    x {{ $item->quantity }}
                                                                </td>
                                                                <td class="product__price">
                                                                    {{ number_format($item->unit_amount, 0, ',', '.')
                                                                    }}₫
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="order-summary__section">
                                                    <table class="total-line-table">
                                                        <tbody class="total-line-table__tbody">
                                                            <tr class="total-line total-line--subtotal">
                                                                <th class="total-line__name">Tạm tính</th>
                                                                <td class="total-line__price">{{
                                                                    number_format($order->grand_total, 0, ',', '.') }}₫
                                                                </td>
                                                            </tr>

                                                            <tr class="total-line total-line--shipping-method">
                                                                <th class="total-line__name">Phương thức vận chuyển</th>
                                                                <td class="total-line__price">
                                                                    @if($order->shipping_method === 'in_store_pickup')
                                                                        Nhận tại cửa hàng
                                                                    @elseif($order->shipping_method === 'home_delivery')
                                                                        Giao hàng tận nơi
                                                                    @else
                                                                        Chưa xác định
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            

                                                            <!-- Phí vận chuyển -->
                                                            <tr class="total-line total-line--shipping-fee"
                                                                @if(empty($order->shipping_amount) || $order->shipping_amount
                                                                == 0) hidden @endif>
                                                                <th class="total-line__name">Phí vận chuyển</th>
                                                                <td class="total-line__price">
                                                                    {{ $order->shipping_amount > 0 ?
                                                                    number_format($order->shipping_amount, 0, ',', '.') .
                                                                    '₫' : 'Miễn phí' }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="order-summary__section">
                                                    <table class="total-line-table">
                                                        <tbody class="total-line-table__tbody">
                                                            <tr class="total-line payment-due">
                                                                <th class="total-line__name">
                                                                    <span class="payment-due__label-total">Tổng
                                                                        cộng</span>
                                                                </th>
                                                                <td class="total-line__price">
                                                                    <span class="payment-due__price">{{
                                                                        number_format($order->grand_total + $order->shipping_amount, 0, ',', '.')
                                                                        }}₫</span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                    <div class="col col--primary">
                                        <section class="section">
                                            <div class="section__content section__content--bordered">
                                                <div class="row">
                                                    <div class="col col--md-two">
                                                        <h2>Thông tin mua hàng</h2>
                                                        <p>{{ $shippingAddress->full_name }}</p>
                                                        <p>{{ $order->user->email }}</p>
                                                        <!-- Assuming you have a relationship to User -->
                                                        <p>{{ $shippingAddress->phone }}</p>
                                                    </div>

                                                    <div class="col col--md-two">
                                                        <h2>Địa chỉ nhận hàng</h2>
                                                        <p>{{ $shippingAddress->detailed_address }}</p>
                                                        <p>{{ $shippingAddress->ward }}</p>
                                                        <p>{{ $shippingAddress->district }}, {{
                                                            $shippingAddress->province
                                                            }}</p>
                                                        <p>{{ $shippingAddress->phone }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col col--md-two">
                                                        <h2>Phương thức thanh toán</h2>
                                                        <p>
                                                            @if ($order->payment_method === 'cod')
                                                            Thanh toán khi nhận hàng (COD)
                                                            @elseif ($order->payment_method === 'bank')
                                                            Thanh toán qua ngân hàng
                                                            @else
                                                            {{ $order->payment_method }}
                                                            <!-- Fallback for other methods -->
                                                            @endif
                                                        </p>
                                                    </div>
                                                  
                                                    <div class="col col--md-two">
                                                        @if ($order->payment_method !== 'cod')
                                                        <!-- Kiểm tra nếu không phải COD -->
                                                        <h2>Trạng thái thanh toán</h2>
                                                        <p>
                                                            @if ($order->payment_status === 'pending')
                                                            Đang Chờ
                                                            @elseif ($order->payment_status === 'paid')
                                                            Đã Thanh Toán
                                                            @elseif ($order->payment_status === 'failed')
                                                            Thất Bại
                                                            @else
                                                            {{ $order->payment_status }}
                                                            <!-- Fallback for other statuses -->
                                                            @endif
                                                        </p>
                                                        
                                                        @else
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="section unprintable">
                                            <div class="field__input-btn-wrapper field__input-btn-wrapper--floating">
                                                <a href="/" class="btn btn--large">Tiếp tục mua hàng</a>
                                                <span class="text-icon-group text-icon-group--large icon-print"
                                                    onclick="window.print()">
                                                    In </span>
                                                </span>
                                            </div>
                                        </section>
                                    </div>
                                </article>
                            </div>

                            <div class="main__footer unprintable">
                                <ul class="main__policy">
                                    <li>

                                        <a data-toggle="#refund_term" data-toggle-class="hide">Chính sách hoàn trả</a>

                                    </li>
                                    <li>

                                        <a data-toggle="#privacy_term" data-toggle-class="hide">Chính sách bảo mật</a>

                                    </li>
                                    <li>

                                        <a data-toggle="#service_term" data-toggle-class="hide">Điều khoản sử dụng</a>

                                    </li>
                                </ul>
                                <p></p>
                                <div class="modal-wrapper hide" id="refund_term">
                                    <div class="modal" style="display: inline-block;">
                                        <div class="modal-header">
                                            <h2 class="modal-title">Chính sách hoàn trả</h2>
                                            <span class="close" data-toggle="#refund_term"
                                                data-toggle-class="hide">&times;</span>
                                        </div>
                                        <div class="modal-body">
                                            <pre class="term-preview"> {!! $settings->return_policy !!}      </div>
                                </div>
                            </div>
                            <div class="modal-wrapper hide" id="privacy_term">
                                <div class="modal" style="display: inline-block;">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Chính sách bảo mật</h2>
                                        <span class="close" data-toggle="#privacy_term"
                                            data-toggle-class="hide">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <pre
                                            class="term-preview">  {!! $settings->privacy_policy !!}    </div>
                                </div>
                            </div>
                            <div class="modal-wrapper hide" id="service_term">
                                <div class="modal" style="display: inline-block;">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Điều khoản sử dụng</h2>
                                        <span class="close" data-toggle="#service_term"
                                            data-toggle-class="hide">&times;</span>
                                    </div>
                                    <div class="modal-body">
                                        <pre class="term-preview"> {!! $settings->purchase_guide !!}  </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </main>
                    </div>
                </form>
            </div>
        </body>

    </div>
</div>