<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index (){
        $cek_user = Auth::user();
        // dd($cek_user);
        if($cek_user->role == 1){
            return view('backend.dashboard');
            // return redirect('/home');
        }else{
            return view('frontend.master');
        }
    }
}
