<div>
    <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6">
        <div class="relative product-image-block">

            <div class="slider-big-video clearfix margin-bottom-10">
                <div class="slider slider-for">
                    <!-- Check if variant image exists and add it to the slider -->
              

                    <!-- Existing images -->
                    @foreach($images as $image)
                        <a href="{{ Storage::url($image) }}" title="Click để xem">
                            <img src="{{ Storage::url($image) }}" alt="Bộ keycap Cherry Yeeti" class="img-responsive center-block">
                        </a>
                    @endforeach
                    @foreach($variants as $variant)
                        <a href="{{ Storage::url($variant->image) }}" title="Click để xem">
                            <img src="{{ Storage::url($variant->image) }}" alt="Bộ keycap Cherry Yeeti" class="img-responsive center-block">
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="slider-has-video clearfix">
                <div class="slider slider-nav">
                 

                    <!-- Existing images -->
                    @foreach($images as $image)
                        <div class="fixs">
                            <img src="{{ Storage::url($image) }}" alt="Bộ keycap Cherry Yeeti" data-image="{{ Storage::url($image) }}">
                        </div>
                    @endforeach
                    @foreach($variants as $variant)
                        <div class="fixs">
                            <img src="{{ Storage::url($variant->image) }}" alt="Bộ keycap Cherry Yeeti" data-image="{{ Storage::url($variant->image) }}">
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    
</div>
