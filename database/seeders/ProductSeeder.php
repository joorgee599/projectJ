<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::create([
            'name' => 'Producto uno',
            'description' => 'Un produco normal',
            'code' => '123456',
            'price' => 1500,
            'image' => null,
            'category_id' => 1, // Asegúrate que la categoría 1 existe
            'brand_id' => 1,    // Asegúrate que la marca 1 existe
        ]);

       

    }
}
