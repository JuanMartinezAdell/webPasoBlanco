<?php

namespace App\Http\Controllers;

use App\Models\User;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    //
    /* public function getSession()
    {

        $stripe = new \Stripe\StripeClient(env('STRIPE_API_KEY'));

        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'http://localhost/success',
            'cancel_url' => 'http://localhost/cancel',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'unit_amount' => 2000,
                        'product_data' => [
                            'name' => "Medalla Hermandad"
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
        ]);

        return $checkout;
    }*/

    public function stripe_create_customer()
    {
        $user = User::find();
        $stripeCustomer = $user->createAsStripeCustomer();
        dd($stripeCustomer);
    }

    public function stripe_payment_method_register()
    {
    }
}
