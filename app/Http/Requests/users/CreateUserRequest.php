<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rol' => 'required'

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El campo usuario es requerido',
            'email.required' => 'El campo email es requerido',
            'password.required' => 'El campo password es requerido',
            'rol.required' => 'El campo rol es requerido'
        ];
    }
}
