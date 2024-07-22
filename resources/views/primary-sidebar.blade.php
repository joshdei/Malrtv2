<div class="col-lg-3 primary-sidebar sticky-sidebar">
    <div class="widget-category mb-30">
        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
        <ul class="categories">

            <li><a href="{{ route('category.products', ['category' => 'Shoes & Bags']) }}">Shoes & Bags</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Books']) }}">Books</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Jewelry & Watch']) }}"><i class="surfsidemedia-font-dress"></i>Jewelry & Watch</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Accessories']) }}"><i class="surfsidemedia-font-dress"></i>Accessories</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Clothing & Apparel']) }}"><i class="surfsidemedia-font-dress"></i>Clothing & Apparel</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Footwear & Shoes']) }}"><i class="surfsidemedia-font-tshirt"></i>Footwear & Shoes</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Electronics & Gadgets']) }}"><i class="surfsidemedia-font-smartphone"></i> Electronics & Gadgets</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Games & Toys']) }}"><i class="surfsidemedia-font-desktop"></i>Games & Toys</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Veterinary & Pet Items']) }}"><i class="surfsidemedia-font-cpu"></i>Veterinary & Pet Items</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Pets']) }}"><i class="surfsidemedia-font-home"></i>Pets</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Stationery']) }}"><i class="surfsidemedia-font-high-heels"></i>Stationery</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Mother & Kids']) }}"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Furniture']) }}"><i class="surfsidemedia-font-kite"></i>Furniture</a></li>
            <li><a href="{{ route('category.products', ['category' => 'Sports Products']) }}"><i class="surfsidemedia-font-kite"></i>Sports Products</a></li>
            
        </ul>
    </div>
    <!-- Fillter By Price -->
  
    <!-- Product sidebar Widget -->
    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
        <div class="widget-header position-relative mb-20 pb-10">
            <h5 class="widget-title mb-10">New products</h5>
            <div class="bt-1 border-color-1"></div>
        </div>

        @foreach($newProducts as $product)
        <div class="single-post clearfix">
            <div class="image">
                <img src="{{ asset('product/' . $product->image) }}" alt="#">
            </div>
            <div class="content pt-10">
                <h5><a href="{{ route('info', ['id' => $product->id]) }}">{{ $product->productname }}</a></h5>
                <p class="price mb-0 mt-5">&#x20A6;{{ $product->newprice }}</p>
                <div class="product-rate">
                    <div class="product-rating" style="width:90%"></div>
                </div>n
                <div class="share-buttons">
                    <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }}" target="_blank">
                        Share on WhatsApp
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                        Share on Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
                        Share on Twitter
                    </a>
                    <!-- Add more share buttons for other platforms if needed -->
                </div>
                
            </div>
        </div>
        @endforeach
        
    </div>                        
</div>