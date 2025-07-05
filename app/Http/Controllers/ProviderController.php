<?php

namespace App\Http\Controllers;

use App\Http\Requests\providers\CreateProviderRequest;
use App\Http\Requests\providers\UpdateProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{

     public function __construct()
    {
        $this->middleware('can:admin.providers.index')->only('index');
        $this->middleware('can:admin.providers.create')->only('create');
        $this->middleware('can:admin.providers.show')->only('show');
        $this->middleware('can:admin.providers.edit')->only('edit');
        $this->middleware('can:admin.providers.destroy')->only('destroy');
    }
    public function index()
    {
        $permissions = [
            'show' => auth()->user()->can('admin.providers.show'),
            'edit' => auth()->user()->can('admin.providers.edit'),
            'destroy' => auth()->user()->can('admin.providers.destroy'),
        ];
        $providers = Provider::all();
        return view('providers.index', compact('providers', 'permissions'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(CreateProviderRequest $request)
    {
        

        Provider::create($request->all());
        return redirect()->route('admin.providers.index')->with('message', 'Proveedor creado correctamente.');
    }

    public function show(string $id)
    {
        $provider = Provider::find($id);
        return view('providers.show', compact('provider'));
    }

    public function edit(string $id)
    {
         $provider = Provider::find($id);
        return view('providers.edit', compact('provider'));
    }

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        
        $provider->update($request->all());
        return redirect()->route('admin.providers.index')->with('message', 'Proveedor actualizado correctamente.');
    }

    public function destroy(string $id)
    {
         $provider = Provider::findOrFail($id);
        $provider->delete();
        return redirect()->route('admin.providers.index')->with('message', 'Proveedor eliminado correctamente.');
    }
}
