<?php

namespace App\Http\Controllers\Admin;
use App\Models\PurchaseModule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseModuleController extends Controller
{
    public function PurchaseItem(Request $req){
        try{
        $result=PurchaseModule::create($req->all());
        if ($result){
            return response()->json([
                "status"=>true,
               "message"=>"Purchase module created" ,
               "data"=>$result
            ],200);
        }else{
            return response()->json([
                "status"=>false,
               "message"=>"Credentials are wrong" ,
               "data"=>$req
            ],400);
        }
    }catch(\Exception $ex){
        return response()->json([
            "status"=>false,
            "message"=>"PurchaseItem request failed" ,
            "error"=>$ex
        ]);
    }                                           
    }
}
