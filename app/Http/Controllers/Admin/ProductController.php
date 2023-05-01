<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function Createproduct(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'product_name' => 'required',
                'product_status' => 'required'

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad or invalid request',
                    'errors' => $validator->errors(),
                ], 400);
            }
            //   return $req->all();
            $data = new Product;
            $data->product_name = $req->product_name;
            $result = $data->save();
            if ($result) {
                return response()->json([
                    "message" => "Product save successfully",
                    'status' => $result,
                    "data" => $data
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Credentials are wrong',
                    'data' => null,
                ], 400);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'create Product request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

    function Productlist(Request $req)
    {
        try {
            $data = Product::all();
            $order = $req->order;
            $sort = $req->sort;
            $limit = $req->limit;
            $page = $req->page && $req->page > 0 ? $req->page : 1;
            $skip = ($page - 1) * $limit;
            $data = Product::leftjoin("modules", "products.id", "=", "modules.product_id")->select('products.product_name', 'products.product_status', 'products.id as products_id', 'modules.module_name', DB::raw('count(modules.product_id) as total_module'))->groupBy("products.id");
            $count = $data->get()->count();

            $result = $data->skip($skip)->take($limit)->orderBy($sort, $order)->get();
            // $result['count']=$count;

            if ($result) {
                return response()->json([
                    "message" => "Product show successfully",
                    "product_count" => $count,
                    'data' => $result,
                    'code' => 200,
                    'success' => true,

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

    function Productupdate(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'product_name' => 'required',
                'product_status' => 'required',
                'products_id' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Bad or invalid request',
                    'errors' => $validator->errors(),
                ], 400);
            }
            $user = Product::find($req->products_id);
            $user->product_name = $req->product_name;
            $user->product_status = $req->product_status;
            $result = $user->save();

            if ($result) {
                return response()->json([
                    "message" => "Product update successfully",
                    "data" => [],
                    "success" => true
                ], 200);
            } else {
                return response()->json([
                    "message" => "Product update successfully",
                    "data" => null,
                    "success" => false
                ], 400);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Product edit request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }

    }
    function DeleteProduct($key)
    {
        try {
            // $key = $req->id;
            $delete = Product::find($key);
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