<?php

namespace App\Http\Controllers;

use App\Account;
use App\Item;
use App\Location;
use App\Product;
use App\ProductStatuses;
use App\Services\LocationService;
use App\Services\RoleService;
use Auth;
use DB;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Response;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboardV2(Request $request)
    {
        return view('home.dashboardV2', get_defined_vars());
    }

    /**
     * just test layout is working fine
     * limited access to admin  & manager
     */
    public function dashboard()
    {
        $sales = Product::where('product_status_id', '1');
        $oos = Product::where('product_status_id', '2');
        $pop = Product::where('product_status_id', '3');
        $damage = Product::where('product_status_id', '4');
        $removed = Product::where('product_status_id', '5');
        $in_display = Product::where('product_status_id', '6');
        $shelf_share = Product::where('product_status_id', '7');
        return view('home.dashboard', get_defined_vars());
    }


    public function chartDetails(Request $request)
    {
        $products = DB::table('products')->where('product_status_id', $request->product_status_id);

        switch ($request->filter) {
            case 'today':
                $products = $products->where('created_at', '>=', Carbon::today());
                break;
            case 'week':
                $current = Carbon::now();
                $today = Carbon::now();
                $last_week = $current->subWeek();
                $products = $products->whereBetween('created_at', [$last_week, $today]);
                break;
            case 'month':
                $current = Carbon::now();
                $today = Carbon::now();
                $last_month = $current->subMonth();
                $products = $products->whereBetween('created_at', [$last_month, $today]);
                break;

            case 'custom':
                $to = new DateTime($request->to);
                $from = new DateTime($request->from);
                if ($request->to != '' || $request->from != '') {
                    $products = $products->whereBetween('created_at', [$from, $to]);
                }
                if ($request->item_id != '') {
                    $products = $products->where('item_id', $request->item_id);
                }
                if ($request->sub_category_id != '') {
                    $products = $products->where('sub_category_id', $request->sub_category_id);
                }
                if ($request->account != '') {
                    $products = $products->where('account_id', $request->account);
                }


                break;
        }

        $items = Item::all();
        $accounts = Account::all();

//        dump($products->get());die();
        if ($request->product_status_id == 7) {
            return view('home.shelfShare', get_defined_vars());
        } else {
            return view('home.chartDetails', get_defined_vars());
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (RoleService::getCurrentUserRole() == 'admin') {
            return redirect()->route('dashboardV2')->with('message', 'Welcome Manager :)');
        } else if ((RoleService::getCurrentUserRole() == 'manager') || (RoleService::getCurrentUserRole() == 'promoter')) {
            return redirect()->route('store_products.getPrStatus')->with('message', 'Welcome Manager :)');
        } else {
            return view('home.index');
        }
    }

    public function imager($size = NULL, $src)
    {
        $cacheimage = Image::cache(function ($image) use ($size, $src) {
            if ($size == 'uploads') {
                return $image->make('uploads/' . $src)->resize(130, 130);
            } else {
                $size = explode('*', $size);
                return $image->make($src)->resize($size[0], $size[1]);
            }
        }, 10);
        return Response::make($cacheimage, 200, ['Content-Type' => 'image/jpeg']);
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect()->route('store_products.products');
    }
}

