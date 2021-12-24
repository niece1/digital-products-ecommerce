<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
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
