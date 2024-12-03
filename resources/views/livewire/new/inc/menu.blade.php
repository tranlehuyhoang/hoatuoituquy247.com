<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide mobile-sidebar-slide mobile-sidebar-levels-1"
    data-levels="1">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar nav-vertical nav-uppercase nav-slide" data-tab="1">
                <li class="html custom html_topbar_right">
                    <strong class="uppercase" style="color: #1bbc9b">Danh mục hoa</strong>
                </li>

                @foreach ($categories as $category)
                    <li id="menu-item-{{ $category->id }}"
                        class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children">
                        <a href="/categories/{{ $category->slug }}" class="nav-top-link"
                            aria-expanded="false" aria-haspopup="menu">
                            {{ $category->name }}
                        </a>
                        <ul class="sub-menu nav-sidebar-ul children">
                            @foreach ($category->subCategories as $subCategory)
                                <li id="menu-item-{{ $subCategory->id }}"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat">
                                    <a href="/categories/{{ $subCategory->slug }}">{{ $subCategory->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                        <form role="search" method="get" class="searchform" action="/search">
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <label class="screen-reader-text" for="woocommerce-product-search-field-1">Tìm
                                        kiếm:</label>
                                    <input type="search" id="woocommerce-product-search-field-1"
                                        class="search-field mb-0" placeholder="Nhập từ khóa cần tìm" value=""
                                        name="s" />
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
