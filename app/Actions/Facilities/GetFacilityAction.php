<?php

namespace App\Actions\Facilities;
use App\Models\Facility;

class GetFacilityAction
{
    public function execute(Facility $facility): Facility
    {
        return $facility->load('patients');
    }
}
