<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountStores extends Model
{
    protected $table = 'account_stores';

    protected $fillable = array();

    public function accounts()
    {
        return $this->belongsTo('App\Account', 'account_id', 'id');
    }

    public function stores()
    {
        return $this->belongsTo('App\Store', 'store_id', 'id');
    }

}

