<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\courseStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EnrollContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
if(Course::find($request->course_id)->count() > 0 && Auth::user()->hasRole('student'))
        {
            $id = Auth::user()->student->id;
            courseStudent::create(["student_id" => $id, 'course_id' => $request->course_id, "mark" => 0, "status" => "enrolled"]);
            return response()->json([
                'status' => true,
                'message' => 'student enrolled successfully ',
            ], 201);
        }
else if(Course::find($request->course_id)->count() > 0)
{
    return response()->json([
        'status' => false,
        'message' => 'invalid course_id ',
    ], 301);
}
else
{
    return response()->json([
        'status' => false,
        'message' => 'you are not a student',
    ], 301);
    }
    }
    public function students_en_course(Course $course){
        return response()->json([
            'status' => true,
            'message' => ' successfully ',
            'data'=>$course->students()->join('students','students.id','=','courses_student.student_id')->join('users','users.id','=','students.account_id')->select('students.*','users.*')->get()
        ], 201);
    }
   public function courses_en_students(Student $student){
        return response()->json([
            'status' => true,
            'message' => ' successfully ',
            'data'=>$student->courses()->join('courses','courses.id','=','courses_student.course_id')->select('courses.*')->get()
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
