<?php

namespace App\Http\Controllers\Api\login;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
//use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class loginController extends Controller
{
    //
    public function login(Request $request)
    {

        try {
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,

                'data'=> $user->join('students','users.id','=','students.account_id')->where('users.email',$request->email)->first()
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function registration(Request $request){

        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'first_name'=>'required',
                    'last_name' => 'required',
                    'username'=>'required|min:8',
                    'phone'=>'required|min:11|max:11',
                    'address'=>'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required'
                ]);
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,

                'username' => $request->username,

                'password' => bcrypt($request->password),
                'role'=>'student'
            ]);
            Student::create([
                'phone'=>$request->phone,
                'address'=>$request->address,
                'account_id'=>$user->id,
            ]);
            $user->attachRole('student');
            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

            } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function logout(Request $request){


            if (Auth::check()) {
                Auth::user()->tokens()->delete();
            }
            return response()->json([

                'status'    => 1,
                'message'   => 'User Logout',

            ], 200);
        }


}
