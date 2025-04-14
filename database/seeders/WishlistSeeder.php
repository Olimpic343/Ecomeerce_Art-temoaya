<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $users = User::where('role', 'customer')->get();
            $productIds = Product::pluck('id')->toArray();

            foreach ($users as $user) {
                // Aseguramos al menos 5 productos únicos por usuario
                $productsForUser = collect($productIds)->random(5);

                foreach ($productsForUser as $productId) {
                    Wishlist::create([
                        'user_id' => $user->id,
                        'product_id' => $productId,
                    ]);
                }
            }
        }
    }
}
