<?php

namespace App\Http\Controllers;

use App\City;
use App\HelperFunctions\Helper;
use App\Location;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class LocationsController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $location_model = new Location();
        $location_model->name = $request->location_name;
        $location_model->city_id = $request->city_id;

        $location_model->save();

        Session::flash('message','Location created successfully!');
        return redirect()->route('list_locations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function list_locations()
    {
        $locations_model = new Location();
        $locations = $locations_model->get();

        $cities = City::all();

        return view('locations.index', ['locations'=>$locations, 'cities'=>$cities]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $location_id = NULL;
        $city_id = NULL;
        $location_name = NULL;
        $cities = City::all();

        if(isset($request->location_id) && isset($request->city_id))
        {
            $location_id = $request->location_id;
            $city_id = $request->city_id;

            $location_name = Helper::getLocationName($location_id);
        }

        return view('locations.edit',['location_id'=>$location_id ,'location_name'=>$location_name, 'city_id'=>$city_id, 'cities'=>$cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(isset($request->location_name) && isset($request->location_id) && isset($request->city_id))
        {
            $location_model = Location::find($request->location_id);
            $location_model->name = $request->location_name;
            $location_model->city_id = $request->city_id;

            $location_model->save();
            Session::flash('message',"Location updated successfully!");
        }

        return redirect()->route('list_locations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(isset($request->location_id))
        {
            Location::find($request->location_id)->delete();
        }

        Session::flash('message','Location deleted successfully!');
        return redirect()->route('list_locations');
    }
}
