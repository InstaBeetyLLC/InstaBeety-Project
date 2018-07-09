<?php

namespace App\Http\Controllers;

use App\City;
use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store_name = $request->store_name;
        $city_id = $request->city_id;
        $is_active = 0;

        if (isset($request->is_active)) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        $stores_model = new Store();
        $stores_model->name = $store_name;
        $stores_model->city_id = $city_id;
        $stores_model->active = $is_active;

        $stores_model->save();

        Session::flash('message', 'Store created successfully!');
        return redirect()->route('list_stores');
    }

    public function list_stores()
    {
        $stores = Store::all();
        $cities = City::all();

        return view('stores.index', ['stores' => $stores, 'cities' => $cities]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $cities = NULL;
        if (isset($request->store_name) && isset($request->store_id) && isset($request->city_id) && isset($request->is_active)) {
            $cities = City::all();
        }

        return view('stores.edit', ['store_name' => $request->store_name, 'store_id' => $request->store_id,
            'city_id' => $request->city_id, 'is_active' => $request->is_active,
            'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $is_active = 0;
        if (isset($request->store_id) && isset($request->store_name) && isset($request->city_id)) {
            if (isset($request->is_active)) {
                $is_active = 1;
            }

            $store_model = Store::find($request->store_id);

            $store_model->name = $request->store_name;
            $store_model->city_id = $request->city_id;
            $store_model->active = $is_active;

            $store_model->save();

            Session::flash('message', 'Store Updted successfully!');
        }

        return redirect()->route('list_stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (isset($request->store_id)) {
            Store::find($request->store_id)->delete();

            Session::flash('message', 'Store deleted successfully!');
        }

        return redirect()->route('list_stores');
    }
}
