<?php

namespace App\Actions\Facilities;

use App\Models\Facility;

class DeleteFacilityAction
{
    public function execute(Facility $facility): void
    {
        $facility->delete();
    }
}
