<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierWebhookController;

class WebhookController extends CashierWebhookController
{
    public function handleCheckoutSessionCompleted($payload)
    {
        //copied from Cashier WebhookController
        if ($user = $this->getUserByStripeId($payload['data']['object']['customer'])) {
            $cart = $user->cart;
            $order = $user->orders()->create();
            $order->articles()->attach($cart->articles);
            $cart->fresh()->delete();
        }
    }
}
