<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // return view(
            //     'students.index',
            //     [
            //         'students' => Student::get(),
            //     ]
            // );
            $students = Student::all();

            return view('students.index')->with('students', $students);
        }
        return redirect('/');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        // ]);

        // $nameImage = $request->file('image')->getClientOriginalName();

        // $data = [
        //     'name' => $request->name,
        //     'age' => $request->age,
        //     'phone_number' => $request->phone_number,
        //     'image' => $request->image->move(public_path('jobie'), $nameImage),
        //     'address' => $request->address,
        // ];

        // Student::create($data);

        // return redirect()->route('students.index')->with('image', $nameImage);

        $requestData = $request->all();

        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $requestData["image"] = '/storage/' . $path;

        $student = Student::create($requestData);

        if ($student) {
            return redirect()->route('students.index')->with('success', 'Siswa Berhasil Ditambahkan!');
        } else {
            return back()->with('failed', 'Failed! User not created');
        }
    }

    public function update(Request $request, $id)
    {
        $member = Student::find($id);
        $input = $request->all();

        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $input["image"] = '/storage/' . $path;

        $member->fill($input)->save();

        return redirect()->route('students.index');
    }


    public function destroy($id)
    {
        // $student = Student::find($id);

        // $student->delete();

        // return redirect()->route('students.index');

        DB::table('students')->where('id', $id)->delete();

        return redirect()->route('students.index');
    }
}
