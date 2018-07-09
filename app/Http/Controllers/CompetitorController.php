<?php namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Competitor;
use App\Http\Requests\CompetitorRequest;
use App\Services\UploadImageService;
use Illuminate\Http\Request;

class CompetitorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $competitors = Competitor::all();

        return view('competitors.index', compact('competitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('competitors.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CompetitorRequest $request)
    {
        $competitor = new Competitor();

        $competitor->name = $request->input("name");
        $competitor->brand_id = $request->input("brand_id");
        $competitor->photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/competitors');
        $competitor->discount = $request->input("discount");

        $competitor->save();

        return redirect()->route('competitors.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $competitor = Competitor::findOrFail($id);

        return view('competitors.show', compact('competitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $competitor = Competitor::findOrFail($id);
        $brands = Brand::all();

        return view('competitors.edit', compact('competitor', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(CompetitorRequest $request, $id)
    {
        $competitor = Competitor::findOrFail($id);

        $competitor->name = $request->input("name");
        $competitor->brand_id = $request->input("brand_id");

        $photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/competitors');
        if (isset($photo)) {
            $competitor->photo = $photo;
        }
        $competitor->discount = $request->input("discount");

        $competitor->save();

        return redirect()->route('competitors.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $competitor = Competitor::findOrFail($id);
        $competitor->delete();

        return redirect()->route('competitors.index')->with('message', 'Item deleted successfully.');
    }

}
