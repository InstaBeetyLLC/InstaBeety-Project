<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CityStores extends Model
{
    protected $table = 'city_stores';

    protected $fillable = array();

    public function cities()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function stores()
    {
        return $this->belongsTo('App\Store', 'store_id', 'id');
    }

}

