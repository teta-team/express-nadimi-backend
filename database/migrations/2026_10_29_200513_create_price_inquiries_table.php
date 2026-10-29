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
        Schema::create('price_inquiries', function (Blueprint $table) {
            $table->id();

            $table->string('name', 120);
            $table->string('company', 160)->nullable();
            $table->string('email', 190)->nullable();
            $table->string('phone', 40)->nullable();

            $table->string('destination', 120);
            $table->string('incoterm', 3)->default('FOB');
            $table->text('message')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_inquiries');
    }
};
