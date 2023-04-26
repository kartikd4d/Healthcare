<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function CreateDocument(Request $req)
    {
        // return $req->all();  
        try {
            $this->validate($req, [
                'module_id' => 'required',
                'document_title' => 'required',
                'description' => 'required',
                'file' => 'required',
                'file.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
            ]);

            $fileModel = new Documents;
            $fileModel->module_id = $req->module_id;
            $fileModel->document_title = $req->document_title;
            $fileModel->description = $req->description;

            if ($req->file()) {
                $fileName = time() . '_' . $req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
                // $fileModel->name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file = '/storage/' . $filePath;
            }

            $result = $fileModel->save();
            if ($result) {
                return response()->json([
                    "status" => true,
                    "code" => 200,
                    "message" => "record submitted",
                    "result" => $result
                ]);
            } else {
                return response()->json([
                    "status" => true,
                    "code" => 200,
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



    
}