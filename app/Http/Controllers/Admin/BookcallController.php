<?php

namespace App\Http\Controllers\Admin;
use App\Models\Bookcall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookcallController extends Controller
{
    public function Bookcalllist(){
        try{
            $result= Bookcall::all();
            return["result"=>$result];

        } catch (\Exception $ex) {

            // Log::error('Login request failed', ['error' => $ex->getMessage()]);
            return response()->json([
                'message' => 'create Module request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }
}
