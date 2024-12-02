<header id="header" class="header has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="top-bar" class="header-top hide-for-sticky nav-dark flex-has-center">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav nav-left medium-nav-center nav-small  nav-divided"></ul>
                </div>
                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav nav-center nav-small  nav-divided">
                        <li class="html custom html_nav_position_text">07:30 - 20:30 | Thứ Hai - Chủ Nhật</li>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-right">

                </div>
                <div class="flex-col show-for-medium flex-grow">
                    <ul class="nav nav-center nav-small mobile-nav  nav-divided">
                        <li class="html custom html_nav_position_text">07:30 - 20:30 | Thứ Hai - Chủ Nhật</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="masthead" class="header-main show-logo-center hide-for-sticky">
            <div class="header-inner flex-row container logo-center medium-logo-center" role="navigation">
                <div id="logo" class="flex-col logo"><a href="/"
                        title="Hoa Tươi Tứ Quý - Shop Hoa Tươi | Đặt Hoa Online | Giao Hoa Tận Nơi" rel="home">
                        <img width="200" height="90" src="/assets/logo/Asset 6.png"
                            class="header_logo header-logo" alt="Hoa Tươi Tứ Quý" /><img width="200"
                            height="90" src="/assets/logo/Asset 6.png"
                            class="header-logo-dark" alt="Hoa Tươi Tứ Quý" /></a></div>
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="cart-item has-icon"  >

                            <a href="https://tramhoa.com/gio-hang/" class="header-cart-link is-small"
                                title="Giỏ hàng">


                                <i class="icon-shopping-cart"  >
                                </i>
                            </a>


                        </li>


                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-left">
                    <ul
                        class="header-nav header-nav-main nav nav-left  nav-size-xsmall nav-spacing-xlarge nav-uppercase">
                        <li class="header-block">
                            <div class="header-block-block-1">
                                <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1859607507">
                                    <a class="" href="tel:+84853114114">
                                        <div class="img-inner dark" style="margin:20px 0px 20px 0px;">
                                            <img width="312" height="92"
                                                src="/image.png"
                                                class="attachment-original size-original"
                                                alt="Hotline tư vấn đặt hoa nhanh 085 311 4114"
                                                sizes="(max-width: 312px) 100vw, 312px" />
                                        </div>
                                    </a>
                                    <style>
                                        #image_1859607507 {
                                            width: 40%;
                                        }
                                    </style>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-right">
                    <ul
                        class="header-nav header-nav-main nav nav-right  nav-size-xsmall nav-spacing-xlarge nav-uppercase">
                        <li class="cart-item has-icon has-dropdown"><a href="/gio-hang/"
                                class="header-cart-link is-small" title="Giỏ hàng"><i class="icon-shopping-cart"
                                    data-icon-label="{{count($cartItems) }}">
                                </i>
                            </a>
                            @if (count($cartItems) == 0)
                                <ul class="nav-dropdown nav-dropdown-simple">
                                    <li class="html widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <div class="ux-mini-cart-empty flex flex-row-col text-center pt pb">
                                                <div class="ux-mini-cart-empty-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 19"
                                                        style="opacity:.1;height:80px;">
                                                        <path
                                                            d="M8.5 0C6.7 0 5.3 1.2 5.3 2.7v2H2.1c-.3 0-.6.3-.7.7L0 18.2c0 .4.2.8.6.8h15.7c.4 0 .7-.3.7-.7v-.1L15.6 5.4c0-.3-.3-.6-.7-.6h-3.2v-2c0-1.6-1.4-2.8-3.2-2.8zM6.7 2.7c0-.8.8-1.4 1.8-1.4s1.8.6 1.8 1.4v2H6.7v-2zm7.5 3.4 1.3 11.5h-14L2.8 6.1h2.5v1.4c0 .4.3.7.7.7.4 0 .7-.3.7-.7V6.1h3.5v1.4c0 .4.3.7.7.7s.7-.3.7-.7V6.1h2.6z"
                                                            fill-rule="evenodd" clip-rule="evenodd"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <p class="woocommerce-mini-cart__empty-message empty">Chưa có sản
                                                    phẩm trong giỏ hàng.</p>
                                                <p class="return-to-shop">
                                                    <a class="button primary wc-backward"
                                                        href="/cua-hang/">
                                                        Quay trở lại cửa hàng </a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            @else
                                <ul class="nav-dropdown nav-dropdown-simple" style="">
                                    <li class="html widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">

                                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                @foreach ($cartItems as $cartItem)
                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                        <a data-gtm4wp_product_data="{&quot;internal_id&quot;:3169,&quot;item_id&quot;:&quot;B051&quot;,&quot;item_name&quot;:&quot;B\u00ecnh Y\u00ean&quot;,&quot;sku&quot;:&quot;B051&quot;,&quot;price&quot;:600000,&quot;stocklevel&quot;:9937,&quot;stockstatus&quot;:&quot;instock&quot;,&quot;google_business_vertical&quot;:&quot;retail&quot;,&quot;item_category&quot;:&quot;B\u00f3 Hoa T\u01b0\u01a1i&quot;,&quot;item_category2&quot;:&quot;B\u00f3 Hoa H\u1ed3ng&quot;,&quot;id&quot;:&quot;B051&quot;,&quot;item_brand&quot;:&quot;&quot;,&quot;productlink&quot;:&quot;https:\/\/tramhoa.com\/&quot;,&quot;item_variant&quot;:&quot;&quot;}"
                                                            class="remove remove_from_cart_button"
                                                            aria-label="Xóa Bình Yên khỏi giỏ hàng"
                                                            data-product_id="3169" data-product_sku="B051"
                                                            wire:click="removeItem({{ $cartItem['product_id'] }})"
                                                            data-success_message="“Bình Yên” đã bị xóa khỏi giỏ hàng của bạn">×</a>
                                                        <a href="/product/{{ $cartItem['slug'] }}">
                                                            <img width="360" height="450"
                                                                src="{{ Storage::url($cartItem['image']) }}"
                                                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                alt="{{ $cartItem['name'] }}" decoding="async"
                                                                loading="lazy"
                                                                srcset="https://tramhoa.com/wp-content/uploads/2019/12/Bo-Hoa-Tuoi-TH-B051-e1720604033157-360x450.jpg 360w, https://tramhoa.com/wp-content/uploads/2019/12/Bo-Hoa-Tuoi-TH-B051-e1720604033157-510x638.jpg 510w, https://tramhoa.com/wp-content/uploads/2019/12/Bo-Hoa-Tuoi-TH-B051-e1720604033157-240x300.jpg 240w, https://tramhoa.com/wp-content/uploads/2019/12/Bo-Hoa-Tuoi-TH-B051-e1720604033157-819x1024.jpg 819w, https://tramhoa.com/wp-content/uploads/2019/12/Bo-Hoa-Tuoi-TH-B051-e1720604033157-120x150.jpg 120w, https://tramhoa.com/wp-content/uploads/2019/12/Bo-Hoa-Tuoi-TH-B051-e1720604033157-768x961.jpg 768w, https://tramhoa.com/wp-content/uploads/2019/12/Bo-Hoa-Tuoi-TH-B051-e1720604033157.jpg 960w"
                                                                sizes="auto, (max-width: 360px) 100vw, 360px">{{ $cartItem['name'] }}
                                                        </a>
                                                        <div class="ux-mini-cart-qty">
                                                            <span class="quantity">{{ $cartItem['quantity'] }} × <span
                                                                    class="woocommerce-Price-amount amount"><bdi>{{ number_format($cartItem['price']) }}&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">VND</span></bdi></span></span>
                                                        </div>
                                                    </li>
                                                @endforeach

                                            </ul>


                                            <div class="ux-mini-cart-footer">

                                                <p class="woocommerce-mini-cart__total total">
                                                    <strong>Tổng số phụ:</strong> <span
                                                        class="woocommerce-Price-amount amount"><bdi>
                                                            {{ number_format($total_amount) }} &nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">VND</span></bdi></span>
                                                </p>
                                                <p class="woocommerce-mini-cart__buttons buttons"><a href="/gio-hang/"
                                                        class="button wc-forward">Xem
                                                        giỏ hàng</a><a href="/thanh-toan/"
                                                        class="button checkout wc-forward">Thanh toán</a></p>

                                            </div>


                                        </div>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="right" data-bg="main-menu-overlay"
                                data-color="" class="is-small" aria-label="Menu" aria-controls="main-menu"
                                aria-expanded="false"><i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wide-nav" class="header-bottom wide-nav flex-has-center hide-for-medium">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav header-nav header-bottom-nav nav-left  nav-spacing-xlarge nav-uppercase">
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav header-nav header-bottom-nav nav-center  nav-spacing-xlarge nav-uppercase">
                        @foreach ($categories as $category)
                        <li id="menu-item-38354"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-38354 menu-item-design-default {{ $category->subCategories->isNotEmpty() ? 'has-dropdown' : '' }}">
                            <a href="/categories/{{ $category->slug }}" class="nav-top-link"
                                aria-expanded="false" aria-haspopup="menu">{{ $category->name }}
                                @if ($category->subCategories->isNotEmpty())
                                    <i class="icon-angle-down"></i>
                                @endif
                            </a>
                            @if ($category->subCategories->isNotEmpty())
                                <ul class="sub-menu nav-dropdown nav-dropdown-simple">
                                    <li id="menu-item-22021"
                                        class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-22021 nav-dropdown-col">
                                        <ul class="sub-menu nav-column nav-dropdown-simple">
                                            @foreach ($category->subCategories as $subCategory)
                                                <li id="menu-item-31278"
                                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-31278">
                                                    <a href="/categories/{{ $subCategory->slug }}">{{ $subCategory->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-right flex-grow">
                    <ul class="nav header-nav header-bottom-nav nav-right  nav-spacing-xlarge nav-uppercase">
                        <li class="header-search header-search-lightbox has-icon">
                            <a href="#search-lightbox" aria-label="Tìm kiếm" data-open="#search-lightbox"
                                data-focus="input.search-field" class="is-small">
                                <i class="icon-search" style="font-size:16px;"></i></a>
                            <div id="search-lightbox" class="mfp-hide dark text-center">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-large">
                                    <form role="search" method="get" class="searchform" action="/search">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <label class="screen-reader-text"
                                                    for="woocommerce-product-search-field-0">Tìm kiếm:</label>
                                                <input type="search" id="woocommerce-product-search-field-0"
                                                    class="search-field mb-0" placeholder="Nhập từ khóa cần tìm"
                                                    value="" name="s" />
                                                <input type="hidden" name="post_type" value="product" />
                                            </div>
                                            <div class="flex-col">
                                                <button type="submit" value="Tìm kiếm"
                                                    class="ux-search-submit submit-button secondary button  icon mb-0"
                                                    aria-label="Gửi">
                                                    <i class="icon-search"></i> </button>
                                            </div>
                                        </div>
                                        <div class="live-search-results text-left z-top"></div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
    </div>
</header>
