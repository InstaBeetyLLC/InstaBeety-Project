<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PromoterProductStatuses
 * @package App
 * @property integer $promoter_id
 * @property integer $product_status_id
 */
class PromoterProductStatuses extends Model
{
    protected $table = 'promoter_products_statuses';

    protected $fillable = ['promoter_id', 'product_status_id'];
}
