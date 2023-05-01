<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    function createmodule(Request $req)
    {
        
        try { 
       $validator = Validator::make($req->all(), [
            'product_id' => 'required',
            'module_name'=>'required',
            'module_status'=>'required'
          
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Bad or invalid request',
                'errors' => $validator->errors(),
            ], 400);
        }
            //   return $req->all();
            $data = new Module;
            $data->product_id = $req->product_id;
            $data->module_name = $req->module_name;
            $data->module_status = $req->module_status;
            $result = $data->save();
            if ($result) {
                return response()->json([
                    "message" => "Module save successfully",
                    "success" => true,
                    'data'=>$data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Credentials are wrong',
                    "success" => false,
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
    
    function Modulelist(Request $req)
    {
        try {
            $product_id= $req->products_id;
            $order = $req->order;
            $sort = $req->sort;
            $limit = $req->limit;
            $page = $req->page && $req->page > 0 ? $req->page : 1;
            $skip = ($page - 1) * $limit;
           
            $Ndata = Module::join("products","products.id","=",DB::raw("modules.product_id and products.id=$product_id"))
            
            ->leftjoin("documents", "modules.id", "=", "documents.module_id")
            ->select('modules.module_name', 'modules.module_status', 'modules.id as module_id','documents.module_id', DB::raw('count(documents.module_id) as total_document'))
            ->groupBy("modules.id");
            $data = $Ndata->skip($skip)->take($limit)->orderBy("modules.id", $order)->get();
            
            if ($data) {
                return response()->json([
                    "message" => "module show successfully",
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
                'message' => 'module list request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

   
    public function Moduleedit(Request $req)
    {
        try {
            $product_id= $req->id;
            $data=Module::where('product_id','=',$product_id)->get();
            if ($data) {
                return response()->json([
                    "message" => "module record list",
                    "success" => false,
                    "data" => $data
                ], 200);
            } else {
                return response()->json([
                    "message" => 'Credentials are wrong',
                    "data" => null
                ], 400);
            }
        } catch (\Exception) {
            return response()->json([
                "message" => "internal server error",
                "data" => null
            ], 500);

        }
    }
    function Moduleupdate(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'product_id' => 'required',
                'module_name'=>'required',
                'module_status'=>'required'
              
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad or invalid request',
                    'errors' => $validator->errors(),
                ], 400);
            }
                $user= Module:: find($req->id);
                $user->product_id = $req->product_id;
                $user->module_name = $req->module_name;
                $user->module_status = $req->module_status;
                $result= $user->save();
            
                if($result){
                    return response()->json([
                        "message" => "module record list",
                        "data" => $result,
                    ], 200);
                } else {
                    return response()->json([
                        "message" => 'Credentials are wrong',
                        "data" => null
                    ], 400);
                }
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Product edit request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }

    }
    function DeleteModule($key)
    {
        try {
            $delete = Module::find($key);
            $result = $delete->delete();
            if ($result) {
                return response()->json([
                    "message" => "Product delete successfully $key",
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
                'message' => 'Product delete request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }

    }
}