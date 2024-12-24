<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Track Parcel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <form action="{{ route('track.parcel') }}" method="GET" class="flex gap-4">
                            <input type="text" name="tracking_id" 
                                   value="{{ request('tracking_id') }}"
                                   class="w-full rounded-md border-gray-300" 
                                   placeholder="Enter Tracking ID">
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md">
                                Track
                            </button>
                        </form>
                    </div>

                    @if(request('tracking_id'))
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold mb-4">Tracking Results</h3>
                            <div class="border rounded-md p-4">
                                <p>Tracking ID: {{ request('tracking_id') }}</p>
                                <!-- Add more tracking details here -->
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>