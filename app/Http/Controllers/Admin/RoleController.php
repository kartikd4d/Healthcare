<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
  public function Createrole(Request $req)
  {

    try {
      //   return $req->all();
      $user = Role::create(["role_name" => $req->role_name]);

      if ($user) {
        return response()->json([
          "message" => "Role save successfully",
          'data' => $user,
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
        'message' => 'create Role request failed',
        'error' => $ex->getMessage()
      ], 500);
    }

  }

  public function rolelist()
  {
    try {
      $result = Role::all();
      // return $result;
      if ($result) {
        return response()->json([
          "message" => "record show successfully",
          'data' =>$result,
        ], 200);
      } else {
        return response()->json([
          "message" => "something went wrong",
          'data' => Null,
        ], 400);
      }
    } catch (\Exception $ex) {
      return response()->json([
        "message" => "internal server error",
        'error' => $ex->getMessage()
      ], 500);
    }
  }
}