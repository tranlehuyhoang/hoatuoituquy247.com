<div>
    <div>
        @php
        $settings = App\Models\Setting::first(); // Truy vấn model Settings
        @endphp


        <head>
            <title>{{ $post->title }} | {{ $settings->web_name}} </title>

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
                href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-article.scss.css?1721662888170" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-article.scss.css?1721662888170"
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
                            <a itemprop="item" href="/blogs" title="Tin tức">
                                <span itemprop="name">Tin tức</span>
                                <meta itemprop="position" content="2" />
                            </a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <strong itemprop="name">{{ $post->title }}</strong>
                            <meta itemprop="position" content="3" />
                        </li>

                    </ul>
                </div>
            </section>
            <div class="container article-wraper">
                <div class="row">
                    <section class="right-content col-md-12">
                        <article class="article-main" itemscope itemtype="http://schema.org/Article">

                            <meta itemprop="mainEntityOfPage" content="/huong-dan-su-dung-mchose-gx87">
                            <meta itemprop="description" content="">
                            <meta itemprop="author" content="kicap">
                            <meta itemprop="headline" content="{{ $post->title }}">
                            <meta itemprop="image"
                                content="https:https://bizweb.dktcdn.net/100/436/596/articles/5.png?v=1728022305263">
                            <meta itemprop="datePublished" content="21-09-2024">
                            <meta itemprop="dateModified" content="21-09-2024">
                            <div class="hidden" itemprop="publisher" itemscope
                                itemtype="https://schema.org/Organization">
                                <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject"><img
                                        src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/logo.png?1721662888170"
                                        alt="Kicap" />
                                    <meta itemprop="url"
                                        content="https://bizweb.dktcdn.net/100/436/596/themes/834446/assets/logo.png?1721662888170">
                                    <meta itemprop="width" content="200">
                                    <meta itemprop="height" content="49">
                                </div>
                                <meta itemprop="name" content="{{ $post->title }}">
                            </div>
                            <div class="row">
                                <div class="col-md-12 evo-article">
                                    <h1 class="title-head">{{ $post->title }}</h1>

                                    <div class="postby"> {{ $post->created_at }} </div>
                                    <div class="article-details"> {!! $post->description !!} </div>
                                </div>


                                <div class="col-md-12 margin-bottom-10">
                                    <script type="text/javascript"
                                        src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a099baca270babc">
                                    </script>
                                    <div class="addthis_inline_share_toolbox_jje8"></div>
                                </div>

                                <div class="col-md-12">
                                    <div class="evo-article-toolbar">
                                        <div class="evo-article-toolbar-left clearfix">
                                            <span class="evo-article-toolbar-head">Bạn đang xem: </span>
                                            <span class="evo-article-toolbar-title" title="{{ $post->title }}">{{ $post->title }}</span>
                                        </div>
                                        <div class="evo-article-toolbar-right">
                                            @if($previousPost)
                                                <a href="/blog/{{$previousPost->slug ? $previousPost->slug : ''   }}" title="Bài trước">
                                                    <svg class="Icon Icon--select-arrow-left" role="presentation" viewBox="0 0 11 18">
                                                        <path d="M9.5 1.5L1.5 9l8 7.5" stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
                                                    </svg>Bài trước
                                                </a>
                                                <span class="separator"></span>
                                            @endif
                                    
                                            @if($nextPost)
                                                <a href="/blog/{{$nextPost->slug ? $nextPost->slug : ''   }}" title="Bài tiếp theo">
                                                    Bài tiếp theo<svg class="Icon Icon--select-arrow-right" role="presentation" viewBox="0 0 11 18">
                                                        <path d="M1.5 1.5l8 7.5-8 7.5" stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 margin-top-20" hidden>


                                    <div id="article-comments" class="clearfix">
                                        <h5 class="title-form-coment">Bình luận (1 bình luận)</h5>

                                        <div class="article-comment clearfix" id="6805153">
                                            <figure class="article-comment-user-image"><img
                                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                                                    data-lazyload="https://www.gravatar.com/avatar/0891823cfafeb9209fea5436a4092d05?s=55&d=identicon"
                                                    alt="binh-luan" class="block"></figure>
                                            <div class="article-comment-user-comment">
                                                <p class="user-name-comment"><strong>234</strong></p>
                                                <span class="article-comment-date-bull">15/10/2024</span>
                                                <p>234</p>
                                            </div>
                                        </div>

                                    </div>



                                    <form method="post" action="/posts/huong-dan-su-dung-mchose-gx87/comments"
                                        id="article_comments" accept-charset="UTF-8"><input name="FormType"
                                            type="hidden" value="article_comments" /><input name="utf8" type="hidden"
                                            value="true" /><input type="hidden"
                                            id="Token-1e471df1d7f94abd8adf833603cdf692" name="Token" />
                                        <script
                                            src="https://www.google.com/recaptcha/api.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK">
                                        </script>
                                        <script>
                                            grecaptcha.ready(function() {grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {action: "article_comments"}).then(function(token) {document.getElementById("Token-1e471df1d7f94abd8adf833603cdf692").value = token});});
                                        </script>


                                        <div class="form-coment margin-bottom-10">
                                            <h5 class="title-form-coment">VIẾT BÌNH LUẬN CỦA BẠN</h5>
                                            <p>Địa chỉ email của bạn sẽ được bảo mật. Các trường bắt buộc được đánh dấu
                                                <span class="required">*</span></p>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <fieldset class="form-group">
                                                        <label>Nội dung<span class="required">*</span></label>
                                                        <textarea placeholder="Nội dung"
                                                            class="form-control form-control-lg" id="comment"
                                                            name="Body" rows="6" Required
                                                            data-validation-error-msg="Không được để trống"
                                                            data-validation="required"></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <fieldset class="form-group">
                                                        <label>Họ tên<span class="required">*</span></label>
                                                        <input placeholder="Họ tên" type="text"
                                                            class="form-control form-control-lg" value="" id="full-name"
                                                            name="Author" Required
                                                            data-validation-error-msg="Không được để trống"
                                                            data-validation="required" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6">
                                                    <fieldset class="form-group">
                                                        <label>Email<span class="required">*</span></label>
                                                        <input placeholder="Email" type="email"
                                                            class="form-control form-control-lg" value="" id="email"
                                                            name="Email" data-validation="email"
                                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                            data-validation-error-msg="Email sai định dạng" required />
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button type="submit" class="btn btn-blues pull-right">Gửi bình
                                                        luận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </article>
                    </section>
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
	window.appbulkmemdeals.customer_id = 0;
            </script>
            <div class="appbulk-member-deals" data-customer-id="0"></div>


            <div id='sapo-loyalty-rewards-init' class='sapo-loyalty-init' data-domain='kicap.vn'
                data-token-public='eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJzYXBvLWxveWFsdHktc3BlY2lhbCIsInJvbGUiOiJPUEVOX0ZMT0FUSU5HIn0.UWkThCDpyIoGL8bjOwonqakzGcDt1kkj-_8RYJUaGC8'>
                <div class="sapo-rewards-base" style="left: 55px; bottom: 55px;"></div>
            </div>
            <script src="https://loyalty.sapocorp.net/api/loyalty.js?alias=kicap.vn"></script>

            <script
                src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/appbulk-available-notice-variant-change.js?1721662888170"
                type="text/javascript"></script>
        </body>

        </html>
    </div>
</div>