<x-app-layout>
    {{ trans('messages.welcome') }}


    <a href="{{ route('admin', ['lang' => 'en']) }}">English</a>
    <a href="{{ route('admin', ['lang' => 'es']) }}">Español</a>

    <main class="main">
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userOrdersWithProductInfo as $productData)
                                        <tr>
                                            <td class="image product-thumbnail"><img src="{{ asset('product/' . $productData->image) }}" alt="#"></td>
                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a href="{{ route('info', ['id' => $productData->id]) }}">{{ $productData->productname }}</a></h5>
                                                <p class="font-xs">{{ $productData->information }}</p>
                                            </td>
                                            <td class="price" data-title="Price"><span>{{ $productData->newprice }}</span></td>
                                            <td class="text-center" data-title="Stock">
                                                <div class="detail-qty border radius m-auto">
                                                    <span class="qty-val" name="total_orders">{{ $productData->total_orders }}</span>
                                                </div>
                                            </td>
                                            <td class="text-right" data-title="Cart">
                                                <span name="grand_total">{{ $productData->total_orders * $productData->newprice }}</span>
                                            </td>
                                            <!-- Add this cell to display the status -->
                                            <td> {{ $productData->status }}</td>

                                                @if($productData->status == 'approved' || $productData->status == 'pending')
                                                    {{-- Conditionally hide this block for 'approved' and 'pending' statuses --}}
                                                @else
                                                    <td class="action" data-title="Remove">
                                                        <form action="{{ route('orders.delete', ['id' => $productData->id]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"><i class="fi-rs-trash">Delete</i></button>
                                                        </form>
                                                    </td>
                                                

                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <form action="{{ route('store_seller_product_data') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="buyer_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="product_id" value="{{ $productData->id }}">
                                                    <input type="hidden" name="total_orders" value="{{ $productData->total_orders }}">
                                                    <input type="hidden" name="grand_total" value="{{ $productData->total_orders * (float)$productData->newprice }}">
                                                    <!-- Add more hidden fields as needed -->
                                                    <button type="submit">Save Product Data for Seller</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Grand Total: {{ $totalSum }}</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    @include('footer')
</x-app-layout>
