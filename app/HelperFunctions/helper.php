<?php

namespace App\HelperFunctions;

use App\City;
use App\Manager;
use App\Region;
use App\Store;
use App\User;

class Helper
{
    public static function getManagerName($manager_id)
    {
        $manager_name = NULL;

        $manager = Manager::find($manager_id);

        if($manager != null)
        {
            $manager_name = $manager->name;
        }

        return $manager_name;
    }

    public static function getCityRegion($city_id)
    {
        $region_name = NULL;

        $city = City::find($city_id);
        $region_id = Helper::getRegionIdFromCityId($city_id);

        $region_name = Helper::getRegionName($region_id);

        return $region_name;
    }

    public static function getRegionIdFromCityId($city_id)
    {
        $region_id = NULL;

        $city = City::find($city_id);

        if($city!=null)
        {
            $region_id = $city->region_id;
        }
        return $region_id;
    }

    public static function getCityName($city_id)
    {
        $city_name = NULL;

        $city = City::find($city_id);

        if ($city != null)
        {
            $city_name = $city->name;
        }

        return $city_name;
    }

    public static function getRegionName($region_id)
    {
        $region_name = NULL;

        $region = Region::find($region_id);

        if($region != null)
        {
            $region_name = $region->name;
        }

        return $region_name;
    }

    public static function getStoreName($store_id)
    {
        $store_name = NULL;

        $store = Store::find($store_id);

        if($store != null)
        {
            $store_name = $store->name;
        }

        return $store_name;
    }

    public static function getUserName($user_id)
    {
        $user_name = NULL;

        $user = User::find($user_id);

        if($user != null)
        {
            $user_name = $user->name;
        }

        return $user_name;
    }

    public static function getCityNameFromStoreId($store_id)
    {
        $city_name = NULL;
        $city_id = NULL;

        $city_id = Helper::getCityIdFromStoreId($store_id);

        $city_name = Helper::getCityName($city_id);

        return $city_name;
    }

    public static function getCityIdFromStoreId($store_id)
    {
        $city_id = NULL;

        $store = Store::find($store_id);

        if($store != null)
        {
            $city_id = $store->city_id;
        }

        return $city_id;
    }
}