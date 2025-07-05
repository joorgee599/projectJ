<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            // Validación mínima manual (opcional)
            if (!isset($data['items']) || !is_array($data['items']) || count($data['items']) === 0) {
                return ApiResponse::error("No hay productos en la venta.", 400);
            }

            // Crear la venta
            $sale = Sale::create([
                'total_amount' => $data['total_amount'] ?? 0,
                'description' => $data['description'] ?? 'Venta rápida desde carrito',
                'payment_method' => $data['payment_method'] ?? 'efectivo',
                'client_id' => auth()->id(),
                'user_id' => auth()->id()
            ]);

            // Guardar detalles de la venta
            foreach ($data['items'] as $item) {
                SaleDetail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['quantity'] * $item['price'],
                ]);
            }

            return ApiResponse::success("Venta registrada exitosamente.", 200, $sale);
        } catch (\Exception $e) {
            return ApiResponse::error("Ocurrió un error al guardar la venta: " . $e->getMessage(), 500);
        }
    }
}
