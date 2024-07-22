
    <h3>Related Products</h3>
    <div class="related-products">
        @foreach ($relatedProducts as $relatedProduct)
            <div class="related-product">
                <a href="{{ route('info', ['id' => $relatedProduct->id]) }}">hhh
                    <img src="{{ asset('product/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->productname }}">
                    <p>{{ $relatedProduct->productname }}</p>
                </a>
            </div>
        @endforeach
    </div>
