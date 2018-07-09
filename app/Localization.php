<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    protected $table = 'localizations';

    protected $fillable = array('key', 'value');

}

