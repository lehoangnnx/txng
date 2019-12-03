<?php

namespace App\Http\Controllers;
use App\Company;
use App\Image;
use App\Product;
use App\TXNG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
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
        $company = Company::all();
        $images = Image::where('type', 'company')->get();
        return view('list-company')->with('company', $company)
            ->with('images', $images);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $logo = '';
        if ($request->hasfile('logo')) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('logo')->getClientOriginalExtension(); // Lấy . của file
            // Filename cực shock để khỏi bị trùng
            $logo = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            // Thư mục upload
            $uploadPath = public_path('/uploads'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $request->file('logo')->move($uploadPath, $logo);
        }
        $data = array(
            'name'  => $request->input('name'),
            'logo'  => $logo,
            'address'  => $request->input('address'),
            'location'  => $request->input('location'),
            'country'  => $request->input('country'),
            'representative'  => $request->input('representative'),
            'cellphone'  => $request->input('cellphone'),
            'email'  => $request->input('email'),
            'facebook'  => $request->input('facebook'),
        );
        $company = Company::create($data);
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "."
                    . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $name);
                $image->foreign_id = $company->id;
                $image->type = 'company';
                $image->url = $name;
                $image->save();
            }
        }

        return redirect('list/company');
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
        $company = Company::find($id);
        $images = Image::where('type', 'company')->where('foreign_id', $id)->get();
        return view('update-company')->with('company', $company)
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
        $company = Company::find($id);
        $logo = $company->logo;
        if ($request->hasfile('logo')) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('logo')->getClientOriginalExtension(); // Lấy . của file
            // Filename cực shock để khỏi bị trùng
            $logo = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;
            // Thư mục upload
            $uploadPath = public_path('/uploads'); // Thư mục upload
            // Bắt đầu chuyển file vào thư mục
            $request->file('logo')->move($uploadPath, $logo);
        }
        $data = array(
            'name'  => $request->input('name'),
            'logo'  => $logo,
            'address'  => $request->input('address'),
            'location'  => $request->input('location'),
            'country'  => $request->input('country'),
            'representative'  => $request->input('representative'),
            'cellphone'  => $request->input('cellphone'),
            'email'  => $request->input('email'),
            'facebook'  => $request->input('facebook'),
        );
        $result = $company->update($data);
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $image = new Image();
                $name = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "."
                    . $file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $name);
                $image->foreign_id = $company->id;
                $image->type = 'company';
                $image->url = $name;
                $image->save();
            }
        }

        return redirect('list/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Company::destroy($id);
        Image::where('type', 'company')->where('foreign_id', $id)->delete();
        return redirect('list/company');
    }

    public function search(Request $request){
        $key = $request->input('key');
        $result = Company::where('name', 'like', '%' . $key . '%')
           ->get();
        $images = Image::where('type', 'company')->get();
        return view('list-company')->with('company', $result)
            ->with('images', $images);
    }
}
