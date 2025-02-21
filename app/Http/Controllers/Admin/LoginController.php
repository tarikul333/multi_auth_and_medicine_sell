<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect()->route('employee.home');
        }
        return view('auth.admin.login');
    }
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('admin')->user()->role != "admin") {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'Incorrect Info');
                }

                return redirect()->route('admin.home');

            } else {
                return redirect()->route('admin.login')->with('error', 'Incorrect Info');
            }
        } else {
            return redirect()->route('admin.login')->withInput()->withErrors($validator);
        }
    }
    public function register() {
        return view('auth.admin.register');
    }
    public function adminRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'admin';
            $user->save();

            return redirect()->route('admin.register')->with('success', 'Register succesfully Created');

        } else {
            return redirect()->route('admin.register')->withInput()->withErrors($validator);
        }
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
