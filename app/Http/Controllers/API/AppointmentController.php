<?php

namespace App\Http\Controllers\API;

use App\Actions\Patients\Appointments\CreateAppointmentAction;
use App\Actions\Patients\Appointments\DeleteAppointmentAction;
use App\Actions\Patients\Appointments\GetAllAppointmentAction;
use App\Actions\Patients\Appointments\UpdateAppointmentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient, GetAllAppointmentAction $action): JsonResponse
    {
        return response()->json(AppointmentResource::collection($action->execute($patient)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Patient $patient, StoreAppointmentRequest $request, CreateAppointmentAction $action): JsonResponse
    {
        return response()->json(new AppointmentResource($action->execute($patient, $request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient, Appointment $appointment): JsonResponse
    {
        return response()->json(new AppointmentResource($appointment));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Patient $patient, Appointment $appointment, UpdateAppointmentRequest $request, UpdateAppointmentAction $action): JsonResponse
    {
        return response()->json(new AppointmentResource($action->execute($appointment, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, Appointment $appointment, DeleteAppointmentAction $action): Response
    {
        $action->execute($appointment);
        return response()->noContent();
    }
}
