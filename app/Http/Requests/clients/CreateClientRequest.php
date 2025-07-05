<?php

namespace App\Http\Requests\clients;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'document' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del cliente es obligatorio.',
            'document.required' => 'El número de documento es obligatorio.',
            'email.required' => 'El correo del cliente es obligatorio.',
            'phone.required' => 'El teléfono es obligatorio.',
            'address.required' => 'La dirección es obligatoria.',
        ];
    }
}
