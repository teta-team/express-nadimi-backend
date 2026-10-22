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
        Schema::create('supplier_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('whatsapp')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('role');
            $table->string('product');
            $table->string('variety')->nullable();
            $table->string('origin');
            $table->string('grade');
            $table->string('size')->nullable();
            $table->string('state');
            $table->string('sorted');
            $table->decimal('capacity', 10, 2);
            $table->string('frequency');
            $table->date('ready_from');
            $table->date('ready_until');
            $table->string('packing');
            $table->string('pack_weight')->nullable();
            $table->boolean('change_pack')->default(false);
            $table->string('custom_pack')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('price_terms');
            $table->string('payment_terms');
            $table->string('quantity_tons')->nullable();
            $table->boolean('long_term')->default(false);
            $table->string('export_history');
            $table->string('years')->nullable();
            $table->string('export_markets')->nullable();
            $table->string('visit');
            $table->string('photos')->nullable();
            $table->string('video')->nullable();
            $table->string('packaging_photos')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_submissions');
    }
};
