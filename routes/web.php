<?php

use App\Http\Controllers\CakeController;
use App\Http\Controllers\DrinkController;
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

Route::resource('cakes', CakeController::class);

Route::prefix('drink')->group(function () {
    Route::resource('drink', DrinkController::class);
    Route::get('/juices', [DrinkController::class, 'juice'])->name('drink.juice');
    Route::get('/coffeeteas', [DrinkController::class, 'coffee_and_tea'])->name('drink.coffeetea');
    Route::get('/milkshakes', [DrinkController::class, 'milk'])->name('drink.milkshake');
    Route::get('/squashs', [DrinkController::class, 'squash'])->name('drink.squash');
});
