<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

// Route::get('register', [AuthController::class, 'showRegisterForm']);
// Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('api/v1/login', [AuthController::class, 'login']);
// Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // // Logout route with a name for easy access
    // Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // // Example of a protected route to get the authenticated user
    // Route::get('/user', function (Request $request) {
    //     return $request->user();
    // });
});
