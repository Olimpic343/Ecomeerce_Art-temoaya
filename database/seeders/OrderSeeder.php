<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = User::where('role', 'customer')->pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $userId = $faker->randomElement($userIds);

            // Creamos el pedido (cabecera)
            $order = Order::create([
                'user_id' => $userId,
                'total_price' => 0, // temporal, se actualiza después
                'status' => $faker->randomElement(['pending', 'paid', 'shipped', 'cancelled']),
            ]);

            $total = 0;
            $numItems = $faker->numberBetween(1, 5); // entre 1 y 5 productos por orden

            for ($j = 0; $j < $numItems; $j++) {
                $productId = $faker->randomElement($productIds);
                $price = Product::find($productId)->price;
                $quantity = $faker->numberBetween(1, 3);
                $subtotal = $price * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal
                ]);

                $total += $subtotal;
            }

            // Actualizamos el total del pedido
            $order->update(['total_price' => $total]);
        }
    }
}
