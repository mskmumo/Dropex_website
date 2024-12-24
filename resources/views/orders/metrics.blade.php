@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Order Metrics Dashboard</h1>
        <div class="mt-6">
            <h2 class="text-2xl font-bold">Total Orders: {{ $totalOrders }}</h2>
            <h2 class="text-2xl font-bold">Average Order Value: ${{ number_format($averageOrderValue, 2) }}</h2>
            <h2 class="text-2xl font-bold">Delivery Success Rate: {{ $deliverySuccessRate }}%</h2>
            <h2 class="text-2xl font-bold">Percentage of Orders Returned: {{ $returnRate }}%</h2>
        </div>
    </div>
@endsection 