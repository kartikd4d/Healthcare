<?php

namespace App\Http\Controllers\Client;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CreateuserController extends Controller
{
    function createuser(Request $req)
    {
      try {
        $validator = Validator::make($req->all(), [
          'name' => 'required',
          'email' => 'required | unique:users',
          'password' => 'required',
          'mobile_number' => 'required',
          'role_id' => 'required',
         
      ]);

      if ($validator->fails()) {
          return response()->json([
              'message' => 'Bad or invalid request',
              'errors' => $validator->errors(),
          ], 400);
      }
        //   return $req->all();
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->mobile_number = $req->mobile_number;
        $user->role_id = $req->role_id;
        $user->status = $req->status;
        $result = $user->save();
        if ($result) {
          return response()->json([
            "message" => "create user successfully",
            'data' => $result,
          ], 200);
        } else {
          return response()->json([
            'message' => 'Credentials are wrong',
            'data' => null,
          ], 400);
        }
      } catch (\Exception $ex) {
  
        // Log::error('Login request failed', ['error' => $ex->getMessage()]);
        return response()->json([
          'message' => 'create user request failed',
          'error' => $ex->getMessage(),
        ], 500);
      }
    }
  

    function updateuser(Request $req)
    {
      try {
        $validator = Validator::make($req->all(), [
          'name' => 'required',
          'email' => 'required | unique:users',
          'password' => 'required',
          'mobile_number' => 'required',
          'role_id' => 'required',
         
      ]);

      if ($validator->fails()) {
          return response()->json([
              'message' => 'Bad or invalid request',
              'errors' => $validator->errors(),
          ], 400);
      }
        $id = $req->id;
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->mobile_number = $req->mobile_number;
        $user->role_id = $req->role_id;
        $user->status = $req->status;
        $result = $user->save();
        if ($result) {
          return response()->json([
            "message" => "Data save update successfully $id",
            'data' => $result,
          ], 200);
        } else {
          return response()->json([
            "message" => "something went wrong",
            'data' => Null,
          ], 400);
        }
      } catch (\Exception $ex) {
        return response()->json([
          'message' => 'update request failed',
          'error' => $ex->getMessage(),
        ], 500);
      }
  
    }
  
 
}
