<x-layout.employee>
    <x-slot:title>
        Store
    </x-slot:title>

    <div class="max-w-6xl mx-auto py-10 px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('create.store') }}" class="bg-blue-600 hover:bg-blue-700 text-white p-6 rounded-xl shadow-md transition duration-300">
                <h2 class="text-xl font-semibold mb-2">+ Add New Store</h2>
                <p class="text-sm">Place a new store.</p>
            </a>

            <a href="{{ route('employee.ordersList') }}" class="bg-green-600 hover:bg-green-700 text-white p-6 rounded-xl shadow-md transition duration-300">
                <h2 class="text-xl font-semibold mb-2">Show Store Order</h2>
                <p class="text-sm">View store submitted orders and their status.</p>
            </a>

            <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white p-6 rounded-xl shadow-md transition duration-300">
                <h2 class="text-xl font-semibold mb-2">Show Store</h2>
                <p class="text-sm">View store.</p>
            </a>
        </div>
    </div>

    <div class="max-w-6xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-6">Store List</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($stores as $store)
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <h2 class="text-lg font-semibold">{{ $store->store_name }}</h2>
                    <p class="text-sm text-gray-600">we are created</p>
                </div>
            @empty
                <p>No stores available.</p>
            @endforelse
        </div>
    </div>

</x-layout.employee>