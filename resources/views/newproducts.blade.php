<div class="row mt-60">
    <div class="col-12">
        <h3 class="section-title style-1 mb-30">Related products</h3>
    </div>
    <div class="col-12">
        <div class="row related-products">
            @foreach ($relatedProducts as $relatedProduct)
            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                <div class="product-cart-wrap small hover-up">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="" tabindex="0">
                                <img class="default-img" src="{{ asset('product/' . $relatedProduct->image) }}" alt="">
                                <img class="hover-img" src="{{ asset('product/' . $relatedProduct->image) }}" alt="">
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a  aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                            <a  aria-label="Add To Wishlist" class="action-btn small hover-up"  tabindex="0"><i class="fi-rs-heart"></i></a>
                            <a  aria-label="Compare" class="action-btn small hover-up"tabindex="0"><i class="fi-rs-shuffle"></i></a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">Hot</span>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <h2><a href="" tabindex="0">{{ $relatedProduct->productname }}</a></h2>
                        <div class="rating-result" title="90%">
                            <span>
                            </span>
                        </div>
                        <div class="product-price">
                            <span> </span>
                            <span class="old-price"></span>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach

        </div>
    </div>
</div>  