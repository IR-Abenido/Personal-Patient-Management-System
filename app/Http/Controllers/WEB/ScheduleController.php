<?php

namespace App\Http\Controllers\WEB;

use App\Actions\Schedule\CreateScheduleAction;
use App\Actions\Schedule\DeleteScheduleAction;
use App\Actions\Schedule\GetAllScheduleAction;
use App\Actions\Schedule\UpdateScheduleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user, GetAllScheduleAction $action): Response
    {
        return Inertia::render('Schedule/Index', [
            'schedules' => $action->execute($user)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Schedule/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, StoreScheduleRequest $request, CreateScheduleAction $action): RedirectResponse
    {
        $action->execute($user, $request->validated());
        return redirect()->route('schedule.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Schedule $schedule): Response
    {
        return Inertia::render('Schedule/Show', [
            'schedule' => $schedule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Schedule $schedule): Response
    {
        return Inertia::render('Schedule/Edit', [
            'schedule' => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Schedule $schedule, UpdateScheduleRequest $request, UpdateScheduleAction $action): RedirectResponse
    {
        $action->execute($schedule, $request->validated());
        return redirect()->route('schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Schedule $schedule, DeleteScheduleAction $action): RedirectResponse
    {
        $action->execute($schedule);
        return redirect()->route('schedule.index');
    }
}
