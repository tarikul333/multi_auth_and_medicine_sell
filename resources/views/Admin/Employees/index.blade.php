<x-layout.admin>
    <x-slot:title>
        Employee Details
    </x-slot:title>

    <div class="max-w-6xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-4">Total Employees: {{ $employees->count() }}</h1>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full table-auto border border-gray-200">
                <thead class="bg-gray-100 text-gray-700 text-sm">
                    <tr>
                        <th class="px-4 py-2 border">SL</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Total Sales (৳)</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-800">
                    @forelse ($employees as $index => $employee)
                        @php
                            $totalSales = 0;
                            foreach ($employee->orders as $order) {
                                foreach ($order->orderItems as $item) {
                                    $totalSales += ($item->medicine->price ?? 0) * $item->quantity;
                                }
                            }
                        @endphp
                        <tr class="hover:bg-gray-200 transition cursor-pointer" onclick="window.location='{{ route('show.sales', $employee->id) }}'">
                            <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $employee->name }}</td>
                            <td class="px-4 py-2 border">{{ $employee->email }}</td>
                            <td class="px-4 py-2 border">৳{{ number_format($totalSales, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-4 text-gray-500">
                                No employees found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout.admin>

