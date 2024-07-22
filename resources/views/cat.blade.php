
<x-app-layout>
        <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('admin')}}" rel="nofollow">Home</a>
                    
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                     <!--
                        <div class="shop-product-fillter">
                           
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">50</a></li>
                                            <li><a href="#">100</a></li>
                                            <li><a href="#">150</a></li>
                                            <li><a href="#">200</a></li>
                                            <li><a href="#">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">Featured</a></li>
                                            <li><a href="#">Price: Low to High</a></li>
                                            <li><a href="#">Price: High to Low</a></li>
                                            <li><a href="#">Release Date</a></li>
                                            <li><a href="#">Avg. Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="row product-grid-3">

                            @foreach ($productTypes as $productType)

                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="#">
                                                <img class="default-img" src="{{ asset('product/' . $productType->image) }}" alt="">
                                                <img class="hover-img" src="{{ asset('product/' . $productType->image) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <div class="share-buttons">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('info', ['id' => $productType->id])) }}" aria-label="Share on Facebook" class="action-btn hover-up">
                                                    <i class="fi-rs-facebook"></i>
                                                </a>
                                                
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('info', ['id' => $productType->id])) }}&text=Check%20out%20this%20product%3A%20{{ $productType->productname }}%20for%20only%20&#x20A6;{{ $productType->newprice }}!" aria-label="Share on Twitter" class="action-btn hover-up">
                                                    <i class="fi-rs-twitter"></i>
                                                </a>
                                                
                                                <a href="whatsapp://send?text=Check%20out%20this%20product%3A%20{{ $productType->productname }}%20for%20only%20&#x20A6;{{ $productType->newprice }}!%0A{{ urlencode(route('info', ['id' => $productType->id])) }}" aria-label="Share on WhatsApp" class="action-btn hover-up">
                                                    <i class="fi-rs-whatsapp"></i>
                                                </a>
                                                
                                            </div>
                                
                                            
                                        </div>


                                       
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="hot">Hot</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                         <a href="{{ route('category.products', ['category' => $productType->producttype]) }}" >{{ $productType->producttype }}</a>	
                                        </div>
                                        <h2><a  href="{{ route('info', ['id' => $productType->id]) }}">{{ $productType->productname }}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>@php
                                                $percentageDiscount = ($productType->oldprice -$productType->newprice )/ $productType->oldprice  * 100;
                                            @endphp
                                            {{round($percentageDiscount)}}%off</span>
                                        </span>
                                        </div>
                                        <div class="product-price">
                                            <span >&#x20A6;{{ $productType->newprice }} </span>
                                             <span  class="old-price">&#x20A6;{{ $productType->oldprice }}</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            <button> 
                                                <a href="{{ route('info', ['id' => $productType->id]) }}" aria-label="View" class="action-btn hover-up" ><i class="fi-rs-shopping-bag-add"></i></a>
                                                </button>


                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                            @endforeach

                        </div>



                      
                    </div>
                   
               
                </div>
            </div>
        </section>
    </main>
  
 
   @include('footer')


</body>
 
</html>

</x-app-layout>