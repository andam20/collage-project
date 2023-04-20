<?php

use App\Http\Controllers\AccountantController;
use App\Http\Controllers\AuthAccountantController;
use App\Models\User;
use App\Mail\HelloMail;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkTypeController;
use App\Http\Controllers\CompanyProfileController;
use App\Models\Accountant;
use App\Models\Employee;

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



Route::resource("expense", ExpenseController::class);

Route::get('/my-chart', [CompanyProfileController::class, 'chartData'])->name('charts');



//view composer 
//you change layouts.topbar to * and it will goto for all the views
// View::composer(['*'], function ($view) {
//     $logo = User::all();
//     @dd($logo);
//     $view->with('logo', $logo);
// });




Route::resource("company-profile", CompanyProfileController::class)->name('*', 'company-profile');
Route::get("company-profile/{id}", [CompanyProfileController::class,'destroy'])->name('company-profile.destroy');

// Route::get("company-profile", function(){
//     Mail::to('andam.00012789@gmail.com')->send(new HelloMail());

// });

Route::post('login-company', [AuthController::class,'login'])->name('login-company');

Route::resource("work-type", WorkTypeController::class)->except('show');
Route::resource("expense", ExpenseController::class);
Route::resource("accountant", AccountantController::class);


Route::get('/acc-profile', [AuthAccountantController::class,'index'])->name('acc-profile');
Route::get('/acc-employee', [AuthAccountantController::class,'employee'])->name('acc-employee');


Route::get('/auth-accountant', [AuthAccountantController::class, 'login'])->name('acc');
Route::post('/auth-accountant-logout', [AuthAccountantController::class, 'logout'])->name('acc-logout');
// Route::post('/users/authenticate', [AuthAccountantController::class, 'login'])->name('acc');
Route::post('/users/authenticate', [AuthAccountantController::class, 'authenticate']);



View::composer(['*'],function($view){
    $logo=User::find(Auth::id());
    $view->with('logo',$logo);
  });


  View::composer(['*'],function($view){
    $employeeCount=CompanyProfile::get()->count();
    // dd($employeeCount);
    $view->with('employeeCount',$employeeCount);
  });

  View::composer(['*'],function($view){
    $accountantCount=Accountant::get()->count();
    $view->with('accountantCount',$accountantCount);
  });

  View::composer(['*'],function($view){
    $userCount=User::get()->count();
    $view->with('userCount',$userCount);
  });

  





require __DIR__ . '/auth.php';