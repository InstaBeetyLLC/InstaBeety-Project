<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPromoter extends Model
{
    protected $table = 'product_promoters';

    protected $fillable = ['promoter_id','item_id','account_id','manager_id'];

    public function item()
    {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }
    public function manager()
    {
        return $this->hasOne('App\User', 'id', 'manager_id');
    }
    public function account()
    {
        return $this->hasOne('App\Account', 'id', 'account_id');
    }
    public function my()
    {
        return $this->hasOne('App\User', 'id', 'promoter_id');
    }
}

