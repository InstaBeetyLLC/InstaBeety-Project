<?php namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductShareRequest;
use App\Product;
use App\ProductShare;
use App\Services\RoleService;
use App\Store;
use Illuminate\Http\Request;

class ProductShareController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (isset($request->store_id)) {
            RoleService::canIAccessResource($request->store_id);
            $product_shares = Product::where('product_status_id', 7)
                ->where('store_id', $request->store_id)
                ->get();
        } else {
            if (RoleService::getCurrentUserRole() != 'admin') {
                abort(403, 'Unauthorized action.');
            }
            $product_shares = Product::where('product_status_id', 7)->get();
        }
        return view('product_shares.index', compact('product_shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $brands = Brand::all();
        $stores = RoleService::getCorrectStoreRegardsToRole();
        return view('product_shares.create', compact('brands', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(ProductShareRequest $request)
    {
        $product_share = new Product();
        $product_share->name = $request->input("name");
        $product_share->brand_id = $request->input("brand_id");
        $product_share->store_id = $request->input("store_id");
        $product_share->quantity = $request->input("quantity");
        $product_share->product_status_id = 7;
        $product_share->save();

        return redirect()->route('product_shares.index')->with('message', 'product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $product_share = Product::findOrFail($id);
        RoleService::canIAccessResource($product_share->store_id);

        return view('product_shares.show', compact('product_share'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $product_share = Product::findOrFail($id);
        $brands = Brand::all();
        $stores = Store::all();
        RoleService::canIAccessResource($product_share->store_id);
        return view('product_shares.edit', compact('product_share', 'stores', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(ProductShareRequest $request, $id)
    {
        $product_share = Product::findOrFail($id);

        $product_share->name = $request->input("name");
        $product_share->brand_id = $request->input("brand_id");
        $product_share->quantity = $request->input("quantity");
        $product_share->store_id = $request->input("store_id");

        $product_share->save();

        return redirect()->route('product_shares.index')->with('message', 'product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $product_share = Product::findOrFail($id);
        $product_share->delete();
        RoleService::canIAccessResource($product_share->store_id);

        return redirect()->route('product_shares.index')->with('message', 'product deleted successfully.');
    }

}
