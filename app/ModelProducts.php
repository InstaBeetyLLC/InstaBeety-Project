<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelProducts extends Model
{
    protected $table = 'model_products';

    protected $fillable = array();

    public function models()
    {
        return $this->belongsTo('App\Models', 'model_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

}

