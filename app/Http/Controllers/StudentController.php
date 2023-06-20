<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{



    function list (){
        $student = Student::all();
        // return print_r($student);
        return view('students/students' ,[
            'students' => $student
        ]);
    }


    function create(){
        $track = Track::get();
        return view('students/create',[
            'tracks' => $track
        ]);
    }

    function store(Request $request , Student $student){
        $userId = $request->user()->id;
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('students', 'name')->ignore($student->id)->whereNull('deleted_at'),
                'max:255'
            ],
            'age' => 'required|numeric',
            'IDno' => 'required|numeric',
        ]);

        $student = new Student();
        $student->name = $validatedData['name'];
        $student->age = $validatedData['age'];
        $student->IDno = $validatedData['IDno'];
        $student->user_id = $userId;
        $student->save();

        return redirect('student')->with('success' , "created successfully");
    }

    function edit($id){
        $student=Student::find($id);
        $track = Track::get();
        return view('students/edit',[
            'student'=>$student,
            'tracks' => $track
        ]);
    }

    function update($id, StudentRequest $request, Student $student){
        $student = Student::withTrashed()->find($id);
        if ($request->user()->can('update', $student)) {
            $validatedData = $request->validate([
                'name' => [
                    'required',
                    'string',
                    Rule::unique('students', 'name')->ignore($student->id)->whereNull('deleted_at'),
                    'max:255'
                ],
                'age' => 'required|numeric',
                'IDno' => 'required|numeric',
            ]);

            $student->name = $validatedData['name'];
            $student->age = $validatedData['age'];
            $student->IDno = $validatedData['IDno'];
            $student->save();

            return redirect('student')->with('updated', "updated successfully");
        } else {
            abort(403);
        }
    }



    function delete($id , Request $request){
        $student=Student::find($id);
        if ($request->user()->can('delete', $student)) {
            $student->delete();
            return redirect('student')->with('success' , "deleted successfully");
        }else{
            abort(403);
        }

    }

}
