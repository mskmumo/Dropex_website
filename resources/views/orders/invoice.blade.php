<!DOCTYPE html>
<html>
<head>
    <title>Invoice - Order ID: {{ $order->id }}</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <h1>Invoice for Order ID: {{ $order->id }}</h1>
    <p>Customer Name: {{ $order->customer_name }}</p>
    <p>Payment Status: {{ ucfirst($order->payment_status) }}</p>
    <h2>Products</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 