@foreach ($searchResults as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="product-details.html">
                                                <img class="default-img" src="{{ asset('product/' . $product->image) }}" alt="">
                                                <img class="hover-img" src="{{ asset('product/' . $product->provideo) }}" alt="">
                                            </a>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                        <a href="{{ route('category.products', ['category' => $product->producttype]) }}" >{{ $product->producttype }}</a>	
                                        </div>
                                        <h2><a  href="{{ route('info', ['id' => $product->id]) }}">{{ $product->productname }}</a></h2>
                                        <div class="rating-result" title="90%">
                                        <span>@php
                                    $percentageDiscount = ($product->oldprice -$product->newprice )/ $product->oldprice  * 100;
                                @endphp
                                {{round($percentageDiscount)}}%off</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                        <span >{{ $product->newprice }} </span>
                                        <span  class="old-price">{{ $product->oldprice }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                            <button> 
                            <a href="{{ route('info', ['id' => $product->id]) }}" aria-label="View" class="action-btn hover-up" ><i class="fi-rs-shopping-bag-add"></i></a>
                            </button>
                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach