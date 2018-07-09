<?php

namespace App\Http\Controllers;

use App\Category;
use App\MyModel;
use App\Product;
use App\Services\ExcelReaderService;
use App\Services\UploadImageService;
use App\SubCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function getSubCategories(Request $request)
    {
        $sub_categories = SubCategory::where('category_id', $request->input('id'))->select(['id', 'name'])->get();
        return (new Response($sub_categories, '200'))->header('Content-Type', 'application/json');
    }
    public function getCategories(Request $request)
    {
        $categories = Category::where('item_id', $request->input('id'))->select(['id', 'name'])->get();
        return (new Response($categories, '200'))->header('Content-Type', 'application/json');
    }

    public function getModels(Request $request)
    {
        $models = MyModel::where('item_id', $request->input('id'))->select(['id', 'name'])->get();
        return (new Response($models, '200'))->header('Content-Type', 'application/json');
    }
}
