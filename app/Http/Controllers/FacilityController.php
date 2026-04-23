<?php

namespace App\Http\Controllers;

use App\Actions\Facilities\CreateFacilityAction;
use App\Actions\Facilities\DeleteFacilityAction;
use App\Actions\Facilities\GetAllFacilitiesAction;
use App\Actions\Facilities\GetFacilityAction;
use App\Actions\Facilities\UpdateFacilityAction;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetAllFacilitiesAction $action): JsonResponse
    {
        return response()->json(
           FacilityResource::collection($action->execute())
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilityRequest $request, CreateFacilityAction $action): JsonResponse
    {
        return response()->json(
            new FacilityResource($action->execute($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility, GetFacilityAction $action): JsonResponse
    {
        return response()->json(
            new FacilityResource($action->execute($facility))
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilityRequest $request, Facility $facility, UpdateFacilityAction $action): JsonResponse
    {
        return response()->json(
            new FacilityResource($action->execute($facility, $request->validated()['name'])),
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility, DeleteFacilityAction $action): Response
    {
        $action->execute($facility);

        return response()->noContent();
    }
}
