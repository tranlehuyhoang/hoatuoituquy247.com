<div>
    @php
    $settings = App\Models\Setting::first(); // Truy vấn model Settings
    @endphp
    <div class="floating-labels">

        <head>
            <title> Thanh toán đơn hàng</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />

            <link rel="stylesheet" href="/kicap.vn/dist/css/checkout.vendor.min.css?v=4fcd86c">


            <link rel="stylesheet" href="/kicap.vn/dist/css/checkout.min.css?v=f6401e8">


            <script src="/bizweb.dktcdn.net/assets/themes_support/libphonenumber-v3.2.30.min.js?1721662888170"></script>

            <script src="/kicap.vn/dist/js/checkout.vendor.min.js?v=11006c9"></script>



            <script src="/kicap.vn/dist/js/checkout.min.js?v=4cdb0f8"></script>






            <script src="/kicap.vn/dist/js/stats.min.js?v=96f2ff2"></script>


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
            <aside>
                <button class="order-summary-toggle" data-toggle="#order-summary"
                    data-toggle-class="order-summary--is-collapsed">
                    <span class="wrap">
                        <span class="order-summary-toggle__inner">
                            <span class="order-summary-toggle__text expandable">
                                Đơn hàng ({{ count($cartItems) }} sản phẩm)

                            </span>
                            <span class="order-summary-toggle__total-recap" >
                                {{ number_format($total, 0, ',', '.') }}₫
                            </span>
                        </span>
                    </span>
                </button>
            </aside>




            <div data-tg-refresh="checkout" id="checkout" class="content">
                <form id="checkoutForm" wire:submit.prevent="placeOrder">
                    <input type="hidden" name="_method" value="patch" />
                    <div class="wrap">
                        <main class="main">
                            <header class="main__header">
                                <div class="logo logo--left">

                                    <h1 class="shop__name">
                                        <a href="/"><img src="{{ Storage::url($settings->logo) }}" width="150px" alt=""></a>
                                    </h1>

                                </div>
                            </header>
                            <div class="main__content">
                                <form wire:submit.prevent="placeOrder">
                                    <article class="animate-floating-labels row">
                                        <div class="col col--two">
                                            <section class="section">
                                                <div class="section__header">
                                                    <div class="layout-flex">
                                                        <h2
                                                            class="section__title layout-flex__item layout-flex__item--stretch">
                                                            <i
                                                                class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop"></i>
                                                            Thông tin nhận hàng
                                                        </h2>
                                                        <a
                                                            href="/account/logout?returnUrl=/checkout/cdda837f6a9143b791aacef24d217230">
                                                            <i class="fa fa-sign-out fa-lg"></i>
                                                            <span>Đăng xuất</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="section__content">
                                                    <div class="fieldset">
                                                        <!-- Email Field -->
                                                        <div class="field field--show-floating-label field--disabled">
                                                            <input name="email" type="hidden" value="2@gmail.com">
                                                            <div class="field__input-wrapper">
                                                                <label for="email" class="field__label">Email</label>
                                                                @if(auth()->check())
                                                                <p class="field__input">{{ auth()->user()->email }}</p>
                                                                @else
                                                                <input id="email" type="email" class="field__input"
                                                                    wire:model="shippingAddress.email"
                                                                    placeholder="Nhập email của bạn" required>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <!-- Other Shipping Address Fields -->
                                                        <div class="field field--show-floating-label">
                                                            <div class="field__input-wrapper">
                                                                <input type="text" name="billingFullName"
                                                                    id="billingFullName" class="field__input"
                                                                    placeholder="Nhập họ và tên"
                                                                    wire:model="shippingAddress.full_name" required>
                                                                <label for="billingFullName" class="field__label">Họ và
                                                                    tên</label>
                                                            </div>
                                                        </div>

                                                        <div class="field field--show-floating-label">
                                                            <div class="field__input-wrapper">
                                                                <input type="tel" name="billingPhone" id="billingPhone"
                                                                    class="field__input" placeholder="Nhập số điện thoại"
                                                                    wire:model="shippingAddress.phone" required>
                                                                <label for="billingPhone" class="field__label">Số điện
                                                                    thoại</label>
                                                            </div>
                                                        </div>

                                                        <div class="field field--show-floating-label">
                                                            <div class="field__input-wrapper">
                                                                <input type="text" name="billingDetailedAddress"
                                                                    id="billingDetailedAddress" class="field__input"
                                                                    placeholder="Nhập địa chỉ chi tiết"
                                                                    wire:model="shippingAddress.detailed_address" required>
                                                                <label for="billingDetailedAddress" class="field__label">Địa
                                                                    chỉ</label>
                                                            </div>
                                                        </div>

                                                        <div class="field field--show-floating-label">
                                                            <div class="field__input-wrapper">
                                                                <input type="text" name="billingProvince"
                                                                    id="billingProvince" class="field__input"
                                                                    placeholder="Nhập tỉnh thành"
                                                                    wire:model="shippingAddress.province" required>
                                                                <label for="billingProvince" class="field__label">Tỉnh
                                                                    thành</label>
                                                            </div>
                                                        </div>

                                                        <div class="field field--show-floating-label">
                                                            <div class="field__input-wrapper">
                                                                <input type="text" name="billingDistrict"
                                                                    id="billingDistrict" class="field__input"
                                                                    placeholder="Nhập quận huyện"
                                                                    wire:model="shippingAddress.district" required>
                                                                <label for="billingDistrict" class="field__label">Quận
                                                                    huyện</label>
                                                            </div>
                                                        </div>

                                                        <div class="field field--show-floating-label">
                                                            <div class="field__input-wrapper">
                                                                <input type="text" name="billingWard" id="billingWard"
                                                                    class="field__input" placeholder="Nhập phường xã"
                                                                    wire:model="shippingAddress.ward" required>
                                                                <label for="billingWard" class="field__label">Phường
                                                                    xã</label>
                                                            </div>
                                                        </div>

                                                        <div class="field field--show-floating-label">
                                                            <div class="field__input-wrapper">
                                                                <textarea name="billingNote" id="billingNote"
                                                                    class="field__input"
                                                                    placeholder="Nhập ghi chú tại đây..."
                                                                    wire:model="note"></textarea>
                                                                <label for="billingNote" class="field__label">Ghi chú (tùy
                                                                    chọn)</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col col--two">
                                            <!-- Shipping Method Section -->
                                            <section class="section" data-define="{shippingMethod: '641833_0,30.000 VND'}">
                                                <div class="section__header">
                                                    <div class="layout-flex">
                                                        <h2
                                                            class="section__title layout-flex__item layout-flex__item--stretch">
                                                            <i
                                                                class="fa fa-truck fa-lg section__title--icon hide-on-desktop"></i>
                                                            Vận chuyển <br>
                                                            <p style="margin: 0"> (Free ship đơn hàng trên 800.000₫)</p>
                                                        </h2>
                                                    </div>
                                                </div>
                                                <div class="section__content" data-tg-refresh="refreshShipping"
                                                    id="shippingMethodList"
                                                    data-define="{isAddressSelecting: false, shippingMethods: []}">
                                                    <div class="alert alert--loader spinner spinner--active hide"
                                                        data-bind-show="isLoadingShippingMethod">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                            <use href="#spinner"></use>
                                                        </svg>
                                                    </div>

                                                    <div class="alert alert-retry alert--danger hide"
                                                        data-bind-event-click="handleShippingMethodErrorRetry()"
                                                        data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; isLoadingShippingError">
                                                        <span data-bind="loadingShippingErrorMessage">Không thể load phí vận
                                                            chuyển. Vui lòng thử lại</span> <i class="fa fa-refresh"></i>
                                                    </div>

                                                    <div class="content-box"
                                                        data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; !isLoadingShippingError">

                                                        <!-- Shipping Method Option 1 -->
                                                        <div class="content-box__row"
                                                            data-define-array="{shippingMethods: {name: '641833_0,30.000 VND', textPriceFinal: '30.000₫', textPriceOriginal: '', subtotalPriceWithShippingFee: '34.000₫'}}">
                                                            <div class="radio-wrapper">
                                                                <div class="radio__input">
                                                                    <input type="radio" class="input-radio"
                                                                        name="shippingMethod" id="shippingMethod-641833_0"
                                                                        value="home_delivery"
                                                                        wire:model.live="shipping_method">
                                                                </div>
                                                                <label for="shippingMethod-641833_0" class="radio__label">
                                                                    <span class="radio__label__primary">
                                                                        <span>Giao hàng tận nơi</span>
                                                                    </span>
                                                                    <span class="radio__label__accessory">
                                                                        <span class="content-box__emphasis price">
                                                                            30.000₫
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <!-- Shipping Method Option 2 -->
                                                        <div class="content-box__row"
                                                            data-define-array="{shippingMethods: {name: '689123_0,0 VND', textPriceFinal: 'Miễn phí', textPriceOriginal: '', subtotalPriceWithShippingFee: '4.000₫'}}">
                                                            <div class="radio-wrapper">
                                                                <div class="radio__input">
                                                                    <input type="radio" class="input-radio"
                                                                        name="shippingMethod" id="shippingMethod-689123_0"
                                                                        value="in_store_pickup"
                                                                        wire:model.live="shipping_method">
                                                                </div>
                                                                <label for="shippingMethod-689123_0" class="radio__label">
                                                                    <span class="radio__label__primary">
                                                                        <span>Nhận tại cửa hàng</span>
                                                                    </span>
                                                                    <span class="radio__label__accessory">
                                                                        <span class="content-box__emphasis price">
                                                                            Miễn phí
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="alert alert--info hide"
                                                        data-bind-show="!isLoadingShippingMethod &amp;&amp; isAddressSelecting">
                                                        Vui lòng nhập thông tin giao hàng
                                                    </div>
                                                </div>
                                            </section>

                                            <!-- Payment Section -->
                                            <section class="section">
                                                <div class="section__header">
                                                    <div class="layout-flex">
                                                        <h2
                                                            class="section__title layout-flex__item layout-flex__item--stretch">
                                                            <i
                                                                class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop"></i>
                                                            Thanh toán
                                                        </h2>
                                                    </div>
                                                </div>
                                                <div class="section__content">

                                                    <div class="content-box" data-define="{paymentMethod: undefined}">
                                                        <div class="content-box__row">
                                                            <div class="radio-wrapper">
                                                                <div class="radio__input">
                                                                    <input checked name="paymentMethod" id="paymentMethod-560170" type="radio" class="input-radio" wire:model.live="paymentMethod" value="bank" data-provider-id="26" onclick="toggleDescription();">
                                                                </div>
                                                                <label for="paymentMethod-560170" class="radio__label">
                                                                    <span class="radio__label__primary">Thanh toán qua VietQR</span>
                                                                    <span class="radio__label__accessory">
                                                                        <span class="radio__label__icon">
                                                                            <i class="payment-icon payment-icon--26"></i>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="content-box__row">
                                                            <div class="radio-wrapper">
                                                                <div class="radio__input">
                                                                    <input name="paymentMethod" id="paymentMethod-514821" type="radio" class="input-radio" wire:model.live="paymentMethod" value="cod" data-provider-id="4" onclick="toggleDescription();">
                                                                </div>
                                                                <label for="paymentMethod-514821" class="radio__label">
                                                                    <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                                                                    <span class="radio__label__accessory">
                                                                        <span class="radio__label__icon">
                                                                            <i class="payment-icon payment-icon--4"></i>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                    
                                                            <div class="content-box__row__desc" id="cod-description" style="display: {{ $paymentMethod == 'cod' ? 'block' : 'none' }};">
                                                                <p>Bạn chỉ phải thanh toán khi nhận được hàng</p>
                                                                <p>Vui lòng thanh toán cọc 50000đ sau khi đặt hàng qua mã QR banking, số tiền COD của đơn hàng sẽ được tự động trừ đi.</p>
                                                            </div>
                                                            <script>
                                                                function toggleDescription() {
                                                                    const codDescription = document.getElementById('cod-description');
                                                                    const isCodSelected = document.getElementById('paymentMethod-514821').checked;
                                                            
                                                                    // Show or hide the description based on the selected payment method
                                                                    codDescription.style.display = isCodSelected ? 'block' : 'none';
                                                                }
                                                            
                                                                // Initial toggle to set the correct display state on page load
                                                                document.addEventListener('DOMContentLoaded', toggleDescription);
                                                            </script>
                                                        </div>
                                                    </div>
                                                    
                                              

                                                </div>
                                            </section>
                                        </div>
                                    </article>
                                    <div
                                        class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
                                        <button type="submit" class="btn btn-checkout spinner"
                                            wire:loading.class="spinner--active"
                                            wire:loading.attr="disabled">
                                            <span class="spinner-label">ĐẶT HÀNG</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                <use href="#spinner"></use>
                                            </svg>
                                        </button>

                                        <a href="/cart" class="previous-link">
                                            <i class="previous-link__arrow">❮</i>
                                            <span class="previous-link__content">Quay về giỏ hàng</span>
                                        </a>

                                    </div>

                                    <div id="common-alert" data-tg-refresh="refreshError">
                                        <div class="alert alert--danger hide-on-desktop"
                                            wire:loading.remove
                                            wire:target="placeOrder"
                                            wire:display="'none'"
                                            data-bind-show="!isSubmitingCheckout && isSubmitingCheckoutError"
                                            data-bind="submitingCheckoutErrorMessage">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="main__footer unprintable">
                                <!-- Footer Content -->
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
                                <!-- Modal Sections -->
                                <div class="modal-wrapper hide" id="refund_term">
                                    <div class="modal" style="display: inline-block;">
                                        <div class="modal-header">
                                            <h2 class="modal-title">Chính sách hoàn trả</h2>
                                            <span class="close" data-toggle="#refund_term"
                                                data-toggle-class="hide">&times;</span>
                                        </div>
                                        <div class="modal-body">
                                            <pre class="term-preview"> {!! $settings->return_policy !!} </pre>
                                        </div>
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
                                            <pre class="term-preview"> {!! $settings->privacy_policy !!} </pre>
                                        </div>
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
                                            <pre class="term-preview"> {!! $settings->purchase_guide !!} </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </main>
                        <aside class="sidebar">
                            <div class="sidebar__header">
                                <h2 class="sidebar__title">
                                    Đơn hàng ({{ count($cartItems) }} sản phẩm)
                                </h2>
                            </div>
                            <div class="sidebar__content">
                                <div id="order-summary" class="order-summary order-summary--is-collapsed">
                                    <div class="order-summary__sections">
                                        <div
                                            class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                            <table class="product-table" id="product-table"
                                                data-tg-refresh="refreshDiscount">
                                                <caption class="visually-hidden">Chi tiết đơn hàng</caption>
                                                <thead class="product-table__header">
                                                    <tr>
                                                        <th>
                                                            <span class="visually-hidden">Ảnh sản phẩm</span>
                                                        </th>
                                                        <th>
                                                            <span class="visually-hidden">Mô tả</span>
                                                        </th>
                                                        <th>
                                                            <span class="visually-hidden">Số lượng</span>
                                                        </th>
                                                        <th>
                                                            <span class="visually-hidden">Đơn giá</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (count($cartItems) > 0)
                                                    @foreach ($cartItems as $item)
                                                    <tr class="product">
                                                        <td class="product__image">
                                                            <div class="product-thumbnail">
                                                                <div class="product-thumbnail__wrapper" data-tg-static>
                                                                    <img src="{{ Storage::url($item['image']) }}"
                                                                        alt="{{ $item['product_name'] }}"
                                                                        class="product-thumbnail__image" />
                                                                </div>
                                                                <span class="product-thumbnail__quantity">{{
                                                                    $item['quantity'] }}</span>
                                                            </div>
                                                        </td>
                                                        <th class="product__description">
                                                            <span class="product__description__name">
                                                                {{ $item['product_name'] }} | {{ $item['name'] }}
                                                            </span>
                                                        </th>
                                                        <td class="product__quantity visually-hidden"><em>Số lượng:</em>
                                                            {{
                                                            $item['quantity'] }}</td>
                                                        <td class="product__price">
                                                            {{ number_format($item['price'], 0, ',', '.') }}₫
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan="4">Giỏ hàng của bạn đang trống.</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section order-summary__section--discount-code"
                                            data-tg-refresh="refreshDiscount" id="discountCode">
                                            <h3 class="visually-hidden">Mã khuyến mại</h3>
                                            <div class="edit_checkout animate-floating-labels">
                                                <div class="fieldset">
                                                    <div class="field ">
                                                        <div class="field__input-btn-wrapper">
                                                            <div class="field__input-wrapper">
                                                                <label for="reductionCode" class="field__label">Nhập mã
                                                                    giảm
                                                                    giá</label>
                                                                <input name="reductionCode" id="reductionCode"
                                                                    type="text" class="field__input" autocomplete="off"
                                                                    wire:model="reductionCode"
                                                                    placeholder="Nhập mã giảm giá">
                                                            </div>
                                                            <button class="field__input-btn btn spinner" type="button"
                                                                wire:click="applyReductionCode"
                                                                wire:loading.class="spinner--active"
                                                                wire:disabled="isLoadingReductionCode || !reductionCode">
                                                                <span class="spinner-label">Áp dụng</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="spinner-loader">
                                                                    <use href="#spinner"></use>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-summary__section order-summary__section--total-lines order-summary--collapse-element"
                                            data-define="{subTotalPriceText: '2.024.000₫'}"
                                            data-tg-refresh="refreshOrderTotalPrice" id="orderSummary">
                                            <table class="total-line-table">
                                                <caption class="visually-hidden">Tổng giá trị</caption>
                                                <thead>
                                                    <tr>
                                                        <td><span class="visually-hidden">Mô tả</span></td>
                                                        <td><span class="visually-hidden">Giá tiền</span></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="total-line-table__tbody">
                                                    <tr class="total-line total-line--subtotal">
                                                        <th class="total-line__name">
                                                            Tạm tính
                                                        </th>
                                                        <td class="total-line__price">
                                                            {{ number_format($subtotal, 0, ',', '.') }}₫
                                                        </td>
                                                    </tr>
                                                    <tr class="total-line total-line--shipping-fee">
                                                        <th class="total-line__name">
                                                            Phí vận chuyển
                                                        </th>
                                                        <td class="total-line__price">
                                                            @php
                                                            // Khởi tạo phí vận chuyển mặc định
                                                            $shipping_fee = 0;
                                                        
                                                            // Kiểm tra phương thức thanh toán
                                                            if ($paymentMethod === 'cod') {
                                                                $shipping_fee = 30000; // Miễn phí ship khi thanh toán COD
                                                            } elseif ($shipping_method === 'home_delivery' && $total <= 800000 || $paymentMethod === 'bank' && $total <= 800000 ) {
                                                                $shipping_fee = 30000; // Phí ship cho giao hàng tận nhà
                                                            }
                                                            if ($shipping_method === 'in_store_pickup') {
                                                                $shipping_fee = 0; // Miễn phí ship khi thanh toán COD
                                                            }  
                                                        @endphp
                                                            
                                                            {{ $shipping_fee > 0 ? number_format($shipping_fee, 0, ',', '.') . '₫' : 'Miễn phí' }}
                                                        </td>
                                                    </tr>
                                                    @if ($paymentMethod === 'cod')
                                                    <tr class="total-line total-line--cod-discount">
                                                        <th class="total-line__name">
                                                            Đã thanh toán
                                                        </th>
                                                        <td class="total-line__price">
                                                            -50.000₫
                                                        </td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                                <tfoot class="total-line-table__footer">
                                                    @php
                                                    // Determine shipping fee based on method
                                               
                                                
                                                    // Calculate the final total based on the payment method
                                                    if ($paymentMethod === 'cod') {
                                                        $final_total = $total + $shipping_fee - 50000;
                                                    } else {
                                                        $final_total = $total + $shipping_fee;
                                                    }
                                                @endphp
                                                <tr class="total-line payment-due">
                                                    <th class="total-line__name">
                                                        <span class="payment-due__label-total">
                                                            Tổng cộng
                                                        </span>
                                                    </th>
                                                    <td class="total-line__price">
                                                        <span class="payment-due__price">
                                                            {{ number_format($final_total, 0, ',', '.') }}₫
                                                        </span>
                                                    </td>
                                                </tr>
                                                
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div
                                            class="order-summary__nav field__input-btn-wrapper hide-on-mobile layout-flex--row-reverse">
                                            <button type="submit" class="btn btn-checkout spinner"
                                                wire:loading.class="spinner--active"
                                                wire:loading.attr="disabled">
                                                <span class="spinner-label">ĐẶT HÀNG</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                                    <use href="#spinner"></use>
                                                </svg>
                                            </button>
                                            <a href="/cart" class="previous-link">
                                                <i class="previous-link__arrow">❮</i>
                                                <span class="previous-link__content">Quay về giỏ hàng</span>
                                            </a>
                                        </div>
                                        <div id="common-alert-sidebar" data-tg-refresh="refreshError">
                                            <div class="alert alert--danger hide-on-mobile hide"
                                                wire:loading.remove
                                                wire:target="placeOrder"
                                                wire:display="'none'"
                                                data-bind-show="!isSubmitingCheckout && isSubmitingCheckoutError"
                                                data-bind="submitingCheckoutErrorMessage"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </form>


                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="spinner">
                        <svg viewBox="0 0 30 30">
                            <circle stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                                stroke-dasharray="85%" cx="50%" cy="50%" r="40%">
                                <animateTransform attributeName="transform" type="rotate" from="0 15 15" to="360 15 15"
                                    dur="0.7s" repeatCount="indefinite" />
                            </circle>
                        </svg>
                    </symbol>
                </svg>
            </div>
        </body>

    </div>

</div>
