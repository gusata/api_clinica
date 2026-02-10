<?php
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AuthController;

Route::post(uri: '/login', action: [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('patients', PatientController::class);
});

