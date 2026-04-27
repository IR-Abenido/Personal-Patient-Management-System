<?php

namespace App\Http\Controllers\WEB;

use App\Actions\ConsultationRecord\CreateConsultationRecord;
use App\Actions\ConsultationRecord\DeleteConsultationRecord;
use App\Actions\ConsultationRecord\GetAllConsultationRecord;
use App\Actions\ConsultationRecord\UpdateConsultationRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultationRecord\StoreConsultationRecordRequest;
use App\Http\Requests\ConsultationRecord\UpdateConsultationRecordRequest;
use App\Http\Resources\ConsultationRecordResource;
use App\Models\Appointment;
use App\Models\ConsultationRecord;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ConsultationRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Appointment $appointment, GetAllConsultationRecord $action): Response
    {
        $user = $appointment->user;
        return Inertia::render('ConsultationRecords/Index', [
            'consultationRecords' => $action->execute($user)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('ConsultationRecords/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Appointment $appointment, StoreConsultationRecordRequest $request, CreateConsultationRecord $action): RedirectResponse
    {
        $user = $appointment->user;
        $action->execute($user, $appointment, $request->validated());
        return redirect()->route('appointments.consultation-records.show', [$appointment, $appointment->consultationRecords()->latest()->first()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment, ConsultationRecord $consultation): Response
    {
        return Inertia::render('ConsultationRecords/Show', [
            'appointment' => $appointment,
            'consultation' => $consultation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment, ConsultationRecord $consultation): Response
    {
        return Inertia::render('ConsultationRecords/Edit', [
            'appointment' => $appointment,
            'consultation' => $consultation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Appointment $appointment, ConsultationRecord $consultation, UpdateConsultationRecordRequest $request, UpdateConsultationRecord $action): RedirectResponse
    {
        $action->execute($consultation, $request->validated());
        return redirect()->route('appointments.consultation-records.show', [$appointment, $consultation]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment, ConsultationRecord $consultation, DeleteConsultationRecord $action): RedirectResponse
    {
        $action->execute($consultation);
        return redirect()->route('appointments.show', $appointment);
    }
}
