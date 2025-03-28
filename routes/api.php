<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AdminApi;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\ImageUploadController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/signup', [UserController::class, 'signup']);
Route::get('/check-auth', [UserController::class, 'checkAuthByToken']);

// Client Dashboard
Route::post('/dashboard', [UserController::class, 'showDashboard']);

// Guest Routes
Route::post('/dashboard/guests', [UserController::class, 'allGuestsDashboard']);
Route::post('/dashboard/guests/add', [UserController::class, 'addGuestDashboard']);
Route::post('/dashboard/guests/edit', [UserController::class, 'editGuest']);
Route::post('/dashboard/guests/delete', [UserController::class, 'deleteGuest']);

// Wedding Routes
Route::post('/dashboard/wedding/getData', [UserController::class, 'getWeddingData']);
Route::post('/dashboard/wedding/saveData', [UserController::class, 'saveWeddingData']);

Route::post('/dashboard/account/edit', [UserController::class, 'editAccount']);

// Image Upload Routes
Route::post('/dashboard/wedding/image/upload', [ImageUploadController::class, 'upload']);
Route::get('/dashboard/wedding/images/{userId}', [ImageUploadController::class, 'getAllImages']);

// ... existing code ...

// Show wedding Card 
Route::post('/wedding/showWeddingCard', [UserController::class, 'getCardWeddingDetails']);
Route::post('/wedding/setAttendance', [UserController::class, 'setAttendance']);

// Admin Routes
Route::post('/admin/dashboard', [AdminApi::class, 'adminDashboard']);
Route::post('/admin/dashboard/wedding/addwedding', [AdminApi::class, 'addWedding']);
Route::post('/admin/dashboard/wedding/getAll', [AdminApi::class, 'getAllWeddings']);
