<?php

namespace App;


class Promoter extends User
{
    public function promoterStore()
    {
        return $this->belongsToMany('App\Store', 'promoter_stores', 'promoter_id');
    }

}
