<?php


namespace App\Http\Controllers;

use Stripe\Stripe;
use Inertia\Inertia;
use Stripe\SetupIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class BillingController extends Controller
{
    //

    public function render()
    {
        return inertia('Billings/IndexBilling', [
            'intent' => auth()->user()->createSetupIntent()->client_secret,
            'paymentMethods' => auth()->user()->paymentMethods(),
        ]);
    }


    public function update(): RedirectResponse
    {
        $this->validate(request(), [
            "paymentMethod" => "required|string|starts_with:pm_|max:50"
        ]);

        //dd(request()->input());

        auth()->user()->updateDefaultPaymentMethod(request(key: "paymentMethod"));

        return back();
    }
}
