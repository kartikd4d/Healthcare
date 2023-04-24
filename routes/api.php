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

Route::get('/book-call-list',[App\Http\Controllers\Admin\BookcallController::class,'Bookcalllist']);


Route::post('/role',[App\Http\Controllers\Admin\RoleController::class,'Createrole']);
Route::get('/role-list',[App\Http\Controllers\Admin\RoleController::class,'rolelist']);


Route::post('/rolepermission',[App\Http\Controllers\Admin\RolepermissionController::class,'Createrolepermission']);


Route::post('/file',[App\Http\Controllers\Admin\FileController::class,'createfile']);

Route::post('/document',[App\Http\Controllers\Admin\DocumentController::class,'CreateDocument']);




// Client
Route::post('/new-registration',[App\Http\Controllers\Client\CreateuserController::class,'createuser']);
Route::post('/edit-registration',[App\Http\Controllers\Client\CreateuserController::class,'updateuser']);


Route::post('/bookcall',[App\Http\Controllers\Client\BookCallController::class,'Bookcall']);

Route::post('/businessinfo',[App\Http\Controllers\Client\BusinessinfoController::class,'Createinfo']);

Route::get('/filelist',[App\Http\Controllers\Client\FileController::class,'FileList']);

Route::get('/product-list',[App\Http\Controllers\Client\ProductController::class,'Productlist']);

Route::get('/module-list',[App\Http\Controllers\Client\ProductController::class,'Modulelist']);

Route::get('/checklist-Ndis',[App\Http\Controllers\Client\ProductController::class,'Checklist']);











// common
Route::post('/payment',[App\Http\Controllers\common\PaymentController::class,'payment']);
Route::post('/guids',[App\Http\Controllers\common\GuidsController::class,'GuidsCreate']);







Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
