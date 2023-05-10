<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use App\Models\Businesinfo;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

// use Illuminate\Support\Facades\DB;

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
            $fileModel->html_data = $req->html;
            $fileModel->json_data = json_encode($req->jsondata);


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
                "result" => $ex->getMessage()
            ], 500);
        }




    }
    public function Documentlist(Request $req)
    {
        try {
            $data = Documents::where("module_id", $req->module_id)->get();
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
        } catch (\Exception $ex) {
            return response()->json([
                "message" => "Document list request failed",
                "error" => $req->message()
            ], 500);
        }
    }
    public function Documentedit(Request $req)
    {
        try {
            $document = Documents::where("id", $req->id)->first();
            if ($document) {
                return response()->json([
                    "status" => true,
                    "code" => 200,
                    "message" => "Update document successfully",
                    "result" => $document
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
                "message" => "Document edit request failed",
                "error" => $ex->getMessage()
            ], 500);
        }
    }

    public function DocumentView(Request $req)
    {
        try {

            $document = Documents::join("modules", "documents.module_id", "=", "modules.id")->
                join("products", "modules.product_id", "=", "products.id")->
                where("documents.id", $req->id)->
                select("documents.document_title", "documents.description", "documents.html_data", "modules.module_name", "products.product_name")->first();

            // $data[]=$document->document_title;
            //  $data[]=$document->description;
            // $module= Module::where("id",$req->module_id)->get();
            // $checklistdetail= ChecklistDetail::where("product_id",$req->products_id)->get();

            $user = User::where("id", $req->user_id)->get();
            $busines = Businesinfo::where("user_id", $req->user_id)->get();
            // return $document;

            $stri = $document->html_data;
            $replace = "";
            foreach ($user as $users) {
                $replace = str_replace("{{name}}", " " . $users->name . " ", $stri);
                $replace = str_replace("{{email}}", $users->email, $replace);
                $replace = str_replace('{{mobile_number}}', $users->mobile_number, $replace);
                // $replace = str_replace('{{address}}',$users->mobile_number,$replace);
            }
            foreach ($busines as $business) {
                $replace = str_replace('{{business_name}}', $business->business_name, $replace);
                $replace = str_replace('{{business_email}}', $business->business_email, $replace);
                $replace = str_replace('{{business_phone_no}}', $business->business_phone_no, $replace);
                $replace = str_replace('{{address}}', $business->business_address, $replace);
                $replace = str_replace('{{trading_name}}', $business->trading_name, $replace);
            }

            if ($replace) {
                return response()->json([
                    "message" => "Document edit show successfully",
                    "success" => true,
                    'data' => ["rpl" => $replace, "data" => $document],
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Credentials are wrong',
                    "success" => false,
                    'data' => null,
                ], 400);
            }
        } catch (\Exception $ex) {
            return response()->json([
                "message" => "Document edit request failed",
                "error" => $ex->getMessage()
            ], 500);
        }
    }


    public function Documentupdate(Request $req)
    {
        // return $req;
        try {
            //    return $req;
            $fileModel = Documents::find($req->id);
            $fileModel->document_title = $req->document_title;
            $fileModel->description = $req->description;
            $fileModel->html_data = $req->html;
            // $fileModel->json_data=json_encode($req->jsondata);          
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
                "result" => $ex->getMessage()
            ], 500);
        }
    }

}