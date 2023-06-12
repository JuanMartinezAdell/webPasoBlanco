<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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

    public function show()
    {
        $monthlySubscriptions = Subscription::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('count', 'month');

        return Inertia::render('AdminDashboard', ['monthlySubscriptions' => $monthlySubscriptions]);
    }
}
