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

    public function addPaymentmethod(Request $request)
    {
        //payment method debe de recibir la informacion del console log para asignarsela al usario
        dd($request);
        $paymentMethod = $request->input('payment_method');
        auth()->user()->addPaymentmethod($paymentMethod);
    }


    public function index()
    {
        return inertia('Billings/IndexBilling', [
            'intent' => auth()->user()->createSetupIntent()->client_secret
        ]);
    }
}
