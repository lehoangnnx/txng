<?php

namespace App\Http\Controllers;
use App\Company;
use App\Image;
use App\PlantingArea;
use App\Product;
use App\TXNG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlantingAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detailProduct($id) {
        $product =  TXNG::find($id);
        $certificate = Certificate::all();
        return view('detailproduct')->with('product', $product )
            ->with('certificate', $certificate);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantingareas = PlantingArea::all();
        $images = Image::where('type', 'plantingarea')->get();
        return view('list-plantingarea')->with('plantingareas', $plantingareas)
            ->with('images', $images);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-plantingarea');
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
            'farm_name'  => $request->input('farm_name'),
            'address'  => $request->input('address'),
            'growing_area'  => $request->input('growing_area'),
            'standard'  => $request->input('standard'),
        );
        $plantingArea = PlantingArea::create($data);
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "."
                    . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $name);
                $image->foreign_id = $plantingArea->id;
                $image->type = 'plantingarea';
                $image->url = $name;
                $image->save();
            }
        }

        return redirect('list/plantingarea');
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
        $plantingArea = PlantingArea::find($id);
        $images = Image::where('type', 'plantingarea')->where('foreign_id', $id)->get();
        return view('update-plantingarea')->with('plantingarea', $plantingArea)
            ->with('images', $images);
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
        $plantingArea = PlantingArea::find($id);

        $data = array(
            'farm_name'  => $request->input('farm_name'),
            'address'  => $request->input('address'),
            'growing_area'  => $request->input('growing_area'),
            'standard'  => $request->input('standard'),
        );
        $result = $plantingArea->update($data);
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "."
                    . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $name);
                $image->foreign_id = $plantingArea->id;
                $image->type = 'plantingarea';
                $image->url = $name;
                $image->save();
            }
        }

        return redirect('list/plantingarea');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = PlantingArea::destroy($id);
        Image::where('type', 'plantingarea')->where('foreign_id', $id)->delete();
        return redirect('list/plantingarea');
    }

    public function search(Request $request){
        $key = $request->input('key');
        $result = PlantingArea::where('farm_name', 'like', '%' . $key . '%')
            ->get();
        $images = Image::where('type', 'plantingarea')->get();
        return view('list-plantingarea')->with('plantingareas', $result)
            ->with('images', $images);
    }
}
