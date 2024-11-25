<div class="evo-owl-product owl-carousel not-dqowl clearfix" data-dot="false" data-nav="true" data-lg-items='4'
    data-md-items='4' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-margin='10' data-loop="false"
    data-autoplay="false" style="display: block">

    @foreach ($relatedProducts as $relatedProduct)
    <div class="product-card">
        <a class="product-url" href="/product/{{ $relatedProduct->slug }}" title="{{ $relatedProduct->name }}"></a>

        @if ($relatedProduct->discount_price > 0)
        <span class="sale-box">- {{ number_format((($relatedProduct->price -
            $relatedProduct->discount_price) / $relatedProduct->price) * 100, 0) }}%
        </span>
        @endif

        <div class="product-card__inner">
            <div class="product-card__image">
                <picture>
                    <source media="(min-width: 1200px)" srcset="{{ Storage::url($relatedProduct->images[0]) }}">
                    <source media="(min-width: 992px)" srcset="{{ Storage::url($relatedProduct->images[0]) }}">
                    <source media="(min-width: 569px)" srcset="{{ Storage::url($relatedProduct->images[0]) }}">
                    <source media="(min-width: 480px)" srcset="{{ Storage::url($relatedProduct->images[0]) }}">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                        data-lazyload="{{ Storage::url($relatedProduct->images[0]) }}"
                        class="product-card-image-front img-responsive center-block"
                        alt="{{ $relatedProduct->name }}" />
                </picture>
                @if(isset($relatedProduct->images[1]))
                <picture>
                    <source media="(min-width: 1200px)" srcset="{{ Storage::url($relatedProduct->images[1]) }}">
                    <source media="(min-width: 992px)" srcset="{{ Storage::url($relatedProduct->images[1]) }}">
                    <source media="(min-width: 569px)" srcset="{{ Storage::url($relatedProduct->images[1]) }}">
                    <source media="(min-width: 480px)" srcset="{{ Storage::url($relatedProduct->images[1]) }}">
                    <img src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA="
                        data-lazyload="{{ Storage::url($relatedProduct->images[1]) }}"
                        class="product-card-image-back img-responsive center-block" alt="{{ $relatedProduct->name }}" />
                </picture>
                @endif
            </div>
            <h4 class="product-single__series">{{ $relatedProduct->category->name ?? '' }}
            </h4>
            <h3 class="product-card__title">{{ $relatedProduct->name }}</h3>
            <div class="product-price">
                <strong>{{ number_format($relatedProduct->price, 0, ',', '.')
                    }}₫</strong>
                @if ($relatedProduct->discount_price > 0)
                <span>{{ number_format($relatedProduct->discount_price, 0, ',', '.')
                    }}₫</span>
                @endif
            </div>
        </div>
        <form enctype="multipart/form-data" class="hidden-md variants form-nut-grid form-ajaxtocart"
            data-id="product-actions-{{ $relatedProduct->id }}">
            <div class="product-card__actions">
                <input class="hidden" type="hidden" name="variantId"
                    value="{{ $relatedProduct->variants->first()->id ?? '' }}" />
                <a class="button ajax_addtocart" href="/product/{{ $relatedProduct->slug }}" title="Tùy chọn">Tùy
                    chọn</a>
            </div>
        </form>
    </div>
    @endforeach

</div>