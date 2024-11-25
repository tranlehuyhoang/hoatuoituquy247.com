<div>
    <div>
        @php
        $settings = App\Models\Setting::first(); // Truy vấn model Settings
        @endphp

        <head>
            <title>Giỏ hàng | {{ $settings->web_name}}</title>

            
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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>






            <link rel="preload" as="style" type="text/css"
                href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-carts.scss.css?1721662888170" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-carts.scss.css?1721662888170"
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
                            <strong itemprop="name">Giỏ hàng</strong>
                            <meta itemprop="position" content="2" />
                        </li>

                    </ul>
                </div>
            </section>
            <div class="container white collections-container margin-bottom-20 margin-top-30">
                <div class="white-background">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="shopping-cart">
                                @if (count($cartItems) > 0)
                                <div class="visible-md visible-lg">
                                    <div class="shopping-cart-table">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="lbl-shopping-cart lbl-shopping-cart-gio-hang">Giỏ hàng
                                                    <span>(<span class="count_item_pr">{{ $totalQuantity }}</span> sản
                                                        phẩm)</span>
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-main cart_desktop_page cart-page">
                                                <form id="shopping-cart" action="/cart" method="post" novalidate=""
                                                    class="has-validation-callback">
                                                    <div class="cart page_cart cart_des_page hidden-xs-down">
                                                        <div class="col-xs-9 cart-col-1">
                                                            <div class="cart-tbody">
                                                                @foreach ($cartItems as $item)
                                                                <div
                                                                    class="row shopping-cart-item productid-{{ $item['product_variant_id'] }}">
                                                                    <div class="col-xs-3 img-thumnail-custom">
                                                                        <p class="image">
                                                                            <a href="/product/{{ $item['product_slug'] }}"
                                                                                title="{{ $item['name'] }}"
                                                                                target="_blank">
                                                                                <img class="img-responsive"
                                                                                    src="{{ Storage::url($item['image']) }}"
                                                                                    alt="{{ $item['name'] }}">
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-right col-xs-9">
                                                                        <div class="box-info-product">
                                                                            <p class="name">
                                                                                <a href="/product/{{ $item['product_slug'] }}"
                                                                                    title="{{ $item['name'] }}"
                                                                                    target="_blank">
                                                                                    {{ $item['product_name'] }} | {{
                                                                                    $item['name'] }}
                                                                                </a>
                                                                            </p>
                                                                            <p class="action">
                                                                                <a href="javascript:;"
                                                                                    wire:click="removeItem({{ $item['product_variant_id'] }})"
                                                                                    class="btn btn-link btn-item-delete remove-item-cart"
                                                                                    title="Xóa">Xóa</a>
                                                                            </p>
                                                                        </div>
                                                                        <div class="box-price">
                                                                            <p class="price pricechange">{{
                                                                                number_format($item['price'], 0, ',',
                                                                                '.') }}₫</p>
                                                                        </div>
                                                                        <div class="quantity-block">
                                                                            <div
                                                                                class="input-group bootstrap-touchspin">
                                                                                <div class="input-group-btn">
                                                                                    <input class="variantID"
                                                                                        type="hidden" name="variantId"
                                                                                        value="{{ $item['product_variant_id'] }}">
                                                                                    <button
                                                                                        wire:click="incrementQuantity({{ $item['product_variant_id'] }})"
                                                                                        class="increase_pop items-count btn-plus btn btn-default bootstrap-touchspin-up"
                                                                                        type="button">+</button>
                                                                                    <input type="text" maxlength="12"
                                                                                        min="1"
                                                                                        class="form-control quantity js-quantity-product input-text number-sidebar input_pop qtyItem{{ $item['product_variant_id'] }}"
                                                                                        id="qtyItem{{ $item['product_variant_id'] }}"
                                                                                        name="Lines" size="4"
                                                                                        value="{{ $item['quantity'] }}"
                                                                                        readonly>
                                                                                    <button
                                                                                        wire:click="decrementQuantity({{ $item['product_variant_id'] }})"
                                                                                        class="reduced_pop items-count btn-minus btn btn-default bootstrap-touchspin-down"
                                                                                        type="button">–</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-3 cart-col-2 cart-collaterals cart_submit">
                                                            <div id="right-affix">
                                                                <div class="each-row">
                                                                    <div class="box-style fee">
                                                                        <p class="list-info-price"><span>Tạm
                                                                                tính:</span> <strong
                                                                                class="totals_price price _text-right text_color_right1">{{
                                                                                number_format($totalPrice, 0, ',', '.')
                                                                                }}₫</strong></p>
                                                                    </div>
                                                                    <div class="box-style fee">
                                                                        <div class="total2 clearfix"><span
                                                                                class="text-label">Thành tiền:</span>
                                                                            <div class="amount">
                                                                                <p><strong class="totals_price">{{
                                                                                        number_format($totalPrice, 0,
                                                                                        ',', '.') }}₫</strong></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button
                                                                        class="button btn btn-large btn-block btn-danger btn-checkout evo-button"
                                                                        title="Thanh toán ngay" type="button"
                                                                        onclick="window.location.href='/checkout'">Thanh
                                                                        toán ngay</button>
                                                                    <button
                                                                        class="button btn-proceed-checkout btn btn-large btn-block btn-danger btn-checkouts"
                                                                        title="Tiếp tục mua hàng" type="button"
                                                                        onclick="window.location.href='/shop'">Tiếp tục
                                                                        mua hàng</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="visible-md visible-lg">
                                    <div class="shopping-cart-table">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1 class="lbl-shopping-cart lbl-shopping-cart-gio-hang">Giỏ hàng
                                                    <span>(<span class="count_item_pr">0</span> sản phẩm)</span>
                                                </h1>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="cart-empty">
                                                    <img src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/empty-cart.png?1721662888170"
                                                        class="img-responsive center-block" alt="Giỏ hàng trống">
                                                    <div class="btn-cart-empty">
                                                        <a class="btn btn-default" href="/"
                                                            title="Tiếp tục mua sắm">Tiếp tục mua sắm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="visible-sm visible-xs">
                                    <div class="cart-mobile">
                                        <form action="/cart" method="post" class="margin-bottom-0">
                                            <div class="header-cart">
                                                <div class="title-cart clearfix">
                                                    <h3>Giỏ hàng của bạn</h3>
                                                </div>
                                            </div>
                                            <div class="header-cart-content">
                                                @if (count($cartItems) > 0)
                                                <div class="cart_page_mobile content-product-list">
                                                    @foreach ($cartItems as $item)
                                                    <div
                                                        class="item-product item productid-{{ $item['product_variant_id'] }}">
                                                        <div class="item-product-cart-mobile">
                                                            <a class="product-images1"
                                                                href="/product/{{ $item['product_slug'] }}?variantId={{ $item['product_variant_id'] }}"
                                                                title="{{ $item['name'] }}">
                                                                <img width="80" height="150" alt="{{ $item['name'] }}"
                                                                    src="{{ Storage::url($item['image']) }}">
                                                            </a>
                                                        </div>
                                                        <div class="title-product-cart-mobile">
                                                            <h3>
                                                                <a href="/product/{{ $item['product_slug'] }}?variantId={{ $item['product_variant_id'] }}"
                                                                    title="{{ $item['name'] }}">{{ $item['product_name']
                                                                    }}</a>
                                                            </h3>
                                                            <p>Giá: <span>{{ number_format($item['price'], 0, ',', '.')
                                                                    }}₫</span></p>
                                                        </div>
                                                        <div class="select-item-qty-mobile">
                                                            <div class="txt_center">
                                                                <input class="variantID" type="hidden" name="variantId"
                                                                    value="{{ $item['product_variant_id'] }}">
                                                                <button
                                                                    wire:click="decrementQuantity({{ $item['product_variant_id'] }})"
                                                                    class="reduced items-count btn-minus"
                                                                    type="button">–</button>
                                                                <input type="text" maxlength="12" min="0"
                                                                    class="input-text number-sidebar qtyMobile{{ $item['product_variant_id'] }}"
                                                                    id="qtyMobile{{ $item['product_variant_id'] }}"
                                                                    name="Lines" size="4"
                                                                    value="{{ $item['quantity'] }}" readonly>
                                                                <button
                                                                    wire:click="incrementQuantity({{ $item['product_variant_id'] }})"
                                                                    class="increase items-count btn-plus"
                                                                    type="button">+</button>
                                                            </div>
                                                            <a class="button remove-item remove-item-cart"
                                                                href="javascript:;"
                                                                wire:click="removeItem({{ $item['product_variant_id'] }})"
                                                                data-id="{{ $item['product_variant_id'] }}">Xoá</a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="header-cart-price">
                                                    <div class="title-cart clearfix">
                                                        <h3 class="text-xs-left">Tổng tiền</h3>
                                                        <a class="text-xs-right totals_price_mobile"
                                                            title="{{ number_format($totalPrice, 0, ',', '.') }}₫">{{
                                                            number_format($totalPrice, 0, ',', '.') }}₫</a>
                                                    </div>
                                                    <div class="checkout">
                                                        <button class="btn-proceed-checkout-mobile"
                                                            title="Thanh toán ngay" type="button"
                                                            onclick="window.location.href='/checkout'">Thanh toán
                                                            ngay</button>
                                                        <button class="btn btn-primary btn-proceed-continues-mobile"
                                                            title="Tiếp tục mua hàng" type="button"
                                                            onclick="window.location.href='/shop'">Tiếp tục mua
                                                            hàng</button>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="cart-empty">
                                                    <img src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/empty-cart.png?1721662888170"
                                                        class="img-responsive center-block" alt="Giỏ hàng trống">
                                                    <div class="btn-cart-empty">
                                                        <a class="btn btn-default" href="/"
                                                            title="Tiếp tục mua sắm">Tiếp tục mua hàng</a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



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
                                giỏ
                                hàng thành công
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
                                        tục
                                        mua hàng</button><button class="btn btn-gray margin-top-5"
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
                        Bạn đã
                        thêm <span class="cart-popup-name"></span> vào giỏ hàng</div>
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
                type="text/javascript">
            </script>


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
            window.appbulkmemdeals.customer_id = '16114735';
            </script>
            <div class="appbulk-member-deals" data-customer-id="16114735"></div>











            <div id='sapo-loyalty-rewards-init' class='sapo-loyalty-init'
                data-hmac='5c4a6f87d8906e0cc9403832ed531472d0eb742185304736993a65278ecc0106' data-phone='84981111111'
                data-timestamp='1728826285' data-domain='kicap.vn'
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