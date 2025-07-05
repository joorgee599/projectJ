<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::create([
                'name' => 'Proveedor Industrial S.A.',
                'contact_name' => 'Carlos Méndez',
                'email' => 'contacto@proveedorindustrial.com',
                'phone' => '3104567890',
                'address' => 'Cra 45 # 100-20, Bogotá',
                'description' => 'Proveedor de maquinaria pesada.',
                'status' => 1,
        ]);
    }
}
