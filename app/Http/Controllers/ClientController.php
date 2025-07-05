<?php

namespace App\Http\Controllers;

use App\Http\Requests\clients\CreateClientRequest;
use App\Http\Requests\clients\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.clients.index')->only('index');
        $this->middleware('can:admin.clients.create')->only('create');
        $this->middleware('can:admin.clients.show')->only('show');
        $this->middleware('can:admin.clients.edit')->only('edit');
        $this->middleware('can:admin.clients.destroy')->only('destroy');
    }

    public function index()
    {
        $permissions = [
            'show' => auth()->user()->can('admin.clients.show'),
            'edit' => auth()->user()->can('admin.clients.edit'),
            'destroy' => auth()->user()->can('admin.clients.destroy'),
        ];

        $clients = Client::with('user')->get();
        return view('clients.index', compact('clients', 'permissions'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(CreateClientRequest $request)
    {
        // Crear usuario vinculado al cliente
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>'password', // Contraseña temporal, se puede cambiar luego
        ])->assignRole('Administrador');

        // Crear cliente asociado al usuario
        Client::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'document' => $request->document,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 1,
        ]);

        return redirect()->route('admin.clients.index')->with('message', 'Cliente registrado correctamente.');
    }

    public function show(string $id)
    {
        $client = Client::with('user')->findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::with('user')->findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
{
    // Actualizar el cliente
    $client->update($request->all());

    // Actualizar el email del usuario relacionado
    if ($client->user) {
        $client->user->update([
            'email' => $request->input('email'),
        ]);
    }

    return redirect()->route('admin.clients.index')->with('message', 'Cliente actualizado correctamente.');
}


    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('admin.clients.index')->with('message', 'Cliente eliminado correctamente.');
    }
}
