<?php

namespace App\Http\Requests\products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequests extends FormRequest
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
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
             'category_id' => 'required',
             'brand_id' => 'required',
         ];
     }
 
     public function messages(): array
     {
         return [
             'name.required' => 'El nombre es obligatorio.',
             'description.required' => 'La descripción es obligatoria.',
             'code.required' => 'El código es obligatorio.',
             'price.required' => 'El precio es obligatorio.',
             'price.numeric' => 'El precio debe ser un número.',
             'image.image' => 'El archivo debe ser una imagen.',
             'category_id.required' => 'Selecciona una categoría.',
             'brand_id.required' => 'Selecciona una marca.',
           
         ];
     }
}
