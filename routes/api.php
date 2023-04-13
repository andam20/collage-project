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
    // Route::post("logout", [AuthController::class, 'logout']);
});
// Route::group(['middleware' => ['CorsMiddleware']], function () {
//     Route::get('expense', [APICompanyController::class,'index']);
// });


Route::group(['middleware' => [\App\Http\Middleware\CorsMiddleware::class]], function () {
    Route::get('/expense', [APICompanyController::class,'index']);
});

// Route::get('/expense', [APICompanyController::class,'index']);


// Route::middleware('corsmiddleware')->get('/expense', [APICompanyController::class,'index']);

// Route::group(['middleware' => ['cors']], function () {
//     Route::get('expense', [APICompanyController::class,'index']);
// });
// Route::group([
//     'middleware' => ['api', 'cors'],
//     'namespace' => $this->namespace,
//     'prefix' => 'api',
// ], function ($router) {

// });




Route::get('company-number', [APICompanyController::class,'count']);

Route::get('api-test',function(Request $request){
    return $request->name;
});
//public route
// Route::post("login", [AuthController::class, 'login']);
// Route::post("register", [AuthController::class, 'register']);