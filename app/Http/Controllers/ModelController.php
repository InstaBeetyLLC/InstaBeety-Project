<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Item;
use App\MyModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $models = MyModel::all();

        return view('models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $items = Item::all();
        return view('models.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $model = new MyModel();

        $model->name = $request->input("name");
        $model->item_id = $request->input("item_id");

        $model->save();

        return redirect()->route('models.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $model = MyModel::findOrFail($id);

        return view('models.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $model = MyModel::findOrFail($id);
        $items = Item::all();

        return view('models.edit', compact('items', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $model = MyModel::findOrFail($id);

        $model->name = $request->input("name");
        $model->item_id = $request->input("item_id");

        $model->save();

        return redirect()->route('models.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = MyModel::findOrFail($id);
        $model->delete();

        return redirect()->route('models.index')->with('message', 'Item deleted successfully.');
    }

}
