<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class PlanViewController extends Controller
{
    //
    public function index()
    {
        $plans = Plan::where('is_free', false)
            ->orderBy('price', 'asc')
            ->get();

        return inertia('Plans/indexPlan', [
            'plans' => $plans,
        ]);
    }

    public function checkout($slug)
    {
        $plan = Plan::where('slug', $slug)->first();
        //dd($plan);

        return inertia('Plans/chekcoutPlan', [
            'plan' => $plan,
            'intent' => auth()->user()->createSetupIntent()->client_secret,
            'paymentMethods' => auth()->user()->paymentMethods(),
        ]);
    }

    public function createSubcription($slug): RedirectResponse
    {
        $this->validate(request(), [
            "paymentMethod" => "required|string|starts_with:pm_|max:50"
        ]);

        $plan = Plan::where('slug', $slug)->first();

        auth()->user()->newSubscription('Suscripciones Paso Blanco', $plan->stripe_id)
            ->create(request(key: "paymentMethod"));


        return Redirect::route('plans.indexplan');
    }
}
