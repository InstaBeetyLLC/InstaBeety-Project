<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStatuses extends Model
{
    protected $table = 'product_statuses';
    protected $fillable = ['name'];
}

