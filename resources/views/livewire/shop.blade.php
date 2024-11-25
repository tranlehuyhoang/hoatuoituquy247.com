<div>
    <div>
        @php
        $settings = App\Models\Setting::first(); // Truy vấn model Settings
        @endphp
        <head>
            <title>Cửa hàng | {{ $settings->web_name}}</title>
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
                href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-collections.scss.css?1721662888170" />
            <link href="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/evo-collections.scss.css?1721662888170"
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


            <div class="evo-blog-header"
                style="background-image: url('{{ $categoryInfo ? Storage::url($categoryInfo->banner) : '/bizweb.dktcdn.net/100/436/596/collections/n40pqa2hhof61.jpg' }}');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="evo-blog-header-content">
                                <h1> {{$categoryInfo ? $categoryInfo->name : 'Cửa hàng'}}</h1>
                                <div class="evo-blog-des">



                                    <p>{{ $categoryInfo ? $categoryInfo->description : 'Khám phá thế giới keycap và phụ
                                        kiện bàn phím đa dạng nhưng cũng đầy chất lượng!

                                        ' }}</p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <section class="main_container collection col-md-9 col-md-push-3">
                        <div class="category-products products category-products-grids">

                            <div class="sort-cate clearfix margin-bottom-10 hidden-xs">
                                <div class="sort-cate-left hidden-xs">
                                    <h3>Xếp theo:</h3>
                                    <ul>
                                        <li
                                            class="btn-quick-sort alpha-asc {{ $sortField === 'name' && $sortDirection === 'asc' ? 'active' : '' }}">
                                            <a href="javascript:;" wire:click="sortBy('name')" title="Tên A-Z">
                                                <i></i>Tên A-Z
                                            </a>
                                        </li>
                                        <li
                                            class="btn-quick-sort alpha-desc {{ $sortField === 'name' && $sortDirection === 'desc' ? 'active' : '' }}">
                                            <a href="javascript:;" wire:click="sortBy('name')" title="Tên Z-A">
                                                <i></i>Tên Z-A
                                            </a>
                                        </li>
                                        <li
                                            class="btn-quick-sort position-desc {{ $sortField === 'created_at' ? 'active' : '' }}">
                                            <a href="javascript:;" wire:click="sortBy('created_at')" title="Hàng mới">
                                                <i></i>Hàng mới
                                            </a>
                                        </li>
                                        <li
                                            class="btn-quick-sort price-asc {{ $sortField === 'price' && $sortDirection === 'asc' ? 'active' : '' }}">
                                            <a href="javascript:;" wire:click="sortBy('price')"
                                                title="Giá thấp đến cao">
                                                <i></i>Giá thấp đến cao
                                            </a>
                                        </li>
                                        <li
                                            class="btn-quick-sort price-desc {{ $sortField === 'price' && $sortDirection === 'desc' ? 'active' : '' }}">
                                            <a href="javascript:;" wire:click="sortBy('price')"
                                                title="Giá cao xuống thấp">
                                                <i></i>Giá cao xuống thấp
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <section class="products-view products-view-grid row">








                                @foreach ($products as $product)
                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">

                                    <div class="product-card">
                                        <a class="product-url" href="/product/{{ $product->slug }}"
                                            title="{{ $product->name }}"></a>



                                        <div class="product-card__inner">
                                            <div class="product-card__image">
                                                <picture>
                                                    <source media="(min-width: 1200px)"
                                                        srcset="{{ Storage::url($product->images[0]) }}">
                                                    <source media="(min-width: 992px)"
                                                        srcset="{{ Storage::url($product->images[0]) }}">
                                                    <source media="(min-width: 569px)"
                                                        srcset="{{ Storage::url($product->images[0]) }}">
                                                    <source media="(min-width: 480px)"
                                                        srcset="{{ Storage::url($product->images[0]) }}">
                                                    <img src="{{ Storage::url($product->images[0]) }}"
                                                        data-lazyload="{{ Storage::url($product->images[0]) }}"
                                                        class="product-card-image-front img-responsive center-block"
                                                        alt="{{ $product->name }}" />
                                                </picture>
                                                @if(isset($product->images[1]))

                                                <picture>
                                                    <source media="(min-width: 1200px)"
                                                        srcset="{{ Storage::url($product->images[1]) }}">
                                                    <source media="(min-width: 992px)"
                                                        srcset="{{ Storage::url($product->images[1]) }}">
                                                    <source media="(min-width: 569px)"
                                                        srcset="{{ Storage::url($product->images[1]) }}">
                                                    <source media="(min-width: 480px)"
                                                        srcset="{{ Storage::url($product->images[1]) }}">
                                                    <img src="{{ Storage::url($product->images[1]) }}"
                                                        data-lazyload="{{ Storage::url($product->images[1]) }}"
                                                        class="product-card-image-back img-responsive center-block"
                                                        alt="{{ $product->name }}" />
                                                </picture>
                                                @else
                                                <picture>
                                                    <source media="(min-width: 1200px)"
                                                        srcset="{{ Storage::url($product->images[0]) }}">
                                                    <source media="(min-width: 992px)"
                                                        srcset="{{ Storage::url($product->images[0]) }}">
                                                    <source media="(min-width: 569px)"
                                                        srcset="{{ Storage::url($product->images[0]) }}">
                                                    <source media="(min-width: 480px)"
                                                        srcset="{{ Storage::url($product->images[0]) }}">
                                                    <img src="{{ Storage::url($product->images[0]) }}"
                                                        data-lazyload="{{ Storage::url($product->images[0]) }}"
                                                        class="product-card-image-front img-responsive center-block"
                                                        alt="{{ $product->name }}" />
                                                </picture>
                                                @endif

                                            </div>
                                            <h4 class="product-single__series">{{ $product->category->name }}</h4>

                                            <h3 class="product-card__title"><span style="color: red">{{ $product->isOutOfStock() ? '[Hết hàng]' : '' }}</span> {{ $product->name }}</h3>
                                            <div class="product-price">


                                                <strong>{{ number_format($product->price, 0, ',', '.') }}₫</strong>
                                                @if ($product->discount_price > 0)
                                                <span>{{ number_format($product->discount_price, 0, ',', '.') }}₫</span>
                                                @endif

                                            </div>
                                        </div>
                                        <form class="hidden-md variants form-nut-grid form-ajaxtocart"
                                            data-id="product-actions-37191825">
                                            <div class="product-card__actions">


                                                <a class="button ajax_addtocart add_to_cart"
                                                    href="/product/{{ $product->slug }}" title="Thêm vào giỏ hàng">Thêm
                                                    vào giỏ hàng</a>


                                            </div>
                                        </form>
                                    </div>
                                </div>

                                @endforeach





                                <div class="clearfix"></div>
                                <div class="text-xs-right">

                                    <nav class="text-center">
                                        <ul class="pagination clearfix">
                                            @if ($products->onFirstPage())
                                            <li class="page-item disabled"><a class="page-link" href="#" title="«">«</a>
                                            </li>
                                            @else
                                            <li class="page-item"><a class="page-link"
                                                    wire:click.prevent="gotoPage({{ $products->currentPage() - 1 }})"
                                                    href="javascript:;" title="«">«</a></li>
                                            @endif

                                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                                @if ($i == $products->currentPage())
                                                <li class="active page-item disabled"><a class="page-link"
                                                        href="javascript:;" title="{{ $i }}">{{ $i }}</a></li>
                                                @else
                                                <li class="page-item"><a class="page-link"
                                                        wire:click.prevent="gotoPage({{ $i }})" href="javascript:;"
                                                        title="{{ $i }}">{{ $i }}</a></li>
                                                @endif
                                                @endfor

                                                @if ($products->hasMorePages())
                                                <li class="page-item"><a class="page-link"
                                                        wire:click.prevent="gotoPage({{ $products->currentPage() + 1 }})"
                                                        href="javascript:;" title="»">»</a></li>
                                                @else
                                                <li class="page-item disabled"><a class="page-link" href="#"
                                                        title="»">»</a></li>
                                                @endif
                                        </ul>
                                    </nav>

                                </div>

                            </section>


                        </div>
                    </section>
                    <aside class="evo-sidebar sidebar left-content col-md-3 col-md-pull-9">

                        <aside class="aside-item collection-category">
                            <div class="aside-title">
                                <h3 class="title-head margin-top-0">Danh mục</h3>
                            </div>
                            <div class="aside-content">
                                <ul class="nav navbar-pills nav-category">


                                    <li class="nav-item ">
                                        <a class="nav-link" href="/" title="Trang chủ">Trang chủ</a>
                                    </li>


                                    @foreach($categories as $category)
                                    @if($category->show_in_header)
                                    <!-- Kiểm tra điều kiện hiển thị -->
                                    @if ($category->subcategories->isNotEmpty())
                                    <li class="nav-item active">
                                        <a href="/shop?category={{ $category->slug }}" class="nav-link"
                                            title="{{ $category->name }}">
                                            {{ strtoupper($category->name) }}
                                        </a>
                                        <span class="Collapsible__Plus"></span>
                                        <ul class="dropdown-menu">
                                            @foreach($category->subcategories as $subcategory)
                                            <li class="nav-item">
                                                <a class="nav-link" href="/shop?subcategory={{ $subcategory->slug }}"
                                                    title="{{ $subcategory->name }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="/shop?category={{ $category->slug }}"
                                            title="{{ $category->name }}">
                                            {{ strtoupper($category->name) }}
                                        </a>
                                    </li>
                                    @endif
                                    @endif
                                    @endforeach



                                    <li class="nav-item">
                                        <a href="/shop" class="nav-link" title="Sản phẩm">Sản phẩm</a>
                                        <span class="Collapsible__Plus"></span>
                                        <ul class="dropdown-menu">
                                            @foreach($categories_all as $category)
                                            @if($category->show_in_header)
                                            <!-- Kiểm tra điều kiện hiển thị -->
                                            <li class="dropdown-submenu nav-item">
                                                <a class="nav-link" href="/shop?category={{ $category->slug }}"
                                                    title="{{ $category->name }}">
                                                    {{ $category->name }}
                                                </a>

                                                @if($category->subcategories->isNotEmpty())
                                                <span class="Collapsible__Plus"></span>
                                                <!-- Hiển thị dấu + nếu có danh mục con -->
                                                <ul class="dropdown-menu">
                                                    @foreach($category->subcategories as $subcategory)
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                            href="/shop?subcategory={{ $subcategory->slug }}"
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
                                    </li>



                                    <li class="nav-item ">
                                        <a class="nav-link" href="/blogs" title="Bài viết">Bài viết</a>
                                    </li>



                                    <li class="nav-item ">
                                        <a href="/about" class="nav-link" title="Về Chúng Tôi">Về Chúng Tôi</a>
                                        <span class="Collapsible__Plus"></span>
                                        <ul class="dropdown-menu">


                                            <li class="nav-item ">
                                                <a class="nav-link" href="/about" title="Giới thiệu">Giới thiệu</a>
                                            </li>



                                            <li class="nav-item ">
                                                <a class="nav-link" href="/lien-he" title="Liên hệ">Liên hệ</a>
                                            </li>



                                            <li class="nav-item ">
                                                <a class="nav-link" href="/chinh-sach-bao-hanh"
                                                    title="Chính sách bảo hành">Chính sách bảo hành</a>
                                            </li>



                                            <li class="nav-item ">
                                                <a class="nav-link" href="/chinh-sach-doi-tra-hang-hoan-tien"
                                                    title="Chính sách đổi trả">Chính sách đổi trả</a>
                                            </li>



                                            <li class="nav-item ">
                                                <a class="nav-link" href="/apps/kiem-tra-don-hang"
                                                    title="Kiểm tra đơn hàng của bạn">Kiểm tra đơn hàng của bạn</a>
                                            </li>



                                        </ul>
                                    </li>


                                </ul>
                            </div>
                        </aside>


                        <script src="/bizweb.dktcdn.net/100/436/596/themes/834446/assets/search_filter.js?1721662888170"
                            type="text/javascript"></script>

                        <div class="aside-filter clearfix">
                            <div class="heading">
                                Tìm theo
                            </div>
                            <div class="aside-hidden-mobile">
                                <div class="filter-container">
                                    <div class="filter-containers">
                                        <div class="filter-container__selected-filter" style="display: none;">
                                            <div class="filter-container__selected-filter-header clearfix">
                                                <span class="filter-container__selected-filter-header-title">Bạn
                                                    chọn</span>
                                                <a href="javascript:void(0)" onclick="clearAllFiltered()"
                                                    class="filter-container__clear-all" title="Bỏ hết">Bỏ hết <i
                                                        class="fa fa-angle-right"></i></a>
                                            </div>
                                            <div class="filter-container__selected-filter-list">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>


                                    <aside class="aside-item filter-tag-style-1 tag-filtster" hidden>
                                        <div class="aside-title">
                                            Tags
                                        </div>
                                        <div class="aside-content filter-group">
                                            <ul>




                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-cherry">
                                                            <input type="checkbox" id="filter-cherry"
                                                                onchange="toggleFilter(this)" data-group="tag2"
                                                                data-field="tags" data-text="cherry" value="(cherry)"
                                                                data-operator="OR">
                                                            <i class="fa"></i>
                                                            cherry
                                                        </label>
                                                    </span>
                                                </li>



                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-sa">
                                                            <input type="checkbox" id="filter-sa"
                                                                onchange="toggleFilter(this)" data-group="tag2"
                                                                data-field="tags" data-text="sa" value="(sa)"
                                                                data-operator="OR">
                                                            <i class="fa"></i>
                                                            sa
                                                        </label>
                                                    </span>
                                                </li>



                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-oem">
                                                            <input type="checkbox" id="filter-oem"
                                                                onchange="toggleFilter(this)" data-group="tag2"
                                                                data-field="tags" data-text="oem" value="(oem)"
                                                                data-operator="OR">
                                                            <i class="fa"></i>
                                                            oem
                                                        </label>
                                                    </span>
                                                </li>



                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-asa">
                                                            <input type="checkbox" id="filter-asa"
                                                                onchange="toggleFilter(this)" data-group="tag2"
                                                                data-field="tags" data-text="asa" value="(asa)"
                                                                data-operator="OR">
                                                            <i class="fa"></i>
                                                            asa
                                                        </label>
                                                    </span>
                                                </li>



                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-dyesub">
                                                            <input type="checkbox" id="filter-dyesub"
                                                                onchange="toggleFilter(this)" data-group="tag2"
                                                                data-field="tags" data-text="dyesub" value="(dyesub)"
                                                                data-operator="OR">
                                                            <i class="fa"></i>
                                                            dyesub
                                                        </label>
                                                    </span>
                                                </li>



                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-doubleshot">
                                                            <input type="checkbox" id="filter-doubleshot"
                                                                onchange="toggleFilter(this)" data-group="tag2"
                                                                data-field="tags" data-text="doubleshot"
                                                                value="(doubleshot)" data-operator="OR">
                                                            <i class="fa"></i>
                                                            doubleshot
                                                        </label>
                                                    </span>
                                                </li>



                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-pbt">
                                                            <input type="checkbox" id="filter-pbt"
                                                                onchange="toggleFilter(this)" data-group="tag2"
                                                                data-field="tags" data-text="pbt" value="(pbt)"
                                                                data-operator="OR">
                                                            <i class="fa"></i>
                                                            pbt
                                                        </label>
                                                    </span>
                                                </li>



                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-abs">
                                                            <input type="checkbox" id="filter-abs"
                                                                onchange="toggleFilter(this)" data-group="tag2"
                                                                data-field="tags" data-text="abs" value="(abs)"
                                                                data-operator="OR">
                                                            <i class="fa"></i>
                                                            abs
                                                        </label>
                                                    </span>
                                                </li>


                                            </ul>
                                        </div>
                                    </aside>
                                     

                                    <aside class="aside-item filter-vendor">
                                        <div class="aside-title">Thương hiệu</div>
                                        <div class="aside-content filter-group">
                                            <ul class="filter-vendor">
                                                @foreach($brands as $brand)
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <label data-filter="{{ $brand->slug }}"
                                                        for="filter-{{ $brand->slug }}">
                                                        <input type="checkbox" id="filter-{{ $brand->slug }}"
                                                            wire:model.live="selectedBrands" value="{{ $brand->id }}">
                                                        <i class="fa"></i>
                                                        {{ $brand->name }}
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </aside>

                                    <aside class="aside-item filter-price">
                                        <div class="aside-title">Giá sản phẩm</div>
                                        <div class="aside-content filter-group">
                                            <ul>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-duoi-100-000d">
                                                            <input type="checkbox" id="filter-duoi-100-000d"
                                                                wire:model.live="selectedPriceRanges" value="< 100000">
                                                            <i class="fa"></i>
                                                            Giá dưới 100.000đ
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-100-000d-200-000d">
                                                            <input type="checkbox" id="filter-100-000d-200-000d"
                                                                wire:model.live="selectedPriceRanges"
                                                                value=">= 100000 AND price <= 200000">
                                                            <i class="fa"></i>
                                                            100.000đ - 200.000đ
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-200-000d-300-000d">
                                                            <input type="checkbox" id="filter-200-000d-300-000d"
                                                                wire:model.live="selectedPriceRanges"
                                                                value=">= 200000 AND price <= 300000">
                                                            <i class="fa"></i>
                                                            200.000đ - 300.000đ
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-300-000d-500-000d">
                                                            <input type="checkbox" id="filter-300-000d-500-000d"
                                                                wire:model.live="selectedPriceRanges"
                                                                value=">= 300000 AND price <= 500000">
                                                            <i class="fa"></i>
                                                            300.000đ - 500.000đ
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-500-000d-1-000-000d">
                                                            <input type="checkbox" id="filter-500-000d-1-000-000d"
                                                                wire:model.live="selectedPriceRanges"
                                                                value=">= 500000 AND price <= 1000000">
                                                            <i class="fa"></i>
                                                            500.000đ - 1.000.000đ
                                                        </label>
                                                    </span>
                                                </li>
                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <span>
                                                        <label for="filter-tren1-000-000d">
                                                            <input type="checkbox" id="filter-tren1-000-000d"
                                                                wire:model.live="selectedPriceRanges" value="> 1000000">
                                                            <i class="fa"></i>
                                                            Giá trên 1.000.000đ
                                                        </label>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </aside>

                                    <aside class="aside-item filter-type" hidden>
                                        <div class="aside-title">
                                            Loại
                                        </div>
                                        <div class="aside-content filter-group">
                                            <ul class="filter-type">


                                                <li class="filter-item filter-item--check-box filter-item--green">
                                                    <label data-filter="Cửa hàng" for="filter-keycap-bo">
                                                        <input type="checkbox" id="filter-keycap-bo"
                                                            onchange="toggleFilter(this)" data-group="Loại"
                                                            data-field="product_type.filter_key" data-text="Cửa hàng"
                                                            value="(&#34;Cửa hàng&#34;)" data-operator="OR">
                                                        <i class="fa"></i>
                                                        Cửa hàng
                                                    </label>
                                                </li>


                                            </ul>
                                        </div>
                                    </aside>




                                </div>
                            </div>
                        </div>


                    </aside>
                    <div id="open-filters" class="open-filters hidden-lg hidden-md">
                        <i class="fa fa-filter" aria-hidden="true"></i>
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

            <script>
                var filter = new Bizweb.SearchFilter()
                    
                    filter.addValue("collection", "collections", "2683504", "AND");
                                    
                                    function clearAllFiltered() {
                        filter = new Bizweb.SearchFilter();
                        
                        filter.addValue("collection", "collections", "2683504", "AND");
                                        
        
                                        $(".filter-container__selected-filter-list ul").html("");
                        $(".filter-container input[type=checkbox]").attr('checked', false);
                        $(".filter-container__selected-filter").hide();
        
                        doSearch(1);
                    }
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
            window.appbulkmemdeals.customer_id = '16114723';
            </script>
            <div class="appbulk-member-deals" data-customer-id="16114723"></div>











            <div id='sapo-loyalty-rewards-init' class='sapo-loyalty-init'
                data-hmac='d324f076c41fcbdcd97fc607c670cb1ab8d1bb7bd4fa4d22f5ef4408fe32a838' data-phone=''
                data-timestamp='1728824645' data-domain='kicap.vn'
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