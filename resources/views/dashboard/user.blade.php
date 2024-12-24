@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">User Dashboard</h1>
        <ul class="mt-6">
            <li><a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-teal-600">Your Tasks</a></li>
            <li><a href="{{ route('orders.index') }}" class="text-gray-700 hover:text-teal-600">Order Overview</a></li>
            <li><a href="{{ route('orders.metrics') }}" class="text-gray-700 hover:text-teal-600">Order Metrics</a></li>
            <li><a href="{{ route('parcels.index') }}" class="text-gray-700 hover:text-teal-600">Parcel Tracking</a></li>
            @foreach($parcels as $parcel)
                <li><a href="{{ route('parcels.timeline', $parcel->id) }}" class="text-gray-700 hover:text-teal-600">Track Parcel #{{ $parcel->tracking_number }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection 