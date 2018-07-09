<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'item_id'];


    public function item()
    {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }

    public function categoryModels()
    {
        return $this->hasMany('App\CategoryModels', 'category_id', 'id');
    }

    public function categoryProducts()
    {
        return $this->hasMany('App\CategoryProducts', 'category_id', 'id');
    }

    public function competitors()
    {
        return $this->hasMany('App\Competitor', 'category_id', 'id');
    }

    public function models()
    {
        return $this->hasMany('App\Models', 'category_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory', 'category_id', 'id');
    }

}

