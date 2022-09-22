<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$users =User::whereRoleIs('admin')->join('admins','users.id','=','admins.account_id')->get();
        $users =User::whereRoleIs('instructor')->where(function($query) use ($request){
            return $query->when($request->search,function($q)use ($request){
                return $q->where('first_name','like','%'.$request->search.'%')->orWhere('last_name','like','%'.$request->search.'%');
            });
        })->join('instructors','users.id','=','instructors.account_id')->paginate(3);


        return view('AdminDashboard.Instructors.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('AdminDashboard.Instructors.create');

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

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string',  'max:255', 'unique:users'],
            'scientific_degree'=>['required', 'string'],
            'description' => ['required', 'string'],
            'phone' => ['required', 'string', 'min:11', 'max:11', 'unique:instructors'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//        dd($request->all());
//        $request_data=$request->except('password','password_confirmation','permissions');
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
//            $removedPhotoPath = public_path("assets/dist/img/user-images/{$user->image}");
//            \App\Http\Services\Media::delete($removedPhotoPath);
            $request->image->move(public_path('assets/dist/img/user-images/'), $imageName);
//            $request_data['image']=$imageName;

        }
//        $request_data['password']=bcrypt($request->password);
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
        return redirect()->route('instructors.index');
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
    public function edit(Instructor $instructor)
    {
        $user=$instructor->account;

//    $user=$admin->join('users','users.id','=','admins.account_id')->where('admins.id',$admin->id)->first();
//dd($user);
        return view('AdminDashboard.Instructors.edit',['instructor'=>$instructor,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
        $user=$instructor->account;
        $request->validate([
//            'first_name' => ['required', 'string', 'max:255'],
//            'last_name' => ['required', 'string', 'max:255'],
////
//            'email' => [ 'string', 'email', 'max:255',  'unique:users,email,'.$user->id],
//
//            'phone' => ['string', 'max:11','unique:admins,phone,'.$admin->id],
//
//            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => ['string', 'max:255'],
            'last_name' => [ 'string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],

            'scientific_degree'=>[ 'string'],
            'description' => [ 'string'],
            'phone' => [ 'string', 'min:11', 'max:11','unique:instructors,phone,'.$instructor->id],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $request_data=$request->only('first_name','last_name','email');
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
//            $removedPhotoPath = public_path("assets/dist/img/user-images/{$user->image}");
//            \App\Http\Services\Media::delete($removedPhotoPath);
            $request->image->move(public_path('assets/dist/img/user-images/'), $imageName);
            $request_data['image']=$imageName;

        }
//$user=$admin->join('users','users.id','=','admins.account_id')->where('admins.id',$admin->id)->first();

        $user->update(
            $request_data
        );
//        Admin::where('account_id', $user->id)
        $instructor ->update([

            'phone'=>$request->phone,
            'scientific_degree'=>$request->scientific_degree,
            'description'=>$request->description
        ]);
        $user->syncPermissions($request->permissions);
//        return redirect()->route('admins.edit',$admin->id);
        if($user->wasChanged()||$instructor->wasChanged()){
            return back()->with('success','upadated successfully');
        }
        else
        {
            return back()->with('info','no change');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor){
//        dd($admin);
        $user=$instructor->account;
        $instructor->delete();
//        User::find($admin)->delete();
        $user->delete();
        return back()->with('success','delete successfully  successfully');
    }
}
