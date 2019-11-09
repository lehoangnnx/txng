<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\TXNG;
use Illuminate\Http\Request;

class CertificateController extends Controller
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
        return view('create-certificate');
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
            'name' => $request->input('name'),
            'image' => $fileName
        );

        $result = Certificate::create($data);
        return redirect('admin');
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
        $certificate = Certificate::find($id);
        return view('update-certificate')->with('certificate', $certificate);
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
        $certificate = Certificate::find($id);

        $fileName = $certificate->image;
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
            'name' => $request->input('name'),
            'image' => $fileName
        );
        $result = $certificate->update($data);
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
        $result = Certificate::destroy($id);
        return redirect('admin');
    }

    public function search(Request $request){
        $txngs = TXNG::all();
        $key = $request->input('keyc');
        $result = Certificate::where('name', 'like', '%' . $key . '%')->get();
        return view('home')
            ->with('certificate', $result)->with('txngs', $txngs);
    }
}
