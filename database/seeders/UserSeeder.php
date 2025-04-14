<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crear el usuario administrador
         User::create([
            'name' => 'Administrador',
            'email' => 'administrador@example.com',
            'password' => Hash::make('password'),
            'phone' => '5551234567',
            'role' => 'admin',
            'address' => 'Dirección del admin'
        ]);

        // Faker para usuarios cliente
        $faker = Faker::create();

        for ($i = 0; $i < 40; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // misma clave para todos
                'phone' => $faker->phoneNumber,
                'role' => 'customer',
                'address' => $faker->address
            ]);
        }
    }
}
