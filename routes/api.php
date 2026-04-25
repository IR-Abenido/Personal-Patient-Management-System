<?php

use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\FacilityController;
use App\Http\Controllers\API\PatientAllergyController;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\ScheduleController;

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('facilities', FacilityController::class);
    Route::apiResource('facilities.patients', PatientController::class);
    Route::apiResource('patients.allergies', PatientAllergyController::class);
    Route::apiResource('patients.appointments', AppointmentController::class);
    Route::apiResource('schedules', ScheduleController::class);
});
