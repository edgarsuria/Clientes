<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\ApiejemploController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/customers', CustomerController::class);
Route::resource('/reports', ReportController::class);
Route::resource('/documents', DocumentController::class);
Route::get('/mensaje',[ApiejemploController::class, 'mensaje']);
