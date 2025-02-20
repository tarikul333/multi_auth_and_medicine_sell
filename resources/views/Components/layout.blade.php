<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  </head>
  <body class="bg-gray-100">
    @auth('web')
    <nav class="bg-blue-600 p-4 text-white flex justify-between items-center shadow-md">
        <div class="text-lg font-bold">Employee Home</div>
        <div class="flex space-x-4">
            <a href="{{ route('employee.home') }}" class="hover:underline">Home</a>
            <a href="#" class="hover:underline">Products</a>
        </div>
        <div class="flex items-center space-x-4">
            <span>Welcome, {{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 px-3 py-1 rounded hover:bg-red-700 transition">Logout</button>
            </form>
        </div>
    </nav>    
    @endauth

    @auth('admin')
    <nav class="bg-gray-800 p-4 text-white flex justify-between items-center shadow-md">
        <div class="text-lg font-bold">Admin Dashboard</div>
        <div class="flex space-x-4">
            <a href="#" class="hover:underline">Dashboard</a>
            <a href="#" class="hover:underline">Manage Users</a>
            <a href="#" class="hover:underline">Settings</a>
        </div>
        <div class="flex items-center space-x-4">
            <span>Welcome, {{ Auth::guard('admin')->user()->name }}</span>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 px-3 py-1 rounded hover:bg-red-700 transition">Logout</button>
            </form>
            
            <div class="relative" x-data="{ open: false }">
                <button 
                    @click="open = !open" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:outline-none transition"
                >
                    Register
                </button>

                <div 
                    x-show="open" 
                    @click.away="open = false"
                    class="absolute right-0 mt-2 bg-white border rounded-md shadow-lg w-48 py-2 z-50"
                >
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition">Admin Register</a>
                    <a href="{{ route('employee.register') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 transition">Employee Register</a>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <div class="container mx-auto p-4"> 
        {{ $slot }}
    </div>
  </body>
</html>