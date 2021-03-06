<?php

namespace App\Http\Controllers;
use App\Company;
use App\Image;
use App\PlantingArea;
use App\Product;
use App\TXNG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $images = Image::where('type', 'product')->get();
        $plantingareas = PlantingArea::all();
        $image_certificates = Image::where('type', 'product_certificate')->get();
        return view('list-product')->with('products', $products)
            ->with('images', $images)
            ->with('image_certificates', $image_certificates)
            ->with('plantingareas', $plantingareas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plantingareas = PlantingArea::all();
        return view('create-product')->with('plantingareas', $plantingareas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = array(
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'mfg' => $request->input('mfg'),
            'exp' => $request->input('exp'),
            'size' => $request->input('size'),
            'packing' => $request->input('packing'),
            'storage_advice' => $request->input('storage_advice'),
            'packaging_factory' => $request->input('packaging_factory'),
            'description_header' => $request->input('description_header'),
            'description' => $request->input('description'),
            'planting_area_id' => $request->input('planting_area_id')
        );
        $product = Product::create($data);
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "."
                    . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $name);
                $image->foreign_id = $product->id;
                $image->type = 'product';
                $image->url = $name;
                $image->save();
            }
        }
        if ($request->hasfile('certificate_image')) {
            foreach ($request->file('certificate_image') as $file) {
                $image = new Image();
                $name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "."
                    . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $name);
                $image->foreign_id = $product->id;
                $image->type = 'product_certificate';
                $image->url = $name;
                $image->save();
            }
        }
        return redirect('list/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $images = Image::where('type', 'product')->where('foreign_id', $id)->get();
        $image_certificates = Image::where('type', 'product_certificate')->where('foreign_id', $id)->get();
        $plantingareas = PlantingArea::all();
        return view('update-product')->with('product', $product)
            ->with('images', $images)
            ->with('image_certificates', $image_certificates)
            ->with('plantingareas', $plantingareas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $data = array(
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'mfg' => $request->input('mfg'),
            'exp' => $request->input('exp'),
            'size' => $request->input('size'),
            'packing' => $request->input('packing'),
            'storage_advice' => $request->input('storage_advice'),
            'packaging_factory' => $request->input('packaging_factory'),
            'description_header' => $request->input('description_header'),
            'description' => $request->input('description'),
            'planting_area_id' => $request->input('planting_area_id')
        );
        $result = $product->update($data);
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "."
                    . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $name);
                $image->foreign_id = $product->id;
                $image->type = 'product';
                $image->url = $name;
                $image->save();
            }
        }
        if ($request->hasfile('certificate_image')) {
            foreach ($request->file('certificate_image') as $file) {
                $image = new Image();
                $name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "."
                    . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $name);
                $image->foreign_id = $product->id;
                $image->type = 'product_certificate';
                $image->url = $name;
                $image->save();
            }
        }
        return redirect('list/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Product::destroy($id);
        Image::where(function($q) {
            $q->where('type', 'product_certificate')
                ->orWhere('type', 'product');
        })->where('foreign_id', $id)->delete();
        return redirect('list/product');
    }

    public function search(Request $request){
        $key = $request->input('key');
        $result = Product::where('code', 'like', '%' . $key . '%')
            ->orWhere('name', 'like', '%' . $key . '%')
            ->orWhereDate('created_at', 'like', '%' . $key . '%')->get();
        $images = Image::where('type', 'product')->get();
        $image_certificates = Image::where('type', 'product_certificate')->get();
        $plantingareas = PlantingArea::all();
        return view('list-product')->with('products', $result)
            ->with('images', $images)
            ->with('image_certificates', $image_certificates)
            ->with('plantingareas', $plantingareas);
    }
}
