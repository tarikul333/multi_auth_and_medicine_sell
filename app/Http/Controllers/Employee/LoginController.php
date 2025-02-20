<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index() {
        return view('auth.employee.login');
    }
    public function register() {
        return view('auth.employee.register');
    }
    public function employeeRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'employee';
            $user->save();

            return redirect()->route('employee.register')->with('success', 'Register succesfully Created');

        } else {
            return redirect()->route('employee.register')->withInput()->withErrors($validator);
        }
    }
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->role === "admin") {
                    Auth::logout();
                    return redirect()->route('employee.login')->with('error', 'Incorrect Info');
                }
                return redirect()->route('employee.home');
            } else {
                return redirect()->route('employee.login')->with('error', 'Incorrect Info');
            }
        } else {
            return redirect()->route('employee.login')->withInput()->withErrors($validator);
        }
    }

    public function logout() {
        Auth::logout(); 
        return redirect()->route('employee.login');   
    }
}
