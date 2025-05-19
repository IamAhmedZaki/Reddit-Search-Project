<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function dashbaord()
    {
        $designers = User::where('role','Designer')->get();
        return view('web.dashboard',get_defined_vars());
    }
}
