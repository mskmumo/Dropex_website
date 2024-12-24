@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Manage Auctions</h1>
        <p class="mt-4">Here you can create, view, and manage your auctions.</p>

        <!-- Create Auction Form -->
        <div class="mt-6">
            <h2 class="text-2xl font-bold">Create New Auction</h2>
            <form action="{{ route('auctions.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Auction Title</label>
                    <input type="text" name="title" id="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea name="description" id="description" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <div class="mb-4">
                    <label for="start_time" class="block text-gray-700">Start Time</label>
                    <input type="datetime-local" name="start_time" id="start_time" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label for="end_time" class="block text-gray-700">End Time</label>
                    <input type="datetime-local" name="end_time" id="end_time" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <button type="submit" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded">Create Auction</button>
            </form>
        </div>

        <!-- Existing Auctions List -->
        <div class="mt-10">
            <h2 class="text-2xl font-bold">Existing Auctions</h2>
            <table class="min-w-full mt-4 border border-gray-300">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-300 px-4 py-2">Title</th>
                        <th class="border-b-2 border-gray-300 px-4 py-2">Start Time</th>
                        <th class="border-b-2 border-gray-300 px-4 py-2">End Time</th>
                        <th class="border-b-2 border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($auctions as $auction)
                        <tr>
                            <td class="border-b border-gray-300 px-4 py-2">{{ $auction->title }}</td>
                            <td class="border-b border-gray-300 px-4 py-2">{{ $auction->start_time }}</td>
                            <td class="border-b border-gray-300 px-4 py-2">{{ $auction->end_time }}</td>
                            <td class="border-b border-gray-300 px-4 py-2">
                                <a href="{{ route('auctions.edit', $auction->id) }}" class="text-teal-600 hover:underline">Edit</a>
                                <form action="{{ route('auctions.destroy', $auction->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection 