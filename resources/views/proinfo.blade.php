@foreach ([$selectedProductInfo] as $product)
<form method="POST" action="{{ url('createorder')}} " enctype="multipart/form-data">
    @csrf
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <input type="hidden" value="{{ $product->id }}" name="productid">
                                        <input type="hidden" value="{{ $product->usersid }}" name="sellerid">

                                        
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ asset('product/' . $product->image) }}" alt="product image">
                                            </figure>
                                           
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <div><img src="{{ asset('product/' . $product->image) }}" alt="product image"></div>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                  
                                </div>


                             
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $product->productname }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Brands: <a href="{{ route('category.products', ['category' => $product->producttype]) }}">{{ $product->producttype }}</a></span>
                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                               <!-- <span class="font-small ml-5 text-muted"> (25 reviews)</span>-->
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">&#x20A6;{{ $product->newprice }}</span></ins>
                                                <ins><span class="old-price font-md ml-15">&#x20A6;{{ $product->oldprice}}</span></ins>
                                                <span class="save-price  font-md color3 ml-15">@php
                                                    $percentageDiscount = ($product->oldprice -$product->newprice )/ $product->oldprice  * 100;
                                                @endphp
                                                {{round($percentageDiscount)}}%off</span></span>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{ $product->information }}</p>
                                        </div>
                                       
                                        
                                      
                                     
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                      


                                                <select class="detail-qty border radius" name="product_value">
                                                  
                                                    <option>select Value</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                                
                                                                                                

                                                   
                                                    
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                           </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                             


                            </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.detail-qty').addEventListener('change', function() {
            var selectedValue = this.value;
            var productId = "{{ $product->id }}";
            var formAction = "{{ route('new-order', ['productid' => ':productId', 'product_value' => ':selectedValue']) }}";
            formAction = formAction.replace(':productId', productId).replace(':selectedValue', selectedValue);
            this.form.action = formAction;
        });
    });
</script>

@endforeach
