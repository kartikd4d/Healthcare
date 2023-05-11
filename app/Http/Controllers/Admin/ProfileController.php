<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Businesinfo;

class ProfileController extends Controller
{

    function ProfileEdit(Request $req)
    {
        try {
            $id = $req->user_id;
            $user = User::find($id);
            $business = Businesinfo::where("user_id", $id)->first();
            // $users = User::join('businesinfos', 'users.id', '=', 'businesinfos.user_id')->where('users.id', $id)->get();
            $result["user"] = $user;
            $result["business"] = $business;
            if ($result) {
                return response()->json([
                    "message" => "create user successfully",
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
                'message' => 'update request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }


    function ProfileUpdate(Request $req)
    {
        try {
            $id = $req->id;
            $user = User::find($id);
            $user->name = $req->name;
            $user->email = $req->email;
            $user->mobile_number = $req->mobile_number;
            $user->role_id = $req->role_id;
            $user->status = $req->status;
            $user->save();

            $update = $data = "";
            $fetch = DB::table('businesinfos')->where("user_id", $req->id);
            // return count($fetch->get());

            if (count($fetch->get()) > 0) {
                $update = $fetch->update([
                    "business_name" => $req->business_name,
                    "business_type" => $req->business_type,
                    "business_address" => $req->business_address,
                    "business_email" => $req->business_email,
                    "business_phone_no" => $req->business_phone_no,
                    "states_operating_in" => $req->states_operating_in,
                    "abn_name" => $req->abn_name,
                    "registered_abn_name" => $req->registered_abn_name,
                    "trading_name" => $req->trading_name
                ]);

            } else {
                $data = Businesinfo::create([
                    "user_id" => $req->id,
                    "business_name" => $req->business_name,
                    "business_type" => $req->business_type,
                    "business_address" => $req->business_address,
                    "business_email" => $req->business_email,
                    "business_phone_no" => $req->business_phone_no,
                    "states_operating_in" => $req->states_operating_in,
                    "abn_name" => $req->abn_name,
                    "registered_abn_name" => $req->registered_abn_name,
                    "trading_name" => $req->trading_name
                ]);
            }
            // if($user->wasChanged() && ($update || $data)){
            return response()->json([
                "status" => true,
                "msg" => "updated successfully",
                "code" => 200
            ]);
            // }else{return response()->json(["status"=>true,"msg"=>"update successfully","code"=>400]);}

        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'update request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }
}