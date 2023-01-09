<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Student::get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ];

        Student::create($data);

        return redirect()->route('students.index');
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
