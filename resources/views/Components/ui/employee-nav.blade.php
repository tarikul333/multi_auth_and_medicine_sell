
<nav class="bg-blue-600 p-4 text-white flex justify-between items-center shadow-md">
    <div class="text-lg font-bold">Employee</div>
    <div class="flex space-x-4">
        <x-ui.nav-link href="{{ route('employee.home') }}" :active="request()->routeIs('employee.home')">Home</x-ui.nav-link>
        <x-ui.nav-link href="{{ route('employee.sellesList') }}" :active="request()->routeIs('employee.sellesList')">Selles List</x-ui.nav-link>
    </div>
    <div class="flex items-center space-x-4">
        <span>Welcome, {{ Auth::user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 px-3 py-1 rounded hover:bg-red-700 transition">Logout</button>
        </form>
    </div>
</nav>    
