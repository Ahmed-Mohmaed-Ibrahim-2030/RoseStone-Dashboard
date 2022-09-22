<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins =DB:: table('admins')-> get();
        return view('admins.index',compact('admins'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        DB::table('admins')->insert([
            'id'=> $request ->id ,
            'name'=> $request -> name ,
            'email'=> $request -> email ,
            'phone'=> $request ->phone,
            'username'=> $request ->username,
            'password'=> $request ->password 
        ]);
        return response('admin inserted successfully');
    }

    /**
     * Display the specified resource.
     *
    
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins= DB::table('admins')->where ('id',$id)->first();
        return view('admins.edit',compact('admins'));
        
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
        $admins= DB::table('admins')->where ('id',$id)->update([
            'id'=> $request ->id ,
            'name'=> $request -> name ,
            'email'=> $request -> email ,
            'phone'=> $request ->phone,
            'username'=> $request ->username,
            'password'=> $request ->password 
        ]);
        return response('admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $admins= DB::table('admins')->where ('id',$id)->delete();
        
    }
}

