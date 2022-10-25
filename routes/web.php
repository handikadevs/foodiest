<?php

use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user_management')->group(function () {
    Route::resource('/users', UserController::class);
});

Route::prefix('food')->group(function () {
    Route::resource('food', FoodController::class);
    Route::get('/asians', [FoodController::class, 'asian'])->name('food.asian');
    Route::get('/chineses', [FoodController::class, 'chinese'])->name('food.chinese');
    Route::get('/indonesians', [FoodController::class, 'indonesian'])->name('food.indonesian');
    Route::get('/westerns', [FoodController::class, 'western'])->name('food.western');

    
});