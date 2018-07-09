<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = ['name','store_id'];

    public function accountStores()
    {
        return $this->hasMany('App\AccountStores', 'account_id', 'id');
    }

    public function store()
    {
        return $this->hasOne('App\Store', 'id', 'store_id');
    }
}

