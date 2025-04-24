<div class="flex h-screen">
    <!-- Sidebar -->
    <nav class="bg-gray-700 text-white w-64 p-6 flex flex-col justify-between shadow-lg">
        <div>
            <div class="text-2xl font-bold mb-8">Admin</div>
            <div class="flex flex-col space-y-4">
                <x-ui.nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">Home</x-ui.nav-link>
                <x-ui.nav-link href="{{ route('employees.details') }}" class="hover:underline">Employees</x-ui.nav-link>
                <x-ui.nav-link href="#" class="hover:underline">Settings</x-ui.nav-link>
            </div>
        </div>

        <div class="space-y-4">
            <span class="block">Welcome, {{ Auth::guard('admin')->user()->name }}</span>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 px-3 py-1 rounded hover:bg-red-700 transition w-full text-left">Logout</button>
            </form>

            <div class="relative" x-data="{ open: false }">
                <button 
                    @click="open = !open" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:outline-none transition w-full text-left"
                >
                    Register
                </button>

                <div 
                    x-show="open" 
                    @click.away="open = false"
                    class="absolute bottom-14 bg-white border rounded-md shadow-lg w-48 py-2 text-gray-800 z-50"
                >
                    <a href="{{ route('admin.register') }}" class="block px-4 py-2 hover:bg-gray-200 transition">Admin Register</a>
                    <a href="{{ route('employee.register') }}" class="block px-4 py-2 hover:bg-gray-200 transition">Employee Register</a>
                </div>
            </div>
        </div>
    </nav>
</div>
