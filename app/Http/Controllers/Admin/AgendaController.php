<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Diary\Put;
use App\Http\Requests\Diary\Store;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AgendaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $this->updateUsersIsPaid();

        $filters = $request->all('search');

        $order = $request->get('order', 'desc');

        $totalUsuarios = User::count();

        $users = User::query()
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where('name', 'LIKE', "%" . $search . "%")
                    ->orWhere('email', 'LIKE', "%" . $search . "%")
                    ->orWhere('phone', 'LIKE', "%" . $search . "%")
                    ->orWhere('address', 'LIKE', "%" . $search . "%")
                    ->orWhere('group', 'LIKE', "%" . $search . "%")
                    ->orWhere('description', 'LIKE', "%" . $search . "%");
            })
            ->orderByRaw("FIELD(`group`, 'admin', 'superusers', 'hombres', 'mujeres', 'externos') $order")
            ->orderBy('is_paid', $order)
            ->paginate(10);

        return inertia("Admin/Agenda/index", [
            'users' => $users,
            'totalUsuarios' => $totalUsuarios,
            'filters' => $filters,
        ]);
    }

    public function sort(Request $request)
    {
        $order = $request->get('order', 'desc');

        $users = User::orderBy('is_paid', $order)->paginate();

        // retornar una respuesta apropiada, por ejemplo:
        return inertia("Admin/Agenda/index", [
            'users' => $users,
        ]);
    }


    /* public function updateUsersIsPaid()
    {
        // Encuentra los usuarios con una suscripción activa
        $usersWithActiveSubscription = User::whereHas('subscriptions', function ($query) {
            $query->where('stripe_status', 'active');
        })->get();

        // Itera sobre los usuarios y actualiza su estado is_paid a true
        foreach ($usersWithActiveSubscription as $user) {
            $user->update(['is_paid' => true]);
        }
    }*/

    public function updateUsersIsPaid()
    {
        $users = User::all();

        foreach ($users as $user) {
            $hasActiveSubscription = $user->subscriptions()->where('stripe_status', 'active')->exists();

            $user->update(['is_paid' => $hasActiveSubscription]);
        }
    }


    public function create()
    {
        return inertia("Admin/Agenda/create");
    }

    public function store(Store $request): RedirectResponse
    {
        //
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make(Str::random(8));

        User::create($validatedData);

        //dd($request->all());

        return redirect()->route('diary.index');
    }

    public function edit(User $user)
    {
        return inertia("Admin/Agenda/edit", compact("user"));
    }

    public function update(Request $request, User $user)
    {
        //dd($request->all());
        $request->validate([
            'name' => ['required', 'max:50'],
            'address' => ['min:5', 'max:50'],
            'group' => ['required'],
            'phone' => ['max:15'],
            'email' => ['required', 'max:50', 'email'],
            'description' => ['max:255'],
        ]);

        $user = User::find($request->id);
        $user->name =  $request->name;
        $user->address = $request->address;
        $user->group =  $request->group;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->description =  $request->email;
        $user->save();
        sleep(1);


        //$user->update($request->validated());

        return redirect()->route('diary.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('diary.index');
    }
}
