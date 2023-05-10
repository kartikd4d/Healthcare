<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function createuser(Request $req)
    {
            //   return $req->all();
        $user= New User;
        // return $user->all();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=bcrypt($req->password);
        $user->role_id=$req->role_id;
        $user->status=$req->status;
       
      $result= $user->save();
      if($result){
        return[
                    "Result"=>"the data has been craeted successfully"
                ];
            }else{
        return[
                    "Result"=>"the data has not  save"
                ];
          }
     }
    
     public function updateuser(Request $req)
     {
     $user= User:: find($req->id);
     $user->name = $req->name;
     $result= $user->save();
 
     if($result){
         return $user->all();
     }else{
         return[
             "result"=>"error to update data "
         ];
     }
    }

    public function searchuser(Request $req){
        $key=$req->name; 
    //   $result = User::Where("name",$key)->get();
      $result = User::Where("name","like","%".$key."%")->get();

     if($result){
        return $result;
     }else{
        return ["result"=>"not update"];
     }
    }

    public function delete(Request $req){
        $key=$req->id; 
      $delete = User::find($key);
      $result =$delete->delete();
     if($result){
        return $result;
     }else{
        return ["result"=>"not deleted"];
     }
    }

 public function upload(Request $req){
    $result =$req->file('file')->store('datanew');
    return ["result"=>"doneeeeeeeeeeee"];
 }


}