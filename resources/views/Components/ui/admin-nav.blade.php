<nav class="bg-gray-800 p-4 text-white flex justify-between items-center shadow-md">
    <div class="text-lg font-bold">Admin</div>
    <div class="flex space-x-4">
        <x-ui.nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">Home</x-ui.nav-link>
        <x-ui.nav-link href="#" class="hover:underline">Manage Users</x-ui.nav-link>
        <x-ui.nav-link href="#" class="hover:underline">Settings</x-ui.nav-link>
    </div>
    <div class="flex items-center space-x-4">
        <span>Welcome, {{ Auth::guard('admin')->user()->name }}</span>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 px-3 py-1 rounded hover:bg-red-700 transition">Logout</button>
        </form>
        
        <div class="relative" x-data="{ open: false }">
            <button 
                @click="open = !open" 
                class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:outline-none transition"
            >
                Register
            </button>

            <div 
                x-show="open" 
                @click.away="open = false"
                class="absolute right-0 mt-2 bg-white border rounded-md shadow-lg w-48 py-2 z-50"
            >
                <a href="{{ route('admin.register') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition">Admin Register</a>
                <a href="{{ route('employee.register') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition">Employee Register</a>
            </div>
        </div>
    </div>
</nav>