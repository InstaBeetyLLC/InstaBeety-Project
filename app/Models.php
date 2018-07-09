<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'models';

    protected $fillable = array('name', 'description_ar', 'description_en', 'image', 'code', 'priority', 'active',
        'size');

    public function categories()
    {
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }

    public function subCategories()
    {
        return $this->belongsTo('App\SubCategories', 'sub_category_id', 'id');
    }

    public function categoryModels()
    {
        return $this->hasMany('App\CategoryModels', 'model_id', 'id');
    }

    public function modelProducts()
    {
        return $this->hasMany('App\ModelProducts', 'model_id', 'id');
    }

}

