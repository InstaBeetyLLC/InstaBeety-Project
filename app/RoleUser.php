<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    protected $fillable = array();

    public function roles()
    {
        return $this->belongsTo('App\Roles', 'role_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }

}

