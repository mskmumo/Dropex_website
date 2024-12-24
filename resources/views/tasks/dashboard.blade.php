@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Task Dashboard</h1>

        <div class="mt-6">
            <h2 class="text-2xl font-bold">Upcoming Tasks</h2>
            <ul>
                @foreach($upcomingTasks as $task)
                    <li class="border-b border-gray-300 py-2">
                        {{ $task->title }} - Due: {{ $task->due_date }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-bold">Ongoing Tasks</h2>
            <ul>
                @foreach($ongoingTasks as $task)
                    <li class="border-b border-gray-300 py-2">
                        {{ $task->title }} - Due: {{ $task->due_date }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-bold">Completed Tasks</h2>
            <ul>
                @foreach($completedTasks as $task)
                    <li class="border-b border-gray-300 py-2">
                        {{ $task->title }} - Completed on: {{ $task->updated_at }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection 