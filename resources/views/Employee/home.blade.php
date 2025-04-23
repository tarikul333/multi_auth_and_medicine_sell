<x-layout.employee>
    <x-slot:title>
        Employee Dashboard
    </x-slot:title>

    <div class="max-w-6xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome, {{ auth()->user()->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('order.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white p-6 rounded-xl shadow-md transition duration-300">
                <h2 class="text-xl font-semibold mb-2">Create New Order</h2>
                <p class="text-sm">Place a new medicine order to a store.</p>
            </a>

            <a href="{{ route('employee.ordersList') }}" class="bg-green-600 hover:bg-green-700 text-white p-6 rounded-xl shadow-md transition duration-300">
                <h2 class="text-xl font-semibold mb-2">My Orders</h2>
                <p class="text-sm">View your submitted orders and their status.</p>
            </a>

            <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white p-6 rounded-xl shadow-md transition duration-300">
                <h2 class="text-xl font-semibold mb-2">Profile</h2>
                <p class="text-sm">Update your profile and settings (coming soon).</p>
            </a>
        </div>
    </div>
</x-layout.employee>

    
