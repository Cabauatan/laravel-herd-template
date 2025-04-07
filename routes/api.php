<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Api\Auth\LoginController::class, 'logout']);



Route::middleware(['auth:sanctum', 'auth.session'])->group(function () {
    Route::group(['prefix' => '/test'], function () {
        Route::get('/test', [App\Http\Controllers\Api\TestController::class, 'index']);
    });
});

// Route::middleware('auth:sanctum')->group(function () {
//     Route::group(['prefix' => '/test'], function () {
//         Route::get('/test', [App\Http\Controllers\Api\TestController::class, 'index']);
//     });
//     // Route::post('/logout', [App\Http\Controllers\Api\Auth\Login\LoginController::class, 'logout']);
// });