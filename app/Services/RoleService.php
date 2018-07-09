<?php

namespace App\Services;

use App\City;
use App\Item;
use App\Product;
use App\ProductPromoter;
use App\PromoterProductStatuses;
use App\Role;
use App\Store;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Request;

class RoleService
{

    Const PROMOTER = 'promoter';
    Const MANAGER = 'manager';
    Const ADMIN = 'admin';


    public static function updateUserRole($user, $new_role)
    {
        if (isset($user->userRole[0])) {
            if ($new_role != $user->userRole[0]->id) {
                $current_role = Role::where('id', $user->userRole[0]->id)->first();
                $added_role = Role::where('id', $new_role)->first();
                //delete old role
                $user->detachRole($current_role);
                //update  user role
                $user->attachRole($added_role);
            }
        } else {
            //insert new role
            RoleService::attachNewUserRole($user, $new_role);
        }
    }

    public static function attachNewUserRole($user, $role)
    {
        $added_role = Role::where('id', $role)->first();
        $user->attachRole($added_role);
    }

    public static function getPromoterItem()
    {
        $user = User::find(Auth::user()->id);
        switch (RoleService::getCurrentUserRole()) {
            //has multi stores
            case 'promoter':
                $item = $user->promoterProduct;
                $ids = Donkey::getIndexOfObject($item, 'id');
                $items = Item::whereIn('id', $ids)->get();
                break;

            case 'manager':
                $items = Item::all();
                break;
            default:
                return null;
        }
        return $items;
    }

    /**
     * this function will get current user role
     * then it returns stores which user should able to see it
     * @return array|\Illuminate\Database\Eloquent\Collection|null|static[]
     */
    public static function getCorrectStoreRegardsToRole()
    {
        $user = User::find(Auth::user()->id);
        switch (RoleService::getCurrentUserRole()) {
            case 'admin':
                $stores = Store::all();
                break;

            //has multi stores
            case 'manager':
                $stores = $user->managerStores;
                $stores = Store::whereIn('id', $stores->pluck('id'))->get();
                break;

            case 'promoter':
                $stores = $user->promoterStore;
                break;
            default:
                return null;
        }
        return $stores;
    }

    public static function getCurrentUserRole()
    {
        $user = User::find(Auth::user()->id);
        if (isset($user->userRole) && isset($user->userRole[0])) {
            return $user->userRole[0]->name;
        } else {
            return 'no-role';
        }
    }

    public static function getUserRole($userId)
    {
        $user = User::find($userId);
        if (isset($user->userRole) && isset($user->userRole[0])) {
            return $user->userRole[0]->name;
        } else {
            return 'no-role';
        }
    }


    public static function getAllowedItems()
    {
        $user = User::find(Auth::user()->id);
        //dd($user);
        switch (RoleService::getCurrentUserRole()) {
            case 'manager':
                $stores = $user->managerStores;
                $stores = Store::whereIn('id', $stores)->get();
                $stores = array_pluck($stores, 'id');
                $allowed_items = Product::whereIn('store_id', $stores);
                break;

            //check if user can access this store or not
            case 'promoter':
                $item = $user->promoterProduct;
                // dd(Auth::user()->id);
                $allowed_items = Product::where('created_by', Auth::user()->id);
                break;
        }
        return $allowed_items;
    }

    //has right to access store data or not
    public static function canIAccessResource($store_id)
    {
        $request = new Request();
        $user = User::find(Auth::user()->id);
        switch (RoleService::getCurrentUserRole()) {
            case 'manager':
                $stores = $user->managerStores;
                $tmp = $stores->pluck('id');
                $allowed_stores = [];
                foreach ($tmp as $k) {
                    $allowed_stores[] = $k;
                }
                if (in_array($store_id, $allowed_stores)) {
                    return next($request);
                } else {
                    abort(403, 'Unauthorized action.');
                }
                break;

            //check if user can access this store or not
            case 'promoter':
                $store = $user->promoterProduct;
                if (isset($store)) {
                    if ($store_id == $store[0]->id) {
                        return next($request);
                    } else {
                        abort(403, 'Unauthorized action.');
                    }
                }
                break;
        }
    }


    public static function getCorrectCitiesPerRole()
    {
        $user = User::find(Auth::user()->id);
        switch (RoleService::getCurrentUserRole()) {
            case 'admin':
                $cities = City::all();
                break;
            //has multi stores
            case 'manager':
                $cities = $user->citiesManagers;
                break;
        }
        return $cities;
    }

    public static function getMyPromoters()
    {
        $user = User::find(Auth::user()->id);
        switch (RoleService::getCurrentUserRole()) {
            case 'admin':
                $promoters = ProductPromoter::all();
                break;
            //has multi stores
            case 'manager':
                $promoters = ProductPromoter::where('manager_id', Auth::user()->id)->get();
                break;
        }
        return $promoters;
    }


    public static function getPromoters($all = false)
    {
        $query = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 3);
        if (!$all) {
            $query->where('users.is_assigned', 0);
        }
        return $query->get();
    }

    public static function getManagers()
    {
        $query = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id', 2);
        return $query->get();
    }

    public static function canIAccessReport($id)
    {
        $request = new Request();
        $reports = PromoterProductStatuses::where('promoter_id', Auth::user()->id)->get();
        $allowedIds = Donkey::getIndexOfObject($reports, 'product_status_id');

        if (in_array($id, $allowedIds)) {
            return next($request);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}