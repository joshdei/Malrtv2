<x-app-layout>
    @php
        $grandTotal = 0;
    @endphp
    
    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product Name:</th>
                                        <th scope="col">Product Price:</th>
                                        <th scope="col">Product Value:</th>
                                        <th scope="col">Order Date:</th>
                                        <th scope="col">Buyer Name:</th>
                                        <th scope="col">Call or Text Buyer:</th>
                                        
                                        
                                        <th scope="col">Total</th>
                                        <th scope="col"></th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($buyerOrders as $order)
                                   
                                             
                                                <input type="hidden" name="usersid" value="{{ Auth::user()->id }}" >
                                                <tr>
                                                    <td class="image product-thumbnail"><img src="{{ asset('product/' . $order->image) }}" alt="#"></td>
                                                    <td class="product-des product-name">
                                                        <h5 class="product-name"><a href="{{ route('info', ['id' => $order->products_id]) }}">{{ $order->productname }}</a></h5>
                                                    </td>
                                                     <input type="hidden" name="orderid" value="{{ $order->products_id }}">
                                                     <td class="price" data-title="Price"><span>&#x20A6;{{ $order->product_price }}</span></td>

                                                    <td class="text-center" data-title="Stock">
                                                        
                                                             {{ $order->product_value }}
                                                    
                                                    </td>
                                                    <td class="text-right" data-title="Cart">
                                                        <span>{{ $order->created_at }}</span>
                                                    </td>
                                                    <td class="action" data-title="Remove">
                                                        {{ $order->fname }}   {{ $order->lname }}
                                                    </td>
                                                   
                                                    <td>    
                                                     
                                                        <a href="https://wa.me/{{ $order->phone }}">Send WhatsApp Message</a>
                                                    </td>
                                                    
                                                     
                                                    @php
                                                        $subtotal = $order->product_price * $order->product_value;
                                                        $grandTotal += $subtotal;
                                                    @endphp
                                                    
                                                    <td>
                                                    <p>  &#x20A6;{{ number_format($subtotal, 2) }}</p>
                                                    </td>
                                                    
                                                   
                                                    
                                                  
                                                   
                                                    <td>
                                                     
                                                            <a class="btn  mr-10 mb-sm-15" href="tel:{{ $order->phone }}" style="color: white;">{{ $order->phone }}</a>
                                                     
                                                        
                                                    </td>
                                                    
                                                    
                                                </tr>
                                                
                                      
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="cart-action text-end">
                            <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Grand Total: {{ number_format($grandTotal, 2) }}</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    @include('footer')
</x-app-layout>
