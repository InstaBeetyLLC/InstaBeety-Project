<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SubCategoriesRequest;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sub_categories = SubCategory::all();

        return view('sub_categories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('sub_categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(SubCategoriesRequest $request)
    {
        $sub_category = new SubCategory();

        $sub_category->name = $request->input("name");
        $sub_category->category_id = $request->input("category_id");

        $sub_category->save();

        return redirect()->route('sub_categories.index')->with('message', 'sub category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $sub_category = SubCategory::findOrFail($id);

        return view('sub_categories.show', compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('sub_categories.edit', ['categories' => $categories, 'sub_category' => $sub_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(SubCategoriesRequest $request, $id)
    {
        $sub_category = SubCategory::findOrFail($id);

        $sub_category->name = $request->input("name");
        $sub_category->category_id = $request->input("category_id");

        $sub_category->save();

        return redirect()->route('sub_categories.index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $sub_category->delete();

        return redirect()->route('sub_categories.index')->with('message', 'Item deleted successfully.');
    }

}
