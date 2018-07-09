<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ManagerProductStatuses
 * @package App
 * @property mixed $manager_id
 * @property mixed $product_status_id
 */
class ManagerProductStatuses extends Model
{
    protected $table = 'manager_products_statuses';

    protected $fillable = ['manager_id', 'product_status_id'];
}
