<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::where('role', 'customer')->pluck('id')->toArray();

        // Iteramos sobre todos los productos
        foreach (Product::all() as $product) {
            $usedUsers = []; // Para evitar duplicar reseñas del mismo usuario
            for ($i = 0; $i < 10; $i++) {
                do {
                    $userId = $faker->randomElement($users);
                } while (in_array($userId, $usedUsers));
                $usedUsers[] = $userId;

                Review::create([
                    'user_id' => $userId,
                    'product_id' => $product->id,
                    'rating' => $faker->numberBetween(1, 5),
                    'comment' => $faker->sentence(),
                ]);
            }
        }
    }
}
