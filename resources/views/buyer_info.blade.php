@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Buyer Information</h2>
        <p>Name: {{ $buyerInfo->name }}</p>
        <p>Email: {{ $buyerInfo->email }}</p>
        <!-- Add more buyer information fields as needed -->

        <h2>Buyer Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Value</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buyerOrders as $order)
                    <tr>
                        <td>{{ $order->productname }}</td>
                        <td>{{ $order->product_value }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
