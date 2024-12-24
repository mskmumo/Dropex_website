@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Your Parcels</h1>
        <form action="{{ route('parcels.index') }}" method="GET" class="flex justify-center mb-4">
            <input type="text" name="search" placeholder="Search by Tracking ID" class="p-3 border border-gray-300 rounded-l-lg w-full md:w-1/3" required>
            <button type="submit" class="bg-teal-600 text-white font-semibold py-3 px-4 rounded-r-lg hover:bg-teal-700 transition">Search</button>
        </form>
        <table class="min-w-full mt-4 border border-gray-300">
            <thead>
                <tr>
                    <th class="p-2">Parcel ID</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Current Location</th>
                    <th class="p-2">Estimated Delivery</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parcels as $parcel)
                    <tr>
                        <td class="p-2">{{ $parcel->id }}</td>
                        <td class="p-2">{{ ucfirst($parcel->status) }}</td>
                        <td class="p-2">{{ $parcel->current_location }}</td>
                        <td class="p-2">{{ $parcel->estimated_delivery }}</td>
                        <td class="p-2">
                            <a href="{{ route('parcels.show', $parcel->id) }}" class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 