<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = array('name');

    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    public function models()
    {
        return $this->hasMany('App\Models', 'sub_category_id', 'id');
    }

}

