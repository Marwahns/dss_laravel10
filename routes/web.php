<?php

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

// Route::get('/', function () {
//     return view('home.home');
// });

//route resource
# Sign In
Route::resource('/login', \App\Http\Controllers\UserController::class);
Route::post('/login/check', [\App\Http\Controllers\UserController::class, 'check'])->name('login.check');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
#
Route::resource('/', \App\Http\Controllers\HomeController::class);
# Dashboard
Route::resource('/home', \App\Http\Controllers\HomeController::class);
# Criteria
Route::resource('/criteria', \App\Http\Controllers\CriteriaController::class);
# Alternative
Route::resource('/alternative', \App\Http\Controllers\AlternativeController::class);
# Calculation
Route::resource('/calculation', \App\Http\Controllers\Vikor_CalculationController::class);
# Schoolarship Recommendation
