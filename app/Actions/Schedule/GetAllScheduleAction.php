<?php

namespace App\Actions\Schedule;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class GetAllScheduleAction
{
    public function execute(User $user): Collection
    {
        return $user->schedules()->with('facility')->get();
    }
}
