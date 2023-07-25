<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\RoleController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ProfileController;
use \App\Http\Controllers\CriteriaController;
use \App\Http\Controllers\AlternativeController;
use \App\Http\Controllers\Vikor_CalculationController;

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

// Route::get('/', function () {
//     return view('home.home');
// });

//route resource
# Sign In
Route::resource('/login', \App\Http\Controllers\UserController::class);
Route::post('/login/check', [\App\Http\Controllers\UserController::class, 'check'])->name('login.check');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

# Dashboard
Route::resource('/', HomeController::class);
Route::resource('/home', HomeController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# Auth
Auth::routes();
# Validasi Authentication
Route::group(['middleware' => ['auth']], function () {
    # Roles
    Route::resource('roles', RoleController::class);
    # Users
    Route::resource('users', UserController::class);
    # Profile
    Route::resource('profile', ProfileController::class);
    # Criteria
    Route::resource('criteria', CriteriaController::class);
    // Route::get('/criteria',[CriteriaController::class,'index']);
    Route::get('search', [CriteriaController::class, 'search']);
    # Alternative
    Route::resource('alternative', AlternativeController::class);
    # Calculation
    Route::resource('calculation', Vikor_CalculationController::class);
    # Scholarship Recommendation
    Route::resource('scholarshiprecommendation', \App\Http\Controllers\SRController::class);
});
