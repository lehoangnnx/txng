<?php

namespace App\Http\Controllers;
use App\TXNG;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detailProduct($id) {
        $product =  TXNG::find($id);
        return view('detailproduct')->with('product', $product );
    }
}
