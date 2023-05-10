<?php

namespace App\Http\Controllers\Admin;

use App\Models\Welcomebanner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomebannerController extends Controller
{

    public function Welcomebanner(Request $req)
    {
        try {
            // $data =  Welcomebanner::first();
            // $success = Storage::cleanDirectory($data->file_path);
            $data = new Welcomebanner;
            if ($data)
            $data->title = $req->title;
            $data->status = false;
            if ($req->file()) {
                $fileName = time() . '_' . $req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('banner', $fileName, 'public');
                $file_size = $req->file->getSize();
                $data->file_path = '/storage/' . $filePath;
                $data->file_size = $file_size;
                $data->file_name = $fileName;
            }
            $result = $data->save();
          
            if ($result) {
                return response()->json([
                    "message" => "welcomebanner submit successfully",
                    'data' => $result,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Credentials are wrong',
                    'data' => null,
                ], 400);
            }
        } catch (\Exception $ex) {
            return response()->json([
                "message" => "welcomebanner request failed",
                "error" => $req->message()
            ], 500);
        }
    }
    // public function BannerList(Request $req)
    // {
    //     try {
    //         $result = Welcomebanner::all();
    //         if ($result) {
    //             return response()->json([
    //                 "message" => " Show Welcomebanner details successfully",
    //                 'data' => $result,
    //             ], 200);
    //         } else {
    //             return response()->json([
    //                 'message' => 'Credentials are wrong',
    //                 'data' => null,
    //             ], 400);
    //         }
    //     } catch (\Exception $ex) {
    //         return response()->json([
    //             "message" => "Show Welcomebanner list request failed",
    //             "error" => $req->message()
    //         ], 500);
    //     }
    // }
    // public function Updatebanner(Request $req)
    // {
        
    //     try {
    //         $data= Welcomebanner::find($req->id);
    //         $data->status = $req->status;
    //         if ($req->file()) {
    //             $fileName = time() . '_' . $req->file->getClientOriginalName();
    //             $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
    //             $file_size = $req->file->getSize();
    //             $data->file_path = '/storage/' . $filePath;
    //             $data->file_size = $file_size;
    //             $data->file_name = $fileName;
    //         }
    //         $result = $data->save();
    //         if ($result) {
    //             return response()->json([
    //                 "message" => " Update checklist details successfully",
    //                 'data' => $result,
    //             ], 200);
    //         } else {
    //             return response()->json([
    //                 'message' => 'Credentials are wrong',
    //                 'data' => null,
    //             ], 400);
    //         }
    //     } catch (\Exception $ex) {
    //         return response()->json([
    //             "message" => "Update checklist list request failed",
    //             "error" => $req->message()
    //         ], 500);
    //     }

    // }
}