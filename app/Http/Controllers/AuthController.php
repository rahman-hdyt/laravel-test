<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->with('success', 'Login Berhasil!');
        }

        return redirect('/')->with('login_fail', 'Login Gagal!');
    }

    public function signup()
    {
        return view('auth.register');
    }

    public function signupsave(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:1',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('/')->with('register_success', 'Registrasi Berhasil, Silahkan Login');
    }

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('/')->with('logout_success', 'Anda telah logout');
    }
}
