<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistrationGuide;

class RegistrationGuidController extends Controller
{


    public function CreateGuid(Request $req)
    {
        try {
            $data = new RegistrationGuide;
            $data->product_id = $req->product_id;
            $data->title = $req->title;
            $data->video_link = $req->videolink;
            $data->view_video = "0";
            $data->status = true;
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
                    "message" => " Create RegistrationGuide details successfully",
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
                "message" => "internal server error",
                "error" => $ex->getMessage(),
                "data" => null
            ], 500);
        }
    }
    public function GuidList(Request $req)
    {
        try {
            $product_id = $req->products_id;
            $result = RegistrationGuide::where("product_id", $product_id)->get();
            if ($result) {
                return response()->json([
                    "message" => " Show RegistrationGuide details",
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
                "message" => "internal server error",
                "error" => $ex->getMessage()
            ], 500);
        }
    }
    public function GuidEdit(Request $req)
    {
        try {
            $id = $req->id;
            $result = RegistrationGuide::where("id", $id)->get();
            if ($result) {
                return response()->json([
                    "message" => " Edit RegistrationGuide details ",
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
                "message" => "internal server error",
                "error" => $ex->getMessage()
            ], 500);
        }
    }
    public function GuidUpdate(Request $req)
    {  
        try {
            // return $req->all();

            // return $req->title;
            $data = RegistrationGuide::find($req->id);
            
            $data->title = $req->title;
            $data->video_link = $req->video_link;
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
                    "message" => " Update RegistrationGuide details ",
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
                "message" => "internal server error",
                "error" => $ex->getMessage()
            ], 500);
        }
    }
    public function GuidDelete(Request $req)
    {
        try {
            $id = $req->id;
            $result = RegistrationGuide::where("id", $id)->delete();
            if ($result) {
                return response()->json([
                    "message" => "Delete RegistrationGuide details successfully",
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
                "message" => "internal server error",
                "error" => $ex->getMessage()
            ], 500);
        }
    }

}