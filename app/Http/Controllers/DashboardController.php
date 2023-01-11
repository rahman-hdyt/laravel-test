<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }
        return redirect('/');
    }
}
