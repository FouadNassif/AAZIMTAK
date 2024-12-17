<?php

use App\Http\Controllers\api\AdminApi;
use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/guests', [AdminApi::class, 'getGuests']);
Route::get('/get-guests', [AdminApi::class, 'getGuests']);

// In routes/api.php
Route::get('/data', function () {
    return response()->json(['message' => 'Hello from Laravel!']);
});


Route::post('/api/login', [UserController::class, 'login'])->name('api.login');
