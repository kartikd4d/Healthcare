<?php

namespace App\Http\Controllers\Admin;

use App\Models\Module;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    function createmodule(Request $req)
    {
        
        try { 
            
            // $this->validate($req, [
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
                    'result' => $result,
                    'data'=>$data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Credentials are wrong',
                    'result' => $result,
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
    
    function Modulelist()
    {
        try {
            $data = Module::all();
            if ($data) {
                return response()->json([
                    "message" => "Product show successfully",
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Credentials are wrong',
                    'data' => null,
                ], 400);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Product list request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

    function Moduleedit(Request $req)
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
                $user->product_name = $req->product_name;
                $user->product_status = $req->product_status;
                $result= $user->save();
            
                if($result){
                    return $user->all();
                }else{
                    return[
                        "result"=>"error to update data "
                    ];
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
            // $key = $req->id;
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