<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
   public function up(): void
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('transaction_id')->unique();
        $table->string('user_name');
        $table->string('email')->nullable();
        $table->string('event_name');
        $table->decimal('amount', 10, 2);
        $table->string('method'); // bkash, nagad, etc.
        $table->string('phone')->nullable();
        $table->string('status')->default('success'); // success, pending, failed
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
