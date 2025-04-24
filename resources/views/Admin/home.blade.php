<x-layout.admin>
    <x-slot:title>
        Admin Dashboard
    </x-slot:title>

    <div class="max-w-7xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome, Admin</h1>

        {{-- Overview Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500">Total Employees</p>
                <p class="text-2xl font-bold text-blue-600">{{ $totalEmployees }}</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500">Total Stores</p>
                <p class="text-2xl font-bold text-green-600">{{ $totalStores }}</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500">Total Orders</p>
                <p class="text-2xl font-bold text-purple-600">{{ $totalOrders }}</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <p class="text-sm text-gray-500">Total Sales (৳)</p>
                <p class="text-2xl font-bold text-red-600">৳{{ number_format($totalSales, 2) }}</p>
            </div>
        </div>

        {{-- Recent Activity --}}
        <div class="bg-white p-6 rounded-xl shadow mb-10">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Orders</h2>
            <table class="w-full table-auto text-sm border border-gray-200">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-3 border">Order ID</th>
                        <th class="p-3 border">Employee</th>
                        <th class="p-3 border">Store</th>
                        <th class="p-3 border">Date</th>
                        <th class="p-3 border">Total (৳)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                        @php
                            $total = 0;
                            foreach ($order->orderItems as $item) {
                                $total += ($item->medicine->price ?? 0) * $item->quantity;
                            }
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border">{{ $order->id }}</td>
                            <td class="p-3 border">{{ $order->user->name }}</td>
                            <td class="p-3 border">{{ $order->store->store_name ?? 'N/A' }}</td>
                            <td class="p-3 border">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="p-3 border">৳{{ number_format($total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout.admin>
