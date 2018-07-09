<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountsManager;
use App\City;
use App\CityStores;
use App\HelperFunctions\Common;
use App\HelperFunctions\Helper;
use App\Http\Requests\AssignPromoterRequest;
use App\Item;
use App\ProductPromoter;
use App\ProductStatuses;
use App\Promoter;
use App\PromoterProductStatuses;
use App\PromoterStore;
use App\Role;
use App\RoleUser;
use App\Services\Donkey;
use App\Services\RoleService;
use App\Store;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;

class AssignPromoterController extends Controller
{
    public function assignPromoter()
    {
        $cities = RoleService::getCorrectCitiesPerRole();
        $products = Item::where('active', true)->get();
        $promoters = RoleService::getPromoters();
        $managers = RoleService::getManagers();
        $stores = Store::all();
        $productStatuses = ProductStatuses::all();

        $accountsManger = AccountsManager::where('manager_id', Common::getCurrentLoginUserID())
            ->distinct()->get();
        return view('assign_users.assign_promoters', get_defined_vars());
    }


    public function getCityStores(Request $request)
    {
        $stores = Store::where('city_id', $request->city_id)->get();
        return (new Response($stores, '200'))->header('Content-Type', 'application/json');
    }

    public function getRolesAccounts(Request $request)
    {
        $currentRole = RoleService::getCurrentUserRole();
        if ($currentRole == 'admin') {
            $ids = Account::where('store_id', $request->id)->pluck('store_id');
        } else {
            $ids = AccountsManager::where('manager_id', Common::getCurrentLoginUserID())
                ->where('store_id', $request->id)
                ->distinct()->pluck('account_id');
        }


        $accounts = Account::whereIn('id', $ids)->select(['id', 'name'])->get();
        return (new Response($accounts, '200'))->header('Content-Type', 'application/json');
    }

    public function getStoreAccounts(Request $request)
    {
        $accounts = Account::where('store_id', $request->store_id)->get();
        return (new Response($accounts, '200'))->header('Content-Type', 'application/json');
    }

    public function save(AssignPromoterRequest $request)
    {
        //loop on products to insert multi products
        foreach ($request->product as $product) {
            $promoter_store_model = new ProductPromoter();
            $promoter_store_model->account_id = $request->account;
            $promoter_store_model->item_id = $product;
            $promoter_store_model->promoter_id = $request->promoter;
            if (isset($request->manager) && $request->manager != '') {
                $promoter_store_model->manager_id = $request->manager;
            } else {
                $promoter_store_model->manager_id = Auth::user()->id;
            }
            $user = User::find($request->promoter);
            $user->is_assigned = 1;
            $promoter_store_model->save();
            $user->save();
        }
        //save status
        foreach ($request->status as $status) {
            $promoter_status = new PromoterProductStatuses();
            $promoter_status->product_status_id = $status;
            $promoter_status->promoter_id = $request->promoter;
            $promoter_status->save();
        }


        return redirect()->route('viewPromotersStores')->with('message', 'promoter assigned successfully.');
    }

    public function viewAssignedPromoter()
    {
        $promoters = RoleService::getMyPromoters();
        return view('assign_users.view_promoters_stores', compact('promoters'));
    }

    public function edit(Request $request)
    {

        $assigned_promoter = ProductPromoter::find($request->id);
        $cities = RoleService::getCorrectCitiesPerRole();
        $stores = RoleService::getCorrectStoreRegardsToRole();
        $products = Item::all();
        $managers = RoleService::getManagers();
        $promoters = RoleService::getPromoters(true);
        $productStatuses = ProductStatuses::all();

        $accounts = Account::where('store_id', $assigned_promoter->account->store->id)->get();

        /*allowed reports */
        $statusOfPromoter = PromoterProductStatuses::where('promoter_id', $assigned_promoter->promoter_id)->get();
        $allowedReports = Donkey::getIndexOfObject($statusOfPromoter, 'product_status_id');

        /*allowed products*/
        $promoterProducts=ProductPromoter::where('promoter_id', $assigned_promoter->promoter_id)->get();
        $allowedProducts = Donkey::getIndexOfObject($promoterProducts, 'item_id');
        return view('assign_users.edit_promoter_assign', get_defined_vars());
    }

    public function update(AssignPromoterRequest $request)
    {
        $assigned_promoter = ProductPromoter::find($request->id);
        //update is assign

            //delete is assigned
            $user = User::find($assigned_promoter->promoter_id);
            $user->is_assigned = 0;
            $user->save();


        //delete all old data and insert new
        $oldProducts = ProductPromoter::where('promoter_id', $assigned_promoter->promoter_id)->get();
        $ids = Donkey::getIndexOfObject($oldProducts, 'id');
        ProductPromoter::destroy($ids);

        //delete old promoterStatus
        $oldStatuses=PromoterProductStatuses::where('promoter_id', $assigned_promoter->promoter_id)->get();
        $ids = Donkey::getIndexOfObject($oldStatuses, 'id');
        PromoterProductStatuses::destroy($ids);

        //insert new
        //loop on products to insert multi products
        foreach ($request->product as $product) {
            $promoter_store_model = new ProductPromoter();
            $promoter_store_model->account_id = $request->account;
            $promoter_store_model->item_id = $product;
            $promoter_store_model->promoter_id = $request->promoter;
            if (isset($request->manager) && $request->manager != '') {
                $promoter_store_model->manager_id = $request->manager;
            } else {
                $promoter_store_model->manager_id = Auth::user()->id;
            }
            $user = User::find($request->promoter);
            $user->is_assigned = 1;
            $promoter_store_model->save();
            $user->save();
        }
        //save status
        foreach ($request->status as $status) {
            $promoter_status = new PromoterProductStatuses();
            $promoter_status->product_status_id = $status;
            $promoter_status->promoter_id = $request->promoter;
            $promoter_status->save();
        }



        return redirect('view_promoters_stores');
    }

    public function delete(Request $request)
    {
        $assigned_promoter = ProductPromoter::find($request->id);
        //update is assign

        //delete is assigned
        $user = User::find($assigned_promoter->promoter_id);
        $user->is_assigned = 0;
        $user->save();


        //delete all old data and insert new
        $oldProducts = ProductPromoter::where('promoter_id', $assigned_promoter->promoter_id)->get();
        $ids = Donkey::getIndexOfObject($oldProducts, 'id');
        ProductPromoter::destroy($ids);

        //delete old promoterStatus
        $oldStatuses=PromoterProductStatuses::where('promoter_id', $assigned_promoter->promoter_id)->get();
        $ids = Donkey::getIndexOfObject($oldStatuses, 'id');
        PromoterProductStatuses::destroy($ids);

        return redirect()->route('viewPromotersStores')->with('message', 'PromoterStore  deleted successfully.');
    }

}
