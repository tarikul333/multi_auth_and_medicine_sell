<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\employee_salles;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() 
    {
        return view('employee.home');
    }
    public function sellesList() 
    {
        return view('employee.sellesList');
    }
}
