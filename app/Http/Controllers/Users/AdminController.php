<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SendEmailController;
use App\Mail\NotifyMail;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Intervention\Image\ImageManagerStatic as Image;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function __construct(){
        $this->middleware(['permission:users-read'])->only('index');
        $this->middleware(['permission:users-create'])->only('create');
        $this->middleware(['permission:users-update'])->only('edit');
        $this->middleware(['permission:users-delete'])->only('delete');

    }
    public function index(Request $request)
    {
        //$users =User::whereRoleIs('admin')->join('admins','users.id','=','admins.account_id')->get();
        $users =User::whereRoleIs('admin')->where(function($query) use ($request){
            return $query->when($request->search,function($q)use ($request){
                return $q->where('first_name','like','%'.$request->search.'%')->orWhere('last_name','like','%'.$request->search.'%');
            });
        })->paginate(3);


        return view('AdminDashboard.Admins.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('AdminDashboard.Admins.create');
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
            'phone' => ['required', 'string', 'min:11', 'max:11', 'unique:users'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

////        $request_data=$request->except('password','password_confirmation','permissions');
//        if($request->hasFile('image')){
//            $imageName = time().'.'.$request->image->extension();
////            $removedPhotoPath = public_path("assets/dist/img/user-images/{$user->image}");
////            \App\Http\Services\Media::delete($removedPhotoPath);
//            $request->image->move(public_path('assets/dist/img/user-images/'), $imageName);
////            $request_data['image']=$imageName;
//
//        }
        if($image=$request->file('image')){
            $filename = Str::slug(time().rand(1000,9999)).".".$image->getClientOriginalExtension();
            $path=public_path('/assets/images/users/admins/'.$filename);
            Image::make($image->getRealPath())->save($path,100);
//            $request_data['image']=$filename;

        }
//        $request_data['password']=bcrypt($request->password);
        $user=User::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'username'=>$request->username,
                'image'=>$filename,
                'password'=>bcrypt($request->password),
                'role'=>'admin',
                'phone'=>$request->phone,
            ]
        );

        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        $mailData=[
        'title' => 'Mail from Rose Stone Support Team',
        'body' => [
            'subject 1'=>"Dear $request->first_name"
            ,'subject'=>" You become one of our  Support Team ",

        ' Your Credentials  Are '=>' ',

        'username'=> $request->email,
        'password'=>$request->password



      ]  ];
        //
        Mail::to($request->email)->send(new NotifyMail($mailData));
        return redirect()->route('admins.index')->with('success','admin added successfully');
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
    public function edit(User $admin)
    {


//    $user=$admin->join('users','users.id','=','admins.account_id')->where('admins.id',$admin->id)->first();
//dd($user);
        return view('AdminDashboard.Admins.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User  $admin)
    {
//dd($admin);

//        dd($user->id);
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
//
//            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
//'email'=>Rule::unique('users')->ignore($user->id),
            'phone' => ['string', 'max:11','unique:users,phone,'.$admin->id],

            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request_data=$request->only('first_name','last_name','email','phone');
//
        if($image=$request->file('image')){
            if(File::exists('assets/images/users/admins/'.$admin->image))
            {
                unlink('assets/images/users/admins/'.$admin->image);
            }
            $filename = Str::slug(time().rand(1000,9999)).".".$image->getClientOriginalExtension();
            $path=public_path('/assets/images/users/admins/'.$filename);
            Image::make($image->getRealPath())->save($path,100);
            $request_data['image']=$filename;

        }

//$admin=$admin->join('users','users.id','=','admins.account_id')->where('admins.id',$admin->id)->first();

        $admin->update(
            $request_data
        );
//
        $admin->syncPermissions($request->permissions);
//        return redirect()->route('admins.edit',$admin->id);
        if($admin->wasChanged()){
            $mailData=[
                'title' => 'Mail from Rose Stone Support Team',
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy(User $admin)
//    {
//
//        dd($admin->admin);
//        //
////dd(User::find($admin)->admin);
////        dd($admin->admin);
//        //why we have to delete admin before user  ?
////because the admin take a forgein key from user
//        $admin->admin->delete();
//        $admin->delete();
////return  redirect()->route('admins.index');
////        return redirect()->action('AdminController@index');
//        return redirect()->back();
//
//    }
    public function destroy(User $admin){
//        dd($admin);
        if(File::exists('assets/images/users/admins/'.$admin->image))
        {
            unlink('assets/images/users/admins/'.$admin->image);
        }

        $admin->delete();
//        User::find($admin)->delete();

        return back()->with('success','delete successfully  successfully');
    }
public function editPassword(Request $request, User $admin){

    return view('AdminDashboard.Admins.reset-password'
    ,
    compact('admin')
    );
}
public function resetPassword(Request $request, User $admin){
    $request->validate([ 'password' => ['required', Rules\Password::defaults()]]);
    $request->email=$admin->email;
//    dd(Hash::check($request->password,$admin->password));
 if(Hash::check($request->password,$admin->password))
 {
    return view('AdminDashboard.Admins.new-password',
        compact('admin'));
 }
 else
 {

     back()->with('danger','please enter the correct password ! ');
 }


}
public function newPassword(Request $request, User $admin){
$request->validate([  'password' => ['required', 'confirmed', Rules\Password::defaults()]]);
$updateAdmin=$admin->update([
    'password'=>bcrypt($request->password),
]);
if($updateAdmin){
    SendEmailController::sendEmail($admin->first_name." ".$admin->last_name,'admin',$admin->email,$request->password);
return  redirect()->route('profile')->with('success','password updated successfully');
}
else{
    return  redirect()->route('profile')->with('danger ','something went wrong');
}
}
}
