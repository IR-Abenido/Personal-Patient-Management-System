<?php

namespace App\Actions\Schedule;
use App\Models\Schedule;

class DeleteScheduleAction
{
    public function execute(Schedule $schedule): void
    {
        $schedule->delete();
    }
}
