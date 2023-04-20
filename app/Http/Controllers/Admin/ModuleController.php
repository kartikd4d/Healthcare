<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    function createmodule(Request $req)
    {
        try {
            //   return $req->all();
            $data = new Module;
            $data->product_id = $req->product_id;
            $data->modulename = $req->modulename;
            $result = $data->save();
            if ($result) {
                return response()->json([
                    "message" => "Module save successfully",
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
                'message' => 'create Module request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }
}