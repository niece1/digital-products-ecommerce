<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Get articles for checkout.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = Cart::withSession()->first();
        $checkout = $request->user()->checkout($cart->articles->pluck('stripe_id')->toArray(), [
            'success_url' => route('orders.index'),
            'cancel_url' => route('cart.index'),
        ]);

        return view('checkout.index', [
            'checkout' => $checkout
        ]);
    }
}
