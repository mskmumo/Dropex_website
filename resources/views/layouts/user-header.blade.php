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