<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view(
                'students.index',
                [
                    'students' => Student::get(),
                ]
            );
        }
        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $nameImage = $request->file('image')->getClientOriginalName();

        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'image' => $request->file('image')->move(public_path('jobie'), $nameImage),
            'address' => $request->address,
        ];
        $student = new Student();
        $student->nameImage = $nameImage;

        Student::create($data);

        return redirect()->route('students.index')->with('image', $nameImage);
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
