@extends('layouts.app')

{{-- @section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Your Tickets</h1>
        <a href="{{ route('tickets.create') }}" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded">Submit New Ticket</a>
        <ul class="mt-4">
            @foreach($tickets as $ticket)
                <li>
                    <a href="{{ route('tickets.show', $ticket->id) }}" class="text-blue-600 hover:underline">{{ $ticket->subject }}</a> - {{ ucfirst($ticket->status) }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection  --}}
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Support Tickets</h2>
                        <a href="{{ route('tickets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            New Ticket
                        </a>
                    </div>
                    
                    @forelse($tickets as $ticket)
                        <div class="mb-4 p-4 border rounded hover:bg-gray-50">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold">{{ $ticket->subject }}</h3>
                                <span class="px-2 py-1 rounded text-sm 
                                    {{ $ticket->status === 'open' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $ticket->status === 'in_progress' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $ticket->status === 'closed' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($ticket->status) }}
                                </span>
                            </div>
                            <p class="text-gray-600 mt-2">{{ Str::limit($ticket->description, 100) }}</p>
                            <div class="mt-2 text-sm text-gray-500">
                                Created {{ $ticket->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @empty
                        <p>No tickets found.</p>
                    @endforelse
                </div>

                <ul class="mt-4">
                    @foreach($tickets as $ticket)
                        <li>
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="text-blue-600 hover:underline">{{ $ticket->subject }}</a> - {{ ucfirst($ticket->status) }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>