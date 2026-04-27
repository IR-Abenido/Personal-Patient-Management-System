<?php

namespace App\Actions\Schedule;

use App\Models\Schedule;
use App\Models\User;

class CreateScheduleAction
{
    public function execute(User $user, array $data): Schedule
    {
        $schedule = new Schedule($data);
        $schedule->user_id = $user->id;
        $schedule->save();

        return $schedule;
    }
}
