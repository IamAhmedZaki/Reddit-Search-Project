<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function admin_dashboard () {
        return view('admin.dashboard');
    }
}
