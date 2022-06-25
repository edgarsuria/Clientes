<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('',[HomeController::class,'index']);
Route::resource('/customers', CustomerController::class)->names('admin.customers');
Route::resource('/reports', ReportController::class)->names('admin.reports');
Route::resource('/documents', DocumentController::class)->names('admin.documents');
Route::get('/documents/download', [DocumentController::class,'downloadDocument'])
            ->name('admin.documents.download');
