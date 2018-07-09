<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['item_id','offer_type','offer_description', 'displayed', 'comment','model_id','reasons','status','edit_counter','account_id', 'priority', 'active', 'quantity', 'sold_items', 'store_id', 'product_status_id','created_by', 'sub_category_id', 'brand_id', 'invoice_photo'];

    public function categoryProducts()
    {
        return $this->hasMany('App\CategoryProducts', 'product_id', 'id');
    }
    public function item()
    {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }

    public function model()
    {
        return $this->hasOne('App\MyModel', 'id', 'model_id');
    }

    public function competitors()
    {
        return $this->hasMany('App\Competitor', 'product_id', 'id');
    }

    public function modelProducts()
    {
        return $this->hasMany('App\ModelProducts', 'product_id', 'id');
    }


    public function subCategory()
    {
        return $this->hasOne('App\SubCategory', 'id', 'sub_category_id');
    }

    public function brand()
    {
        return $this->hasOne('App\Brand', 'id', 'brand_id');
    }

    public function account()
    {
        return $this->hasOne('App\Account', 'id', 'account_id');
    }


    public function store()
    {
        return $this->hasOne('App\Store', 'id', 'store_id');
    }

    public function creator()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }


    public function productStatus()
    {
        return $this->hasOne('App\ProductStatuses', 'id', 'product_status_id');
    }

}

