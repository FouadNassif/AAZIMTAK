<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\AazimtakController;

Route::get('/', [AazimtakController::class, 'showHomePage'])->name('home');

Route::get('/terms', [AazimtakController::class, 'showTerms'])->name('terms');
Route::get('/privacy', [AazimtakController::class, 'showPrivacy'])->name('privacy');

Route::get('/pricing', [AazimtakController::class, 'showPricing'])->name('pricing.show');
// Route to show the checkout page
Route::get('/checkout', [AazimtakController::class, 'showCheckout'])->name('checkout.show');
// Route to handle the form submission
Route::post('/checkout/submit', [AazimtakController::class, 'submit'])->name('checkout.submit');


Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {

    // Manage the guest UserDashboard

    Route::get('/user/dashboard', [UserController::class, 'showDashboard'])->name('user.dashboard');

    Route::get('/user/dashboard/allguests', [UserController::class, 'allGuest'])->name('user.dashboard.allGuests');
    Route::match(['get', 'post'], '/user/dashboard/addguest', [UserController::class, 'addGuest'])->name('user.dashboard.addGuest');

    // Javascript Routes
    Route::get('/user/guests', [UserController::class, 'filterGuestsByStatus'])->name('user.guests.filter');
    Route::post('/user/guests/edit', [UserController::class, 'editGuest'])->name('user.guests.edit');
    Route::post('/user/guests/save', [UserController::class, 'saveGuest'])->name('guests.save');
    Route::post('/user/guests/delete', [UserController::class, 'deleteGuest'])->name('guests.delete');


    // Manage wedding UserDashboard
    Route::get('/user/dahsboard/wedding', [UserController::class, 'showWedding'])->name('user.wedding');
    Route::match(['get', 'post'], '/user/dashboard/editWedding', [UserController::class, 'editWedding'])->name('user.wedding.edit');

    // Manage Account
    Route::match(['get', 'post'], '/user/dashboard/account/settings', [UserController::class, 'accountSettings'])->name('user.account.settings');

    Route::get('/user/logout', [UserController::class, 'logout'])->name('logout');
});


Route::match(['get', 'post'], '/addNewGuest/{wedding_id}', [AdminController::class, 'addNewGuest'])->name('admin.addNewGuest');


Route::get('/{wedding_id}/{groom}And{bride}/{guest}', [WeddingController::class, 'showInvitation'])->name('wedding.showInvitation');

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

Route::get('/admin/weddingList', [AdminController::class, 'weddingList'])->name('admin.weddingList');
Route::match(['get', 'post'], '/admin/addWedding', [AdminController::class, 'addWedding'])->name('admin.addWedding');

Route::get('/admin/allGuests', [AdminController::class, 'allGuests'])->name('admin.allGuests');
Route::post('/weddings/{weddingId}/images', [UserController::class, 'storeImages'])->name('weddings.storeImages');
Route::get('/weddings/{weddingId}/images', [UserController::class, 'showImages'])->name('weddings.showImages');
Route::get('/weddings/{weddingId}/upload-images', function ($weddingId) {
    return view('upload', compact('weddingId'));
})->name('weddings.uploadImages');
