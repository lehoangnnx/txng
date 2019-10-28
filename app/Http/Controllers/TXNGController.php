<?php

namespace App\Http\Controllers;

use App\TXNG;
use Illuminate\Http\Request;

class TXNGController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = '';
        if ($request->hasfile('image')) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            // Thư mục upload
            $uploadPath = public_path('/uploads'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $request->file('image')->move($uploadPath, $fileName);
        }
        $data = array(
            'qr_code' => $request->input('qr_code'),
            'product_name' => $request->input('product_name'),
            'mfg' => $request->input('mfg'),
            'exp' => $request->input('exp'),
            'size' => $request->input('size'),
            'packing' => $request->input('packing'),
            'storage_advice' => $request->input('storage_advice'),
            'packaging_factory' => $request->input('packaging_factory'),
            'company_name' => $request->input('company_name'),
            'country' => $request->input('country'),
            'representative' => $request->input('representative'),
            'company_address' => $request->input('company_address'),
            'cell_phone' => $request->input('cell_phone'),
            'email' => $request->input('email'),
            'fb' => $request->input('fb'),
            'farm_name' => $request->input('farm_name'),
            'farm_address' => $request->input('farm_address'),
            'growing_area' => $request->input('growing_area'),
            'standard_applied' => $request->input('standard_applied'),
            'description_header' => $request->input('description_header'),
            'discription' => $request->input('discription'),
            'image' => $fileName
        );

        $result = TXNG::create($data);
        return redirect('home');
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
        $txng = TXNG::find($id);
        return view('update')->with('txng', $txng);
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
        $txng = TXNG::find($id);

        $fileName = $txng->image;
        if ($request->hasfile('image')) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            // Thư mục upload
            $uploadPath = public_path('/uploads'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $request->file('image')->move($uploadPath, $fileName);
        }
        $data = array(
            'qr_code' => $request->input('qr_code'),
            'product_name' => $request->input('product_name'),
            'mfg' => $request->input('mfg'),
            'exp' => $request->input('exp'),
            'size' => $request->input('size'),
            'packing' => $request->input('packing'),
            'storage_advice' => $request->input('storage_advice'),
            'packaging_factory' => $request->input('packaging_factory'),
            'company_name' => $request->input('company_name'),
            'country' => $request->input('country'),
            'representative' => $request->input('representative'),
            'company_address' => $request->input('company_address'),
            'cell_phone' => $request->input('cell_phone'),
            'email' => $request->input('email'),
            'fb' => $request->input('fb'),
            'farm_name' => $request->input('farm_name'),
            'farm_address' => $request->input('farm_address'),
            'growing_area' => $request->input('growing_area'),
            'standard_applied' => $request->input('standard_applied'),
            'description_header' => $request->input('description_header'),
            'discription' => $request->input('discription'),
            'image' => $fileName
        );
        $result = $txng->update($data);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = TXNG::destroy($id);
        return redirect('home');
    }

    public function search(Request $request){
        $key = $request->input('key');
        $result = TXNG::where('qr_code', 'like', '%' . $key . '%')
        ->orWhere('product_name', 'like', '%' . $key . '%')
        ->orWhereDate('created_at', 'like', '%' . $key . '%')->get();
        return view('home')
            ->with('txngs', $result);
    }

}
