<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        // if (Session::has('user_admin')) {
            // $type = Session::get('user_admin');
            // if ($type == 1) {
                $users = User::latest()->get();
                return view('admin.user.index', get_defined_vars());
            // }
        // } else {
        //     return redirect()->route('login_view');
        // }
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'status' => 'required|string',
            'role' => 'required|string',
          
        ]);

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors([
                'email' => 'A user with this email already exists.',
            ])->withInput();
        }
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
    
            $profileImageName = 'profile_' . time() . '.' . $file->getClientOriginalExtension();
    
            $file->move(public_path('profiles'), $profileImageName);
        }
        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role' => $request->role,
    
            'type' => "2",
       
        ]);


        // Redirect to the dashboard or intended page
        return redirect()->route('admin_usres')->with("success", "User added successfully");
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the form data
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        
        //     'status' => 'required|string',
        //     'role' => 'required|string',
        //     'phone' => 'required|string|max:15',
        //     'address' => 'required|string|max:255',
          
        // ]);
    
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $profileImageName = 'profile_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('profiles'), $profileImageName);
            if ($user->profile_image && file_exists(public_path('profiles/' . $user->profile_image))) {
                unlink(public_path('profiles/' . $user->profile_image));
            }
            $user->profile_image = $profileImageName;
        }
    
        // Update the user's details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'role' => $request->role,
         
            'password' => $request->password ? $request->password : $user->password,
        ]);
    
        // Save the updated profile image if it was changed
        $user->save();
    
        // Redirect to the dashboard or intended page
        return redirect()->route('admin_usres')->with("success", "User updated successfully");
    }
    

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin_usres')->with("success", "User deleted successfully");
    }
}
