<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\common\LoginController;

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
Route::post('/login',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);



// Admin
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user',[App\Http\Controllers\Admin\UserController::class,'createuser']);
    Route::get('/listuser',[App\Http\Controllers\Admin\UserController::class,'listuser']);
    Route::put('/updateuser',[App\Http\Controllers\Admin\UserController::class,'updateuser']);
    Route::put('/deleteuser',[App\Http\Controllers\Admin\UserController::class,'deleteuser']);
});



Route::post('/module',[App\Http\Controllers\Admin\ModuleController::class,'createmodule']);

Route::post('/product',[App\Http\Controllers\Admin\ProductController::class,'createproduct']);
Route::get('/productlist',[App\Http\Controllers\Admin\ProductController::class,'productlist']);
Route::put('/productedit',[App\Http\Controllers\Admin\ProductController::class,'productedit']);

Route::get('/book-call-list',[App\Http\Controllers\Admin\BookcallController::class,'Bookcalllist']);


Route::post('/role',[App\Http\Controllers\Admin\RoleController::class,'Createrole']);

Route::post('/rolepermission',[App\Http\Controllers\Admin\RolepermissionController::class,'Createrolepermission']);


Route::post('/file',[App\Http\Controllers\Admin\FileController::class,'createfile']);



// Client
Route::post('/bookcall',[App\Http\Controllers\Client\BookCallController::class,'Bookcall']);

Route::post('/businessinfo',[App\Http\Controllers\Client\BusinessinfoController::class,'Createinfo']);

Route::get('/filelist',[App\Http\Controllers\Client\FileController::class,'FileList']);

Route::get('/product-list',[App\Http\Controllers\Client\ProductController::class,'Productlist']);

Route::post('/checklist/details',[App\Http\Controllers\Client\ChecklistController::class,'Checklist']);







// common
Route::post('/payment',[App\Http\Controllers\common\PaymentController::class,'payment']);
Route::post('/guids',[App\Http\Controllers\common\GuidsController::class,'GuidsCreate']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
