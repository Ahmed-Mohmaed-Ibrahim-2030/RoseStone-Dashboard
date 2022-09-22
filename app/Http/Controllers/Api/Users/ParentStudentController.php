<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\parentStudent;
use App\Models\Student;
use App\Models\courseStudent;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ParentStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = auth()->user()->id;
        $id =ParentModel::find($userID);

      $students=  Student::where("parent_id",$id)->select("id")->get();

        $x= courseStudent::with('course','student')->whereIn("student_id", $students)->get();
   return response()->json($x);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\parentStudent  $parentStudent
     * @return \Illuminate\Http\Response
     */
    public function show(parentStudent $parentStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\parentStudent  $parentStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(parentStudent $parentStudent)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\parentStudent  $parentStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parentStudent $parentStudent,$id)
    {



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\parentStudent  $parentStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(parentStudent $parentStudent)
    {
    }
}
