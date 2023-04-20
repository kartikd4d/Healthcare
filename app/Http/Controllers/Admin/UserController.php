<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
  function createuser(Request $req)
  {
    try {
      //   return $req->all();
      $user = new User;
      $user->name = $req->name;
      $user->email = $req->email;
      $user->password = bcrypt($req->password);
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


  function listuser()
  {
    $user = new User;
    $result = $user->all();
    if ($result) {
      return ["result" => $result];
      ;
    } else {
      return ["Result" => "failed"];
    }
  }

  function updateuser(Request $req)
  {
    $id = $req->id;
    $user = User::find($id);
    $user->name = $req->name;
    $user->email = $req->email;
    $result = $user->save();
    if ($result) {
      return ["Result" => "Data save update successfully $id"];
    } else {
      return ["Result" => "failed"];
    }
  }

  function deleteuser(Request $req)
  {
    $id = $req->id;
    $user = User::find($id);
    $result = $user->delete();
    if ($result) {
      return ["result" => "the record has deleted"];
    } else {
      return ["result" => "not deleted"];
    }
  }


}