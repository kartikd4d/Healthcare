<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Bookcall;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function AdminDashboard()
    {
        $product = Product::leftjoin("modules", "products.id", "=", "modules.product_id")->select('products.product_name', 'modules.module_name', DB::raw('count(modules.product_id) as total_module'))->groupBy("modules.product_id")->get();
      
        $user = User::all();
        $user_count = count($user);
        $call_list=Bookcall::all();
        return response()->json([
            "product" => $product,
            "user_count"=> $user_count,
            "user" => $user,
           "call_list"=>$call_list
        ]);


    }
}