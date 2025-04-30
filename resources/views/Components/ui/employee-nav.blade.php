<div class="flex h-screen">
    <!-- Sidebar -->
    <nav class="bg-blue-950 text-white w-64 p-6 flex flex-col justify-between shadow-lg">
        <div>
            <div class="text-2xl font-bold mb-8">Employee</div>
            <div class="flex flex-col space-y-4">
                <x-ui.nav-link href="{{ route('employee.home') }}" :active="request()->routeIs('employee.home')">Home</x-ui.nav-link>
                <x-ui.nav-link href="{{ route('employee.ordersList') }}" :active="request()->routeIs('employee.ordersList')">Order List</x-ui.nav-link>
                <x-ui.nav-link href="{{ route('order.create') }}" :active="request()->routeIs('order.create')">Order</x-ui.nav-link>
                <x-ui.nav-link href="{{ route('stores.index') }}" :active="request()->routeIs('stores.index')">Store</x-ui.nav-link>
                <x-ui.nav-link href="{{ route('employee.profile') }}" :active="request()->routeIs('employee.profile')">Profile</x-ui.nav-link>
            </div>
        </div>

        <div class="space-y-4">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/' . (Auth::user()->profile_photo ?? 'profile.jpg')) }}"
                    alt="Profile"
                    class="w-10 h-10 rounded-full object-cover border border-white">
                <div>
                    <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 px-3 py-1 rounded hover:bg-red-700 transition w-full text-left">Logout</button>
            </form>
        </div>

    </nav>
</div>

