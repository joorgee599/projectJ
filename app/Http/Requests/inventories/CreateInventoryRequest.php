<?php

namespace App\Http\Requests\inventories;

use Illuminate\Foundation\Http\FormRequest;

class CreateInventoryRequest extends FormRequest
{
     public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // 'product_id' => 'required',
            // 'provider_id' => 'required',
            // 'type' => 'required',
            // 'quantity' => 'required|integer|min:1',
            
        ];
    }

    public function messages(): array
    {
        return [
            
            // 'product_id.required' => 'El producto es obligatorio.',
            // // 'provider_id.required' => 'El proveedor es obligatorio.',
            // // 'type.required' => 'El tipo de movimiento es obligatorio.',
            // // 'quantity.required' => 'La cantidad es obligatoria.',
            // // 'quantity.integer' => 'La cantidad debe ser un número entero.',
            // // 'quantity.min' => 'La cantidad debe ser al menos 1.',
           
        ];
    }
}
