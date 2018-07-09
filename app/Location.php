<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = array('name');

    public function city()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }

    public function cityLocations()
    {
        return $this->hasMany('App\CityLocations', 'location_id', 'id');
    }

}

