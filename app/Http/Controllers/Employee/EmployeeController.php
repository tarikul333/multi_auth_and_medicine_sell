<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index() 
    {
        return view('employee.home');
    }
    public function ordersList() 
    {
        $orders = Order::where('user_id', Auth()->id())->with(['address', 'store'])->latest()->get();
        return view('employee.orders.ordersList', compact('orders'));
    }
}
