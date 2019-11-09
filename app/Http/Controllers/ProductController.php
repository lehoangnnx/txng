<?php

namespace App\Http\Controllers;
use App\Certificate;
use App\TXNG;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detailProduct($id) {
        $product =  TXNG::find($id);
        $certificate = Certificate::all();
        return view('detailproduct')->with('product', $product )
            ->with('certificate', $certificate);
    }
}
