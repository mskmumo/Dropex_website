@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Initiate a Return</h1>
        <form action="{{ route('returns.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="order_id" class="block">Order</label>
                <select name="order_id" class="border rounded p-2 w-full" required>
                    @foreach($orders as $order)
                        <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="reason" class="block">Reason for Return</label>
                <input type="text" name="reason" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="attachment" class="block">Attachment (optional)</label>
                <input type="file" name="attachment" class="border rounded p-2 w-full">
            </div>
            <button type="submit" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded">Submit Return</button>
        </form>
    </div>
@endsection 