<?php

namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\Models\User;

use App\Models\Sub_Category;
use App\Models\Course;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $users =User::where('role','like','%admin%')->join('parents','users.id','=','parents.account_id')->get();
//        return view('AdminDashboard.Parents.index',compact('users'));
        $users =User::whereRoleIs('parent')->where(function($query) use ($request){
            return $query->when($request->search,function($q)use ($request){
                return $q->where('first_name','like','%'.$request->search.'%')->orWhere('last_name','like','%'.$request->search.'%');
            });
        })->join('parents','users.id','=','parents.account_id')->paginate(4);


        return view('AdminDashboard.Parents.index',compact('users'));
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
