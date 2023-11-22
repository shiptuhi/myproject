<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WorkItemController;
use App\Http\Controllers\WorkDoController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Auth::routes();


//login
Route::prefix('auth')->middleware('api')->group( function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::post('/change-pass', [AuthController::class, 'changePassWord']); 
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile',[AuthController::class, 'userProfile']);
    
    Route::group(['middleware' => [\Spatie\Permission\Middleware\RoleMiddleware::using('Admin')]], function () {
        Route::delete('/employee/delete/{id}',[AuthController::class, 'destroy']);
    });
    

    // Route::get('/user-list', [AuthController::class, 'userList']);    
});

Route::get('/roles',[RoleController::class, 'index']);

Route::get('/list',[UserController::class, 'index']);

Route::get('/project',[ProjectController::class, 'index']);
Route::get('/project/search',[ProjectController::class, 'filter']);
Route::get('/project/update/{id}', [ProjectController::class, 'edit']);  

Route::get('/module',[ModuleController::class, 'index']);
Route::get('/module/search',[ModuleController::class, 'filter']); 
Route::get('/module/update/{id}',[ModuleController::class, 'edit']);
Route::get('/get-modules-by-project/{id}',[ModuleController::class, 'getModulesByProject']);

Route::get('/work_item',[WorkItemController::class, 'index']);
Route::get('/work_item/search',[WorkItemController::class, 'filter']); 
Route::get('/work_item/update/{id}', [WorkItemController::class, 'edit']);

Route::get('/work_do',[WorkDoController::class, 'index']);
Route::get('/work_do/search',[WorkDoController::class, 'filter']); 
Route::post('/work_do/create',[WorkDoController::class, 'store']);
Route::get('/work_do/update/{id}', [WorkDoController::class, 'edit']);
Route::put('/work_do/update/{id}',[WorkDoController::class, 'update']);
Route::delete('/work_do/delete/{id}',[WorkDoController::class, 'destroy']);


Route::get('/customer', [CustomerController::class], 'index');
Route::get('/customer/search', [CustomerController::class], 'filter');
Route::get('/customer/update/{id}', [CustomerController::class], 'edit');




Route::group(['middleware' => [\Spatie\Permission\Middleware\RoleMiddleware::using('Admin')]], function () {
    Route::post('/project/create',[ProjectController::class, 'store']);
    Route::put('/project/update/{id}',[ProjectController::class, 'update']);
    Route::delete('/project/delete/{id}',[ProjectController::class, 'destroy']);

    Route::post('/module/create',[ModuleController::class, 'store']);
    Route::put('/module/update/{id}',[ModuleController::class, 'update']);
    Route::delete('/module/delete/{id}',[ModuleController::class, 'destroy']);

    Route::post('/work_item/create',[WorkItemController::class, 'store']);
    Route::put('/work_item/update/{id}',[WorkItemController::class, 'update']);
    Route::delete('/work_item/delete/{id}',[WorkItemController::class, 'destroy']);

    Route::post('/customer/create', [CustomerController::class], 'store');
    Route::put('/customer/update/{id}', [CustomerController::class], 'update');
    Route::delete('/customer/delete/{id}', [CustomerController::class], 'update');
});








