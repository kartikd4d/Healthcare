<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChecklistDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function Createchecklist(Request $req)
    {
        try {
            $result = ChecklistDetail::create([
                "title" => $req->title,
                "product_id" => $req->product_id,
                "json_data" => json_encode($req->json_data),
                "status" => true
            ]);
            if ($result) {
                return response()->json([
                    "message" => "checklist detail submit successfully",
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
    public function Showchecklist(Request $req)
    {

        try {
            $product_id = $req->products_id;
            // $order = $req->order;
            // $limit = $req->limit;
            // $page = $req->page && $req->page > 0 ? $req->page : 1;
            // $skip = ($page - 1) * $limit;
            $result = ChecklistDetail::where("product_id", $product_id)->get();
            // $result = $data->skip($skip)->take($limit)->orderBy("checklist_details.id", $order)
            
            // return gettype(json_decode($result[0]->json_data));
            if ($result) {
                return response()->json([
                    "message" => " Show checklist details successfully",
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
    public function checklistedit(Request $req)
    {
        try {
            // $chce= $req->id;
            $data = ChecklistDetail::where('id', '=', $req->id)->get();
            if ($data) {
                return response()->json([
                    "message" => "checklist record",
                    "success" => true,
                    "data" => $data
                ], 200);
            } else {
                return response()->json([
                    "message" => 'Credentials are wrong',
                    "data" => null
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
    public function Updatechecklist(Request $req)
    {
        try {
            $result = ChecklistDetail::whereId($req->id)->update([
                "title" => $req->title,
                "product_id" => $req->product_id,
                "json_data" => json_encode($req->json_data),
                "status" => true
            ]);
            if ($result) {
                return response()->json([
                    "message" => " Update checklist details successfully",
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
    public function checklistdelete(Request $req)
    {
        try {
            $data = ChecklistDetail::find($req->id);
            $result = $data->delete();
            if ($result) {
                return response()->json([
                    "message" => " delete checklist details successfully ",
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