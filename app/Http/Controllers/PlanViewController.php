<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\PlanResource;
use Inertia\Inertia;

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
        //Probar hacer un redirec para corregir el erorr de recargar la pagina
        $plan = Plan::where('slug', $slug)->first();

        return Inertia::render('Plans/chekcoutPlan', [
            'plan' => $plan,
        ]);
    }
}
