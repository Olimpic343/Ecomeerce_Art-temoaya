<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShippingAddress;
use App\Models\User;
use Faker\Factory as Faker;

class ShippingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        //
        public function run(): void
    {
        $faker = Faker::create();

        $users = User::where('role', 'customer')->get();

        foreach ($users as $user) {
            $count = rand(1, 3); // entre 1 y 3 direcciones

            for ($i = 0; $i < $count; $i++) {
                ShippingAddress::create([
                    'user_id' => $user->id,
                    'address' => $faker->streetAddress(),
                    'city' => $faker->city(),
                    'state' => $faker->state(),
                    'zip_code' => $faker->postcode(),
                    'country' => $faker->country(),
                ]);
            }
        }
    }
}
