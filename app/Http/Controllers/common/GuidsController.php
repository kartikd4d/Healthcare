<?php

namespace App\Http\Controllers\common;

use App\Models\RegistrationGuide;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuidsController extends Controller
{
    public function GuidsCreate(Request $req)
    {
        
        try {
            $data = new RegistrationGuide;
            $data->title = $req->title;
            $data->video_path = $req->video_path;
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
        } catch (\Exception) {
            return response()->json([
                'message' => 'login request failed',

            ], 500);
        }
    }
}