<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function createproduct(Request $req)
    {
        try {
            //   return $req->all();
            $data = new Product;
            $data->product_name = $req->product_name;
            $result = $data->save();
            if ($result) {
                return ["result" => "Product save successfully"];
            } else {
                return ["result" => "plz check any thing is wrong"];
            }
        } catch (\Exception $ex) {

            // Log::error('Login request failed', ['error' => $ex->getMessage()]);
            return response()->json([
                'message' => 'create Product request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }

    function productlist(){
        try{
            $data = Product::all();
            return $data;

        }catch (\Exception $ex) {

            // Log::error('Login request failed', ['error' => $ex->getMessage()]);
            return response()->json([
                'message' => 'Product list request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }






}