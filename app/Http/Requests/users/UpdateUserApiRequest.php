<?php

namespace App\Http\Requests\users;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserApiRequest extends FormRequest
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
             'name' => 'required|string|max:255',
             'email' => 'required|string',
             
         ];
     }
     public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
           
        ];
    }

      protected function failedValidation(Validator $validator)
    {
        $attributeNames = $this->attributes();
        $errors = $validator->errors()->toArray();

        $campos = implode(', ', array_map(function ($field) use ($attributeNames) {
            return $attributeNames[$field] ?? $field;
        }, array_keys($errors)));

        throw new HttpResponseException(response()->json([
            'message' => 'Los siguientes campos son obligatorios o tienen errores: ' . $campos,
            'status' => 422,
            'error' => true,
            'data' => [],
            'errors' => $validator->errors(), // útil si necesitas mostrar los errores por campo
        ], 422));
    }
 
     public function messages(): array
     {
         return [
             'name.required' => 'El nombre es obligatorio.',
             'email.required' => 'El correo es obligatoria.',
             
           
         ];
     }
}
