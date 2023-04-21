<?php

namespace App\Http\Controllers\Client;

use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function FileList()
    {
        try {
            $data = File::all();
            return $data; 
            if ($data) {
                return response()->json([
                    "message" => "record show on screen",
                    "data" => $data,
                ], 200);
            } else {
                return response()->json([
                    "message" => "somthing is wrong ",
                    "data" => Null
                ], 400);
            }

        } catch (\Exception) {
            return response()->json([
                "message" => "internal server error ",
                "data" => Null
            ], 500);
        }
    }
}