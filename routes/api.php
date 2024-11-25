<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication routes
// Route::post('register', [RegisterController::class, 'register']);
// Route::post('login', [LoginController::class, 'login']);
// Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // // Logout route with a name for easy access
    // Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // // Example of a protected route to get the authenticated user
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
});
