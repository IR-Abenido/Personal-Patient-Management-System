<?php

namespace App\Actions\Facilities;

use App\Models\Facility;

class UpdateFacilityAction
{
    public function execute($facility, $name): Facility
    {
        $facility->name = $name;
        $facility->save();

        return $facility;
    }
}
