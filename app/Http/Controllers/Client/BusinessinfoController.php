<?php

namespace App\Http\Controllers\Client;

use App\Models\Businesinfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusinessinfoController extends Controller
{
    public function Createinfo(Request $req)
    {
        try {
            $data = new Businesinfo;
            $data->user_id = $req->user_id;
            $data->business_name = $req->business_name;
            $data->business_type = $req->business_type;
            $data->business_address = $req->business_address;
            $data->business_email = $req->business_email;
            $data->business_phone_no = $req->business_phone_no;
            $data->states_operating_in = $req->states_operating_in;
            $data->abn_name = $req->abn_name;
            $data->registered_abn_name = $req->registered_abn_name;
            $data->trading_name = $req->trading_name;
            $result = $data->save();
            if ($result) {
                return response()->json([
                    "message" => "update business info successfully",
                    'data' => $result,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Credentials are wrong',
                    'data' => null,
                ], 400);
            }

        } catch (\Exception $ex) {

            // Log::error('Login request failed', ['error' => $ex->getMessage()]);
            return response()->json([
                'message' => 'create user request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }


}