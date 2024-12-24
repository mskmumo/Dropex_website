@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Order Overview</h1>

        <!-- Filters and Search -->
        <div class="flex justify-between mt-4">
            <div>
                <input type="text" id="search" placeholder="Search Orders..." class="border rounded p-2">
            </div>
            <div>
                <select id="statusFilter" class="border rounded p-2">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                </select>
                <button id="filterBtn" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded">Filter</button>
            </div>
        </div>

        <!-- Orders Table -->
        <form action="{{ route('orders.bulkUpdate') }}" method="POST">
            @csrf
            <table class="min-w-full mt-4 border border-gray-300">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Status</th>
                        <th>Order Value</th>
                        <th>Delivery Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td><input type="checkbox" name="order_ids[]" value="{{ $order->id }}"></td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>${{ number_format($order->value, 2) }}</td>
                            <td>{{ $order->delivery_date->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded">Update Selected</button>
        </form>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }} <!-- Laravel pagination links -->
        </div>
    </div>
@endsection 