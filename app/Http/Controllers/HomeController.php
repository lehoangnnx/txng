<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\TXNG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $certificate = Certificate::all();
        return view('home')
            ->with('txngs', $txngs)->with('certificate', $certificate);
    }

    public function changepasswordForm()
    {
        return view('changepassword');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Mật Khẩu Hiện Tại Không Đúng");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Mật Khẩu Mới Không Được Trùng Với Mật Khẩu Hiện Tại");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Đôi Mật Khẩu Thành Công !");
    }
}
