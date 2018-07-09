<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = array('name');

    public function categories()
    {
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }

    public function models()
    {
        return $this->hasMany('App\Models', 'sub_category_id', 'id');
    }

}

