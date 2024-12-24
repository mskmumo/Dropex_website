@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Return Details - ID: {{ $return->id }}</h1>
        <p><strong>Order ID:</strong> {{ $return->order_id }}</p>
        <p><strong>Reason:</strong> {{ $return->reason }}</p>
        <p><strong>Status:</strong> {{ ucfirst($return->status) }}</p>
        @if($return->attachment)
            <p><strong>Attachment:</strong> <a href="{{ asset('storage/' . $return->attachment) }}" class="text-blue-600 hover:underline">View Attachment</a></p>
        @endif
    </div>
@endsection 