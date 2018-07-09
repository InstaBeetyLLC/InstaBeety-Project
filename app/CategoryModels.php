<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModels extends Model
{
    protected $table = 'category_models';

    protected $fillable = array();

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function models()
    {
        return $this->belongsTo('App\Models', 'model_id', 'id');
    }

}

