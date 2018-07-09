<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = array('name', 'active', 'location_id', 'city_id');

    public function city()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }


    public function location()
    {
        return $this->hasOne('App\Location', 'id', 'location_id');
    }

    public function account()
    {
        return $this->hasOne('App\Account', 'id', 'account_id');
    }

    public function accountStores()
    {
        return $this->hasMany('App\AccountStores', 'store_id', 'id');
    }

    public function cityStores()
    {
        return $this->hasMany('App\CityStores', 'store_id', 'id');
    }

    public function promoterStore()
    {
        return $this->hasMany('App\PromoterStore', 'store_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}

