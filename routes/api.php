<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

// Public routes
Route::post('api/v1/register', [AuthController::class, 'register']);
Route::post('api/v1/login', [AuthController::class, 'login']);

// Protected routes (Require Sanctum authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('api/v1/logout', [AuthController::class, 'logout']);
});
