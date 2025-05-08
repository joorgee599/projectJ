<?php

namespace App\Http\Requests\auth;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginUserApiRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required'

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $campos = implode(', ', array_keys($validator->errors()->toArray()));

        throw new HttpResponseException(response()->json([
            'message' => 'Los siguientes campos son obligatorios: ' . $campos,
            'status' => 422,
            'error' => true,
            'data' => []
        ], 422));
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El campo email es requerido',
            'password.required' => 'El campo password es requerido'
        ];
    }
}
