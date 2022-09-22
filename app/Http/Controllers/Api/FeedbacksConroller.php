<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbacksRequest;
use App\Models\Course;
use App\Models\Course_Rate;
use App\Models\courseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbacksConroller extends Controller
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
    public function store(FeedbacksRequest $request)
    {
//        dd($request->all());
// $validated = $request->validated();
// dd($validated);
        if(Course::find($request->course_id)->count() > 0 && Auth::user()->hasRole('student'))
        {
            $id = Auth::user()->student->id;


            Course_Rate::create([
                'student_id' => $id,
                'course_id' => $request->course_id,
                "rate" => $request->rate,
                "comment" => $request->comment
                ]
            );
            return response()->json([
                'status' => true,
                'message' => 'course rated successfully ',
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
