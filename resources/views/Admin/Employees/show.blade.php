<x-layout.admin>
    <x-slot:title>
        Sales List - {{ $employee->name }}
    </x-slot:title>

    <div class="max-w-6xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-6">Sales by {{ $employee->name }}</h1>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full table-auto text-sm border border-gray-200">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-3 border">Order ID</th>
                        <th class="p-3 border">Date</th>
                        <th class="p-3 border">Store</th>
                        <th class="p-3 border">Total Amount (৳)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @forelse ($employee->orders as $order)
                        @php
                            $total = 0;
                            foreach ($order->orderItems as $item) {
                                $total += ($item->medicine->price ?? 0) * $item->quantity;
                            }
                            $grandTotal += $total;
                        @endphp
                        <tr class="hover:bg-gray-200 transition cursor-pointer" onclick="window.location='{{ route('show.invoice', $order->id) }}'">
                            <td class="p-3 border">{{ $order->id }}</td>
                            <td class="p-3 border">{{ $order->created_at->format('d M Y') }}</td>
                            <td class="p-3 border">{{ $order->store->store_name ?? 'N/A' }}</td>
                            <td class="p-3 border">৳{{ number_format($total, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-gray-500">No sales found.</td>
                        </tr>
                    @endforelse
                </tbody>
                @if($grandTotal > 0)
                <tfoot class="bg-gray-50 font-semibold">
                    <tr>
                        <td colspan="3" class="p-3 border text-right">Total Sales</td>
                        <td class="p-3 border">৳{{ number_format($grandTotal, 2) }}</td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</x-layout.admin>
