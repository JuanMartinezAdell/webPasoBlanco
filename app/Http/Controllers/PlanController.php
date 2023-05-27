<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;

class PlanController extends Controller
{
    //Controlador api.web
    public function getPlans()
    {
        return PlanResource::collection(Plan::orderBy('price', 'asc')->get());
    }

    public function checkout(Plan $plan)
    {
        return response()->json(['slug' => $plan->slug]);
    }
}
