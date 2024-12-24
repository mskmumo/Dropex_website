@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Parcel Details - ID: {{ $parcel->id }}</h1>
        <p><strong>Status:</strong> {{ ucfirst($parcel->status) }}</p>
        <p><strong>Current Location:</strong> {{ $parcel->current_location }}</p>
        <p><strong>Estimated Delivery:</strong> {{ $parcel->estimated_delivery }}</p>
        <p><strong>Estimated Delivery Time:</strong> {{ calculateETA($parcel) }}</p>

        <h2 class="text-2xl font-bold mt-6">Update Parcel Status</h2>
        <form action="{{ route('parcels.updateStatus', $parcel->id) }}" method="POST">
            @csrf
            <select name="status" class="border rounded p-2 w-full">
                <option value="Pending">Pending</option>
                <option value="In Transit">In Transit</option>
                <option value="Delivered">Delivered</option>
                <option value="Returned">Returned</option>
            </select>
            <button type="submit" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded w-full">Update Status</button>
        </form>

        <h2 class="text-2xl font-bold mt-6">Delivery Confirmation</h2>
        <form action="{{ route('parcels.confirmDelivery', $parcel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="signature">Digital Signature:</label>
            <input type="file" name="signature" accept="image/*" required class="w-full">
            <label for="photo">Delivery Photo:</label>
            <input type="file" name="photo" accept="image/*" required class="w-full">
            <button type="submit" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded w-full">Confirm Delivery</button>
        </form>

        <h2 class="text-2xl font-bold mt-6">Parcel QR Code</h2>
        <img src="{{ \SimpleQrcode::generate($parcel->tracking_number) }}" alt="QR Code for Parcel" class="w-full">
    </div>
@endsection 