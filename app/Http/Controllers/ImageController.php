<?php

namespace App\Http\Controllers;
use App\Image;
use App\Product;
use App\TXNG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deleteImage($id) {
        $product =  Image::destroy($id);
        return redirect()->back();
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
        $image_certificates = Image::where('type', 'product_certificate')->get();
        return view('list-product')->with('products', $products)
            ->with('images', $images)
            ->with('image_certificates', $image_certificates);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-product');
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
            'description' => $request->input('description'),
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
        return view('update-product')->with('product', $product)
            ->with('images', $images)
            ->with('image_certificates', $image_certificates);
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
            'description' => $request->input('description'),
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
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Image::destroy($id);
        return redirect()->back();
    }

    public function search(Request $request){
        $key = $request->input('key');
        $certificate = Certificate::all();
        $result = TXNG::where('qr_code', 'like', '%' . $key . '%')
            ->orWhere('product_name', 'like', '%' . $key . '%')
            ->orWhereDate('created_at', 'like', '%' . $key . '%')->get();
        return view('home')
            ->with('txngs', $result)
            ->with('certificate', $certificate);
    }
}
