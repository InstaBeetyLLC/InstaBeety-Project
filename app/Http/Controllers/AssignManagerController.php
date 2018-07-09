<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountsManager;
use App\CitiesManagers;
use App\CitiesRegion;
use App\City;
use App\Http\Requests\AssignManagerRequest;
use App\Http\Requests\EditManagerRequest;
use App\Region;
use App\RoleUser;
use App\Store;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class AssignManagerController extends Controller
{
    public function assign_manager()
    {
        $region_model = new Region();
        $users_model = new User();
        $user_roles_model = new RoleUser();

        $regions_arr = [];
        $managers_arr = [];

        $users_role = $user_roles_model
            ->where('role_id', 2)
            ->get();

        $regions = $region_model->all();

        foreach ($regions as $region) {
            $regions_arr [$region->id] = $region->name;
        }

        foreach ($users_role as $user_role) {
            $manager = $users_model
                ->where('id', $user_role->user_id)
                ->first();
            if ($manager != null) {
                $managers_arr[$manager->id] = $manager->name;
            }
        }


        return view('assign_users.assign_managers', ["regions" => $regions_arr, "managers" => $managers_arr]);
    }


    public function get_region_cities(Request $request)
    {
        $cities_html = "";
        $region_id = NULL;
        if (isset($request->region_id) && $request->region_id != null) {
            $region_id = $request->region_id;
        } else {
            return false;
        }

        $cities_model = new City();
        $cities = $cities_model
            ->where('region_id', $region_id)
            ->get();

        if (!empty($cities)) {
            foreach ($cities as $city) {
                if ($request->is_edit == false) {
                    $cities_html .= "<label class='checkbox-inline'><input type='checkbox' name='cities[]' value='$city->id'>$city->name</label>";
                } else {
                    $cities_html .= "<option value='$city->id'>$city->name</option>";
                }
            }
        }
        return $cities_html;
    }

    public function submit_manager_assign(AssignManagerRequest $request)
    {
        foreach ($request->accounts as $account) {
            $accountsManager = new AccountsManager();
            $isThere = AccountsManager::where('manager_id', $request->manager)->where('account_id', $account)
                ->count();
            if ($isThere == 0) {

                $store_id = Account::where('id', $account)->first()->store_id;
                $accountsManager->store_id = $store_id;

                $accountsManager->account_id = $account;
                $accountsManager->manager_id = $request->manager;

                $accountsManager->save();
            }
        }
        return redirect()->route('viewManagerCities')->with('message', 'manager assigned successfully.');
    }

    public function view_managers_cities()
    {
        $accountsManger = AccountsManager::all();
        return view('assign_users.view_managers_cities', ['accountsManger' => $accountsManger]);
    }


    public function edit_manager_assign(Request $request)
    {
        $region_id = NULL;
        $city_id = NULL;
        $manager_id = NULL;
        $manager_city_id = NULL;

        $region_model = new Region();
        $users_model = new User();
        $user_roles_model = new RoleUser();

        $regions_arr = [];
        $managers_arr = [];
        $cities_arr = [];

        $users_role = $user_roles_model
            ->where('role_id', 2)
            ->get();

        $regions = $region_model->all();

        foreach ($regions as $region) {
            $regions_arr [$region->id] = $region->name;
        }

        foreach ($users_role as $user_role) {
            $manager = $users_model
                ->where('id', $user_role->user_id)
                ->first();
            if ($manager != null) {
                $managers_arr[$manager->id] = $manager->name;
            }
        }

        if (isset($request->region_id) && $request->region_id != null) {
            $region_id = $request->region_id;
            $city_model = new City();
            $region_cities = $city_model
                ->where('region_id', $region_id)
                ->get();

            if (!empty($region_cities)) {
                foreach ($region_cities as $region_city) {
                    $cities_arr[$region_city->id] = $region_city->name;
                }
            }

            if (isset($request->city_id) && $request->city_id != null) {
                $city_id = $request->city_id;

                if (isset($request->manager_id) && $request->manager_id != null) {
                    $manager_id = $request->manager_id;
                } else {
                    dd("No manager selected!");
                }
            } else {
                dd("No city selected!");
            }
        } else {
            dd("No region selected!");
        }

        if (isset($request->manager_city_id) && $request->manager_city_id != null) {
            $manager_city_id = $request->manager_city_id;
        }

        return view('assign_users.edit_manager_assign', ['manager_city_id' => $manager_city_id, 'cities' => $cities_arr, 'regions' => $regions_arr, 'managers' => $managers_arr, 'region_id' => $region_id, 'city_id' => $city_id, 'manager_id' => $manager_id]);
    }

    public function submit_manager_assign_edit(EditManagerRequest $request)
    {

        $manager_city = CitiesManagers::find($request->manager_city_id);
        $manager_city->city_id = $request->city;
        $manager_city->manager_id = $request->manager;
        $manager_city->save();

        return redirect('view_managers_cities')->with('message', 'manager stores updated successfully.');
    }

    public function delete(Request $request)
    {
        $cityManager = AccountsManager::findOrFail($request->id);
        $cityManager->delete();
        return redirect()->route('viewManagerCities')->with('message', 'manager stores deleted successfully.');
    }

    public function getCities(Request $request)
    {
        $cities = City::where('region_id', $request->input('id'))->select(['id', 'name'])->get();
        return (new Response($cities, '200'))->header('Content-Type', 'application/json');
    }


    public function getStoresAsCheckBoxes(Request $request)
    {
        $stores = Store::where('city_id', $request->input('id'))->select(['id', 'name'])->get();
        $content = '';
        foreach ($stores as $store) {
            $content .= "<label class='checkbox-inline'><input type='checkbox' onclick='getAccounts($store->id)' name='stores[]' value='$store->id'>$store->name</label>";
        }
        return $content;
    }


    public function getStoreAccounts(Request $request)
    {
        $accounts = Account::where('store_id', $request->input('id'))->select(['id', 'name'])->get();
        $content = "";
        foreach ($accounts as $account) {
            $content .= "<label class='checkbox-inline'><input type='checkbox' name='accounts[]' value='$account->id'>$account->name</label>";
        }
        return $content;
    }

}
