<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CitiesManagers extends Model
{
    protected $table = 'cities_managers';

    protected $fillable = array();

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'manager_id', 'id');
    }

}

