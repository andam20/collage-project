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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//protected routes  
Route::group(['middleware' => ['auth:sanctum']], function () {


    // Route::get('/search', [APIEmployeeController::class, 'search']);
    // Route::get('employees/{id}/managers', [APIEmployeeController::class,'managers']);
    // Route::get('employees/{id}/managers-salary', [APIEmployeeController::class,'getEmployeeManagersSalary']);
    // Route::get('/export', [APIEmployeeController::class, 'export']);
    // Route::get('/{date}/logs', [APIEmployeeController::class, 'getLogsByDate']);
    Route::post("logout", [AuthController::class, 'logout']);

});

Route::resource('expense', APICompanyController::class);
Route::get('company-number', [APICompanyController::class,'count']);

//public route
Route::post("login", [AuthController::class, 'login']);
Route::post("register", [AuthController::class, 'register']);