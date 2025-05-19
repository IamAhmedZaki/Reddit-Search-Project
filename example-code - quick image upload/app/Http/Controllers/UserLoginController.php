<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    public function login()
    {
        return view('web.login');
    }

    public function login_submit(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:1',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            // if (auth()->user()->type == 2) {
                Session::put('user_id_get', auth()->user()->id);
                return redirect()->route('index');
            // }
        } else {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }
    }

    public function logout_user()
    {
        Session::flush();
        return redirect()->route('index');
    }
}