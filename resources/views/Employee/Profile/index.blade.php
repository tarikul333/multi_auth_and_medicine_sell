<x-layout.employee>
    <x-slot:title>My Profile</x-slot:title>

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">

        @if (session('success'))
            <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 border border-green-400 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center space-x-6">
            <form action="{{ route('employee.profile.image') }}" method="POST" enctype="multipart/form-data" class="relative inline-block">
                @csrf
                @method('PATCH')

                <label for="profile_photo" class="cursor-pointer relative">
                    <img 
                        src="{{ asset('images/' . (Auth::user()->profile_photo ?? 'profile.jpg')) }}"
                        alt="Profile Photo"
                        class="w-24 h-24 rounded-full object-cover border border-gray-300"
                    >
                    
                    {{-- File input --}}
                    <input 
                        type="file" 
                        id="profile_photo" 
                        name="profile_photo" 
                        class="hidden"
                    >
                </label>

                {{-- Save icon/button --}}
                <button type="submit" class="absolute bottom-0 right-0 transform translate-x-1/2 translate-y-1/2 bg-white p-1 rounded-full text-white text-xs hover:bg-gray-400">
                    💾
                </button>
            </form>
    
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-gray-800">
                        {{ Auth::user()->name }}
                    </h2>

                </div>
                <p class="text-gray-600">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-700 mb-2">Account Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                <div>
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>
                <div>
                    <p><strong>Joined:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
                    <p><strong>Role:</strong> {{ Auth::user()->role ?? 'Admin' }}</p>
                </div>
            </div>
        </div>

        {{-- Change Password Form --}}
        <div class="mt-8">
            <h3 class="text-lg font-medium text-gray-700 mb-4">Change Password</h3>

            @if (session('passError'))
                <div class="bg-red-100 text-red-700 border border-red-400 p-3 rounded mb-4">
                    {{ session('passError') }}
                </div>
            @endif

            @if (session('success_pass'))
                <div class="bg-green-100 text-green-700 border border-green-400 p-3 rounded mb-4">
                    {{ session('success_pass') }}
                </div>
            @endif

            <form method="POST" action="{{ route('employee.password.update') }}" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm text-gray-600 mb-1">Current Password</label>
                    <input 
                    type="password" 
                    name="current_password" 
                    class="border-gray-300 w-full rounded px-3 py-2 focus:outline-none focus:ring" required>
                    @error('current_password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-1">New Password</label>
                    <input 
                    type="password" 
                    name="new_password" 
                    class="border-gray-300 w-full rounded px-3 py-2 focus:outline-none focus:ring" required>
                    @error('new_password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-600 mb-1">Confirm New Password</label>
                    <input 
                    type="password" 
                    name="new_password_confirmation" 
                    class="border-gray-300 w-full rounded px-3 py-2 focus:outline-none focus:ring" required>
                    @error('new_password_confirmation')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout.employee>
