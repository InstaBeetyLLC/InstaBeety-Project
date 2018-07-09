<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    protected $table = 'permission_user';

    protected $fillable = array();

    public function permissions()
    {
        return $this->belongsTo('App\Permission', 'permission_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}

