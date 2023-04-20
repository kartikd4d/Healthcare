<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rolepermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolepermissionController extends Controller
{
    public function Createrolepermission(Request $req)
    {
        try {
        $data = new Rolepermission;
        $data->role_id= $req->role_id;
        $data->role_name= $req->role_name;
        $data->key= $req->key;
        $data->status= $req->status;
        $result=$data->save();
        if ($result) {
            return response()->json([
              "message" => "Rolepermission save successfully",
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
          'message' => 'create Role request failed',
          'error' => $ex->getMessage(),
        ], 500);
      }
    }
}