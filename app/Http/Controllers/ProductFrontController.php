<?php

namespace App\Http\Controllers;
use App\Company;
use App\Image;
use App\PlantingArea;
use App\Product;
use App\TXNG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFrontController extends Controller
{

    public function detailProduct($id) {
        $product =  Product::find($id);
        $company = Company::first();
        $palntingarea = PlantingArea::find(@$product->planting_area_id);
        $imagesCompany = Image::where('type', 'company')->get();
        $imagesPlantingArea = Image::where('type', 'plantingarea')->where('foreign_id', @$palntingarea->id)->get();
        $imagesProduct = Image::where('type', 'product')->where('foreign_id', @$product->id)->get();
        return view('detailproduct')->with('product', $product )
            ->with('company', $company)->with('palntingarea', $palntingarea)
            ->with('imagesCompany', $imagesCompany)
            ->with('imagesPlantingArea', $imagesPlantingArea)
            ->with('imagesProduct', $imagesProduct);
    }

}
