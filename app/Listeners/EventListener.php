<?php

namespace App\Listeners;

use App\Attendance;
use App\Services\RoleService;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

class EventListener
{
    public function __construct()
    {
        //
    }

    /**
     *fire event when user logout
     */
    public function handle()
    {
        $userRole = RoleService::getCurrentUserRole();
        if ($userRole == 'promoter') {
            $attendance= Attendance::findOrFail(Session::get('attendance'));
            $attendance->logout=Carbon::now();
            $attendance->save();
        }
    }
}
