<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->enum('payment_method', ['mercadopago', 'stripe', 'bank_transfer']);
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->nullable();
            $table->text('transaction_json')->nullable(); // puede ser text si la respuesta es larga
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
