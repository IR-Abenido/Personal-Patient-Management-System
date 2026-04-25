<?php

namespace App\Http\Controllers\API;

use App\Actions\Patients\CreatePatientAction;
use App\Actions\Patients\DeletePatientAction;
use App\Actions\Patients\GetAllPatientsAction;
use App\Actions\Patients\UpdatePatientAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Facility;
use App\Models\Patient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Facility $facility, GetAllPatientsAction $action): JsonResponse
    {
        return response()->json(PatientResource::collection($action->execute($facility)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request,Facility $facility, CreatePatientAction $action): JsonResponse
    {
        return response()->json(new PatientResource($action->execute($facility, $request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility, Patient $patient): JsonResponse
    {
        return response()->json(new PatientResource($patient));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Facility $facility, Patient $patient, UpdatePatientAction $action): JsonResponse
    {
        return response()->json(new PatientResource($action->execute($patient, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility, Patient $patient, DeletePatientAction $action): Response
    {
        $action->execute($patient);
        return response()->noContent();
    }
}
