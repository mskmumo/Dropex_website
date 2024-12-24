@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Submit a New Ticket</h1>
        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="subject" class="block">Subject</label>
                <input type="text" name="subject" class="border rounded p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block">Description</label>
                <textarea name="description" class="border rounded p-2 w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="priority" class="block">Priority</label>
                <select name="priority" class="border rounded p-2 w-full" required>
                    <option value="Normal">Normal</option>
                    <option value="High">High</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="attachment" class="block">Attachment (optional)</label>
                <input type="file" name="attachment" class="border rounded p-2 w-full">
            </div>
            <button type="submit" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded">Submit Ticket</button>
        </form>
    </div>
@endsection 