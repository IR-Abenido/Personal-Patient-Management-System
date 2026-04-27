<?php

namespace App\Http\Controllers\WEB;

use App\Actions\ConsultationRecord\VitalSign\CreateVitalSign;
use App\Actions\ConsultationRecord\VitalSign\DeleteVitalSign;
use App\Actions\ConsultationRecord\VitalSign\GetAllVitalSign;
use App\Actions\ConsultationRecord\VitalSign\UpdateVitalSign;
use App\Http\Controllers\Controller;
use App\Http\Requests\VitalSign\StoreVitalSignRequest;
use App\Http\Requests\VitalSign\UpdateVitalSignRequest;
use App\Models\ConsultationRecord;
use App\Models\VitalSign;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class VitalSignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ConsultationRecord $consultation, GetAllVitalSign $action): Response
    {
        return Inertia::render('VitalSign/Index', [
            'vitalSigns' => $action->execute($consultation)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('VitalSign/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultationRecord $consultation, StoreVitalSignRequest $request, CreateVitalSign $action): RedirectResponse
    {
        $vitalSign = $action->execute($consultation, $request->validated());
        return redirect()->route('consultations.vitals.show', [$consultation, $vitalSign]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ConsultationRecord $consultation, VitalSign $vitalSign): Response
    {
        return Inertia::render('VitalSign/Show',[$consultation, $vitalSign]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConsultationRecord $consultation, VitalSign $vitalSign): Response
    {
        return Inertia::render('VitalSign/Edit', [$consultation, $vitalSign]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationRecord $consultation, VitalSign $vitalSign, UpdateVitalSignRequest $request, UpdateVitalSign $action): RedirectResponse
    {
        $vitalSign = $action->execute($vitalSign, $request->validated());

        return redirect()->route('consultations.vitals.show', [$consultation, $vitalSign]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConsultationRecord $consultation, VitalSign $vitalSign, DeleteVitalSign $action): RedirectResponse
    {
        $action->execute($vitalSign);

        return redirect()->route('appointments.consultations.show');
    }
}
