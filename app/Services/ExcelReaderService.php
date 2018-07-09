<?php

namespace App\Services;

use App\Product;
use App\ProductStatuses;
use App\Store;
use App\SubCategory;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\VarDumper\Cloner\Data;

class ExcelReaderService
{
    public static function readAndSaveProductFromExcel($excel_file)
    {


        if (!$excel_file['size'] == 0) {
            $file_data = Excel::load($excel_file['tmp_name'], function ($reader) {
            })->get();


            foreach ($file_data as $row) {
                $product_obj = new Product();
                $sub_category_id = null;
                $sub_cat = SubCategory::where('name', $row->model)->first();
                $store_name = Store::where('name', $row->store)->first();
                $product_status = ProductStatuses::where('name', $row->status)->first();

                if ($product_status != null) {
                    $product_status_id = $product_status->id;

                    $product_obj->product_status_id = $product_status_id;
                }

                if ($store_name != null) {
                    $store_id = $store_name->id;
                    $product_obj->store_id = $store_id;
                }

                if ($sub_cat != null) {
                    $sub_category_id = $sub_cat->id;
                }

                $active = 1;
                if (!$row->active) {
                    $active = 0;
                }

                $product_obj->name = $row->name;
                $product_obj->sub_category_id = $sub_category_id;
                $product_obj->quantity = $row->quantity;
                $product_obj->invoice_photo = $row->photo;
                $product_obj->active = $active;
                $product_obj->created_at = date("Y-m-d H:i:s");
                $product_obj->updated_at = date("Y-m-d H:i:s");
                $product_obj->save();
            }
        }
    }
}