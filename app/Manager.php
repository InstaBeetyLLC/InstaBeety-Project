<?php

namespace App;


class Manager extends User
{
    public function citiesManagers()
    {
        return $this->belongsToMany('App\City', 'cities_managers', 'manager_id');
    }

}
