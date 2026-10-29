<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('size_translations')->nullable();
            $table->json('packaging_translations')->nullable();
            $table->json('min_order_translations')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'size_translations',
                'packaging_translations',
                'min_order_translations',
            ]);
        });
    }
};
