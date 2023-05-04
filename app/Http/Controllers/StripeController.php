<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function getSession()
    {
        return 'true';
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'http://localhost/products/success',
            'cancel_url' => 'http://localhost/productsl/cancel',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => '€',
                        'unit_amount' => 20,
                        'product_data' => [
                            'name' => "Medalla Paso Blanco",
                        ],
                    ],
                    'quanty' => 1,
                ],
            ],
            'mode' => 'payment',
        ]);

        return $checkout;
    }
}
