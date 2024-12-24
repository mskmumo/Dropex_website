<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ParcelTrackingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\OrdersController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/terms', [TermsController::class, 'index'])->name('terms');

Route::get('/license', [LicenseController::class, 'index'])->name('license');

Route::get('/privacy', [PrivacyPolicyController::class, 'index'])->name('privacy');

//user dashboar
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/parcels', [ParcelController::class, 'index'])->name('parcels.index');
    Route::get('/auctions', [AuctionController::class, 'index'])->name('auctions.index');
});

// Task Management Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

// Parcel Tracking Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/track-parcel', [ParcelTrackingController::class, 'track'])->name('track.parcel');
    Route::get('/parcels', [ParcelController::class, 'index'])->name('parcels.index');
    Route::get('/parcels/{id}', [ParcelController::class, 'show'])->name('parcels.show');
    Route::post('/parcels/{id}/update-status', [ParcelController::class, 'updateParcelStatus'])->name('parcels.updateStatus');
    Route::post('/parcels/{id}/confirm-delivery', [ParcelController::class, 'confirmDelivery'])->name('parcels.confirmDelivery');
});

// Order Management Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{id}/update', [OrderController::class, 'update'])->name('orders.update');
});

// Ticket Management Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
});

// Returns Management Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/returns', [ReturnController::class, 'index'])->name('returns.index');
    Route::get('/returns/create', [ReturnController::class, 'create'])->name('returns.create');
    Route::post('/returns', [ReturnController::class, 'store'])->name('returns.store');
    Route::get('/returns/{id}', [ReturnController::class, 'show'])->name('returns.show');
});
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/metrics', [OrdersController::class, 'metrics'])->name('orders.metrics');
});

require __DIR__.'/auth.php';
