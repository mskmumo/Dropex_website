@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Task Calendar</h1>
        <div id='calendar'></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: [
                    @foreach($tasks as $task)
                    {
                        title: '{{ $task->title }}',
                        start: '{{ $task->due_date }}',
                        url: '{{ route('tasks.edit', $task->id) }}'
                    },
                    @endforeach
                ],
                eventClick: function(event) {
                    if (event.url) {
                        window.location = event.url;
                        return false;
                    }
                }
            });
        });
    </script>
@endsection 