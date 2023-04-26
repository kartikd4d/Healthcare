<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function Createproduct(Request $req)
    {
        try {
            $this->validate($req, [
                'product_name' => 'required',
                'product_status' => 'required'

            ]);


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
            // $data = Product::all();
            $order = $req->order;
            $sort = $req->sort;
            $limit = $req->limit;
            $page = $req->page && $req->page > 0 ? $req->page : 1;
            $skip = ($page - 1) * $limit;
            $data = Product::join("modules", "products.id", "=", "modules.product_id")->select('products.product_name', 'modules.module_name', DB::raw('count(modules.product_id) as total_module'))->groupBy("modules.product_id")->paginate(15)->get();

            $result = $data->skip($skip)->take($limit)->orderBy($sort, $order)->get();
            return $result;
            if ($result) {
                return response()->json([
                    "message" => "Product show successfully",
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
                'message' => 'Product list request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

    function Productedit(Request $req)
    {
        try {
            $user = Product::find($req->id);
            $user->product_name = $req->product_name;
            $user->product_status = $req->product_status;
            $result = $user->save();

            if ($result) {
                return $user->all();
            } else {
                return [
                    "result" => "error to update data "
                ];
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

// public function Productlist(){
//     try{


//     }catch (\Exception $ex) {

//         return response()->json([
//             'message' => 'Product delete request failed',
//             'error' => $ex->getMessage(),
//         ], 500);
//     }

// }

}