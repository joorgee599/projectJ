<?php

namespace App\Http\Requests\providers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
{
     public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'email|max:255',
            'phone' => 'string|max:20',
            
           
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del proveedor es obligatorio.',
            'email.required' => 'El correo del proveedor es obligatorio.',
             'phone.required' => 'El telefono del proveedor es obligatorio.',
            
          
        ];
    }
}
