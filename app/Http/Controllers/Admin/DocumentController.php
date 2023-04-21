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
        $fill = New Documents;
        $fill->product = "SSSSSSSSSSSSSSSSSSSSSSS";
        $fill->file = "SSSSSSSSSSSSSSSSSSSSSSS";
        $result= $fill->save();
       return $result;
        // return $request->has("f");
        // $data= $request->filenames->store("public/data") ;
        // return ["message"=>$data];
        try {
            $data = [];
            // return $request->hasFile();
            $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
            ]);

            if ($request->hasfile('filenames')) {
                $files = $request->filenames;
               $data= $files->store("public/upload");
           
          
           
        } 
        

        } catch (\Exception) {
            return response()->json([
                "message" => "internal server error"
            ], 500);
        }

    }
}