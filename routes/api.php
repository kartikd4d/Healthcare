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
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);



// Admin
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user', [App\Http\Controllers\Admin\UserController::class, 'createuser']);
    Route::get('/user/list', [App\Http\Controllers\Admin\UserController::class, 'listuser']);
    Route::put('/user/update', [App\Http\Controllers\Admin\UserController::class, 'updateuser']);
    Route::delete('/user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteuser']);
});
Route::get('/user/list', [App\Http\Controllers\Admin\UserController::class, 'listuser']);
Route::put('/user/update', [App\Http\Controllers\Admin\UserController::class, 'updateuser']);

Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'ProfileEdit']);
Route::put('/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'ProfileUpdate']);

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'AdminDashboard']);

Route::post('/product', [App\Http\Controllers\Admin\ProductController::class, 'Createproduct']);
Route::get('/product/list', [App\Http\Controllers\Admin\ProductController::class, 'Productlist']);
Route::put('/product/update', [App\Http\Controllers\Admin\ProductController::class, 'Productupdate']);
Route::delete('/product/delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'DeleteProduct']);

Route::post('/module', [App\Http\Controllers\Admin\ModuleController::class, 'createmodule']);
Route::get('/module/list', [App\Http\Controllers\Admin\ModuleController::class, 'Modulelist']);
// Route::get('/module/edit',[App\Http\Controllers\Admin\ModuleController::class,'Moduleedit']);
Route::put('/module/update', [App\Http\Controllers\Admin\ModuleController::class, 'Moduleupdate']);
Route::delete('/module/delete/{id}', [App\Http\Controllers\Admin\ModuleController::class, 'DeleteModule']);

Route::post('/document', [App\Http\Controllers\Admin\DocumentController::class, 'CreateDocument']);
Route::get('/document/list', [App\Http\Controllers\Admin\DocumentController::class, 'Documentlist']);
Route::get('/document/edit', [App\Http\Controllers\Admin\DocumentController::class, 'Documentedit']);
Route::get('/document/view', [App\Http\Controllers\Admin\DocumentController::class, 'DocumentView']);
Route::put('/document/update', [App\Http\Controllers\Admin\DocumentController::class, 'Documentupdate']);

Route::post('/checklist', [App\Http\Controllers\Admin\ChecklistController::class, 'Createchecklist']);
Route::get('/checklist/show', [App\Http\Controllers\Admin\ChecklistController::class, 'Showchecklist']);
Route::get('/checklist/edit', [App\Http\Controllers\Admin\ChecklistController::class, 'checklistedit']);
Route::put('/checklist/update', [App\Http\Controllers\Admin\ChecklistController::class, 'Updatechecklist']);
Route::delete('/checklist/delete', [App\Http\Controllers\Admin\ChecklistController::class, 'checklistdelete']);

Route::post('/guid', [App\Http\Controllers\Admin\RegistrationGuidController::class, 'CreateGuid']);
Route::get('/guid/list', [App\Http\Controllers\Admin\RegistrationGuidController::class, 'GuidList']);
Route::get('/guid/edit', [App\Http\Controllers\Admin\RegistrationGuidController::class, 'GuidEdit']);
Route::post('/guid/update', [App\Http\Controllers\Admin\RegistrationGuidController::class, 'GuidUpdate']);
Route::delete('/guid/delete', [App\Http\Controllers\Admin\RegistrationGuidController::class, 'GuidDelete']);



Route::post('/module/file', [App\Http\Controllers\Admin\ModuleFileController::class, 'ModuleFile']);

Route::get('/bookcall/list', [App\Http\Controllers\Admin\BookcallController::class, 'Bookcalllist']);

Route::post('/test', [App\Http\Controllers\Admin\WelcomebannerController::class, 'test']);

Route::post('/welcomebanner', [App\Http\Controllers\Admin\WelcomebannerController::class, 'Welcomebanner']);
Route::get('/banner/list', [App\Http\Controllers\Admin\WelcomebannerController::class, 'BannerList']);
Route::put('/banner/update', [App\Http\Controllers\Admin\WelcomebannerController::class, 'Updatebanner']);

Route::post('/purchasemodule', [App\Http\Controllers\Admin\PurchaseModuleController::class, 'PurchaseItem']);

Route::post('/role', [App\Http\Controllers\Admin\RoleController::class, 'Createrole']);

Route::post('/rolepermission', [App\Http\Controllers\Admin\RolepermissionController::class, 'Createrolepermission']);

Route::post('/file', [App\Http\Controllers\Admin\FileController::class, 'createfile']);



// Client

Route::post('/user/document', [App\Http\Controllers\Client\CreateuserController::class, 'Showuserdocument']);

Route::post('/new-registration', [App\Http\Controllers\Client\CreateuserController::class, 'createuser']);

Route::post('/bookcall', [App\Http\Controllers\Client\BookCallController::class, 'Bookcall']);

Route::post('/businessinfo', [App\Http\Controllers\Client\BusinessinfoController::class, 'Createinfo']);

Route::get('/filelist', [App\Http\Controllers\Client\FileController::class, 'FileList']);

// Route::get('/product-list',[App\Http\Controllers\Client\ProductController::class,'Productlist']);

Route::post('/checklist/details', [App\Http\Controllers\Client\ChecklistController::class, 'Checklist']);
Route::post('/services/qualification', [App\Http\Controllers\Client\ChecklistController::class, 'ServiceQualification']);
Route::post('/suitablility', [App\Http\Controllers\Client\ChecklistController::class, 'Suitablility']);
Route::post('/declaration', [App\Http\Controllers\Client\ChecklistController::class, 'Declaration']);
Route::get('/testing', [App\Http\Controllers\TestingController::class, 'testing']);
// common
Route::post('/payment', [App\Http\Controllers\common\PaymentController::class, 'payment']);
Route::post('/guids', [App\Http\Controllers\common\GuidsController::class, 'GuidsCreate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});