<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    //
    /*public function createSetupIntent()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $setupIntent = SetupIntent::create();

        return [
            'client_secret' => $setupIntent->client_secret,
            'setup_intent_id' => $setupIntent->id,
        ];
    }*/

    /* public function payment()
    {
        return Inertia::render('update-payment-method', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }*/

    public function index()
    {

        return Inertia::render('Billings/IndexBilling');
    }
}
