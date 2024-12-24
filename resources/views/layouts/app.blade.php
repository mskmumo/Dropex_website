<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropex Logistics - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="logo text-2xl font-bold text-teal-600">DropEX Logistics</div>
            <nav class="nav">
                <ul class="flex space-x-6">
                    <li><a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-teal-600">Dashboard</a></li>
                    <li><a href="{{ route('parcels.index') }}" class="text-gray-700 hover:text-teal-600">My Shipments</a></li>
                    <li><a href="{{ route('auctions.index') }}" class="text-gray-700 hover:text-teal-600">Auctions</a></li>
                    <li><a href="{{ route('logout') }}" class="text-gray-700 hover:text-teal-600">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="flex">
        @include('layouts.sidebar')
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>