
@section('content')
    <h1>Products in Category: {{ $category }}</h1>

    @foreach ($productTypes as $productType)
        <div class="product">
            <h2>{{ $productType->productname }}</h2>
            <p>{{ $productType->information }}</p>
            <!-- Add more product information here -->
        </div>
    @endforeach