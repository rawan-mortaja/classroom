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
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->foreignId('subscription_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->integer('amount');
            $table->char('currency_code', 3);
            $table->string('payment_geteway');
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->string('geteway_refernce_id')
                ->nullable();
            $table->json('data')
                ->nullable();
            $table->timestamps();
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
