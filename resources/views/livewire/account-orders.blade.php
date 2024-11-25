<div>
    <div>
        @php
        $settings = App\Models\Setting::first(); // Truy vấn model Settings
        @endphp

        <head>
            <title>Trang đơn hàng | {{ $settings->web_name}}</title>

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
                            <strong itemprop="name">Trang đơn hàng</strong>
                            <meta itemprop="position" content="3" />
                        </li>

                    </ul>
                </div>
            </section>
            <section class="signup page_customer_account">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                            @livewire('inc.block-account')
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                            <h1 class="title-head margin-top-0">Đơn hàng của bạn</h1>
                            <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">

                                <div class="my-account">
                                    <div class="dashboard">

                                        <div class="recent-orders">
                                            <div class="table-responsive tab-all">
                                                <table class="table table-cart table-order" id="my-orders-table">
                                                    <thead class="thead-default">
                                                        <tr>
                                                            <th>Đơn hàng</th>
                                                            <th>Ngày</th>
                                                            <th>Địa chỉ</th>
                                                            <th>Giá trị đơn hàng</th>
                                                            <th>Phương thức vận chuyển</th> <!-- Thêm cột phương thức vận chuyển -->
                                                            <th>Trang thái đơn hàng</th>
                                                            <th>Trang thái thanh toán</th>
                                                            <th>Phí vận chuyển</th> <!-- Thêm cột phí vận chuyển -->
                                                        </tr>
                                                    </thead>
                                                
                                                    <tbody>
                                                        @if($orders->isEmpty())
                                                        <tr>
                                                            <td colspan="8" class="text-center">Không có đơn hàng nào.</td> <!-- Cập nhật số cột cho đúng -->
                                                        </tr>
                                                        @else
                                                        @foreach($orders as $order)
                                                        <tr class="odd">
                                                            <td>
                                                                <a href="/account/orders/{{ $order->order_code }}" title="">{{ $order->order_code }}</a>
                                                            </td>
                                                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                                            <td>
                                                                @if($order->address)
                                                                {{ $order->address->detailed_address }}, {{ $order->address->ward }}, {{ $order->address->district }}, {{ $order->address->province }}<br>
                                                                @else
                                                                Chưa có địa chỉ
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="price">{{ number_format($order->grand_total, 0, ',', '.') }}₫</span>
                                                            </td>
                                                            @php
                                                            $paymentStatusMap = [
                                                                'new' => 'Đang Chờ',
                                                                'pending' => 'Đang Chờ',
                                                                'paid' => 'Đã Thanh Toán',
                                                                'failed' => 'Thất Bại',
                                                                'processing' => 'Đang Xử Lý',
                                                                'shipped' => 'Đã Gửi',
                                                                'delivered' => 'Đã Giao',
                                                                'cancelled' => 'Đã Hủy',
                                                            ];
                                                            @endphp
                                                
                                                            <td>
                                                                <span class="span_pending">{{ $paymentStatusMap[$order->payment_status] ?? ucfirst($order->payment_status) }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="span_">{{ $paymentStatusMap[$order->status] ?? ucfirst($order->status) }}</span>
                                                            </td>
                                                            <td>
                                                                <span class="shipping-method">
                                                                    @if($order->shipping_method === 'in_store_pickup')
                                                                        Nhận tại cửa hàng
                                                                    @elseif($order->shipping_method === 'home_delivery')
                                                                        Giao hàng tận nơi
                                                                    @else
                                                                        Chưa xác định
                                                                    @endif
                                                                </span> <!-- Hiển thị phương thức vận chuyển -->
                                                            </td>
                                                            
                                                            <td>
                                                                <span class="shipping-cost">{{ number_format($order->shipping_amount, 0, ',', '.') }}₫</span> <!-- Hiển thị phí vận chuyển -->
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                                

                                            </div>

                                            <div
                                                class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                            </div>
                                        </div>
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
                data-hmac='1b6c4fa0723f7ccabd5c60a6c2871a590704a0169a30adfe617e4e7a32136a02' data-phone=''
                data-timestamp='1728980777' data-domain='kicap.vn'
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