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
        Schema::create('plan_feature', function (Blueprint $table) {
            $table->foreignId('plan_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('feature_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->unsignedSmallInteger('feature_value');

            $table->primary(['plan_id', 'feature_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_feature');
    }
};
