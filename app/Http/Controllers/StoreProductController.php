<?php namespace App\Http\Controllers;

use App\Account;
use App\Attendance;
use App\Brand;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProductRequest;
use App\Item;
use App\MyModel;
use App\Product;
use App\ProductPromoter;
use App\ProductStatuses;
use App\PromoterProductStatuses;
use App\Services\Donkey;
use App\Services\ExcelReaderService;
use App\Services\RoleService;
use App\Services\UploadImageService;
use App\Store;
use App\SubCategory;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;
use DateTime;
use Illuminate\Http\Request;
use Session;

class StoreProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $product_status_id = $request->input('product_status_id');
        $store_id = $request->input('store_id');

        if (isset($store_id) && $product_status_id) {
            $store_products = Product::where(['store_id' => $store_id, 'product_status_id' => $product_status_id])->get();
        } elseif (isset($request->filter)) {
            switch ($request->filter) {
                case 'today':
                    $store_products = Product::where('created_at', '>=', Carbon::today());
                    if ($request->product_status_id != '') {
                        $store_products = $store_products->where('product_status_id', $request->product_status_id);
                    }
                    $store_products = $store_products->get();

                    break;
                case 'week':
                    $current = Carbon::now();
                    $today = Carbon::now();
                    $last_week = $current->subWeek();
                    $ids = DB::table('products')->whereBetween('created_at', [$last_week, $today])->pluck('id');
                    $store_products = Product::whereIn('id', $ids);
                    if ($request->product_status_id != '') {
                        $store_products = $store_products->where('product_status_id', $request->product_status_id);
                    }
                    $store_products = $store_products->get();


                    break;
                case 'month':
                    $current = Carbon::now();
                    $today = Carbon::now();
                    $last_month = $current->subMonth();
                    $ids = DB::table('products')->whereBetween('created_at', [$last_month, $today])->pluck('id');
                    $store_products = Product::whereIn('id', $ids);

                    if ($request->product_status_id != '') {
                        $store_products = $store_products->where('product_status_id', $request->product_status_id);
                    }

                    $store_products = $store_products->get();

                    break;
                case 'custom':
                    $to = new DateTime($request->to);
                    $from = new DateTime($request->from);


                    if ($request->to != '' || $request->from != '') {
                        $ids = DB::table('products')->whereBetween('created_at', [$from, $to])->pluck('id');
                        $store_products = Product::whereIn('id', $ids);
                        if ($request->item_id != '') {
                            $store_products = $store_products->where('item_id', $request->item_id);
                        }
                        if ($request->status_id != '') {
                            $store_products = $store_products->where('product_status_id', $request->status_id);
                        }
                        $store_products = $store_products->get();
                    } else {
                        if ($request->item_id != '') {
                            $store_products = Product::where('item_id', $request->item_id);
                        }
                        if ($request->model_id != '') {
                            $store_products = Product::where('model_id', $request->model_id);
                        }
                        if ($request->sub_category_id != '') {
                            $store_products = Product::where('sub_category_id', $request->sub_category_id);
                        }
                        if ($request->status_id != '') {
                            $store_products = Product::where('product_status_id', $request->status_id);
                        }

                        if ($request->product_status_id != '') {
                            $store_products = Product::where('product_status_id', $request->product_status_id);
                        }

                        $store_products = $store_products->get();
                    }

                    break;
            }
        } else {
            if (isset($request->product_status_id)) {
                $store_products = Product::where('product_status_id', $request->product_status_id)->get();
            } else {
                $store_products = Product::where('product_status_id', '!=', '7')->get();
            }
        }
        RoleService::canIAccessResource($store_id);
        $items = Item::all();
        $statuses = ProductStatuses::all();
        return view('store_products.index', compact('store_products', 'items', 'statuses'));
    }


    public function locationDistributedReports()
    {
        $accounts = Account::all();
        return view('store_products.location_distributed', compact('accounts'));
    }

    public function products(Request $request)
    {
        $store_products = null;
        $tmp = RoleService::getAllowedItems();
        if (isset($request->status)) {
            RoleService::canIAccessReport($request->status);
            $store_products = $tmp->where('product_status_id', $request->status)->get();
        } else {
            $store_products = $tmp->get();
        }
        return view('store_products.products', compact('store_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $items = RoleService::getPromoterItem();

        if (RoleService::getCurrentUserRole() == RoleService::PROMOTER) {
            $allowedReports = PromoterProductStatuses::where('promoter_id', Auth::user()->id)->get();
            $ids = Donkey::getIndexOfObject($allowedReports, 'product_status_id');
            $productStatuses = ProductStatuses::whereIn('id', $ids)->get();
        } else {
            //todo fix this one
            //RoleService::getCurrentUserRole()==RoleService::MANAGER
            $productStatuses = ProductStatuses::all();
        }
        $brands = Brand::all();
        return view('store_products.create', compact('brands', 'categories', 'items', 'stores', 'productStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StoreProductRequest $request)
    {
        $store_product = new Product();
        $promoter = ProductPromoter::where('promoter_id', Auth::user()->id)->first();
        $store_product->sub_category_id = $request->input("sub_category_id");
        $store_product->active = $request->input("active");

        if ($request->quantity != "") {
            $store_product->quantity = $request->quantity;
        }
        $store_product->brand_id = $request->brand_id;
        $store_product->comment = $request->comment;
        $store_product->store_id = $promoter->account->store->id;
        $store_product->account_id = $promoter->account->id;
        $store_product->reasons = $request->reasons;
        $store_product->status = $request->status;
        $store_product->item_id = $request->item_id;
        $store_product->model_id = $request->model_id;
        //created by current login user
        $store_product->created_by = Auth::user()->id;
        $store_product->product_status_id = $request->product_status_id;
        $store_product->invoice_photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/products');
        $store_product->active = $request->input("active");
        $store_product->displayed = $request->input("displayed");

        $store_product->offer_type = $request->input("offer_type");
        $store_product->offer_description = $request->input("offer_description");


        $store_product->save();

        return redirect()->route('store_products.products', ['store_id' => $request->store_id, 'product_status_id' => $request->product_status_id])->with('message', 'product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
//        RoleService::canIAccessResource($id);
        $store_product = Product::findOrFail($id);

        return view('store_products.show', compact('store_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $store_product = Product::findOrFail($id);
        $items = RoleService::getPromoterItem();
        $categories = Category::where('item_id', $items[0]->id)->get();
        $models = MyModel::all();
        $sub_categories = SubCategory::whereIn('category_id', $categories)->get();
        return view('store_products.edit', compact('store_product', 'items', 'categories', 'models', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $store_product = Product::findOrFail($id);
        $store_product->increment('edit_counter');
        $store_product->sub_category_id = $request->input("sub_category_id");
        $store_product->active = $request->input("active");
        $store_product->quantity = $request->input("quantity");
        $store_product->brand_id = $request->brand_id;
        $store_product->item_id = $request->item_id;
        $store_product->model_id = $request->model_id;
        $store_product->active = $request->input("active");

        $store_product->store_id = $request->store_id;
        $store_product->product_status_id = $request->product_status_id;

        if (isset($request->photo) && $request->photo != "")
            $store_product->invoice_photo = UploadImageService::uploadImage($_FILES['photo'], 'uploads/products');

        $store_product->save();

        return redirect()->route('store_products.products', ['store_id' => $request->store_id, 'product_status_id' => $request->product_status_id])->with('message', 'product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $store_product = Product::findOrFail($id);
        $tmp = $store_product;
        $store_product->delete();
        return redirect()->route('store_products.index', ['store_id' => $tmp->store_id, 'product_status_id' => $tmp->product_status_id])->with('message', 'product deleted successfully.');
    }

    public function uploadCsvFile(Request $request)
    {
        $excel_file = $_FILES['csv_file'];
        $product_status_id = $request->product_status_id;
        $store_id = $request->store_id;
        ExcelReaderService::readAndSaveProductFromExcel($excel_file, $product_status_id, $store_id);
        Session::flash('message', 'products imported successfully!');
        return redirect()->route('store_products.index', ['product_status_id' => $request->product_status_id, 'store_id' => $request->store_id]);
    }

    public function attendanceReports()
    {

        //
//        foreach ($dates as $date) {
//            $login=Carbon::parse($date->created_at);
//            $logout=Carbon::parse($date->logout);
//
//            //var_dump($date->account->name);
//            var_dump($logout->diffInHours($login));
//        }die();

        $attendances = Attendance::all();
        // dd($attendances);
        return view('store_products.attendance', compact('attendances'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @todo fix  roles related to CRUD
     */
    public function getPrStatus()
    {
        $reports = null;
        if (RoleService::getCurrentUserRole() == RoleService::PROMOTER) {
            /**@var PromoterProductStatuses $promoterAllowedStatuses */
            $promoterAllowedStatuses = PromoterProductStatuses::where('promoter_id', Auth::user()->id)->get();
            $ids = Donkey::getIndexOfObject($promoterAllowedStatuses, 'product_status_id');
            $reports = ProductStatuses::whereIn('id', $ids)->get();
        } elseif (RoleService::MANAGER) {
            //@todo get for manager from manager table
        }

        return view('store_products.pr_status', compact('reports'));
    }

    public function viewOrAdd(Request $request)
    {
        RoleService::canIAccessReport($request->id);
        $report = ProductStatuses::findOrFail($request->id);

        return view('store_products.viewOrAdd', compact('report'));
    }
}
