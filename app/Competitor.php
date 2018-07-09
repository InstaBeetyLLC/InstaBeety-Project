<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    protected $table = 'competitors';

    protected $fillable = array('name','photo','brand_id', 'priority', 'active');

    public function brandsCompetitors()
    {
        return $this->belongsTo('App\BrandCompetitors', 'brands_competitors_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function brand()
    {
        return $this->hasOne('App\Brand', 'id', 'brand_id');
    }

}

