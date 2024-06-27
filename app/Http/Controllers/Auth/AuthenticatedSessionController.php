<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
         return view('auth.login');
        // return view('backend.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   //login
     public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

         return redirect()->intended(RouteServiceProvider::HOME);
        // $cek_user = Auth::user();
        // if($cek_user->role = 1){
        //     return view('backend.dashboard');
        //     // return redirect('/home');
        // }else{
        //     return view('frontend.master');
        // }
        // jika akun sebagi admin teredirecte neng view soft ui
        // jika akun sebagi user teredirecte neng view media plus
    
        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
