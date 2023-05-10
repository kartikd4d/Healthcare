<?php

namespace App\Http\Controllers\common;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
             //   validating the coming request
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required', 
            ]);

            if ($validator->fails()) {
             // loging the error in log file
                // Log::error('Login Validation error', [
                    // 'errors' => $validator->errors(),
                // ]);
             // returning the response
                return response()->json([
                    'message' => 'Bad or invalid request',
                    'errors' => $validator->errors(),
                ], 400);
            }

            $email = $request->email;
            $password = $request->password;

            // checking the login credential 
            if(Auth::attempt(['email' =>$email, 'password' => $password]))
            {
                
                $user = Auth::user();
                // generating the token for specific user
                $success["token"] = $user->createToken('remember_token')->plainTextToken;
                // return Str::random(64);
                $success['user_id'] = $user->id;
                $success['name'] = $user->name;
                $success['email'] = $user->email;
                $success['role'] = $user->role_id;
                $success['status'] = $user->status;

                return response()->json([
                    'message' => 'login successfully',
                    'data' =>$success ,
                ], 200);
            }
            else
            {
                return response()->json([
                    'message' => 'Credentials are wrong',
                    'data' =>null ,
                ], 400);
            }

        } catch (\Exception $ex) {
            
            // Log::error('Login request failed', ['error' => $ex->getMessage()]);

            
            return response()->json([
                'message' => 'login request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }
    public function logout(Request $request)
    {
        try
        {
            $revoke = DB::table('personal_access_tokens')->where('tokenable_id',$request->id)->delete();
            
           return  $revoke ?  response([
            "msg"=>"Successfully Logout",
            "data"=>[],
            "code"=>200
           ]) :
           response([
            "msg"=>"User is not active",
            "data"=>[],
            "code"=>200
           ]);

        }
        catch(\Exception $ex)
        {
            return response([
                "msg"=>$ex->getMessage(),
                "data"=>[],
                "code"=>404
            ]);
        }
    }
}
