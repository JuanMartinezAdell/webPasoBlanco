<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function countUsersWithActiveSubscription()
    {
        $count = User::whereHas('subscriptions', function ($query) {
            $query->where('stripe_status', 'active');
        })->count();

        return $count;
    }

    public function countUsersWithoutInactiveSubscription()
    {
        $count = User::whereDoesntHave('subscriptions', function ($query) {
            $query->where('stripe_status', 'active');
        })->count();

        return $count;
    }

    public function index()
    {
        $totalUsuarios = User::count();
        $activeSubscriptions = $this->countUsersWithActiveSubscription();
        $inactiveSubcriptions = $this->countUsersWithoutInactiveSubscription();

        return inertia('AdminDashboard', [
            'totalUsuarios' => $totalUsuarios,
            'activeSubscriptions' => $activeSubscriptions,
            'inactiveSubcriptions' => $inactiveSubcriptions,
        ]);
    }
}
