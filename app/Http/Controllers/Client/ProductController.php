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
      $result=count($data);

      if($result > 0){
        return response()->json([
            "message"=>'module list show',
            "data"=>$data
        ],200);
      }else
      {
        return response()->json([
            "message"=>"no record",
            "data"=>null
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
