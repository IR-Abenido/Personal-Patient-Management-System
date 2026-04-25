<?php

namespace App\Http\Controllers\API;

use App\Actions\Patients\Allergies\CreatePatientAllergyAction;
use App\Actions\Patients\Allergies\DeletePatientAllergyAction;
use App\Actions\Patients\Allergies\GetPatientAllergiesAction;
use App\Actions\Patients\Allergies\UpdatePatientAllergyAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Allergy\StorePatientAllergyRequest;
use App\Http\Requests\Allergy\UpdatePatientAllergyRequest;
use App\Http\Resources\PatientAllergyResource;
use App\Models\Patient;
use App\Models\PatientAllergy;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class PatientAllergyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient, GetPatientAllergiesAction $action): JsonResponse
    {
        return response()->json(PatientAllergyResource::collection($action->execute($patient)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Patient $patient, StorePatientAllergyRequest $request, CreatePatientAllergyAction $action): JsonResponse
    {
        return response()->json(new PatientAllergyResource($action->execute($patient, $request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient, PatientAllergy $allergy): JsonResponse
    {
        return response()->json(new PatientAllergyResource($allergy));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Patient $patient, PatientAllergy $allergy, UpdatePatientAllergyRequest $request, UpdatePatientAllergyAction $action): JsonResponse
    {
        return response()->json(new PatientAllergyResource($action->execute($allergy, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, PatientAllergy $allergy, DeletePatientAllergyAction $action): Response
    {
        $action->execute($allergy);
        return response()->noContent();
    }
}
