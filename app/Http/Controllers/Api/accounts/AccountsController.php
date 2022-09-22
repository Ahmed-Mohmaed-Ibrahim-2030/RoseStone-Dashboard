<?php

namespace App\Http\Controllers\Api\accounts;

use App\Http\Controllers\Controller;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AccountsController extends Controller
{
    use ApiResponseTrait;
    public function index(){
       $accounts = AccountsResource ::collection(Account::get());
       return $this ->ApiResponse($accounts,'done',200);
    
      
    }
    public function show($id){
        $accounts =Account::find($id);
        if($accounts){
            return $this ->ApiResponse(new AccountsResource($accounts),'done',200);
        }
        return $this ->ApiResponse(null,'thid account not found', 404);
    
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|unique:accounts|max:255',
            'role' => 'required',
            'username' => 'required',
        ]);
        if ($validator->fails()) {
            return $this ->ApiResponse(null,$validator->errors(), 400);
    }

        $accounts = Account:: create($request->all());
        if($accounts){
            return $this ->ApiResponse(new AccountsResource($accounts),'thid account saved',201);
        }
        return $this ->ApiResponse(null,'thid account not save', 400);
    }

    public function update(Request $request ,$id){
        $validator = Validator::make($request->all(), [
            'password' => 'required|unique:accounts|max:255',
            'role' => 'required',
            'username' => 'required',
        ]);
        if ($validator->fails()) {
            return $this ->ApiResponse(null,$validator->errors(), 400);
    }
    $accounts = Account ::find($id);
    if (!$accounts){
        return $this ->ApiResponse(null,'the account not found', 404);
    }
    $accounts ->update($request->all());
    if($accounts){
        return $this ->ApiResponse(new AccountsResource($accounts),'thid account updated',201);
    }
    return $this ->ApiResponse(null,'this account not found', 404);
}
    public function destroy($id){
        $accounts = Account ::find($id);
    if (!$accounts){
        return $this ->ApiResponse(null,'the account not found', 404);
    }
    $accounts->delete($id);
    if($accounts){
        return $this ->ApiResponse(null,'this account deleted',200);
    }
    }
    }


