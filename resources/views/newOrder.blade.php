
<x-app-layout>
     <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-sm-15">
                        <div class="toggle_info">
                            <span><i class="fi-rs-user mr-10"></i><span class="text-muted">Get an  an account?</span> <a href="{{route('register')}}" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to Sign uP</a></span>
                        </div>
                     
                    </div>
                 
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                      
                        <form method="POST" action="{{ route('createneworder')}} " enctype="multipart/form-data">
                                @csrf
                            <div class="form-group">
                                <input type="text" required="" name="fname" placeholder="First name *">
                            </div>
                            <div class="form-group">
                                <input type="text" required="" name="lname" placeholder="Last name *">
                            </div>
                            <div class="form-group">
                                <div class="custom_select">
                                    <select name="country"  class="form-control select-active">
                                        <option value="">Select an option...</option>
                                        <option value="Nigeria"> Nigeria</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="billing_address" required="" placeholder="Address *">
                            </div>
                         
                            <div class="form-group">
                                <input required="" type="text" name="city" placeholder="City / Town *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="state" placeholder="State / County *">
                            </div>
                           
                            <div class="form-group">
                                <input required="" type="text" name="phone" placeholder="Phone *">
                            </div>
                            <div class="form-group">
                                <input required="" type="text" name="email" placeholder="Email address *">
                            </div>
                            
                            
                   
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($selectedProductInfo as $product)
    <tr>
        <td class="image product-thumbnail"><img  src="{{ asset('product/' . $product->image) }}" alt="{{ $product->productname }}"></td>
        <td>
            <input name="products_id" value="{{ $product->id }}" type="hidden">
            <h5 ><a href="{{ route('info', ['id' => $product->id]) }}">{{ $product->productname }}</a></h5>
            <span class="product-qty"> {{$product_value}}</span> 
                <input type="hidden" name="product_value" value="{{ $product_value }}" />
        </td>
        <td name="products_newprice">&#x20A6;{{ $product->newprice * $product_value }}</td>
        <input type="hidden" name="products_newprice" value="{{ $product->newprice * $product_value }}" />

    </tr>
@endforeach       
                                    </tbody>
                                </table>

                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                           
                           <input class="btn btn-fill-out btn-block mt-30" type="submit" value="Place Order">
                        </div>

                               
                    </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

   
 
   @include('footer')



</x-app-layout>