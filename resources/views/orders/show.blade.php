@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Order Details - ID: {{ $order->id }}</h1>
        <p><strong>Estimated Shipment Time:</strong> {{ $order->estimated_shipment_time }} days</p>
        <p><strong>Supplier Rating:</strong> {{ $order->supplier->rating }} / 5</p>

        <div class="mt-6">
            <h2 class="text-2xl font-bold">Shipment Tracking</h2>
            <p><strong>Status:</strong> {{ $order->shipment_status }}</p>
            <div id="map" style="height: 400px;"></div>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-bold">Order Timeline</h2>
            <ul class="list-disc pl-5">
                <li>Order Placed: {{ $order->created_at->format('d M Y') }}</li>
                <li>Payment Confirmed: {{ $order->payment_confirmed_at ? $order->payment_confirmed_at->format('d M Y') : 'N/A' }}</li>
                <li>Shipment Dispatched: {{ $order->shipped_at ? $order->shipped_at->format('d M Y') : 'N/A' }}</li>
                <li>Delivery Completed: {{ $order->delivered_at ? $order->delivered_at->format('d M Y') : 'N/A' }}</li>
            </ul>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-bold">Modify Order</h2>
            <!-- Add modify order form here -->
        </div>
    </div>
@endsection 