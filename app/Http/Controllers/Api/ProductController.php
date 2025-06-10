<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\products\CreateProductApiRequest;
use App\Http\Requests\products\UpdateProductApiRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])
            ->where('status', 1)
            ->get();

        if ($products->isEmpty()) {
            return ApiResponse::success('No hay productos disponibles', 204,[]);
        }

        return ApiResponse::success("Listado de productos",200,$products);

       
    }

    public function show($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);

        if (!$product) {
            return ApiResponse::error("Producto no encontrado", 404);
        }

        return ApiResponse::success("Producto encontrado", 200, $product);
    }
    public function edit($id)
    {
       
        $product = Product::find($id);
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        

        if (!$product) {
            return ApiResponse::error("Producto no encontrado", 404);
        }

        return ApiResponse::success("Producto encontrado", 200,[
        'product' => $product,
        'categories' => $categories,
        'brands' => $brands
    ]);
    }   

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        return ApiResponse::success("Formulario de creación de producto", 200, [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function store (CreateProductApiRequest $request)
    {
       // return ApiResponse::error('No se puede crear el producto', 200);
        

        $product = Product::create($request->validated());       
        if (!$product) {
            return ApiResponse::error("Error al crear el producto", 500);
        }

        return ApiResponse::success("Producto creado exitosamente", 200, $product);
    }

    public function update(UpdateProductApiRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return ApiResponse::error("Producto no encontrado", 404);
        }

        $product->update($request->validated());

        return ApiResponse::success("Producto actualizado exitosamente", 200, $product);
    }
    
}
