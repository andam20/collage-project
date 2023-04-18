<?php

use App\Http\Controllers\APICompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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





Route::group(['middleware' => [\App\Http\Middleware\CorsMiddleware::class]], function () {

    Route::post('/login', [APICompanyController::class, 'login']);

    Route::get('/employee-profile', [APICompanyController::class, 'employeeProfile'])->middleware(['auth:sanctum']);
    Route::put('/update-employee', [APICompanyController::class, 'updateEmployee'])->middleware(['auth:sanctum']);
    Route::get('/show-employee', [APICompanyController::class, 'showEmployee'])->middleware(['auth:sanctum']);
   
    Route::get('/company-name', [APICompanyController::class, 'companyName'])->middleware(['auth:sanctum']);

    Route::post('/store-expense', [APICompanyController::class, 'storeExpense'])->middleware(['auth:sanctum']);
    Route::put('/update-expense/{id}', [APICompanyController::class, 'updateExpense'])->middleware(['auth:sanctum']);
    Route::delete('/delete-expense/{id}', [APICompanyController::class, 'deleteExpense'])->middleware(['auth:sanctum']);
    Route::get('/show-expense/{id}', [APICompanyController::class, 'showExpense'])->middleware(['auth:sanctum']);

    Route::get('/expense', [APICompanyController::class, 'expense']);
    Route::get('/last-four', [APICompanyController::class, 'last_four'])->middleware(['auth:sanctum']);
    Route::get('/income', [APICompanyController::class, 'income'])->middleware(['auth:sanctum']);
    Route::get('/total', [APICompanyController::class, 'total'])->middleware(['auth:sanctum']);
    Route::post('/logout', [APICompanyController::class, 'logout'])->middleware(['auth:sanctum']);

});