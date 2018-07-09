<?php namespace App\Http\Controllers;

use App\Account;
use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoresRequest;
use App\Location;
use App\Services\RoleService;
use App\Store;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('role:admin', ['only' => ['edit', 'destroy', 'create', 'store', 'update']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $stores = RoleService::getCorrectStoreRegardsToRole();
        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cities = City::all();
        $locations = Location::all();
        $accounts = Account::all();
        return view('stores.create', compact('locations', 'accounts', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoresRequest $request)
    {
        $store = new Store();
        $store->name = $request->input("name");
        $store->city_id = $request->input("city_id");
        $store->location_id = $request->input("location_id");
        $store->active = $request->input("active");
        $store->save();

        return redirect()->route('stores.index')->with('message', 'store created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $store = Store::findOrFail($id);

        return view('stores.show', compact('store'));
    }

    public function products(Request $request)
    {
        RoleService::canIAccessResource($request->id);
        $store = Store::findOrFail($request->id);
        return view('stores.products', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $cities = City::all();
        $locations = Location::all();
        $accounts = Account::all();

        return view('stores.edit', compact('store', 'accounts', 'locations', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(StoresRequest $request, $id)
    {
        $store = Store::findOrFail($id);

        $store->name = $request->input("name");
        $store->city_id = $request->input("city_id");
        $store->location_id = $request->input("location_id");
        $store->active = $request->input("active");
        $store->save();

        return redirect()->route('stores.index')->with('message', 'store updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->route('stores.index')->with('message', 'store deleted successfully.');
    }

    public function getCityLocations(Request $request)
    {
        $locations = Location::where('city_id', $request->input('id'))->select(['id', 'name'])->get();
        return (new Response($locations, '200'))->header('Content-Type', 'application/json');
    }


}
