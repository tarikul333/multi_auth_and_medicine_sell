<x-layout.admin>
    <x-slot:title>Invoice #{{ $order->id }}</x-slot:title>

    {{-- Print Button --}}
    <div class="max-w-4xl mx-auto mt-4 flex justify-between">
        <a href="{{ route('show.sales', $order->user->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            ⬅️ back
        </a>
        
        <button onclick="printInvoice()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            🖨️ Print Invoice
        </button>
    </div>

    {{-- Invoice Content --}}
    <div id="invoice-content" class="max-w-4xl mx-auto bg-white p-8 shadow-lg rounded-lg mt-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Invoice</h2>
        </div>

        <div class="grid grid-cols-2 text-sm text-gray-700 mb-6">
            <div>
                <p><strong>Date :</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p><strong>City :</strong> {{ $order->address->city->city_name ?? 'N/A' }}</p>
                <p><strong>Address :</strong> {{ $order->address->street ?? 'N/A' }}</p>
                <p><strong>Store Name :</strong> {{ $order->store->store_name ?? 'N/A' }}</p>
            </div>
            <div>
                <p><strong>Employee:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
            </div>
        </div>

        <table class="w-full text-left border border-gray-200 mb-6">
            <thead class="bg-gray-100 text-sm">
                <tr>
                    <th class="p-2 border">SL</th>
                    <th class="p-2 border">Medicine</th>
                    <th class="p-2 border">Company</th>
                    <th class="p-2 border">Qty</th>
                    <th class="p-2 border">Unit Price</th>
                    <th class="p-2 border">Total</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @php $grandTotal = 0; @endphp
                @foreach ($order->orderItems as $index => $item)
                    @php
                        $price = $item->medicine->price ?? 0;
                        $lineTotal = $item->quantity * $price;
                        $grandTotal += $lineTotal;
                    @endphp
                    <tr>
                        <td class="p-2 border">{{ $index + 1 }}</td>
                        <td class="p-2 border">{{ $item->medicine->medicine_name ?? 'N/A' }}</td>
                        <td class="p-2 border">{{ $item->medicine->company ?? 'Incepta Ltd.' }}</td>
                        <td class="p-2 border">{{ $item->quantity }}</td>
                        <td class="p-2 border">৳{{ number_format($price, 2) }}</td>
                        <td class="p-2 border">৳{{ number_format($lineTotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right text-lg font-semibold text-gray-800">
            Grand Total: ৳{{ number_format($grandTotal, 2) }}
        </div>

        <div class="mt-10 text-sm text-gray-500 border-t pt-4">
            <p>Thank you for your order!</p>
            <p class="mt-2">Employee Signature: _______________________</p>
        </div>
    </div>

    {{-- Print Script --}}
    <script>
        function printInvoice() {
            let printContents = document.getElementById('invoice-content').innerHTML;
            let originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();
        }
    </script>
</x-layout.admin>
