<?php

namespace App\Http\Controllers\Client;

use App\Models\Module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function Modulelist()
    {
        try {
            $data = Module::all();
            if ($data) {
                return response()->json([
                    "message" => "module record list",
                    "data" => $data
                ], 200);
            } else {
                return response()->json([
                    "message" => 'Credentials are wrong',
                    "data" => null
                ], 400);
            }
        } catch (\Exception) {
            return response()->json([
                "message" => "internal server error",
                "data" => null
            ], 500);

        }
    }
}