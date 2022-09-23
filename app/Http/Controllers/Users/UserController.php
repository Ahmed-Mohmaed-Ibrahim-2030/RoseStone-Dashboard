<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SendEmailController;
use App\Mail\NotifyMail;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
   public function __construct(){
        $this->middleware(['permission:users-read'])->only('index');
        $this->middleware(['permission:users-create'])->only('create');
        $this->middleware(['permission:users-update'])->only('edit');
        $this->middleware(['permission:users-delete'])->only('delete');

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users =User::all();
        return view('AdminDashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.users.create');
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


  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string',  'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:11', 'max:11', 'unique:admins'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

            $request_data=$request->except('password','password_confirmation','permissions');

            $request_data['password']=bcrypt($request->password);
        $user=User::create([

            'email'=>$request->email,
                'username'=>$request->username,
                'password'=>bcrypt($request->password),
                'role'=>'admin'
            ]
        );
        Admin::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'account_id'=>$user->id
        ]);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {


        return view('AdminDashboard.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],

            'phone' => ['string', 'max:11','unique:users,phone,'.$user->id],

            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request_data=$request->only('first_name','last_name','email','phone');
//
        if($image=$request->file('image')){
            if(isset($user->image)&&File::exists('assets/images/users/admins/'.$user->image))
            {
                unlink('assets/images/users/admins/'.$user->image);
            }
            $filename = Str::slug(time().rand(1000,9999)).".".$image->getClientOriginalExtension();
            $path=public_path('/assets/images/users/admins/'.$filename);
            Image::make($image->getRealPath())->save($path,100);
            $request_data['image']=$filename;

        }

//$user=$user->join('users','users.id','=','admins.account_id')->where('admins.id',$user->id)->first();

        $user->update(
            $request_data
        );
//
//        $user->syncPermissions($request->permissions);
//        return redirect()->route('admins.edit',$user->id);
        if($user->wasChanged()){
            $mailData=[   'title' => 'Mail from Rose Stone Support Team',
                'body' => ['subject 1'=>"Dear $request->first_name",
                'subject'=>" Your data has been updated successfully",

                'username for sign:'=> $request->email,

            ]  ];
            Mail::to($request->email)->send(new NotifyMail($mailData));
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
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(File::exists('assets/images/users/admins/'.$user->image))
        {
            unlink('assets/images/users/admins/'.$user->image);
        }

        $user->delete();
//        User::find($admin)->delete();

        return back()->with('success','delete successfully  successfully');
    }





}
