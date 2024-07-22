
    <h3>Recommended Products</h3>
    <div class="recommended-products">
        @foreach ($recommendedProducts as $product)
            <div class="recommended-product">
                <a href="{{ route('info', ['id' => $product->id]) }}">
                    <img src="{{ asset('product/' . $product->image) }}" alt="{{ $product->productname }}">
                    <p>{{ $product->name }}</p>
                </a>
            </div>
        @endforeach
    </div>
