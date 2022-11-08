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
    Route::get('users', [UserController::class, 'apiIndex']);
    Route::post('users/store', [UserController::class, 'apiStore']);
    Route::get('users/show/{id}', [UserController::class, 'apiShow']);
    Route::post('users/update/{id}', [UserController::class, 'apiUpdate']);
    Route::get('users/destroy/{id}', [UserController::class, 'apiDestroy']);
    Route::get('foods', [FoodController::class, 'createFoodApi']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
