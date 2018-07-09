<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Attendance
 * @package App
 * @property $logout
 * @property string $account_id
 * @property string $city
 * @property string $state
 * @property string $state_name
 * @property string $ip
 * @property string $lat
 * @property string $lon
 * @property mixed id
 * @property mixed promoter_id
 * @property  $country
 */
class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'promoter_id', 'logout', 'account_id', 'country', 'city',
        'state', 'state_name', 'ip', 'lat', 'lon'];

    public function account()
    {
        return $this->hasOne('App\Account', 'id', 'account_id');
    }

    public function promoter()
    {
        return $this->hasOne('App\User', 'id', 'promoter_id');
    }



}
