<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalEmployees = User::where('role', 'employee')->count();
        $totalStores = Store::count();
        $totalOrders = Order::count();

        $totalSales = OrderItem::with('medicine')
            ->get()
            ->sum(function ($item) {
                return ($item->medicine->price ?? 0) * $item->quantity;
            });

        $recentOrders = Order::with(['user', 'store', 'orderItems.medicine'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.home', compact(
            'totalEmployees',
            'totalStores',
            'totalOrders',
            'totalSales',
            'recentOrders'
        ));
    }
}
