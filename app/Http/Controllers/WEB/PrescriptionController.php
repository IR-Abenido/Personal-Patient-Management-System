<?php

namespace App\Http\Controllers\WEB;

use App\Actions\ConsultationRecord\Prescription\CreatePrescription;
use App\Actions\ConsultationRecord\Prescription\DeletePrescription;
use App\Actions\ConsultationRecord\Prescription\GetAllPrescription;
use App\Actions\ConsultationRecord\Prescription\UpdatePrescription;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Models\ConsultationRecord;
use App\Models\Prescription;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ConsultationRecord $consultation, GetAllPrescription $action): Response
    {
        return Inertia::render('Prescription/Index', [
            'prescriptions' => $action->execute($consultation)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Prescription/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultationRecord $consultation, StorePrescriptionRequest $request, CreatePrescription $action): RedirectResponse
    {
        $action->execute($consultation, $request->validated());
        return redirect()->route('prescription.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription): Response
    {
        return Inertia::render('Prescription/Show', [
            'prescription' => $prescription
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prescription $prescription): Response
    {
        return Inertia::render('Prescription/Edit', [
            'prescription' => $prescription
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationRecord $consultation, Prescription $prescription, UpdatePrescriptionRequest $request, UpdatePrescription $action): RedirectResponse
    {
        $action->execute($prescription, $request->validated());
        return redirect()->route('prescription.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConsultationRecord $consultation, Prescription $prescription, DeletePrescription $action): RedirectResponse
    {
        $action->execute($prescription);
        return redirect()->route('prescription.index');
    }
}
