<?php
namespace App\Actions\Facilities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GetAllFacilitiesAction
{
    public function execute(): Collection
    {
        $user = Auth::user();
        return $user->facilities()->get();
    }

}
