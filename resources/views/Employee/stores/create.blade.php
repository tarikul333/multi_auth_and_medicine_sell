<x-layout.employee>
    <x-slot:title>
        Create Store
    </x-slot:title>

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">Create Store</h1>

        @if (session('success'))
            <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 border border-green-400 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('store_create.store') }}" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Row 1: City and Address -->
                <div class="space-y-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <select id="city" name="city_id" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select City</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <p class="mb-4 p-3 text-sm text-red-700 bg-red-100 border border-red-400 rounded-lg mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <select id="address" name="address_id" required class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Address</option>
                    </select>
                    @error('address_id')
                        <p class="mb-4 p-3 text-sm text-red-700 bg-red-100 border border-red-400 rounded-lg mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Row 2: Store Name (full width) -->
            <div class="mt-6 space-y-2">
                <label for="store_name" class="block text-sm font-medium text-gray-700">Store Name</label>
                <input type="text" id="store_name" name="store_name" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter store name" required>
                @error('store_name')
                    <p class="mb-4 p-3 text-sm text-red-700 bg-red-100 border border-red-400 rounded-lg mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Row 3: Contact Number (full width) -->
            <div class="mt-6 space-y-2">
                <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. 01XXXXXXXXX" required>
                @error('contact_number')
                    <p class="mb-4 p-3 text-sm text-red-700 bg-red-100 border border-red-400 rounded-lg mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition duration-200">
                    ✅ Submit
                </button>
            </div>

        </form>
    </div>
</x-layout.employee>
