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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('ingredients')->nullable();
            $table->integer('energy_value')->nullable();
            $table->integer('proteins')->nullable();
            $table->integer('fats')->nullable();
            $table->integer('carbohydrates')->nullable();
            $table->boolean('new')->default(false);
            $table->boolean('hit')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
