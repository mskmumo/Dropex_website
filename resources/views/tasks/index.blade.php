@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-3xl font-bold text-blue-800">Your Tasks</h1>
        <p class="mt-4">Here you can view and manage your tasks.</p>

        <form action="{{ route('tasks.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Task Title</label>
                <input type="text" name="title" id="title" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-gray-700">Due Date</label>
                <input type="datetime-local" name="due_date" id="due_date" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded">Add Task</button>
        </form>

        <div class="mt-10">
            <h2 class="text-2xl font-bold">Existing Tasks</h2>
            <table class="min-w-full mt-4 border border-gray-300">
                <thead>
                    <tr>
                        <th class="border-b-2 border-gray-300 px-4 py-2">Title</th>
                        <th class="border-b-2 border-gray-300 px-4 py-2">Due Date</th>
                        <th class="border-b-2 border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="border-b border-gray-300 px-4 py-2">{{ $task->title }}</td>
                            <td class="border-b border-gray-300 px-4 py-2">{{ $task->due_date }}</td>
                            <td class="border-b border-gray-300 px-4 py-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-teal-600 hover:underline">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
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