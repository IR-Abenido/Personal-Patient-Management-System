<?php

namespace App\Http\Controllers\API;

use App\Actions\Patients\CreatePatientAction;
use App\Actions\Patients\DeletePatientAction;
use App\Actions\Patients\GetAllPatientsAction;
use App\Actions\Patients\UpdatePatientAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\StorePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Models\Facility;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Facility $facility, GetAllPatientsAction $action): Response
    {
        return Inertia::render('Patients/Index', [
            'patients' => $action->execute($facility),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Patients/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request,Facility $facility, CreatePatientAction $action): RedirectResponse
    {
        $action->execute($facility, $request->validated());
        return redirect()->route('facilities.patients.index', $facility);
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility, Patient $patient): Response
    {
        return Inertia::render('Patients/Show', [
            'patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility, Patient $patient): Response
    {
        return Inertia::render('Patients/Edit', [
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Facility $facility, Patient $patient, UpdatePatientAction $action): RedirectResponse
    {
        $action->execute($patient, $request->validated());
        return redirect()->route('facilities.patients.show', [$facility, $patient]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility, Patient $patient, DeletePatientAction $action): RedirectResponse
    {
        $action->execute($patient);
        return redirect()->route('facilities.patients.index', $facility);
    }
}
