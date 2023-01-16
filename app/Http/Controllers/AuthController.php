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
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
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

    // public function signupsave(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'username' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|min:1',
    //     ]);

    //     $data = $request->all();
    //     $check = $this->create($data);

    //     return redirect('/')->with('register_success', 'Silahkan Login');
    // }

    public function signupsave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'image' => '',
            'password' => 'required|min:1',
        ]);

        $data = $request->all();

        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $data["image"] = '/storage/' . $path;

        $check = $this->create($data);

        return redirect('/')->with('register_success', 'Silahkan Login');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'image' => $data['image'],
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
