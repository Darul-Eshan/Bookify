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
        Schema::create('orders', function (Blueprint $table) {
          $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('event_id'); // বা foreignId('event_id') যদি Eloquent Model থাকে
            $table->string('event_title');
            $table->decimal('amount', 10, 2);
            $table->integer('quantity')->default(1);
            $table->string('payment_status')->default('pending'); // pending, completed, failed
            $table->string('transaction_id')->nullable();
            $table->string('payment_method')->default('stripe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
