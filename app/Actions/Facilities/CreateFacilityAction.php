<?php

namespace App\Actions\Facilities;

use App\Models\Facility;

class CreateFacilityAction
{
    public function execute(string $name): Facility
    {
        return Facility::create(['name' => $name]);
    }

}
