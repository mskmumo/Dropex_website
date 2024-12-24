<?php

use App\Http\Controllers\ParcelApiController;

// Parcel Tracking API Routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/parcels/{id}', [ParcelApiController::class, 'getParcelData'])->name('api.parcels.show');
    Route::post('/parcels/{id}/update-status', [ParcelApiController::class, 'updateParcelStatus'])->name('api.parcels.updateStatus');
    Route::get('/parcels/{id}/eta', [ParcelApiController::class, 'generateETA'])->name('api.parcels.eta');
}); 