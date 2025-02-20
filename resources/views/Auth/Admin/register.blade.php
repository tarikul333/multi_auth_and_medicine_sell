<x-layout>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 border border-green-400 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.createRegister') }}" method="POST">
                @csrf
                <!-- Username Field -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="mt-1 block w-full p-2 border 
                        @error('name') border-red-500 @else border-gray-300 @enderror 
                        rounded-md focus:outline-none focus:ring focus:ring-blue-500" 
                        placeholder="Enter your Username">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                        class="mt-1 block w-full p-2 border 
                        @error('email') border-red-500 @else border-gray-300 @enderror 
                        rounded-md focus:outline-none focus:ring focus:ring-blue-500" 
                        placeholder="Enter your Email">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
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

                <!-- Confirm Password Field -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                        class="mt-1 block w-full p-2 border 
                        @error('confirm_password') border-red-500 @else border-gray-300 @enderror 
                        rounded-md focus:outline-none focus:ring focus:ring-blue-500" 
                        placeholder="••••••••">
                    @error('password_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700 transition duration-200">
                    Register
                </button>
            </form>
        </div>
    </div>
</x-layout>
