<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CityLocations extends Model
{
    protected $table = 'city_locations';

    protected $fillable = array();

    public function cities()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function locations()
    {
        return $this->belongsTo('App\Location', 'location_id', 'id');
    }

}

