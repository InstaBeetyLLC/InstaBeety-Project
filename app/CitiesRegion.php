<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CitiesRegion extends Model
{
    protected $table = 'cities_regions';

    protected $fillable = array();

    public function cities()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id', 'id');
    }

}

