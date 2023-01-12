<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\User;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        if (Auth::check()) {
            return view('dashboard', [
                'students' => Student::count(),
                'users' => User::count()
            ]);
        }
        return redirect('/');
    }
}
