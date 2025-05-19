<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if (Session::has('user_id_get')) {
            $user = User::find(auth()->user()->id);
            return view('web.profile.index', ['user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }

    public function update_profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $request->validate([
            'name' => 'required|string|max:255',
            // 'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
        return redirect()->route('profile')->with("success", "Profile updated successfully");
    }
}
