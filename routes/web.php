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
# Dashboard
Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::resource('/home', \App\Http\Controllers\HomeController::class);
# Criteria
Route::resource('/criteria', \App\Http\Controllers\CriteriaController::class);
# Alternative
Route::resource('/alternative', \App\Http\Controllers\AlternativeController::class);