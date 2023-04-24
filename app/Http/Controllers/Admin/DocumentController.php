<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;

class DocumentController extends Controller
{
    public function CreateDocument(Request $request)
    {
        $files= New Documents;
        $uploadFileDir = public_path() . '/images/';

        $banner = new Documents();
            if ($request->hasfile('filenames'))
            {
                $newFileName = $_FILES["filenames"]["name"];
                $fileTmpPath = $_FILES["filenames"]["tmp_name"];
                $dest_path = $uploadFileDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path))
                {
                    $files->filenames = '/public/images/'.$newFileName;
                }
            } 

     $result= $files->save();

        if ($result){
            return ["message"=>"successfull"];
        }else{
            return["message"=>"failed"];
        }



        try {

            // return $request->hasFile();
            $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
            ]);

           


        } catch (\Exception) {
            return response()->json([
                "message" => "internal server error"
            ], 500);
        }

    }
}