<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Inertia\Inertia;
use Stripe\SetupIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class BillingController extends Controller
{
    //

    public function addPaymentmethod($paymentMethod)
    {
        dd($paymentMethod);
        auth()->user()->addPaymentmethod($paymentMethod);
    }

    public function index()
    {
        return inertia('Billings/IndexBilling', [
            'intent' => auth()->user()->createSetupIntent()->client_secret
        ]);
    }
}
