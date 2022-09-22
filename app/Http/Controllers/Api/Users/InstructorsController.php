<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
//use http\Client\Curl\User;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instructors=User::join('instructors','users.id','instructors.account_id')->get();
        return response()->json([
            'status' =>true,
            'data'=>$instructors
        ],200);
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
     //   dd($request->all());
     $validate=  $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string',  'max:255', 'unique:users'],
            'scientific_degree'=>['required', 'string'],
            'description' => ['required', 'string'],
            'phone' => ['required', 'string', 'min:11', 'max:11', 'unique:instructors'],
         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required'],
        ]);

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
//            $removedPhotoPath = public_path("assets/dist/img/user-images/{$user->image}");
//            \App\Http\Services\Media::delete($removedPhotoPath);
            $request->image->move(public_path('assets/dist/img/user-images/'), $imageName);
//            $request_data['image']=$imageName;

        }
        $user=User::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->first_name,
                'email'=>$request->email,
                'username'=>$request->username,
                'image'=>$imageName??"",
                'password'=>bcrypt($request->password),
                'role'=>'instructor'
            ]
        );
        Instructor::create([
            'scientific_degree'=>$request->scientific_degree,
            'phone'=>$request->phone,
            'description'=>$request->description,
            'account_id'=>$user->id
        ]);
        $user->attachRole('instructor');
//        $user->syncPermissions($request->permissions);
        return response()->json([
            'status' =>true,
            'message'=>'instructor addes successfully'
        ],201);
    }
    public function addImage(Request $request){
        if(Auth::user()->hasRole('instructor')){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        }}
        else
        {
            return response()->json([
                'status' => false,
                'message' => 'You are not Instructor',

            ], 301);
        }


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
        $instructors=User::join('instructors','users.id','instructors.account_id')->where('instructors.id',$instructor->id)->get();
        return response()->json([
            'status' =>true,
            'data'=>$instructors
        ],200);


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
