<?php

namespace App\Http\Controllers\API;

use App\Actions\Schedule\CreateScheduleAction;
use App\Actions\Schedule\DeleteScheduleAction;
use App\Actions\Schedule\GetAllScheduleAction;
use App\Actions\Schedule\UpdateScheduleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Schedule\StoreScheduleRequest;
use App\Http\Requests\Schedule\UpdateScheduleRequest;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user, GetAllScheduleAction $action): JsonResponse
    {
        return response()->json(ScheduleResource::collection($action->execute($user)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, StoreScheduleRequest $request, CreateScheduleAction $action): JsonResponse
    {
        return response()->json(new ScheduleResource($action->execute($user, $request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Schedule $schedule)
    {
        return response()->json(new ScheduleResource($schedule));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Schedule $schedule, UpdateScheduleRequest $request, UpdateScheduleAction $action): JsonResponse
    {
        return response()->json(new ScheduleResource($action->execute($schedule, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Schedule $schedule, DeleteScheduleAction $action): Response
    {
        $action->execute($schedule);
        return response()->noContent();
    }
}
