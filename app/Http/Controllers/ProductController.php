<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\CreateProductRequests;
use App\Http\Requests\products\UpdateProductRequests;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function __construct() {
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create');
        $this->middleware('can:admin.products.show')->only('show');
        $this->middleware('can:admin.products.edit')->only('edit');
        $this->middleware('can:admin.products.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $permissions=[
            'show' => auth()->user()->can('admin.products.show'),
            'edit' => auth()->user()->can('admin.products.edit'),
            'destroy' => auth()->user()->can('admin.products.destroy'),
           
        ];
        return view('products.index',compact('products','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        return view('products.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequests $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('admin.products.index')->with('message', 'Se creo el producto correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $product = Product::find($id);
        return view('products.edit',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequests $request, Product $product)
    {
        
        $product->update($request->all());
        return redirect()->route('admin.products.index')->with('message', 'Se actualizo el producto correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $product = Product::findOrFail($id);
    $product->delete(); // Esto hace soft delete si el modelo lo soporta

    return redirect()->route('admin.products.index')->with('message', 'Producto eliminado correctamente.');
}
}
