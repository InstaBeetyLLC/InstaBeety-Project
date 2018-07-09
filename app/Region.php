<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $fillable = array('name');

    public function cities()
    {
        return $this->hasMany('App\City', 'region_id', 'id');
    }

    public function citiesRegion()
    {
        return $this->hasMany('App\CitiesRegion', 'region_id', 'id');
    }

}

