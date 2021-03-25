<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::with('teacher')->where('active_status','=',0)->where('delete_status',0)->paginate(10);
        return view('student-list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['teachers'] = Teacher::pluck('name','id')->prepend('select','');
        return view('add-student',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = new Student($request->all());
        $student->student_id=$this->generateUniqueNumber();
        $student->active_status=0;
        $student->delete_status=0;
        $student->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student,$id)
    {
        $data['teachers'] = Teacher::pluck('name','id')->prepend('select','');
        $data['student']  = Student::with('teacher')->findOrFail($id);
        return view('add-student',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student,$id)
    {
        Student::where('id',$id)->update(['name'=>$request->name,'age'=>$request->age,'gender'=>$request->gender,'teacher_id'=>$request->teacher_id]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student,$id)
    {
        Student::where('id', $id)->update(array('delete_status'=>1));
        return redirect('/');
    }
    function generateUniqueNumber() {
        $number = mt_rand(1000, 999999);
        if ($this->barcodeNumberExists($number)) {
            return $this->generateUniqueNumber();
        }
        return $number;
    }
    
    function barcodeNumberExists($number) {
        return Student::wherestudent_id($number)->exists();
    }
}
