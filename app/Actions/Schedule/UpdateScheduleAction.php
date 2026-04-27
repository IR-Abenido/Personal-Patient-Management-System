<?php

namespace App\Actions\Schedule;
use App\Models\Schedule;
use App\Models\User;

class UpdateScheduleAction
{
    public function execute(Schedule $schedule, array $data): Schedule
    {
        $schedule->update($data);
        return $schedule;
    }
}
