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
        Schema::create('shop_billings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id');
            $table->double('shop_rent')->nullable();
            $table->double('per_unit_cost')->nullable();
            $table->double('previous_unit')->nullable();
            $table->double('current_unit')->nullable();
            $table->double('total_used_unit')->nullable();
            $table->double('other_cost')->nullable();
            $table->double('total_cost')->nullable();
            $table->timestamp('entry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_billings');
    }
};
