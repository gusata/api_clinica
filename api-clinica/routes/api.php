<?php

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('patients', PatientController::class);
});