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
        $product = Product::leftjoin("modules", "products.id", "=", "modules.product_id")->select('products.product_name','products.id as products.id', 'modules.module_name', DB::raw('count(modules.product_id) as total_module'))->groupBy("products.id")->get();
        $product_count= Product::get()->count();
        $product_active= DB::table('products')->where('product_status', 'true')->count();
        $user = User::all();
        $call_list=Bookcall::all();

        $data['total_user']=$user->count();
        $data['product']=$product;
        $data['product_count']=$product_count;
        $data['product_active']=$product_active;
        $data['call_list']=$call_list;
        return response()->json([
            "message" => " show successfully",
            'data' => $data,
            'code' => 200,
            'success' => true,
        ]);


    }
}