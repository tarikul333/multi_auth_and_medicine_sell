<x-layout.muster>
    <x-slot:title>
        Home
    </x-slot:title>
    
    <header class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <div class="text-lg font-bold">Medicine Info</div>
        <div class="flex space-x-4">
            <a href="{{ route('employee.login') }}" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200">Employee Login</a>
            <a href="{{ route('admin.login') }}" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200">Admin Login</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-center mb-6">Welcome to Our Medicine Portal</h2>
        <p class="text-gray-700 text-center mb-6">Your one-stop destination for all information related to medicines and pharmaceutical companies.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Medicine Information -->
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="text-xl font-bold mb-2">Medicine Information</h3>
                <p class="text-gray-600">Find detailed information about different medicines, including their uses, side effects, and dosage instructions.</p>
                <ul class="mt-4 list-disc pl-5 text-gray-600">
                    <li>Paracetamol - Pain relief and fever reducer</li>
                    <li>Ibuprofen - Anti-inflammatory and pain relief</li>
                    <li>Amoxicillin - Antibiotic for bacterial infections</li>
                </ul>
            </div>
            
            <!-- Pharmaceutical Companies -->
            <div class="bg-white p-6 rounded shadow-md">
                <h3 class="text-xl font-bold mb-2">Pharmaceutical Companies</h3>
                <p class="text-gray-600">Learn about the top pharmaceutical companies manufacturing high-quality medicines.</p>
                <ul class="mt-4 list-disc pl-5 text-gray-600">
                    <li>GlaxoSmithKline</li>
                    <li>Pfizer</li>
                    <li>Sanofi</li>
                    <li>Johnson & Johnson</li>
                </ul>
            </div>
        </div>
    </div>
</x-layout.muster>