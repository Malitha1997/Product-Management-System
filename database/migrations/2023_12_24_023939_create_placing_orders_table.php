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
        Schema::create('placing_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('order_number');
            $table->string('quantity');
            $table->string('free');
            $table->string('amount');
            $table->string('net_amount');
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('customer_id')->constrained('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placing_orders');
    }
};
