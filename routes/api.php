<?php

use App\Http\Controllers\API\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('jwt')->group(function () {
   // add your routes here
   // Route::prefix('example')->group(function () {
   //     Route::get('/', [ExampleController::class, 'index']);
   //}); u can follow the routes style code i writed in luxestate repo
});
