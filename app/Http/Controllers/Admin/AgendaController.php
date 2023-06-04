<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Agenda;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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


    public function updateUsersIsPaid()
    {
        // Encuentra los usuarios con una suscripción activa
        $usersWithActiveSubscription = User::whereHas('subscriptions', function ($query) {
            $query->where('stripe_status', 'active');
        })->get();

        // Itera sobre los usuarios y actualiza su estado is_paid a true
        foreach ($usersWithActiveSubscription as $user) {
            $user->update(['is_paid' => true]);
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


    /*public function edit(Contact $contact)
    {
        //
        $organizations = \App\Models\Organization::all();
        $positions = \App\Models\Position::all();
        $services = \App\Models\Service::all();
        $locations = \App\Models\Location::all();

        return inertia('Contacts/EditContacts', compact('contact', 'organizations', 'positions', 'services', 'locations'));
    }


    public function update(Request $request, Contact $contact)
    {
        //
        $request->validate([
            'name' => ['required', 'max:50'],
            'organization_id' => ['required', 'max:50'],
            'position_id' => ['required', 'max:50'],
            'service_id' => ['required', 'max:50'],
            'location_id' => ['required', 'max:50'],
            'phone' => ['required', 'max:50'],
            'short_phone' => ['required', 'max:50'],
            'phone_code' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
            'description' => ['required'],
        ]);

        $contact = Contact::find($request->id);
        $contact->name = $request->name;
        $contact->organization_id = $request->organization_id;
        $contact->position_id = $request->position_id;
        $contact->service_id = $request->service_id;
        $contact->location_id = $request->location_id;
        $contact->phone = $request->phone;
        $contact->short_phone = $request->short_phone;
        $contact->phone_code = $request->phone;
        $contact->email = $request->email;
        $contact->description = $request->description;
        $contact->save();
        sleep(1);

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    /* public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        return redirect()->route('contacts.index');
    }*/
}
