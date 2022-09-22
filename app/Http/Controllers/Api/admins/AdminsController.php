<?php

namespace App\Http\Controllers\Api\admins;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AdminsController extends Controller
{
    use ApiResponseTrait;
    public function index(){
       $admins = AdminsResource ::collection(Admin::get());
       return $this ->ApiResponse($admins,'done',200);
    
      
    }
    public function show($id){
        $admins = Admin ::find($id);
        if($admins){
            return $this ->ApiResponse(new AdminsResource($admin),'done',200);
        }
        return $this ->ApiResponse(null,'thid admin not found', 404);
    
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|unique:admins|max:255',
            'email' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this ->ApiResponse(null,$validator->errors(), 400);
    }

        $admins = Admin:: create($request->all());
        if($admins){
            return $this ->ApiResponse(new AdminsResource($admin),'thid admin saved',201);
        }
        return $this ->ApiResponse(null,'thid admin not save', 400);
    }

    public function update(Request $request ,$id){
        $validator = Validator::make($request->all(), [
            'password' => 'required|unique:admins|max:255',
            'email' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return $this ->ApiResponse(null,$validator->errors(), 400);
    }
    $admins = Admin ::find($id);
    if (!$admins){
        return $this ->ApiResponse(null,'this admin not found', 404);
    }
    $admins ->update($request->all());
    if($admins){
        return $this ->ApiResponse(new AdminsResource($admin),'this admin updated',201);
    }
    return $this ->ApiResponse(null,'this admin not found', 404);
}
    public function destroy($id){
        $admins = Admin ::find($id);
    if (!$admins){
        return $this ->ApiResponse(null,'this admin not found', 404);
    }
    $admins->delete($id);
    if($admins){
        return $this ->ApiResponse(null,'this admin deleted',200);
    }
    }
    }

