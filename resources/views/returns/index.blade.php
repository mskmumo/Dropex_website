@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-blue-800">Your Returns</h1>
        <a href="{{ route('returns.create') }}" class="bg-teal-600 text-white font-semibold py-2 px-4 rounded">Initiate Return</a>
        <ul class="mt-4">
            @foreach($returns as $return)
                <li>
                    <a href="{{ route('returns.show', $return->id) }}" class="text-blue-600 hover:underline">{{ $return->reason }}</a> - {{ ucfirst($return->status) }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection 