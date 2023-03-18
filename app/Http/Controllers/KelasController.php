<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class KelasController extends Controller
{
    // public function index()
    // {
    //     if (Auth::check()) {
    //         $kelass = Kelas::all();

    //         return view('kelass.index')->with('kelass', $kelass);
    //     }
    //     return redirect('/');
    // }

    public function index(Request $request)
    {
        if (Auth::check() && $request->ajax()) {
            $data = Kelas::select('*');
            return DataTables::of($data)->make(true);
        }
        return view('kelass.index');
    }
}
