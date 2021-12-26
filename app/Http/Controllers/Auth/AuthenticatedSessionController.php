<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request and transfer Cart to authenticated user.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        //pluck session id
        $cart = Cart::withSession()->first();
        
        $request->authenticate();

        $request->session()->regenerate();
        
        //optional() due cart may be null, needs to save cart articles available after login,
        //because session must be changed to match current session after we have authenticated
        optional($cart)->update([
            'session_id' => session()->getId(), 
            'user_id' => auth()->id()
        ]);
        
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session and update session id to save cart articles available after logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $cart = Cart::withSession()->first();
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        optional($cart)->update([
            'session_id' => session()->getId(),
        ]);

        return redirect('/');
    }
}
