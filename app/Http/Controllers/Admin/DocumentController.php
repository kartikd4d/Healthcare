<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    public function CreateDocument(Request $req)
    {
        // return $req->all();  
        try {
            $this->validate($req, [
                'id' => 'required',
                'title' => 'required',
                'description' => 'required',
                
            ]);

            $fileModel = new Documents;
            $fileModel->module_id = $req->id;
            $fileModel->document_title = $req->title;
            $fileModel->description = $req->description;
            $fileModel->html_data=$req->html;
            $fileModel->json_data=json_encode($req->jsondata);
            // if ($req->file()) {
            //     $fileName = time() . '_' . $req->file->getClientOriginalName();
            //     $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            //     // $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            //     $fileModel->file = '/storage/' . $filePath;
            // }

            $result = $fileModel->save();
            if ($result) {
                return response()->json([
                    "status" => true,
                    "code" => 200,
                    "message" => "create document successfully",
                    "result" => $result
                ]);
            } else {
                return response()->json([
                    "status" => true,
                    "code" => 400,
                    "message" => "something went wrong",
                    "result" => null
                ]);
            }


        } catch (\Exception $ex) {
            return response()->json([
                "message" => "internal server error",
                "result"=> $ex->getMessage()
            ], 500);
        }

        // $file = $request->filenames('image');

        // //Display File Name
        // echo 'File Name: '.$file->getClientOriginalName();
        // echo '<br>';

        // //Display File Extension
        // echo 'File Extension: '.$file->getClientOriginalExtension();
        // echo '<br>';

        // //Display File Real Path
        // echo 'File Real Path: '.$file->getRealPath();
        // echo '<br>';

        // //Display File Size
        // echo 'File Size: '.$file->getSize();
        // echo '<br>';

        // //Display File Mime Type
        // echo 'File Mime Type: '.$file->getMimeType();

        // //Move Uploaded File
        // $destinationPath = 'uploads';
        // $file->move($destinationPath,$file->getClientOriginalName());



    }
public function Documentlist(Request $req){
    try{ 
    $data= Documents::where("module_id",$req->module_id)->get();
    if ($data) {
        return response()->json([
            "message" => "Documentlist show successfully",
            "success" => true,
            'data' => $data,
        ], 200);
    } else {
        return response()->json([
            'message' => 'Credentials are wrong',
            "success" => false,
            'data' => null,
        ], 400);
    }
    }catch(\Exception $ex){
    return response()->json([
        "message"=>"Document list request failed",
        "error"=>$req->message()
    ],500);
    }
}

public function Documentedit(Request $req){
    try{ 
    $data= Documents::where("id",$req->id)->get();
    if ($data) {
        return response()->json([
            "message" => "Document edit show successfully",
            "success" => true,
            'data' => $data,
        ], 200);
    } else {
        return response()->json([
            'message' => 'Credentials are wrong',
            "success" => false,
            'data' => null,
        ], 400);
    }
    }catch(\Exception $ex){
    return response()->json([
        "message"=>"Document edit request failed",
        "error"=>$req->message()
    ],500);
    }
}
public function Documentupdate(Request $req)
    {
    
        try {
        //    return $req;
            $fileModel = Documents::find($req->id);
            $fileModel->document_title = $req->title;
            $fileModel->description = $req->description;
            $fileModel->html_data=$req->html;
            $fileModel->json_data=json_encode($req->jsondata);          
            $result = $fileModel->save();
            if ($result) {
                return response()->json([
                    "status" => true,
                    "code" => 200,
                    "message" => "Update document successfully",
                    "result" => $result
                ]);
            } else {
                return response()->json([
                    "status" => true,
                    "code" => 400,
                    "message" => "something went wrong",
                    "result" => null
                ]);
            }


        } catch (\Exception $ex) {
            return response()->json([
                "message" => "internal server error",
                "result"=> $ex->getMessage()
            ], 500);
        }
    }
    
}