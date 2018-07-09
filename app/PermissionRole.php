<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';

    protected $fillable = array();

    public function permissions()
    {
        return $this->belongsTo('App\Permission', 'permission_id', 'id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

}

