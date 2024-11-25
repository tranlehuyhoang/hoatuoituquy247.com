<div>
    @php
    $settings = App\Models\Setting::first(); // Truy vấn model Settings
    @endphp


    <div class="evo-search-bar">
        <form action="/search" method="get">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Bạn cần tìm gì hôm nay?" />
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <button class="site-header__search" title="Đóng tìm kiếm"><svg xmlns="http://www.w3.org/2000/svg" width="26.045"
                height="26.044">
                <g data-name="Group 470">
                    <path
                        d="M19.736 17.918l-4.896-4.896 4.896-4.896a1.242 1.242 0 0 0-.202-1.616 1.242 1.242 0 0 0-1.615-.202l-4.896 4.896L8.127 6.31a1.242 1.242 0 0 0-1.615.202 1.242 1.242 0 0 0-.202 1.615l4.895 4.896-4.896 4.896a1.242 1.242 0 0 0 .202 1.615 1.242 1.242 0 0 0 1.616.202l4.896-4.896 4.896 4.896a1.242 1.242 0 0 0 1.615-.202 1.242 1.242 0 0 0 .202-1.615z"
                        data-name="Path 224" fill="#1c1c1c"></path>
                </g>
            </svg></button>
    </div>
    <header class="header">
        <div style="
     background-color: white;
 ">
            <div class="container" style="
        background-color: #ffffff;
    ">
                <div class="row top-header" style="
            background-color: #ffffff; border-bottom : 1px solid #ffffff;
        ">
                    <div class="col-md-2 col-sm-12 col-xs-12 evo-header-mobile">
                        <button type="button"
                            class="evo-flexitem evo-flexitem-fill navbar-toggle collapsed visible-sm visible-xs"
                            id="trigger-mobile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="black" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </button>
                        <div class="logo evo-flexitem evo-flexitem-fill">
                            <a href="/" class="logo-wrapper" title="Kicap">
                                <img src="{{ Storage::url($settings->logo)}}"
                                    data-lazyload="{{ Storage::url($settings->logo)}}" alt="Kicap"
                                    class="img-responsive center-block" />
                            </a>
                        </div>
                        <div class="evo-flexitem evo-flexitem-fill visible-sm visible-xs">
                            <a href="/cart" title="Giỏ hàng" rel="nofollow" style="color: rgb(0, 0, 0);">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span class="count_item_pr" style="color: white;">{{ $totalQuantity }}</span>
                            </a>
                            <a href="javascript:void(0);" class="site-header-search" rel="nofollow" title="Tìm kiếm"
                                style="color: rgb(0, 0, 0);">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                        stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M21 21L16.65 16.65" stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 left-header hidden-sm hidden-xs">
                        <div class="search-header">
                            <div class="search-smart" style="
                            margin-top: 26px;
                        ">
                                <form action="/search" method="get" class="header-search-form input-group search-bar"
                                    role="search" style="
                                    border: 1px solid;
                                ">
                                    <input type="text" name="query" required=""
                                        class="input-group-field auto-search search-auto form-control"
                                        placeholder="Bạn cần tìm gì..." autocomplete="off">
                                    <input type="hidden" name="type" value="product">
                                    <button type="submit" class="btn icon-fallback-text" aria-label="Tìm kiếm"
                                        title="Tìm kiếm">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path fill="#fff"
                                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                                            </path>
                                        </svg> </button>



                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-12 col-xs-12 right-header hidden-sm hidden-xs">
                        <ul class="justify-end" style="color: black;">
                            <li class="site-nav-item site-nav-account">
                                <a href="tel:{{ $settings->hotline }}" title="Đơn hàng" rel="nofollow"
                                    style="color: black; font-size: 10px; display: flex; flex-direction: row; align-items: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16"
                                        style="margin-right: 5px;">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z">
                                        </path>
                                    </svg>
                                    <span>
                                        Hotline<br>
                                        {{ $settings->hotline }}
                                    </span>
                                </a>
                            </li>
                            <li class="site-nav-item site-nav-account">
                                <a href="/account/orders" title="Đơn hàng" rel="nofollow"
                                    style="color: black; font-size: 10px; display: flex; flex-direction: row; align-items: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" class="bi bi-clipboard2-check" viewBox="0 0 16 16"
                                        style="margin-right: 5px;">
                                        <path
                                            d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z">
                                        </path>
                                        <path
                                            d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z">
                                        </path>
                                        <path
                                            d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3Z">
                                        </path>
                                    </svg>
                                    <span>Đơn hàng <br> của bạn</span>
                                </a>
                            </li>
                            <li class="site-nav-item site-nav-cart mini-cart">
                                <a href="/cart" title="Giỏ hàng" rel="nofollow"
                                    style="color: black; font-size: 10px; display: flex; flex-direction: row; align-items: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16"
                                        style="margin-right: 5px;">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <span>
                                        Giỏ hàng<br>
                                        sản phẩm
                                    </span>
                                    <span class="count_item_pr"
                                        style="color: #ffffff; background-color: black; margin-left: 5px; padding: 2px 5px; border-radius: 50%;">{{
                                        $totalQuantity }}</span>
                                </a>
                                <div class="top-cart-content">
                                    <span class="count_item_pr" style="color: black;"></span>
                                    <!-- Hiển thị tổng số sản phẩm -->

                                    <ul id="cart-sidebar" class="mini-products-list count_li">
                                        @if (count($cartItems) > 0)
                                        <ul class="list-item-cart">
                                            @foreach ($cartItems as $item)
                                            <li class="item productid-{{ $item['product_variant_id'] }}">
                                                <a class="product-image" href="/product/{{ $item['product_slug'] }}"
                                                    title="{{ $item['name'] }}">
                                                    <img alt="{{ $item['name'] }}"
                                                        src="{{ Storage::url($item['image']) }}" width="80">
                                                </a>
                                                <div class="detail-item">
                                                    <div class="product-details">
                                                        <a href="javascript:;"
                                                            wire:click="removeItem({{ $item['product_variant_id'] }})"
                                                            title="Xóa" class="remove-item-cart fa fa-remove"
                                                            style="color: black;">&nbsp;</a>
                                                        <p class="product-name">
                                                            <a href="/product/{{ $item['product_slug'] }}"
                                                                title="{{ $item['name'] }}" style="color: black;">{{
                                                                $item['product_name'] }}</a>
                                                        </p>
                                                    </div>
                                                    <div class="product-details-bottom">
                                                        <span class="price pricechange" style="color: black;">{{
                                                            number_format($item['price'], 0, ',', '.') }}₫</span>
                                                        <div class="quantity-select">
                                                            <input class="variantID" type="hidden" name="variantId"
                                                                value="{{ $item['product_variant_id'] }}">
                                                            <button
                                                                wire:click="decrementQuantity({{ $item['product_variant_id'] }})"
                                                                class="reduced items-count btn-minus" type="button"
                                                                style="color: black;">–</button>
                                                            <input type="text" maxlength="3" min="1"
                                                                class="input-text number-sidebar qty{{ $item['product_variant_id'] }}"
                                                                size="4" value="{{ $item['quantity'] }}" readonly
                                                                style="color: black;">
                                                            <button
                                                                wire:click="incrementQuantity({{ $item['product_variant_id'] }})"
                                                                class="increase items-count btn-plus" type="button"
                                                                style="color: black;">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div>
                                            <div class="top-subtotal" style="color: black;">Tổng cộng: <span
                                                    class="price">{{ number_format($totalPrice, 0, ',', '.') }}₫</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="actions clearfix">
                                                <a href="/checkout" class="btn btn-gray btn-checkout" title="Thanh toán"
                                                    style="color: rgb(255, 255, 255);">
                                                    <span>Thanh toán</span>
                                                </a>
                                                <a href="/cart" class="view-cart btn btn-white margin-left-5"
                                                    title="Giỏ hàng" style="color: rgb(255, 255, 255);">
                                                    <span>Giỏ hàng</span>
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="no-item">
                                            <p style="color: black;">Không có sản phẩm nào trong giỏ hàng.</p>
                                        </div>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <li class="site-nav-item site-nav-account">
                                <a href="/account" title="Tài khoản" rel="nofollow"
                                    style="color: black; font-size: 10px; display: flex; flex-direction: column; align-items: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 40 40"
                                        width="20" height="20" style="fill: black;">
                                        <g id="ic-user">
                                            <g id="_6-User" data-name="6-User">
                                                <g id="Group_18" data-name="Group 18">
                                                    <path id="Path_92" data-name="Path 92" class="cls-1"
                                                        d="M20,22.21a6.12,6.12,0,1,0-6.12-6.12h0A6.13,6.13,0,0,0,20,22.21ZM20,12a4.08,4.08,0,1,1-4.08,4.08A4.08,4.08,0,0,1,20,12Z">
                                                    </path>
                                                    <path id="Path_93" data-name="Path 93" class="cls-1"
                                                        d="M20,4.88A16.31,16.31,0,1,0,36.31,21.19,16.31,16.31,0,0,0,20,4.88Zm0,2A14.25,14.25,0,0,1,31.93,29a15.23,15.23,0,0,0-21.38-2.47A15.66,15.66,0,0,0,8.07,29,14.25,14.25,0,0,1,20,6.92Zm0,28.54A14.24,14.24,0,0,1,9.35,30.65a13.24,13.24,0,0,1,21.3,0A14.24,14.24,0,0,1,20,35.46Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span style="margin-top: 5px;">Tài khoản</span>
                                </a>
                                <ul>
                                    @auth
                                    <li><a rel="nofollow" href="/account" title="Xin chào, {{ Auth::user()->name }}"
                                            style="color: black;">Xin chào, {{ Auth::user()->name }}</a></li>
                                    <li><a rel="nofollow" href="/account/logout" title="Đăng xuất"
                                            style="color: rgb(0, 0, 0);">Đăng xuất</a></li>

                                    @else
                                    <li><a rel="nofollow" href="/account/login" title="Đăng nhập"
                                            style="color: black;">Đăng nhập</a></li>
                                    <li><a rel="nofollow" href="/account/register" title="Đăng ký"
                                            style="color: rgb(0, 0, 0);">Đăng ký</a></li>
                                    @endauth
                                </ul>
                            </li>

                            <li class="site-nav-item site-nav-search" style="display: none;">
                                <a href="javascript:void(0);" class="site-header-search" rel="nofollow"
                                    title="Tìm kiếm"><img width="16px" height="16px"
                                        src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/loupe.svg?1721662888170"
                                        style="filter: invert(0);" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container nav-evo-watch">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <ul id="nav" class="nav">






                        <li class="nav-item  "><a class="nav-link" href="/" title="Trang chủ">Trang chủ</a>
                        </li>






                        @foreach($categories as $category)
                        <li class="nav-item has-childs">
                            <a href="/shop?category={{ $category->slug }}" class="nav-link"
                                title="{{ $category->name }}">
                                {{ $category->name }}
                                @if ($category->subcategories->isNotEmpty())
                                <!-- Kiểm tra xem có subcategories hay không -->
                                <i class="fa fa-angle-down" data-toggle="dropdown"></i>
                                @endif
                            </a>
                            @if ($category->subcategories->isNotEmpty())
                            <ul class="dropdown-menu">
                                @foreach($category->subcategories as $subcategory)
                                <li class="nav-item-lv2">
                                    <a class="nav-link" href="/shop?subcategory={{ $subcategory->slug }}"
                                        title="{{ $subcategory->name }}">
                                        {{ $subcategory->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach


                        <li class="evo-hover-left nav-item has-childs has-mega">
                            <a href="/shop" class="nav-link" title="Sản phẩm">Sản phẩm <i class="fa fa-angle-down"
                                    data-toggle="dropdown"></i></a>

                            <div class="mega-content">
                                <ul class="level0">
                                    @foreach($categories as $category)
                                    @if($category->show_in_header)
                                    <!-- Kiểm tra điều kiện hiển thị -->
                                    <li class="level1 parent item fix-navs">
                                        <a class="hmega" href="/shop?category={{ ( $category->slug) }}"
                                            title="{{ $category->name }}">
                                            {{ strtoupper($category->name) }} <i
                                                class="fa fa-angle-down hidden-lg hidden-md" data-toggle="dropdown"></i>
                                        </a>
                                        @if ($category->subcategories->isNotEmpty())
                                        <ul class="level1">
                                            @foreach($category->subcategories as $subcategory)
                                            <li class="level2">
                                                <a href="/shop?subcategory={{ ( $subcategory->slug) }}"
                                                    title="{{ $subcategory->name }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>







                        <li class="nav-item "><a class="nav-link" href="/blogs" title="Bài viết">Bài viết</a>
                        </li>







                        <li class=" nav-item has-childs ">
                            <a href="/about" class="nav-link" title="Về Chúng Tôi">Về Chúng Tôi <i
                                    class="fa fa-angle-down" data-toggle="dropdown"></i></a>

                            <ul class="dropdown-menu">


                                <li class="nav-item-lv2"><a class="nav-link" href="/about" title="Giới thiệu">Giới
                                        thiệu</a></li>



                                <li class="nav-item-lv2"><a class="nav-link" href="/contact" title="Liên hệ">Liên hệ</a>
                                </li>



                                <li class="nav-item-lv2"><a class="nav-link" href="/chinh-sach-bao-hanh"
                                        title="Chính sách bảo hành">Chính sách bảo hành</a></li>



                                <li class="nav-item-lv2"><a class="nav-link" href="/chinh-sach-doi-tra-hang-hoan-tien"
                                        title="Chính sách đổi trả">Chính sách đổi trả</a></li>



                                <li hidden class="nav-item-lv2"><a class="nav-link" href="/apps/kiem-tra-don-hang"
                                        title="Kiểm tra đơn hàng của bạn">Kiểm tra đơn hàng của bạn</a></li>


                            </ul>

                        </li>



                        @if(Auth::check())
                        <li class="nav-item hidden-lg hidden-md">
                            <a rel="nofollow" href="/account" title="Xin chào, {{ Auth::user()->name }}">Xin chào, {{
                                Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item hidden-lg hidden-md">
                            <a rel="nofollow" href="/account/logout" title="Đăng xuất">Đăng xuất</a>
                        </li>
                        @else
                        <li class="nav-item hidden-lg hidden-md">
                            <a rel="nofollow" href="/account/login" title="Đăng nhập">Đăng nhập</a>
                        </li>
                        <li class="nav-item hidden-lg hidden-md">
                            <a rel="nofollow" href="/account/register" title="Đăng ký">Đăng ký</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <style>
        header.header>.container>.d-flex>* {
            margin: 0 5px;
        }

        header.header .search-smart {
            position: relative;
        }

        header.header .search-smart .header-search-form {
            width: 270px;
        }

        header.header .search-smart .header-search-form {
            position: initial;
            border-radius: 5px;
            overflow: hidden;
            height: 40px;
            width: 350px;
        }

        header.header .search-smart .header-search-form input {
            width: 100%;
            display: block;
            height: 100%;
            padding-right: 80px;
            padding-left: 10px;
            border: 0;
        }

        header.header .search-smart .header-search-form button {
            position: absolute;
            width: 50px;
            height: 100%;
            background: transparent;
            border: 0;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 0;
            right: 0;
            z-index: 999
        }

        header.header .search-smart .header-search-form button svg {
            width: 20px;
            height: 20px;
        }

        header.header .search-smart .header-search-form button svg path {
            fill: #000;
        }

        header.header .top-header .right-header .justify-end .site-nav-item>a {
            font-weight: 500;
            color: #1c1c1c;
            text-transform: inherit;
            letter-spacing: 2px;
            display: block;
            position: relative;
            padding: 0 15px;
            white-space: nowrap;
            line-height: initial;
            font-weight: inherit !important;
        }
        header.header .top-header .right-header .justify-end .site-nav-item>a {
    font-weight: 500;
    color: #1c1c1c;
    text-transform: inherit;
    font-size: 12px !important;
    letter-spacing: 2px;
    display: block;
    position: relative;
    padding: 0 15px;
    white-space: nowrap;
    line-height: initial;
    font-weight: inherit !important;
}
    </style>
</div>