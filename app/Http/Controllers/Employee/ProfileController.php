<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('employee.profile.index');
    }

    public function imageUpdate(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required'
        ]);

        $user = Auth::user();

        if ($image = $request->file('profile_photo')) {
            if ($user->profile_photo && File::exists(public_path('images/' . $user->profile_photo))) {
                File::delete(public_path('images/' . $user->profile_photo));
            }

            $destinationPath = 'images/';
            $profileImages = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImages);

            $user->profile_photo = $profileImages;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture successfully updated');
    }

    public function passUpdate(Request $request)
    {
        $validator = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
            'new_password_confirmation' => 'required'
        ]);

        $user = Auth::user();

        if (!Hash::check($validator['current_password'], $user->password)) {
            return back()->with('passError', 'Incorrect current password.');
        }

        $user->password = Hash::make($validator['new_password']);
        $user->save();

        return back()->with('success_pass', 'Password successfully updated');
    }
}
