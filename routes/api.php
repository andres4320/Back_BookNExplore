<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
});

// Route::middleware(['jwt.verify'])->get('users', [UserController::class, 'index']);

Route::middleware(['jwt.verify'])->group (function(){
    // las rutas protegidas
    Route::get('users', [UserController::class, 'index']);

});