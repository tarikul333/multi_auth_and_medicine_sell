<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::orderBy('store_name', 'asc')->get();

        return view('employee.stores.index', compact('stores'));
    }

    public function create()
    {
        $cities = City::orderBy('city_name', 'asc')->get();

        return view('employee.stores.create', compact('cities'));
    }

    public function getAddressesByCity($city_id)
    {
        $addresses = Address::where('city_id', $city_id)->get();
        return response()->json($addresses);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'store_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'address_id' => 'required|exists:addresses,id',
        ]);

        $store = Store::create($validated);

        return redirect()->back()->with('success', 'Store created successfully!');
    }
}
