<?php

namespace App\Http\Controllers\API;

use App\Actions\Patients\Appointments\CreateAppointmentAction;
use App\Actions\Patients\Appointments\DeleteAppointmentAction;
use App\Actions\Patients\Appointments\GetAllAppointmentAction;
use App\Actions\Patients\Appointments\UpdateAppointmentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\StoreAppointmentRequest;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Patient $patient, GetAllAppointmentAction $action): Response
    {
        return Inertia::render('Appointments/Index', [
            'appointments' => $action->execute($patient)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Appointments/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Patient $patient, StoreAppointmentRequest $request, CreateAppointmentAction $action): RedirectResponse
    {
        $action->execute($patient, $request->validated());
        return redirect()->route('patients.appointments.show', [$patient, $patient->appointments()->latest()->first()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient, Appointment $appointment): Response
    {
        return Inertia::render('Appointments/Show', [
            'appointment' => $appointment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient, Appointment $appointment): Response
    {
        return Inertia::render('Appointments/Edit', [
            'appointment' => $appointment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Patient $patient, Appointment $appointment, UpdateAppointmentRequest $request, UpdateAppointmentAction $action): RedirectResponse
    {
        $action->execute($appointment, $request->validated());
        return redirect()->route('patients.appointments.show', [$patient, $appointment]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, Appointment $appointment, DeleteAppointmentAction $action): RedirectResponse
    {
        $action->execute($appointment);
        return redirect()->route('patients.appointments.index', $patient);
    }
}
