<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\CreateCategoryRequest;
use App\Http\Requests\categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create');
        $this->middleware('can:admin.categories.show')->only('show');
        $this->middleware('can:admin.categories.edit')->only('edit');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $permissions=[
            'show' => auth()->user()->can('admin.categories.show'),
            'edit' => auth()->user()->can('admin.categories.edit'),
            'destroy' => auth()->user()->can('admin.categories.destroy'),
           
        ];
        return view('categories.index',compact('categories','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('message', 'Se creo la categoria correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('message', 'Se actualizo la categoria correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $category = Category::findOrFail($id);
    $category->delete(); // Esto hace soft delete si el modelo lo soporta

    return redirect()->route('admin.categories.index')->with('message', 'Categoria eliminada correctamente.');
}
}
