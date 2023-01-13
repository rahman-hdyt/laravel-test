<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Builder\Stub;

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

        Student::create($requestData);

        return redirect()->route('students.index')->with('flash_message', 'Siswa Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $member = Student::find($id);
        $input = $request->all();
        $member->fill($input)->save();

        return redirect()->route('students.index');
    }


    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();

        return redirect()->route('students.index');
    }
}
