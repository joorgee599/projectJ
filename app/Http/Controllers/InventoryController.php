<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\inventories\CreateInventoryRequest;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('can:admin.inventories.index')->only('index');
        $this->middleware('can:admin.inventories.create')->only('create');
        $this->middleware('can:admin.inventories.show')->only('show');
        $this->middleware('can:admin.inventories.edit')->only('edit');
        $this->middleware('can:admin.inventories.destroy')->only('destroy');
    }

    /**
     * Muestra todos los movimientos de inventario.
     */
    public function index()
    {
        $inventories = Inventory::all();

        $permissions = [
            'show' => auth()->user()->can('admin.inventories.show'),
            'edit' => auth()->user()->can('admin.inventories.edit'),
            'destroy' => auth()->user()->can('admin.inventories.destroy'),
        ];

        return view('inventories.index', compact('inventories', 'permissions'));
    }

    /**
     * Muestra el formulario para registrar un movimiento.
     */
    public function create()
    {
        $products = Product::where('status', 1)->get();
        $providers = Provider::all(); // Si usas proveedores

        return view('inventories.create', compact('products', 'providers'));
    }

    /**
     * Guarda un nuevo movimiento de inventario.
     */
    public function store(Request $request)
{
    $request->validate([
        'description' => 'nullable|string',
        'document' => 'nullable|string',
        'details_json' => 'required|json',
    ]);

    $details = json_decode($request->details_json, true);

    if (empty($details)) {
        return redirect()->back()->withErrors(['details_json' => 'Debes agregar al menos un detalle de movimiento.']);
    }

    // Validar salidas antes de guardar nada
    foreach ($details as $d) {
        $product = Product::findOrFail($d['product_id']);
        if ($d['type'] === 'salida' && $product->stock < $d['quantity']) {
            return redirect()->back()->withErrors(['quantity' => "No hay suficiente stock para el producto '{$product->name}'"]);
        }
    }

    // Crear el inventario
    $inventory = Inventory::create([
        'description' => $request->description,
        'document' => $request->document,
        'user_id' => auth()->id(),
    ]);

    // Procesar y guardar cada detalle
    foreach ($details as $d) {
        $product = Product::findOrFail($d['product_id']);

        // Actualizar stock
        if ($d['type'] === 'entrada') {
            $product->stock += $d['quantity'];
        } else {
            $product->stock -= $d['quantity'];
        }
        $product->save();

        // Crear detalle
        $inventory->details()->create([
            'product_id' => $d['product_id'],
            'provider_id' => $d['provider_id'],
            'type' => $d['type'],
            'quantity' => $d['quantity'],
        ]);
    }

    return redirect()->route('admin.inventories.index')->with('message', 'Movimiento registrado correctamente.');
}


    /**
     * Muestra los detalles de un movimiento.
     */
   public function show(string $id)
{
    $inventory = Inventory::with(['details.product', 'details.provider', 'user'])->findOrFail($id);
    return view('inventories.show', compact('inventory'));
}


    /**
     * Muestra el formulario para editar un movimiento.
     */
    public function edit(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $products = Product::where('status', 1)->get();
        $providers = Provider::all();

        return view('inventories.edit', compact('inventory', 'products', 'providers'));
    }

    /**
     * Actualiza un movimiento existente.
     */
    public function update(CreateInventoryRequest $request, Inventory $inventory)
    {
        
        $request['user_id'] = auth()->id(); // Asigna el usuario autenticado
        

        $inventory->update($request->all());

        return redirect()->route('admin.inventories.index')->with('message', 'Movimiento actualizado correctamente');
    }

    /**
     * Elimina un movimiento del inventario.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('admin.inventories.index')->with('message', 'Movimiento eliminado correctamente');
    }
}
