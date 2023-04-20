<?php

namespace App\Http\Controllers\Client;
use App\Models\Bookcall;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookCallController extends Controller
{
    public function Bookcall(Request $req)
    {
        try {
            $data = new Bookcall;
            $data->call_type=$req->call_type;
            $data->full_name=$req->full_name;
            $data->contact_number=$req->contact_number;
            $data->email=$req->email;
            $data->jobtitle=$req->jobtitle;
            $data->notes=$req->notes;
            $data->date=$req->date;
            $data->time=$req->time;
            $result = $data->save();
            if ($result) {
                return response()->json([
                    "message" => "create call successfully",
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
                'message' => 'Bookcall request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }
}
