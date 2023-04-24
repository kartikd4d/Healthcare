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
      $user->mobile_number = $req->mobile_number;
      $user->role_id = $req->role_id;
      $user->role_name = $req->role_name;
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
    try {
      $user = new User;
      $result = $user->all();
      if ($result) {
        return response()->json([
          "message" => "record show successfully",
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
        'message' => 'user  list request failed',
        'error' => $ex->getMessage(),
      ], 500);
    }
  }

  function updateuser(Request $req)
  {
    try {
      $id = $req->id;
      $user = User::find($id);
      $user->name = $req->name;
      $user->email = $req->email;
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

  function deleteuser(Request $req)
  {
    try {
      $id = $req->id;
      $user = User::find($id);
      $result = $user->delete();
      if ($result) {
        return response()->json([
          "message" => "the record has deleted",
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
        'message' => 'delete request failed',
        'error' => $ex->getMessage(),
      ], 500);
    }

  }
}