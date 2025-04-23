<x-layout.employee>
    <x-slot:title>
        Create Order
    </x-slot:title>

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">Create Order</h1>

        <form method="POST" action="{{ route('order.store') }}" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="city" class="block text-sm font-medium text-gray-700 border-xl">City</label>
                    <select id="city" name="city_id" required class="select-custom mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-2">
                        <option value="">Select City</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="store" class="block text-sm font-medium text-gray-700 border-xl">Store</label>
                    <select id="store" name="store_id" required class="select-custom mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-2">
                        <option value="">Select Store</option>
                    </select>
                </div>
            </div>

            <div class="mt-8">
                <div class="flex items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Order Medicines</h3>
                </div>

                <div id="medicine-list" class="space-y-4">
                    <div class="medicine-item bg-gray-50 p-4 rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Medicine</label>
                                <select name="medicines[0][medicine_id]" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-2">
                                    <option value="">Select Medicine</option>
                                    @foreach($medicines as $medicine)
                                        <option value="{{ $medicine->id }}">{{ $medicine->medicine_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" name="medicines[0][quantity]" min="1" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-2">
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="remove-medicine text-red-600 hover:text-red-800">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-between">
                <button type="button" id="add-medicine" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Medicine
                </button>

                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Submit Order
                </button>
            </div>
        </form>
    </div>

    <script>
        const medicineOptions = @json($medicines);
    </script>


</x-layout.employee>
