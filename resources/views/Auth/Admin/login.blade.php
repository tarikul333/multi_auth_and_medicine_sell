<x-layout.muster>
    <x-slot:title>
        Admin Login
    </x-slot:title>

    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>

            <!-- Display Incorrect Login Message -->
            @if (session('error'))
                <p class="mb-4 p-3 text-sm text-red-700 bg-red-100 border border-red-400 rounded-lg">{{ session('error') }}</p>
            @endif

            <form action="{{ route('admin.authenticate') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                        class="mt-1 block w-full p-2 border 
                        @error('email') border-red-500 @else border-gray-300 @enderror 
                        rounded-md focus:outline-none focus:ring focus:ring-blue-500" 
                        placeholder="you@example.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full p-2 border 
                        @error('password') border-red-500 @else border-gray-300 @enderror 
                        rounded-md focus:outline-none focus:ring focus:ring-blue-500" 
                        placeholder="••••••••">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">Login</button>
            </form>

            <div class="mt-4 text-center">
                <a href="{{ route('employee.login') }}" class="text-blue-600 hover:underline">Employee Login</a>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('home') }}" class="text-gray-600 hover:underline"><- Back</a>
            </div>
        </div>
    </div>
</x-layout.muster>
