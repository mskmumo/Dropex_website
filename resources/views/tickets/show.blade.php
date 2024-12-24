@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Ticket Details - ID: {{ $ticket->id }}</h1>
        <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
        <p><strong>Description:</strong> {{ $ticket->description }}</p>
        <p><strong>Priority:</strong> {{ ucfirst($ticket->priority) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
        @if($ticket->attachment)
            <p><strong>Attachment:</strong> <a href="{{ asset('storage/' . $ticket->attachment) }}" class="text-blue-600 hover:underline">View Attachment</a></p>
        @endif
    </div>
@endsection 