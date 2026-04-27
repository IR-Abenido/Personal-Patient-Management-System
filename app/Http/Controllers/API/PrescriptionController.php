<?php

namespace App\Http\Controllers\API;

use App\Actions\ConsultationRecord\Prescription\CreatePrescription;
use App\Actions\ConsultationRecord\Prescription\DeletePrescription;
use App\Actions\ConsultationRecord\Prescription\GetAllPrescription;
use App\Actions\ConsultationRecord\Prescription\UpdatePrescription;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrescriptionRequest;
use App\Http\Requests\UpdatePrescriptionRequest;
use App\Http\Resources\PrescriptionResource;
use App\Models\ConsultationRecord;
use App\Models\Prescription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ConsultationRecord $consultation, GetAllPrescription $action): JsonResponse
    {
        return response()->json(PrescriptionResource::collection($action->execute($consultation)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultationRecord $consultation, StorePrescriptionRequest $request, CreatePrescription $action): JsonResponse
    {
        return response()->json(new PrescriptionResource($action->execute($consultation, $request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription): JsonResponse
    {
        return response()->json(new PrescriptionResource($prescription));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationRecord $consultation, Prescription $prescription, UpdatePrescriptionRequest $request, UpdatePrescription $action): JsonResponse
    {
        return response()->json(new PrescriptionResource($action->execute($prescription, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConsultationRecord $consultation, Prescription $prescription, DeletePrescription $action): Response
    {
        $action->execute($prescription);
        return response()->noContent();
    }
}
