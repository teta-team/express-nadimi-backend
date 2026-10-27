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
            $table->string('slug')->unique();
            $table->json('name'); // {fa, en, ar}
            $table->string('category')->nullable(); // vegetables, stone-fruits, orchard-fruits, citrus-melons
            $table->string('status')->default('available'); // available, off_season
            $table->text('origin')->nullable();
            $table->json('summary')->nullable();
            $table->string('size')->nullable();
            $table->string('packaging')->nullable();
            $table->string('min_order')->nullable();
            $table->json('months')->nullable(); // array of booleans for 12 months
            $table->longText('image')->nullable(); // base64 or URL
            $table->boolean('hidden')->default(false);
            $table->integer('sort_order')->default(0);
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
