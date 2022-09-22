<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts =DB:: table('accounts')-> get();
        return view('accounts.index',compact('accounts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        DB::table('accounts')->insert([
            'id'=> $request ->id ,
            'role'=> $request -> role,
            'username'=> $request ->username,
            'password'=> $request ->password 
        ]);
        return response('accounts inserted successfully');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accounts= DB::table('accounts')->where ('id',$id)->first();
        return view('accounts.edit',compact('accounts'));
        
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
        DB::table('accounts')->update([
            'id'=> $request ->id ,
            'role'=> $request -> role,
            'username'=> $request ->username,
            'password'=> $request ->password 
        ]);
        return response('accounts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $accounts= DB::table('admins')->where ('id',$id)->delete();
    }
}
