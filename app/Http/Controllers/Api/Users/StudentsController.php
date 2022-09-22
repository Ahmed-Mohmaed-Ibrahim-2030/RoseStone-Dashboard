<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=Student::join('users','users.id','=','students.account_id')->select('*')->get();
//        dd($users);
        return response()->json([
            'status' => true,
            'message' => ' Successfully',
            'data'=>$users

        ], 200);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
//        dd($student);
        //
        $users=$student->join('users','users.id','=','students.account_id')->where('students.id',$student->id)->select('users.*','students.*')->first();
//        dd($users);
        return response()->json([
            'status' => true,
            'message' => ' Successfully',
            'data'=>$users

        ], 200);

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
    public function addImage(Request $request){
$request->validate([
    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
//            $removedPhotoPath = public_path("assets/dist/img/user-images/{$user->image}");
//            \App\Http\Services\Media::delete($removedPhotoPath);
            $request->image->move(public_path('assets/dist/img/user-images/'), $imageName);
//            $request_data['image']=$imageName;
Auth::user()->update([
    'image'=>$imageName
]);
            return response()->json([
                'status' => true,
                'message' => 'image added  Successfully',

            ], 201);

        }
        else {
            return response()->json([
                'status' => false,
                'message' => 'please send valid image',

            ], 301);
        }


    }
}
