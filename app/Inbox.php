<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $table = 'inbox';
    protected $fillable = ['to', 'from', 'is_read', 'subject', 'body'];

    public function sender()
    {
        return $this->hasOne('App\User', 'id', 'from');
    }
}
