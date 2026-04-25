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
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class PatientAllergyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient, GetPatientAllergiesAction $action): Response
    {
        return inertia('PatientAllergies/Index', [
            'allergies' => $action->execute($patient),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia('PatientAllergies/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Patient $patient, StorePatientAllergyRequest $request, CreatePatientAllergyAction $action): RedirectResponse
    {
        $action->execute($patient, $request->validated());
        return redirect()->route('patients.allergies.index', $patient);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient, PatientAllergy $allergy): Response
    {
        return inertia('PatientAllergies/Show', [
            'allergy' => $allergy
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient, PatientAllergy $allergy): Response
    {
        return inertia('PatientAllergies/Edit', [
            'allergy' => $allergy
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Patient $patient, PatientAllergy $allergy, UpdatePatientAllergyRequest $request, UpdatePatientAllergyAction $action): RedirectResponse
    {
        $action->execute($allergy, $request->validated());
        return redirect()->route('patients.allergies.show', [$patient, $allergy]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, PatientAllergy $allergy, DeletePatientAllergyAction $action): RedirectResponse
    {
        $action->execute($allergy);
        return redirect()->route('patients.allergies.index', $patient);
    }
}
