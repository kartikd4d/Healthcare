<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login',[App\Http\Controllers\LoginController::class,'login']);
// Route::post('/create',[App\Http\Controllers\TestController::class,'createuser']);
// Route::put('/update',[App\Http\Controllers\TestController::class,'updateuser']);
// Route::get('/search',[App\Http\Controllers\TestController::class,'searchuser']);
// Route::delete('/delete',[App\Http\Controllers\TestController::class,'delete']);
// Route::post('/upload',[App\Http\Controllers\TestController::class,'upload']);

// Admin
Route::post('/user',[App\Http\Controllers\Admin\UserController::class,'createuser']);
Route::get('/listuser',[App\Http\Controllers\Admin\UserController::class,'listuser']);
Route::put('/updateuser',[App\Http\Controllers\Admin\UserController::class,'updateuser']);
Route::put('/deleteuser',[App\Http\Controllers\Admin\UserController::class,'deleteuser']);

Route::post('/module',[App\Http\Controllers\Admin\ModuleController::class,'createmodule']);

Route::post('/product',[App\Http\Controllers\Admin\ProductController::class,'createproduct']);
Route::get('/productlist',[App\Http\Controllers\Admin\ProductController::class,'productlist']);
Route::put('/productedit',[App\Http\Controllers\Admin\ProductController::class,'productedit']);

Route::post('/role',[App\Http\Controllers\Admin\RoleController::class,'Createrole']);

Route::post('/rolepermission',[App\Http\Controllers\Admin\RolepermissionController::class,'Createrolepermission']);


Route::post('/file',[App\Http\Controllers\Admin\FileController::class,'createfile']);









// common
Route::post('/payment',[App\Http\Controllers\common\PaymentController::class,'payment']);






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});