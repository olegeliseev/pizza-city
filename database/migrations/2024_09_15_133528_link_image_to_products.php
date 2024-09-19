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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->foreignId('image_id')
                ->nullable()
                ->after('price')
                ->references('id')
                ->on('images')
                ->nullOnDelete()
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image_id');
            $table->string('image')->nullable()->after('price');
        });
    }
};
