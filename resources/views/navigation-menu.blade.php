<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
<title>REPODEI Media</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="Repodei is an innovative e-commerce platform designed to connect buyers and sellers in a user-friendly marketplace. The platform's mission is to transform online transactions by providing a secure and efficient environment for a wide array of products and services. With a strong emphasis on user-friendliness and advanced features, Daimail aspires to become the preferred destination for both buyers and sellers. It addresses the challenges faced by sellers in reaching their target audience and buyers in finding reliable products, offering a platform that prioritizes quality, security, and convenience. Daimail accommodates a diverse range of categories, including electronics, fashion, handmade crafts, and services.">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="Repodei - Connecting Buyers and Sellers in an Innovative Marketplace">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.repodei.com">
<meta property="og:image" content="https://www.repodei.com/assets/imgs/theme/og-image.jpg">
<link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">
<meta name="description" content="Repodei is an innovative e-commerce platform designed to connect buyers and sellers in a user-friendly marketplace. The platform's mission is to transform online transactions by providing a secure and efficient environment for a wide array of products and services. With a strong emphasis on user-friendliness and advanced features, Daimail aspires to become the preferred destination for both buyers and sellers. It addresses the challenges faced by sellers in reaching their target audience and buyers in finding reliable products, offering a platform that prioritizes quality, security, and convenience. Daimail accommodates a diverse range of categories, including electronics, fashion, handmade crafts, and services.">

<meta name="keywords" content="Sell, For sale, Offer, Listing, Auction, Trade, Exchange, Dispose of, Hand over, Barter, Deal, Vend, Retail, Liquidate, Unload, Buy, Purchase, Want, Looking for, Seek, In search of, Acquire, Shop, Find, Obtain, Procure, Hunt, Get, Invest in, Secure">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="Repodei - Connecting Buyers and Sellers in an Innovative Marketplace">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.repodei.com">
<meta property="og:image" content="https://www.repodei.com/assets/imgs/theme/og-image.jpg">
<link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">


<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                        <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> English <i class="fi-rs-angle-small-down"></i></a>
                                    <ul class="language-dropdown">
                                        <li><a href="#"><img src="assets/imgs/theme/flag-fr.png" alt="">Français</a></li>
                                        <li><a href="#"><img src="assets/imgs/theme/flag-dt.png" alt="">Deutsch</a></li>
                                        <li><a href="#"><img src="assets/imgs/theme/flag-ru.png" alt="">Pусский</a></li>
                                    </ul>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Get great devices up to 50% off <a href="shop.html">View details</a></li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today <a href="shop.html">Shop now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>                                

                                @if (Route::has('login'))
                                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                    @auth
                                    <li><i class="fi-rs-key"></i><a href="{{route('admin')}}">Home </a> </li>
                                    @else
                                       <li><i class="fi-rs-key"></i><a href="{{ route('login') }}">Log In </a> / <i class="fi-rs-key"></i> <a href="{{ route('register') }}">Sign Up</a></li>
                                    @endauth
                                </div>
                                 @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{route('admin')}}"><img src="/assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-1">
                            <form action="{{ route('product.searchAndFilter') }}" method="GET">
                                <input type="text" name="search" placeholder="Search...">
                                </select>
                                <button type="submit">Apply Filters</button>
                            </form>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{route('admin')}}"><img src="/assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
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
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                   
                                   
									
                                                                    
                                                                    
                                    @if (auth()->check())
                                    @php
                                        $id = auth()->user()->id;
                                        $checkUser = DB::table('verifedaccounts')->where('usersid', $id)->first();
                                    @endphp

                                    @if ($checkUser)
                                       
                                        <li><a class="active" href="{{ route('admin') }}">Home </a></li>
                                        <li><a href="{{ route('post') }}">Post</a></li>
                                        <li><a href="{{ route('myproducts') }}">My products</a></li>
                                        <li><a href="{{route('orders')}}">Orders</a></li>
                                        <li><a href="{{route('profile')}}">Profile</a></li>
                                        <li><a href="{{ route('viewBuyersOrders') }}">Buyers Orders 1 </a></li>
                                        <li><a href="{{ route('viewBuyersOrders2') }}">Buyers Orders 2 </a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <li><button class="btn btn-primary btn-lg btn-block" type="submit">Log out</a></li>
                                            </form>
                                        </li>
                                       
                                    @else
                                        <li><a href="{{ route('upgrade') }}">Upgrade to be a seller</a></li>
                                        <li><a class="active" href="{{ route('admin') }}">Home </a></li>
                                        <li><a href="{{route('orders')}}">Orders</a></li>
                                        <li><a href="{{route('profile')}}">Profile</a></li>
                                        <li><form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <li><button class="btn btn-primary btn-lg btn-block" type="submit">Log out</a></li>
                                        </form></li>
                                    @endif
                                @else
                                @endif
                                    

                                   
                                   
                                 
                                </ul>
                            </nav>
                        </div>
                    </div>
                   
                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                          
                        
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{route('admin')}}"><img src="/assets/imgs/logo/logo.png" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
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
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="{{route('admin')}}">Home</a></li>
                           
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                   
                    @if (Route::has('login'))
                    @auth

                    @if (auth()->check())
                    @php
                        $id = auth()->user()->id;
                        $checkUser = DB::table('verifedaccounts')->where('usersid', $id)->first();
                    @endphp

                    @if ($checkUser)
                    <div class="single-mobile-header-info">
                        
                        <a class="active" href="{{ route('admin') }}">Home </a>
                        <a href="{{ route('post') }}">Post</a>
                        <a href="{{ route('myproducts') }}">My products</a>
                        <a href="{{route('orders')}}">Orders</a>
                        <a href="{{route('profile')}}">Profile</a>
                        <a href="{{ route('viewBuyersOrders') }}">Buyers Orders 1 </a>
                        <a href="{{ route('viewBuyersOrders2') }}">Buyers Orders 2 </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Log out</a>
                            </form>    
                        </div>
                    @else
                    <div class="single-mobile-header-info">
                        <a href="{{ route('upgrade') }}">Upgrade to be a seller</a>
                        <a class="active" href="{{ route('admin') }}">Home </a>
                        <a href="{{route('orders')}}">Orders</a>
                        <a href="{{route('profile')}}">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Log out</a>
                        </form>
                    </div>
                    @endif
                @else
                @endif
                
                   
                    @else
                        <div class="single-mobile-header-info">
                            <a href="{{ route('login') }}">Log In </a>                        
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="{{ route('register') }}">Register </a>                        
                        </div>
                    @endauth
                 @endif
                
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>   