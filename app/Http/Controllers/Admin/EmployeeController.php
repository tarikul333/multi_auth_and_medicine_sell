<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::where('role', 'employee')
            ->with(['orders.orderItems.medicine'])
            ->get()
            ->map(function (User $employee) {
                $totalSales = 0;
                foreach ($employee->orders as $order) {
                    foreach ($order->orderItems as $item) {
                        $totalSales += ($item->medicine->price ?? 0) * $item->quantity;
                    }
                }
                $employee->total_sales = $totalSales;
                return $employee;
            })
            ->sortByDesc('total_sales')
            ->values();

        return view('admin.employees.index', compact('employees'));
    }

    public function show($id)
    {
        $employee = User::with(['orders.orderItems.medicine', 'orders.store'])
            ->findOrFail($id);

        return view('admin.employees.show', compact('employee'));
    }
    public function invoice($id)
    {
        $order = Order::with(['address.city', 'store', 'user', 'orderItems.medicine'])->findOrFail($id);
        return view('admin.employees.invoice', compact('order'));
    }
}
