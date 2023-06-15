<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Plan;
use Inertia\Inertia;
use Stripe\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PlanResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;



class PlanViewController extends Controller
{
    //

    public function showSubscriptionPlan()
    {
        $user = auth()->user();

        $activeSubscription = $user->subscriptions()
            ->where('stripe_status', 'active')
            ->whereNull('ends_at')
            ->first();

        if (!$activeSubscription) {
            return redirect()->route('plans.indexplan');
        }

        $plan = DB::table('plans')
            ->where('stripe_id', $activeSubscription->stripe_price)
            ->first();

        if (!$plan) {
            return redirect()->route('plans.indexplan');
        }

        return Inertia::render('Plans/subscriptionPlan', [
            'plan' => $plan,
            'subscription' => $activeSubscription,
        ]);
    }

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

        if ($plan === null) {
            return response(
                [
                    'error' => ['plan' => 'El plan no existe']
                ],
                422
            );
        }

        auth()->user()->newSubscription('Suscripciones Paso Blanco', $plan->stripe_id)
            ->create(request(key: "paymentMethod"));


        return Redirect::route('subscription.plan');
    }

    public function cancelSubscription($slug)
    {

        $plan = Plan::where('slug', $slug)->first();

        if ($plan === null) {
            return response(
                [
                    'error' => ['plan' => 'El plan no existe']
                ],
                422
            );
        }

        $subscription = auth()->user()->subscription('Suscripciones Paso Blanco', $plan->stripe_id)->cancel();

        //dd($subscription);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $stripeSubscription = Subscription::retrieve($subscription->stripe_id);
        $subscription->ends_at = date('Y-m-d H:i:s', $stripeSubscription->current_period_end);
        $subscription->save();

        return redirect()->back();
    }

    public function showActiveSubscription()
    {
        $user = auth()->user();

        $subscription = $user->subscriptions()->where('stripe_status', 'active')->whereNull('ends_at')->first();

        if ($subscription !== null) {
            $plan = DB::table('plans')
                ->where('stripe_id', $subscription->stripe_price)
                ->first();
        } else {
            $plan = DB::table('plans')->where('is_free', 1)->first();
        }

        if ($plan === null) {
            return response(
                [
                    'error' => ['plan' => 'No se encuentra ningún plan asociado o gratuito disponible']
                ],
                422
            );
        }

        //dd($plan);

        return Inertia::render('Plans/subscriptionPlan', [
            'plan' => $plan,
            'subscription' => $subscription,
        ]);
    }
}
