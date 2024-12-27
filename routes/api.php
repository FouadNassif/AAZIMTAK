<?php

use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;


// Add a route for checking authentication using session cookie
Route::middleware('auth:web')->get('/test1', [UserController::class, 'dashboard']);

Route::post("/test2", [UserController::class, "test"]);

// Public Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Protected Routes (Requires Authentication)
Route::middleware('auth:sanctum')->get('/api/v1/user', [UserController::class, 'user']);
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout']);
