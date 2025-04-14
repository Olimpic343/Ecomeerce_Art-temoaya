<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Payment;
use Faker\Factory as Faker;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Solo pedidos con status = 'paid' y que aún no tengan pago asociado
        $orders = Order::where('status', 'paid')->doesntHave('payment')->get();

        foreach ($orders as $order) {
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $faker->randomElement(['mercadopago', 'stripe', 'bank_transfer']),
                'amount' => $order->total_price,
                'transaction_id' => strtoupper($faker->bothify('TXN###??')),
                'transaction_json' => json_encode([
                    'message' => 'Pago simulado exitoso',
                    'order_id' => $order->id
                ]),
                'status' => $faker->randomElement(['completed', 'pending']),
            ]);
        }
    }
}
