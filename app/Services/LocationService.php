<?php

namespace App\Services;

use App\Attendance;
use Illuminate\Support\Facades\Auth;
use Psy\Exception\ErrorException;
use Session;
use Torann\GeoIP\GeoIP;

/**
 * Class LocationService
 * @package App\Services
 * @author ahmed farag <ahmedfaragmostafa@gmail.com>
 */
class LocationService
{
    /**
     * @return \Torann\GeoIP\Location
     */
    public static function getMyLocation()
    {
        return (geoip()->getLocation(geoip()->getClientIP()));
    }

    public static function recordAttendance()
    {
        $myLocation = static::getMyLocation();

        /**
         *check if promoter has field im the same day
         * yes => update field
         * no => create new field
         */

        $attendance_id = static::getAttendanceId($myLocation);

        //set session variable to update attendance before logout
        Session::set('attendance', $attendance_id);
    }


    /**@todo throw exceptions
     * get current account obj
     * @return \App\Account
     */
    public static function getPromoterAccount()
    {
        $accountPromoter = Auth::user()->promoterAccount->first();
        return $accountPromoter != null ? $accountPromoter : die('please ask manager to assign you to account !!');
    }


    /**
     * @param  $attendance
     * @return integer $id
     */
    public static function getAttendanceId($attendance)
    {
        $account = (static::getPromoterAccount());

        $userId = Auth::user()->id;
        $attendanceRecord = new Attendance();
        $attendanceRecord->promoter_id = $userId;

        $attendanceRecord->account_id = $account->id;
        $attendanceRecord->country = $attendance->country;
        $attendanceRecord->city = $attendance->city;
        $attendanceRecord->state = $attendance->state;
        $attendanceRecord->state_name = $attendance->state_name;
        $attendanceRecord->ip = $attendance->ip;
        $attendanceRecord->lat = $attendance->lat;
        $attendanceRecord->lon = $attendance->lon;
        $attendanceRecord->save();
        return $attendanceRecord->id;
    }
}
