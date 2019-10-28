<?php

namespace App\Http\Controllers;

use App\TXNG;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $txngs = TXNG::all();
        return view('home')
            ->with('txngs', $txngs);
    }
}
