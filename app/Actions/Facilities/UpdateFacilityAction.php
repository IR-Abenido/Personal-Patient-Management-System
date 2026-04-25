<?php

namespace App\Actions\Facilities;

use App\Models\Facility;

class UpdateFacilityAction
{
    public function execute(Facility $facility, array $data): Facility
    {
        $facility->name = $data['name'];
        $facility->address = $data['address'];
        $facility->save();

        return $facility;
    }
}
