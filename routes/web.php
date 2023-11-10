<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomePageController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorkItemController;
use App\Models\WorkItem;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');




