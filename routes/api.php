<?php


use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//login
Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
 
], function ($router) {
    // Route::get('/', 'Api\AuthController@getLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('user.login');
    // Route::post('/login', 'Api\AuthController@login')->name('user.login');
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile',[AuthController::class, 'userProfile']);
    
    Route::post('/change-pass', [AuthController::class, 'changePassWord']);  
});


Route::get('/list',[UserController::class, 'index']);



// Route::middleware('auth:api',['role:admin', 'permission:view user'])->group(function () {
//     // Routes requiring the "admin" role and "create-post" permission.
//     Route::get('/user-list','Api\AuthController@userList');
// });



//Dự án
//truy vấn
Route::get('/project',[ProjectController::class, 'index']);
// //thêm
Route::post('/project/create',[ProjectController::class, 'store'])->name('project.store');

//sửa
Route::get('/project/update/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/update/{id}',[ProjectController::class, 'update'])->name('project.update');

//xóa
Route::delete('/project/delete/{id}',[ProjectController::class, 'destroy'])->name('project.destroy');








//Module
//truy vấn
Route::get('/module',[ModuleController::class, 'index']);
// //thêm
Route::post('/module/create',[ModuleController::class, 'store'])->name('module.store');

// //sửa
Route::put('/module/update/{id}',[ModuleController::class, 'update'])->name('module.update');

// //xóa
Route::delete('/module/delete/{id}',[ModuleController::class, 'destroy'])->name('module.destroy');




// //Dau muc
// //truy vấn
// Route::get('/work_item',[WorkItemController::class, 'index']);
// //thêm
// Route::get('/work_item/create', [WorkItemController::class, 'create'])->name('work_item.create');


// Route::post('/work_item/create',[WorkItemController::class, 'store'])->name('work_item.store');




// //sửa
// Route::get('/work_item/update/{id}', [WorkItemController::class, 'edit'])->name('work_item.edit');
// Route::put('/work_item/update/{id}',[WorkItemController::class, 'update'])->name('work_item.update');


// //xóa
// Route::get('/work_item/delete/{id}',[WorkItemController::class, 'destroy'])->name('work_item.destroy');

