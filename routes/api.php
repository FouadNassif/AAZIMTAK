<?php
use App\Http\Controllers\api\AdminApi;
use Illuminate\Support\Facades\Route;

Route::get('/guests', [AdminApi::class, 'getGuests']);
Route::get('/get-guests', [AdminApi::class, 'getGuests']);