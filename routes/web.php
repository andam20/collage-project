<?php

use App\Models\User;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\WorkTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/company-profile-excel', [CompanyProfileController::class, 'exportIntoExcel'])->name('companyProfileExcel');
Route::get('/work-type-excel', [WorkTypeController::class, 'exportIntoExcel'])->name('workTypeExcel');


Route::get('/overview', function () {
    return view('overview');
})->name('overview');

Route::get('/team', function () {
    return view('team');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("company-profile", CompanyProfileController::class);
Route::resource("work-type", WorkTypeController::class)->except('show');
Route::resource("expense", ExpenseController::class);

Route::get('/my-chart', [CompanyProfileController::class, 'chartData'])->name('charts');



//view composer 
//you change layouts.topbar to * and it will goto for all the views
// View::composer(['*'], function ($view) {
//     $logo = User::all();
//     @dd($logo);
//     $view->with('logo', $logo);
// });


require __DIR__ . '/auth.php';