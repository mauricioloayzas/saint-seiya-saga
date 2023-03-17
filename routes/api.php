<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    Route::get('index',[Controllers\Api\V1\IndexController::class, 'index']);

    Route::prefix('admin')->group(function(){
        Route::get('country',[Controllers\Api\V1\Admin\CountryController::class, 'index']);
        Route::get('country/{id}',[Controllers\Api\V1\Admin\CountryController::class, 'show']);
        Route::post('country',[Controllers\Api\V1\Admin\CountryController::class, 'store']);
        Route::put('country/{id}',[Controllers\Api\V1\Admin\CountryController::class, 'update']);
        Route::delete('country/{id}',[Controllers\Api\V1\Admin\CountryController::class, 'destroy']);

        Route::get('country/{id}/city',[Controllers\Api\V1\Admin\CityController::class, 'index']);
        Route::get('country/{countryId}/city/{id}',[Controllers\Api\V1\Admin\CityController::class, 'show']);
        Route::post('country/{id}/city',[Controllers\Api\V1\Admin\CityController::class, 'store']);
        Route::put('country/{countryId}/city/{id}',[Controllers\Api\V1\Admin\CityController::class, 'update']);
        Route::delete('country/{countryId}/city/{id}',[Controllers\Api\V1\Admin\CityController::class, 'destroy']);
    });
});
