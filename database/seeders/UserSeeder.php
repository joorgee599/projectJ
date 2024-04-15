<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jorge garcia',
            'email' => 'jorge@gmail.com',
            'password' => 'password',
            'email_verified_at'=> now()
        ])->assignRole('Administrador');

    }
}
