<?php

namespace App\Http\Controllers\API;

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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ConsultationRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Appointment $appointment, GetAllConsultationRecord $action): JsonResponse
    {
        $user = $appointment->user;
        return response()->json(ConsultationRecordResource::collection($action->execute($user)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Appointment $appointment, StoreConsultationRecordRequest $request, CreateConsultationRecord $action): JsonResponse
    {
        $user = $appointment->user;
        return response()->json(new ConsultationRecordResource($action->execute($user, $appointment, $request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment, ConsultationRecord $consultation): JsonResponse
    {
        $consultation->load(['vitalSigns', 'prescriptions']);
        return response()->json(new ConsultationRecordResource($consultation));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Appointment $appointment, ConsultationRecord $consultation, UpdateConsultationRecordRequest $request, UpdateConsultationRecord $action): JsonResponse
    {
        return response()->json(new ConsultationRecordResource($action->execute($consultation, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment, ConsultationRecord $consultation, DeleteConsultationRecord $action): Response
    {
        $action->execute($consultation);
        return response()->noContent();
    }
}
