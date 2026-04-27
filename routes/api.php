<?php

use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\ConsultationRecordController;
use App\Http\Controllers\API\FacilityController;
use App\Http\Controllers\API\PatientAllergyController;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\PrescriptionController;
use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\API\VitalSignController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('facilities', FacilityController::class);
    Route::apiResource('facilities.patients', PatientController::class);
    Route::apiResource('patients.allergies', PatientAllergyController::class);
    Route::apiResource('patients.appointments', AppointmentController::class);
    Route::apiResource('users.schedules', ScheduleController::class);
    Route::apiResource('appointments.consultations', ConsultationRecordController::class);
    Route::apiResource('consultations.prescriptions', PrescriptionController::class);
    Route::apiResource('consultations.vitals', VitalSignController::class);
});
