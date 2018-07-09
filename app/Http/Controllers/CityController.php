<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;
use App\Http\Requests\CityRequest;
use App\Region;
use Illuminate\Http\Request;

class CityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cities = City::all();

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('cities.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CityRequest $request)
    {
        $city = new City();

        $city->name = $request->input("name");
        $city->region_id = $request->input("region_id");

        $city->save();

        return redirect()->route('cities.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $city = City::findOrFail($id);

        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $regions = Region::all();

        return view('cities.edit', compact('city', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(CityRequest $request, $id)
    {
        $city = City::findOrFail($id);

        $city->name = $request->input("name");
        $city->region_id = $request->input("region_id");

        $city->save();

        return redirect()->route('cities.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('cities.index')->with('message', 'Item deleted successfully.');
    }

}
