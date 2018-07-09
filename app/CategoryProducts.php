<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    protected $table = 'category_products';

    protected $fillable = array();

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

}

