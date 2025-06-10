<?php

namespace App\Http\Requests\products;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductApiRequest extends FormRequest
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
             'description' => 'required|string',
             'code' => 'required|string',
             'price' => 'required|numeric|min:0',
           //  'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
             'category_id' => 'required',
             'brand_id' => 'required',
         ];
     }
     public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'description' => 'descripción',
            'code' => 'código',
            'price' => 'precio',
          //  'image' => 'imagen',
            'category_id' => 'categoría',
            'brand_id' => 'marca',
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
             'description.required' => 'La descripción es obligatoria.',
             'code.required' => 'El código es obligatorio.',
             'price.required' => 'El precio es obligatorio.',
             'price.numeric' => 'El precio debe ser un número.',
          //   'image.image' => 'El archivo debe ser una imagen.',
             'category_id.required' => 'Selecciona una categoría.',
             'brand_id.required' => 'Selecciona una marca.',
           
         ];
     }
}
