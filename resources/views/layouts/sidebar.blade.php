<aside class="w-64 bg-white shadow-md h-screen">
    <ul class="p-4">
        <li>
            <a href="{{ route('dashboard') }}" 
               class="flex items-center p-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('dashboard') ? 'bg-gray-100' : '' }}">
                <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
            </a>
        </li>
        
        <li>
            <a href="{{ route('parcels.index') }}" 
               class="flex items-center p-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('parcels.*') ? 'bg-gray-100' : '' }}">
                <i class="fas fa-box mr-3"></i> My Shipments
            </a>
        </li>
        
        <li>
            <a href="{{ route('auctions.index') }}" 
               class="flex items-center p-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('auctions.*') ? 'bg-gray-100' : '' }}">
                <i class="fas fa-gavel mr-3"></i> Auctions
            </a>
        </li>
        
        <li>
            <a href="{{ route('tasks.index') }}" 
               class="flex items-center p-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('tasks.*') ? 'bg-gray-100' : '' }}">
                <i class="fas fa-tasks mr-3"></i> Tasks
            </a>
        </li>
        
        <li>
            <a href="{{ route('returns.index') }}" 
               class="flex items-center p-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('returns.*') ? 'bg-gray-100' : '' }}">
                <i class="fas fa-undo mr-3"></i> Returns
            </a>
        </li>
        
        <li>
            <a href="{{ route('orders.index') }}" 
               class="flex items-center p-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('orders.*') ? 'bg-gray-100' : '' }}">
                <i class="fas fa-shopping-cart mr-3"></i> Orders
            </a>
        </li>
        
        <li>
            <a href="#" 
               class="flex items-center p-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('support') ? 'bg-gray-100' : '' }}">
                <i class="fas fa-headset mr-3"></i> Support
            </a>
        </li>
        
        <li>
            <a href="#" 
               class="flex items-center p-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('settings') ? 'bg-gray-100' : '' }}">
                <i class="fas fa-cog mr-3"></i> Settings
            </a>
        </li>
    </ul>
</aside>