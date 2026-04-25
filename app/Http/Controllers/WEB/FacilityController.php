<?php

namespace App\Http\Controllers\API;

use App\Actions\Facilities\CreateFacilityAction;
use App\Actions\Facilities\DeleteFacilityAction;
use App\Actions\Facilities\GetAllFacilitiesAction;
use App\Actions\Facilities\UpdateFacilityAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Facility\StoreFacilityRequest;
use App\Http\Requests\Facility\UpdateFacilityRequest;
use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetAllFacilitiesAction $action): Response
    {
        return Inertia::render('Facilities/Index', [
            'facilities' => $action->execute()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Facilities/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilityRequest $request, CreateFacilityAction $action): RedirectResponse
     {
         $action->execute($request->validated());
         return redirect()->route('facilities.index');
     }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility): Response
    {
        return Inertia::render('Facilities/Show', [
            'facility' => $facility->load('patients')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility): Response
    {
        return Inertia::render('Facilities/Edit', [
            'facility' => $facility
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilityRequest $request, Facility $facility, UpdateFacilityAction $action): RedirectResponse
     {
         $action->execute($facility, $request->validated());
         return redirect()->route('facilities.show', $facility);
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility, DeleteFacilityAction $action): RedirectResponse
    {
        $action->execute($facility);
        return redirect()->route('facilities.index');
    }
}
