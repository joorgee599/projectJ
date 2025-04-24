<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\brands\CreateBrandRequest;
use App\Http\Requests\brands\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.brands.index')->only('index');
        $this->middleware('can:admin.brands.create')->only('create');
        $this->middleware('can:admin.brands.show')->only('show');
        $this->middleware('can:admin.brands.edit')->only('edit');
        $this->middleware('can:admin.brands.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        $permissions=[
            'show' => auth()->user()->can('admin.brands.show'),
            'edit' => auth()->user()->can('admin.brands.edit'),
            'destroy' => auth()->user()->can('admin.brands.destroy'),
           
        ];
        return view('brands.index',compact('brands','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBrandRequest $request)
    {
        $brand = Brand::create($request->all());
        return redirect()->route('admin.brands.index')->with('message', 'Se creo la marca correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        return view('brands.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());
        return redirect()->route('admin.brands.index')->with('message', 'Se actualizo la marca correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $Brand = Brand::findOrFail($id);
    $Brand->delete(); // Esto hace soft delete si el modelo lo soporta

    return redirect()->route('admin.brands.index')->with('message', 'Marca eliminada correctamente.');
}
}
