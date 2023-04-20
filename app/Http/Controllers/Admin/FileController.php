<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function createfile(Request $req)
    {
        try {
            // return ["result"=>"data has been created"];
        //   $path= $req->file('file')->store('datanew');
        //   return["result"=>"$path"];
            $data = new File;
            $data->product_id = $req->product_id;
            $data->file_name = $req->file_name;
            $data->file_size = $req->file_size;
            $data->file_path = $req->file_path;
            $data->status = $req->status;
            $result = $data->save();
            if ($result) {
                return response()->json([
                    "message" => "file save successfully",
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