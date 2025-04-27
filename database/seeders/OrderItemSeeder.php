<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Faker\Factory as Faker;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Obtenemos todos los IDs de órdenes y productos
        $orderIds   = Order::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        foreach ($orderIds as $orderId) {
            // Para cada orden generamos entre 1 y 5 items
            $itemsCount = $faker->numberBetween(1, 5);

            for ($i = 0; $i < $itemsCount; $i++) {
                // Elegimos un producto al azar
                $productId = $faker->randomElement($productIds);
                $product   = Product::find($productId);

                // Definimos cantidad y calculamos subtotal
                $quantity = $faker->numberBetween(1, 3);
                $price    = $product->price;
                $subtotal = $price * $quantity;

                // Creamos el OrderItem asegurándonos de no dejar product_id nulo
                OrderItem::create([
                    'order_id'   => $orderId,
                    'product_id' => $productId,
                    'quantity'   => $quantity,
                    'price'      => $price,
                    'subtotal'   => $subtotal,
                ]);
            }
        }
    }
}

