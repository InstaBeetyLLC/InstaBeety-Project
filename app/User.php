<?php namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function permissionUser()
    {
        return $this->hasMany('App\PermissionUser', 'user_id', 'id');
    }


    public function roleUser()
    {
        return $this->hasMany('App\RoleUser', 'user_id', 'id');
    }

    public function userRole()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id');
    }


    public function nationality()
    {
        return $this->hasOne('App\Nationality', 'id', 'nationality_id');
    }


    //for role promoter only
    public function promoterStore()
    {
        return $this->belongsToMany('App\Store', 'promoter_stores', 'promoter_id');
    }

    //for role promoter only
    public function promoterProduct()
    {
        return $this->belongsToMany('App\Item', 'product_promoters', 'promoter_id');
    }

    //for manager role
    public function citiesManagers()
    {
        return $this->belongsToMany('App\City', 'cities_managers', 'manager_id');
    }
    //for manager role
    public function managerStores()
    {
        return $this->belongsToMany('App\Store', 'accounts_manager', 'manager_id');
    }

    public function promoterAccount()
    {
        return $this->belongsToMany('App\Account', 'product_promoters', 'promoter_id');
    }

}

