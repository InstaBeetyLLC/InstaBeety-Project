<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountsManager extends Model
{
    protected $table = 'accounts_manager';

    protected $fillable = ['account_id','manager_id', 'store_id'];

    public function account()
    {
        return $this->belongsTo('App\Account', 'account_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'manager_id', 'id');
    }
}

