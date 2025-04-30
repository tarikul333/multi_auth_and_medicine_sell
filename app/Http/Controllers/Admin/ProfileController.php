<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function imageUpdate(User $user, Request $request)
    {
        $request->validate([
            'profile_photo' => 'required'
        ]);

        if ($image = $request->file('profile_photo')) {
            if($user->profile_photo && File::exists(public_path('images/' . $user->profile_photo))) {
                File::delete(public_path('images/' . $user->profile_photo));
            }
            
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);

            $user->profile_photo = $profileImage;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile picture successfully updated');
    }

    public function passwordUpdate(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
            'new_password_confirmation' => 'required'
        ]);

        $user = Auth::guard('admin')->user();

        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->with('passError', 'Incorrect current password.');
        }

        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return back()->with('success_pass', 'Password successfully updated');
    }

}
