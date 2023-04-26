<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module_file;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleFileController extends Controller
{
    public function ModuleFile(Request $req)
    {
        try {
            $data = new Module_File;
            $data->module_id = $req->module_id;
            // $data->file_name = $req->file_name;
            $data->status = $req->status;
            if ($req->file()) {
                $fileName = time() . '_' . $req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
                $file_size = $req->file->getSize();
                $data->file_path = '/storage/' . $filePath;
                $data->file_size = $file_size;
                $data->file_name = $fileName;
            }
            $result = $data->save();
            if ($result) {
                return response()->json([
                    "success" => true,
                    "message" => "file save successfully",
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    "success" => false,
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