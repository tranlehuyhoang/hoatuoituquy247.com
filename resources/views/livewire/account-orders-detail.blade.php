<div>
    <div>
        @php
        $settings = App\Models\Setting::first(); // Truy vấn model Settings
        @endphp
        <head>
            <title>Chi tiết đơn hàng | {{ $settings->web_name}}</title>
            <script src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/iwishheader.js?1721662888170"
                type="text/javascript"></script>
            <link rel="preload" as="style" type="text/css"
                href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/bootstrap.scss.css?1721662888170"
                onload="this.rel='stylesheet'" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/bootstrap.scss.css?1721662888170"
                rel="stylesheet" type="text/css" media="all" />
            <link rel="preload" as="style" type="text/css"
                href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-watch.scss.css?1721662888170"
                onload="this.rel='stylesheet'" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-watch.scss.css?1721662888170"
                rel="stylesheet" type="text/css" media="all" />
            <link rel="preload" as="style" type="text/css"
                href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-accounts.scss.css?1721662888170" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-accounts.scss.css?1721662888170"
                rel="stylesheet" type="text/css" media="all" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/account_order_style.scss.css?1721662888170"
                rel="stylesheet" type="text/css" media="all" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/iwish.css?1721662888170" rel="stylesheet"
                type="text/css" media="all" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/appbulk-available-notice.css?1721662888170"
                rel="stylesheet" type="text/css" media="all" />
        </head>
        <body class="bg-body">
            @livewire('inc.header')
            <link rel="preload" as="script"
                href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/api-jquery.js?1721662888170" />
            <script src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/api-jquery.js?1721662888170"
                type="text/javascript"></script>

            <section class="bread-crumb margin-bottom-10">
                <div class="container">
                    <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                        <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="/" title="Trang chủ">
                                <span itemprop="name">Trang chủ</span>
                                <meta itemprop="position" content="1" />
                            </a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>

                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="/account" title="Trang Tài khoản">
                                <span itemprop="name">Trang Tài khoản</span>
                                <meta itemprop="position" content="2" />
                            </a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <strong itemprop="name">Chi tiết đơn hàng</strong>
                            <meta itemprop="position" content="3" />
                        </li>

                    </ul>
                </div>
            </section>
            <section class="login page_order">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                            @livewire('inc.block-account')
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-9">
                            <div class="head-title clearfix">
                                <h1>Chi tiết đơn hàng {{ $order->order_code }}</h1>
                                <span class="note order_date">
                                    Ngày đặt hàng: {{ $order->created_at->format('d/m/Y H:i') }}
                                </span>
                            </div>
                            
                            <!-- Trạng thái thanh toán -->
                            <div class="payment_status">
                                <span class="note">Trạng thái thanh toán:</span>
                                <i class="status_pending">
                                    <em>
                                        <span class="span_pending" style="color: {{ $order->payment_status == 'paid' ? 'green' : 'red' }}">
                                            <strong><em>{{ $order->payment_status == 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán' }}</em></strong>
                                        </span>
                                    </em>
                                </i>
                            </div>
                            
                            <!-- Trạng thái đơn hàng -->
                            @php
                                $statusMap = [
                                    'new' => 'Mới',
                                    'processing' => 'Đang Xử Lý',
                                    'shipped' => 'Đã Gửi',
                                    'delivered' => 'Đã Giao',
                                    'cancelled' => 'Đã Hủy'
                                ];
                            @endphp
                            <div class="shipping_status">
                                <span class="note">Trạng thái đơn hàng:</span>
                                <span class="span_" style="color: 
                                    {{ $order->status === 'delivered' ? 'green' : 
                                    ($order->status === 'cancelled' ? 'red' : 
                                    ($order->status === 'processing' ? 'orange' : 'black')) }}">
                                    <strong><em>{{ $statusMap[$order->status] ?? 'Không xác định' }}</em></strong>
                                </span>
                            </div>
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 body_order">
                                    <div class="box-address">
                                        <h2 class="title-head">Địa chỉ giao hàng</h2>
                                        <div class="address box-des">
                                            <p><strong>{{ $shippingAddress->full_name }}</strong></p>
                                            <p>Địa chỉ: {{ $shippingAddress->detailed_address }}, {{ $shippingAddress->ward }}, {{ $shippingAddress->district }}, {{ $shippingAddress->province }}</p>
                                            <p>Số điện thoại: {{ $shippingAddress->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 body_order">
                                    <div class="box-address">
                                        <h2 class="title-head">Thanh toán</h2>
                                        <div class="box-des">
                                            <p>
                                                @if ($order->payment_method === 'cod')
                                                    Thanh toán khi giao hàng (COD)
                                                @elseif ($order->payment_method === 'bank')
                                                    Thanh toán qua ngân hàng
                                                @else
                                                    {{ $order->payment_method }}
                                                    <!-- Fallback cho các phương thức khác -->
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 body_order">
                                    <div class="box-address">
                                        <h2 class="title-head">Ghi chú</h2>
                                        <div class="box-des">
                                            <p>{{ $order->notes ?? 'Không có ghi chú' }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Phương thức vận chuyển và tiền vận chuyển -->
                                <div class="col-xs-12 col-sm-12 col-md-12 margin-top-20">
                                    <div class="shipping-info">
                                        <h2 class="title-head">Thông tin vận chuyển</h2>
                                        <p>Phương thức vận chuyển: 
                                            <strong>{{ $order->shipping_method === 'in_store_pickup' ? 'Nhận tại cửa hàng' : ($order->shipping_method === 'home_delivery' ? 'Giao hàng tận nơi' : 'Chưa xác định') }}</strong>
                                        </p>
                                        <p>Tiền vận chuyển: <strong>{{ number_format($order->shipping_amount, 0, ',', '.') }}₫</strong></p>
                                    </div>
                                </div>
                        
                                <div class="col-xs-12 col-sm-12 col-md-12 margin-top-20">
                                    <div class="table-order">
                                        <div class="table-responsive table_mobile">
                                            <table id="order_details" class="table table-cart">
                                                <thead class="thead-default">
                                                    <tr>
                                                        <th>Sản phẩm</th>
                                                        <th>Đơn giá</th>
                                                        <th>Số lượng</th>
                                                        <th>Tổng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orderItems as $item)
                                                        <tr>
                                                            <td class="link" data-title="Tên">
                                                                <div class="image_order">
                                                                    <a title="{{ $item->product_variant->product->name }}" href="/product/{{ $item->product_variant->product->slug }}">
                                                                        <img src="{{ Storage::url($item->product_variant->image) }}" alt="" />
                                                                    </a>
                                                                </div>
                                                                <div class="content_right">
                                                                    <a class="title_order" href="/product/{{ $item->product_variant->product->slug }}" title="{{ $item->product_variant->product->name }}">
                                                                        {{ $item->product_variant->product->name }}
                                                                    </a>
                                                                    <p style="color:#828282;font-size:12px;">{{ $item->product_variant->name }}</p>
                                                                    <p class="sku_order">Mã sản phẩm: {{ $item->product_variant->sku }}</p>
                                                                </div>
                                                            </td>
                                                            <td data-title="Giá" class="numeric">{{ number_format($item->unit_amount, 0, ',', '.') }}₫</td>
                                                            <td data-title="Số lượng" class="numeric">{{ $item->quantity }}</td>
                                                            <td data-title="Tổng" class="numeric">{{ number_format($item->unit_amount * $item->quantity, 0, ',', '.') }}₫</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                        
                                        <table class="table totalorders">
                                            <tfoot>
                                                <tr class="order_summary discount">
                                                    <td>Khuyến mại</td>
                                                    <td class="total money right">0₫</td>
                                                </tr>
                                        
                                                <tr class="order_summary shipping_fee">
                                                    <td>Phí vận chuyển</td>
                                                    <td class="total money right">
                                                        <strong>{{ number_format($order->shipping_amount, 0, ',', '.') }}₫</strong>
                                                    </td>
                                                </tr>
                                        
                                                <tr class="order_summary order_total">
                                                    <td>Tổng tiền</td>
                                                    <td class="right">
                                                        <strong>
                                                            {{ number_format($orderItems->sum(function($item) { return $item->unit_amount * $item->quantity; }) + $order->shipping_amount, 0, ',', '.') }}₫
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>



            @livewire('inc.footer')

            <div class="backdrop__body-backdrop___1rvky"></div>
            <link rel="preload" as="script"
                href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js" />
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"
                type="text/javascript"></script>
            <script>
                $.validate({});
            </script>
            <div class="ajax-load">
                <span class="loading-icon">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" width="24px" height="30px" viewBox="0 0 24 30"
                        style="enable-background:new 0 0 50 50;" xml:space="preserve">
                        <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s"
                                repeatCount="indefinite" />
                        </rect>
                        <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s"
                                repeatCount="indefinite" />
                        </rect>
                        <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s"
                                repeatCount="indefinite" />
                        </rect>
                    </svg>
                </span>
            </div>
            <div class="loading awe-popup">
                <div class="overlay"></div>
                <div class="loader" title="2">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" width="24px" height="30px" viewBox="0 0 24 30"
                        style="enable-background:new 0 0 50 50;" xml:space="preserve">
                        <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s"
                                repeatCount="indefinite" />
                        </rect>
                        <rect x="8" y="10" width="4" height="10" fill="#333" opacity="0.2">
                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s"
                                repeatCount="indefinite" />
                        </rect>
                        <rect x="16" y="10" width="4" height="10" fill="#333" opacity="0.2">
                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s"
                                dur="0.6s" repeatCount="indefinite" />
                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s"
                                repeatCount="indefinite" />
                        </rect>
                    </svg>
                </div>
            </div>
            <div class="addcart-popup product-popup awe-popup">
                <div class="overlay no-background"></div>
                <div class="content">
                    <div class="row row-noGutter">
                        <div class="col-xl-6 col-xs-12">
                            <div class="btn btn-full btn-primary a-left popup-title"><i class="fa fa-check"></i>Thêm vào
                                giỏ hàng thành công
                            </div>
                            <a href="javascript:void(0)" class="close-window close-popup"><i
                                    class="fa fa-close"></i></a>
                            <div class="info clearfix">
                                <div class="product-image margin-top-5"><img alt="popup"
                                        src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/logo.png?1721662888170"
                                        style="max-width:150px; height:auto" /></div>
                                <div class="product-info">
                                    <p class="product-name"></p>
                                    <p class="quantity color-main"><span>Số lượng: </span></p>
                                    <p class="total-money color-main"><span>Tổng tiền: </span></p>
                                </div>
                                <div class="actions"><button class="btn  btn-primary  margin-top-5 btn-continue">Tiếp
                                        tục mua hàng</button><button class="btn btn-gray margin-top-5"
                                        onclick="window.location='/cart'">Kiểm tra giỏ hàng</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="error-popup awe-popup">
                <div class="overlay no-background"></div>
                <div class="popup-inner content">
                    <div class="error-message"></div>
                </div>
            </div>

            <div id="popup-cart" class="modal fade" role="dialog">
                <div id="popup-cart-desktop" class="clearfix">
                    <div class="title-popup-cart"><i class="ion ion-md-notifications-outline" aria-hidden="true"></i>
                        Bạn đã thêm <span class="cart-popup-name"></span> vào giỏ hàng</div>
                    <div class="title-quantity-popup"><a href="/cart" title="Giỏ hàng của bạn">Giỏ hàng của bạn có <span
                                class="cart-popup-count"></span> sản phẩm</a></div>
                    <div class="content-popup-cart clearfix">
                        <div class="thead-popup">
                            <div style="width: 55%;" class="text-left">Sản phẩm</div>
                            <div style="width: 15%;" class="text-center">Đơn giá</div>
                            <div style="width: 15%;" class="text-center">Số lượng</div>
                            <div style="width: 15%;" class="text-center">Thành tiền</div>
                        </div>
                        <div class="tbody-popup"></div>
                        <div class="tfoot-popup">
                            <div class="tfoot-popup-1 clearfix">
                                <div class="pull-left popupcon"><a class="button btn-continue" title="Tiếp tục mua hàng"
                                        onclick="$('#popup-cart').modal('hide');"><span><span><i
                                                    class="fa fa-caret-left" aria-hidden="true"></i> Tiếp tục mua
                                                hàng</span></span></a></div>
                                <div class="pull-right popup-total">
                                    <p>Thành tiền: <span class="total-price"></span></p>
                                </div>
                            </div>
                            <div class="tfoot-popup-2 clearfix"><a class="button btn-proceed-checkout"
                                    title="Thanh toán đơn hàng" href="/checkout"><span>Thanh toán đơn hàng</span></a>
                            </div>
                        </div>
                    </div>
                    <a class="quickview-close close-window" href="javascript:;"
                        onclick="$('#popup-cart').modal('hide');" title="Đóng"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div id="myModal" class="modal fade" role="dialog"></div>
            <link rel="preload" as="script"
                href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/main.js?1721662888170" />
            <script src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/main.js?1721662888170"
                type="text/javascript"></script>


            <script type="text/javascript">
                WebFontConfig = {
				custom: {
					families: ['FontAwesome'],
					urls: ['https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css']
				}
			};
			(function() {
				var wf = document.createElement('script');
				wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
				wf.type = 'text/javascript';
				wf.async = 'true';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(wf, s);
			})();
            </script>
            <script>
                gtag('config', 'AW-10776751317');
            </script>

            <script src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/iwish.js?1721662888170"
                type="text/javascript"></script><script type="text/javascript">
                window.appbulkmemdeals = window.appbulkmemdeals || {};
	window.appbulkmemdeals.customer_id = '16114723';
            </script>
            <div class="appbulk-member-deals" data-customer-id="16114723"></div>
            <div id='sapo-loyalty-rewards-init' class='sapo-loyalty-init'
                data-hmac='a2d19c21f09da692c9d4af979065621cdc63069c6e9e86de6a1d606654c4a17b' data-phone=''
                data-timestamp='1728980909' data-domain='kicap.vn'
                data-token-public='eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJzYXBvLWxveWFsdHktc3BlY2lhbCIsInJvbGUiOiJPUEVOX0ZMT0FUSU5HIn0.UWkThCDpyIoGL8bjOwonqakzGcDt1kkj-_8RYJUaGC8'>
                <div class="sapo-rewards-base" style="left: 55px; bottom: 55px;"></div>
            </div>
            <script src="https://loyalty.sapocorp.net/api/loyalty.js?alias=kicap.vn"></script>

            <script
                src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/appbulk-available-notice-variant-change.js?1721662888170"
                type="text/javascript"></script>
        </body>

    </div>
</div>