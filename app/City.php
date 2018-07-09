<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = array('name');

    public function region()
    {
        return $this->hasOne('App\Region', 'id', 'region_id');
    }

    public function citiesManagers()
    {
        return $this->hasMany('App\CitiesManager', 'city_id', 'id');
    }

    public function citiesRegions()
    {
        return $this->hasMany('App\CitiesRegion', 'city_id', 'id');
    }

    public function cityLocations()
    {
        return $this->hasMany('App\CityLocations', 'city_id', 'id');
    }

    public function cityStores()
    {
        return $this->hasMany('App\CityStores', 'city_id', 'id');
    }

    public function locations()
    {
        return $this->hasMany('App\Location', 'city_id', 'id');
    }

    public function stores()
    {
        return $this->hasMany('App\Store', 'city_id', 'id');
    }

}

