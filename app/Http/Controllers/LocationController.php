<?php namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LocationRequest;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $locations = Location::all();

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cities = City::all();
        return view('locations.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(LocationRequest $request)
    {
        $location = new Location();

        $location->name = $request->input("name");
        $location->city_id = $request->input("city_id");

        $location->save();

        return redirect()->route('locations.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);

        return view('locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $location = Location::findOrFail($id);

        return view('locations.edit', compact('location', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(LocationRequest $request, $id)
    {
        $location = Location::findOrFail($id);

        $location->name = $request->input("name");
        $location->city_id = $request->input("city_id");

        $location->save();

        return redirect()->route('locations.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('message', 'Item deleted successfully.');
    }

}
