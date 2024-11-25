<div>
    <div>
        @php
        $settings = App\Models\Setting::first(); // Truy vấn model Settings
        @endphp

        <head>
            <title>Trang khách hàng | {{ $settings->web_name}}</title>

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





            <script>
                var Bizweb = Bizweb || {};
	Bizweb.store = 'kicap.mysapo.net';
	Bizweb.id = 436596;
	Bizweb.theme = {"id":834446,"name":"Evo Watch","role":"main"};
	Bizweb.template = 'customers/account';
	if(!Bizweb.fbEventId)  Bizweb.fbEventId = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
	var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
				return v.toString(16);
			});		
            </script>



            <script>
                window.BizwebAnalytics = window.BizwebAnalytics || {};
	window.BizwebAnalytics.meta = window.BizwebAnalytics.meta || {};
	window.BizwebAnalytics.meta.currency = 'VND';
	window.BizwebAnalytics.tracking_url = '/s';

	var meta = {};
	
	
	meta.customer = { "id": 16114723, "first_name": "developer", "last_name": "web",  "phone": "", "email": "2509roblox@gmail.com" };
	
	for (var attr in meta) {
	window.BizwebAnalytics.meta[attr] = meta[attr];
	}
            </script>


            <script src="/kicap.vn/dist/js/stats.min.js?v=96f2ff2"></script>




            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-2XHZMR86T0"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2XHZMR86T0');
            </script>
            <script>
                window.enabled_enhanced_ecommerce = true;

            </script>




            <!--Facebook Pixel Code-->
            <script>
                !function(f, b, e, v, n, t, s){
	if (f.fbq) return; n = f.fbq = function(){
	n.callMethod?
	n.callMethod.apply(n, arguments):n.queue.push(arguments)}; if (!f._fbq) f._fbq = n;
	n.push = n; n.loaded = !0; n.version = '2.0'; n.queue =[]; t = b.createElement(e); t.async = !0;
	t.src = v; s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s)}
	(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '148789000604214', { em: '2509roblox@gmail.com',fn:'developer',ln:'web',external_id:'16114723'} , {'agent': 'plsapo'}); // Insert your pixel ID here.
	fbq('track', 'PageView',{},{ eventID: Bizweb.fbEventId });
	
            </script>
            <noscript>
                <img height='1' width='1' style='display:none'
                    src='https://www.facebook.com/tr?id=148789000604214&ev=PageView&noscript=1' />
            </noscript>
            <!--DO NOT MODIFY-->
            <!--End Facebook Pixel Code-->




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
                            <strong itemprop="name">Trang khách hàng</strong>
                            <meta itemprop="position" content="2" />
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
                            <h1 class="title-head margin-top-10">Thông tin tài khoản</h1>
                            <div class="form-signup name-account m992">
                                <p><strong>Họ tên:</strong> @if(Auth::check())
                                    {{ Auth::user()->name }}
                                    @else

                                    @endif</p>
                                <p> <strong>Email:</strong> @if(Auth::check())
                                    {{ Auth::user()->email }}
                                    @else

                                    @endif</p>



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
                data-hmac='1c14560766b7727688e56189ed6158970d16fa161499189563ae03642b53d727' data-phone=''
                data-timestamp='1728980671' data-domain='kicap.vn'
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