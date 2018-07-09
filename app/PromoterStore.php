<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoterStore extends Model
{
    protected $table = 'promoter_stores';

    protected $fillable = array();

    public function users()
    {
        return $this->belongsTo('App\User', 'promoter_id', 'id');
    }

    public function stores()
    {
        return $this->belongsTo('App\Store', 'promoter_id', 'id');
    }
}

