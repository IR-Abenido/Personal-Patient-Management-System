<?php

namespace App\Actions\Facilities;

use App\Models\Facility;
use Illuminate\Support\Facades\Auth;

class CreateFacilityAction
{
    public function execute(array $data): Facility
    {
        return Facility::create([
            'user_id' => Auth::id(),
            'name' => $data['name'],
            'address' => $data['address'],
        ]);
    }

}
