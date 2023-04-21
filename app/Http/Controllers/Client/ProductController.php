<?php

namespace App\Http\Controllers\Client;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Productlist(){
        try{
      $data= product::all();
      return isset($data);
      if($data){
        return response()->json([
            "message"=>'module list show',
            "data"=>null
        ],200);
      }else
      {
        return response()->json([
            "message"=>"something wrong"
        ],400);

      }
        }
        catch(\Exception){
            return response()->json([
                "message"=>"module request failed",
                "data"=>null
            ],500);
        }
    }
}
