<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    protected $table = 'models';
    protected $fillable = ['name', 'item_id'];

    public function item()
    {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }
}
