<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::where('status',1)->orderBy('full_name')->get();
        $title = 'All Student List';
        return view('admin.student.index', compact('students','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::where('status',1)->get();
        return view('admin.student.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'studentName' => 'required|string',
            'birthdate' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'className' => 'required',
        ]);
        
        $classId = (int) $request->className;
       
        $newStudent = new Student();
        $newStudent->full_name = $request->get('studentName');
        $newStudent->birth_date = $request->get('birthdate');
        $newStudent->email = $request->get('email');
        $newStudent->contact_number = $request->get('phone');
        $newStudent->classroom_id = $classId;
        $newStudent->save();

        return redirect()->route('admin.students.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $classId = (int) $id;
       $className = Classroom::find($classId);
       $students = Student::where('status', 1)
                            ->where('classroom_id', $classId)
                            ->orderBy('full_name')->get();
        $title = 'List of students for '.$className->year_name;
        return view('admin.student.index', compact('students','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $studentId = (int)$id;
        $student = Student::find($studentId);
        $classrooms = Classroom::where('status',1)->get();
        return view('admin.student.edit',compact('student','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $studentId = (int) $id;
        $classId = (int) $request->className;

        $student = Student::find($studentId);
        $student->full_name = $request->get('studentName');
        $student->birth_date = $request->get('birthdate');
        $student->email = $request->get('email');
        $student->contact_number = $request->get('phone');
        $student->classroom_id = $classId;
        $student->update();

        return redirect()->route('admin.students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
