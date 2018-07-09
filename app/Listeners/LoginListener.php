<?php

namespace App\Listeners;

use App\Attendance;
use App\Services\LocationService;
use App\Services\RoleService;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

class LoginListener
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
        if ((RoleService::getCurrentUserRole() == 'promoter')) {
            LocationService::recordAttendance();
        }
    }
}
