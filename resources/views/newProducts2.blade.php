<!-- resources/views/newProducts.blade.php -->


    <h1>New Products</h1>

    <ul>
        @foreach($newProducts as $product)
            <li>
                {{ $product->name }} ({{ $product->created_at }})
            </li>
        @endforeach
    </ul>
 
