<?php

namespace App\HelperFunctions;

use App\Brand;
use App\Item;
use App\ProductStatuses;
use App\Store;
use App\User;
use DB;
use View;
use Carbon\Carbon;

class ViewHelper
{
    public function __construct()
    {
        $this->initMenuItems();
    }

    public function initMenuItems()
    {
        View::composer('shared._menu', function ($view) {
//            $product_statuses = ProductStatuses::all();

            $view->with('menu_product_statuses', []);
        });
    }


    public static function getCustomDifference($time)
    {
        $created = new Carbon($time);
        $now = Carbon::now();
        $now::setLocale('en');
        $difference = $created->diffForHumans($now);
        return $difference;
    }

    public static function getBrandName($id)
    {
        $brand = Brand::where('id', $id)->first();
        if (isset($brand)) {
            return $brand->name;
        }
    }

    public static function getProductName($id)
    {
        $item = Item::where('id', $id)->first();
        if (isset($item)) {
            return $item->name;
        }
    }


    public static function getUserFormEmail($email)
    {
        $user = User::where('email', $email)->first();
        if (isset($user)) {
            return $user->id;
        }
    }

    public static function getStoreName($id)
    {
        $store = Store::where('id', $id)->first();
        if (isset($store)) {
            return $store->name;
        }
    }

    public static function countPromotersInAccount($account_id)
    {
        return DB::table('product_promoters')->where('account_id', $account_id)->count();
    }
}
