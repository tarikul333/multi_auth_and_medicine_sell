<x-layout.employee>
    <x-slot:title>
        Employee Sales
    </x-slot:title>

    <div class="max-w-6xl mx-auto mt-2">
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="w-1/12 border-b text-gray-600 px-6 py-3 text-center">SL No</th>
                        <th class="w-3/12 border-b text-gray-600 px-6 py-3 text-center">Store Name</th>
                        <th class="w-2/12 border-b text-gray-600 px-6 py-3 text-center">Address</th>
                        <th class="w-3/12 border-b text-gray-600 px-6 py-3 text-center">Total Price</th>
                        <th class="w-3/12 border-b text-gray-600 px-6 py-3 text-center">Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $key => $order)
                        <tr class="hover:bg-gray-200 transition cursor-pointer" onclick="window.location='{{ route('order.invoice', $order->id) }}'">
                            <td class="border-b py-3 px-6 text-center text-gray-800">{{ $key + 1 }}</td>
                            <td class="border-b py-3 px-6 text-center text-gray-800">{{ $order->store->store_name }}</td>
                            <td class="border-b py-3 px-6 text-center text-gray-800">{{ $order->address->street }}</td>
                            <td class="border-b py-3 px-6 text-center text-gray-800">৳{{ number_format($order->total_amount, 2) }}</td>
                            <td class="border-b py-3 px-6 text-center text-gray-800">{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border-b px-6 py-3 text-center text-gray-500">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout.employee>

