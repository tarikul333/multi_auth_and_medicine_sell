<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Store;
use \App\Models\Medicine;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function create()
    {
        $cities = City::orderBy('city_name', 'asc')->get();
        $medicines = Medicine::orderBy('medicine_name', 'asc')->get();

        return view('employee.orders.create', compact('cities', 'medicines'));
    }

    public function getAddressesByCity($city_id)
    {
        $addresses = Address::where('city_id', $city_id)->get();
        return response()->json($addresses);
    }

    public function getStoresByAddress($address_id)
    {
        $stores = Store::where('address_id', $address_id)->get();
        return response()->json($stores);
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'address_id' => 'required|exists:addresses,id',
            'store_id' => 'required|exists:stores,id',
            'medicines' => 'required|array|min:1',
            'medicines.*.medicine_id' => 'required|exists:medicines,id',
            'medicines.*.quantity' => 'required|integer|min:1',
        ]);
        

        $order = Order::create([
            'address_id' => $request->address_id,
            'store_id' => $request->store_id,
            'user_id' => auth()->id(),
            'order_date' => now(),
            'total_amount' => 0,
        ]);
        

        $grandTotal = 0;

        foreach($request->medicines as $medicineData) {
            $medicine = Medicine::findOrFail($medicineData['medicine_id']);
            $perUnitPrice = $medicine->price;
            $totalPrice = $perUnitPrice * $medicineData['quantity'];

            OrderItem::create([
                'order_id' => $order->id,
                'medicine_id' => $medicineData['medicine_id'],
                'quantity' => $medicineData['quantity'],
                'price_per_unit' => $perUnitPrice,
                'total_price' => $totalPrice,
            ]);

            $grandTotal += $totalPrice;
        }

        $order->update([
            'total_amount' => $grandTotal,
        ]);

        return redirect()->route('order.invoice', $order->id);
    }

    public function invoice($id)
    {
        $order = Order::with(['address', 'address.city', 'store', 'user', 'orderItems.medicine'])->findOrFail($id);
        return view('employee.orders.invoice', compact('order'));
    }
}
