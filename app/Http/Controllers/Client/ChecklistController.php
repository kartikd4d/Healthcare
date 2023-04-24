<?php

namespace App\Http\Controllers\Client;
use App\Models\ChecklistDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function Checklist(Request $req)
    {
        try{
         $data = new ChecklistDetail ;
         $data->user_id=$req->user_id;
         $data->prefix_applicant=$req->prefix_applicant;
         $data->applicant_fullname=$req->applicant_fullname;
         $data->prefix_director=$req->prefix_director;
         $data->director_fullname=$req->director_fullname;
         $data->date_of_birth=$req->date_of_birth;
         $data->email=$req->email;
         $data->mobile=$req->mobile;
         $data->abn=$req->abn;
         $data->registered_adn=$req->registered_adn;
         $data->trading_name=$req->trading_name;
         $data->gst_registration=$req->gst_registration;
         $data->business_address=$req->business_address;
         $data->states_operate=$req->states_operate;
         $data->postal_address=$req->postal_address;
         $data->type_of_business=$req->type_of_business;
         $data->legal_entity=$req->legal_entity;
          $result=$data->save();
          if($result){
            return response()->json([
                "message" => "checklist detail successfully",
                'data' => $result,
            ], 200);
          }else{
            return response()->json([
                'message' => 'Credentials are wrong',
                'data' => null,
            ], 400);
          }
        }catch(\Exception $ex){
            return response()->json([
                "message"=>"create checklist request failed",
                "error"=>$ex->getMessage()
            ],500);
        }
    }
}
