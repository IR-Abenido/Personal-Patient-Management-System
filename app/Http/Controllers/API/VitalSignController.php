<?php

namespace App\Http\Controllers\API;

use App\Actions\ConsultationRecord\VitalSign\CreateVitalSign;
use App\Actions\ConsultationRecord\VitalSign\DeleteVitalSign;
use App\Actions\ConsultationRecord\VitalSign\GetAllVitalSign;
use App\Actions\ConsultationRecord\VitalSign\UpdateVitalSign;
use App\Http\Controllers\Controller;
use App\Http\Requests\VitalSign\StoreVitalSignRequest;
use App\Http\Requests\VitalSign\UpdateVitalSignRequest;
use App\Http\Resources\VitalSignResource;
use App\Models\ConsultationRecord;
use App\Models\VitalSign;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class VitalSignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ConsultationRecord $consultation, GetAllVitalSign $action): JsonResponse
    {
        return response()->json(VitalSignResource::collection($action->execute($consultation)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultationRecord $consultation, StoreVitalSignRequest $request, CreateVitalSign $action): JsonResponse
    {
        return response()->json(new VitalSignResource($action->execute($consultation, $request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(ConsultationRecord $consultation, VitalSign $vital): JsonResponse
    {
        return response()->json(new VitalSignResource($vital));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationRecord $consultation, VitalSign $vital, UpdateVitalSignRequest $request, UpdateVitalSign $action): JsonResponse
    {
        return response()->json(new VitalSignResource($action->execute($vital, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConsultationRecord $consultation, VitalSign $vital, DeleteVitalSign $action): Response
    {
        $action->execute($vital);
        return response()->noContent();
    }
}
