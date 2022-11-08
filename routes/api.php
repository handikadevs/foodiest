<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    // USERS Api
    Route::get('users', [UserController::class, 'apiIndex']);
    Route::post('users/store', [UserController::class, 'apiStore']);
    Route::get('users/show/{id}', [UserController::class, 'apiShow']);
    Route::post('users/update/{id}', [UserController::class, 'apiUpdate']);
    Route::get('users/destroy/{id}', [UserController::class, 'apiDestroy']);
    // FOODS Api
    Route::get('foods', [FoodController::class, 'apiIndex']);
    Route::post('foods/store', [FoodController::class, 'apiStore']);
    Route::get('foods/show/{id}', [FoodController::class, 'apiShow']);
    Route::post('foods/update/{id}', [FoodController::class, 'apiUpdate']);
    Route::get('foods/destroy/{id}', [FoodController::class, 'apiDestroy']);
    //DRINK Api
    Route::get('drinks', [DrinkController::class, 'apiIndex']);
    Route::post('drinks/store', [DrinkController::class, 'apiStore']);
    Route::get('drinks/show/{id}', [DrinkController::class, 'apiShow']);
    Route::post('drinks/update/{id}', [DrinkController::class, 'apiUpdate']);
    Route::get('drinks/destroy/{id}', [DrinkController::class, 'apiDestroy']);
    //CAKE Api
    Route::get('cakes', [CakeController::class, 'apiIndex']);
    Route::post('cakes/store', [CakeController::class, 'apiStore']);
    Route::get('cakes/show/{id}', [CakeController::class, 'apiShow']);
    Route::post('cakes/update/{id}', [CakeController::class, 'apiUpdate']);
    Route::get('cakes/destroy/{id}', [CakeController::class, 'apiDestroy']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
