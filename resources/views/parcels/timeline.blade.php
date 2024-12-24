@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Shipment Progress - Parcel ID: {{ $parcel->id }}</h1>
        <ul class="timeline">
            @foreach($parcel->milestones as $milestone)
                <li class="mb-4">
                    <div class="timeline-content p-4 border border-gray-300 rounded">
                        <h2 class="font-bold">{{ $milestone->status }}</h2>
                        <p class="text-gray-600">{{ $milestone->created_at->diffForHumans() }}</p>
                        <p><strong>Location:</strong> {{ $milestone->location }}</p>
                        <p><strong>Notes:</strong> {{ $milestone->notes }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection 