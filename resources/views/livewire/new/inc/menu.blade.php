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

            <li class="html header-social-icons ml-0">
                <div class="social-icons follow-icons"><a  target="_blank"
                        data-label="Facebook" class="icon plain facebook tooltip" title="Theo dõi trên Facebook"
                        aria-label="Theo dõi trên Facebook" rel="noopener nofollow"><i
                            class="icon-facebook"></i></a><a   target="_blank"
                        data-label="Instagram" class="icon plain instagram tooltip" title="Theo dõi trên Instagram"
                        aria-label="Theo dõi trên Instagram" rel="noopener nofollow"><i
                            class="icon-instagram"></i></a><a
                        target="_blank" data-label="TikTok" class="icon plain tiktok tooltip"
                        title="Theo dõi trên TikTok" aria-label="Theo dõi trên TikTok" rel="noopener nofollow"><i
                            class="icon-tiktok"></i></a><a data-label="Twitter"
                        target="_blank" class="icon plain twitter tooltip" title="Theo dõi trên Twitter"
                        aria-label="Theo dõi trên Twitter" rel="noopener nofollow"><i class="icon-twitter"></i></a><a
                       data-label="Pinterest" target="_blank"
                        class="icon plain pinterest tooltip" title="Theo dõi trên Pinterest"
                        aria-label="Theo dõi trên Pinterest" rel="noopener nofollow"><i
                            class="icon-pinterest"></i></a><a
                        data-label="LinkedIn" target="_blank" class="icon plain linkedin tooltip"
                        title="Theo dõi trên LinkedIn" aria-label="Theo dõi trên LinkedIn" rel="noopener nofollow"><i
                            class="icon-linkedin"></i></a><a
                        data-label="YouTube"
                        target="_blank" class="icon plain youtube tooltip" title="Theo dõi trên YouTube"
                        aria-label="Theo dõi trên YouTube" rel="noopener nofollow"><i class="icon-youtube"></i></a><a
                         data-label="Flickr" target="_blank"
                        class="icon plain flickr tooltip" title="Flickr" aria-label="Flickr"
                        rel="noopener nofollow"><i class="icon-flickr"></i></a><a
                         data-label="500px" target="_blank"
                        class="icon plain px500 tooltip" title="Theo dõi trên 500px" aria-label="Theo dõi trên 500px"
                        rel="noopener nofollow"><i class="icon-500px"></i></a><a
                        data-label="VKontakte" target="_blank" class="icon plain vk tooltip"
                        title="Theo dõi trên VKontakte" aria-label="Theo dõi trên VKontakte"
                        rel="noopener nofollow"><i class="icon-vk"></i></a></div>
            </li>
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
