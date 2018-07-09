<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandCompetitors extends Model
{
    protected $table = 'brands_competitors';

    protected $fillable = array('name');

    public function competitors()
    {
        return $this->hasMany('App\Competitor', 'brands_competitors_id', 'id');
    }

}

