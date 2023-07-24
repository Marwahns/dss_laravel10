<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
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

# Auth
Auth::routes();
#
Route::resource('/', \App\Http\Controllers\Lo::class);
# Dashboard
Route::resource('/', HomeController::class);
Route::resource('/home', HomeController::class);
# Criteria
Route::resource('/criteria', CriteriaController::class);
# Alternative
Route::resource('/alternative', AlternativeController::class);
# Calculation
Route::resource('/calculation', Vikor_CalculationController::class);
# Schoolarship Recommendation


// Route::get('/criteria',[CriteriaController::class,'index']);
Route::get('/search',[CriteriaController::class,'search']);