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
            


        } catch (\Exception $ex) {

            return response()->json([
                'message' => 'Bookcall request failed',
                'error' => $ex->getMessage(),
            ], 500);
        }
    }
}
