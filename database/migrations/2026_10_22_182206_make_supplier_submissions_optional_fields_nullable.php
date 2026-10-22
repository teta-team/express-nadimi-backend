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
        Schema::table('supplier_submissions', function (Blueprint $table) {
            $table->string('grade')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('sorted')->nullable()->change();
            $table->string('capacity')->nullable()->change();
            $table->date('ready_until')->nullable()->change();
            $table->string('packing')->nullable()->change();
            $table->decimal('price', 10, 2)->nullable()->change();
            $table->string('price_terms')->nullable()->change();
            $table->string('payment_terms')->nullable()->change();
            $table->string('long_term')->nullable()->change();
            $table->boolean('change_pack')->nullable()->default(null)->change();
            $table->string('export_history')->nullable()->change();
            $table->string('visit')->nullable()->change();
            $table->json('photos')->nullable()->change();
            $table->json('packaging_photos')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supplier_submissions', function (Blueprint $table) {
            $table->string('grade')->nullable(false)->change();
            $table->string('state')->nullable(false)->change();
            $table->string('sorted')->nullable(false)->change();
            $table->decimal('capacity', 10, 2)->nullable(false)->change();
            $table->date('ready_until')->nullable(false)->change();
            $table->string('packing')->nullable(false)->change();
            $table->decimal('price', 10, 2)->nullable(false)->change();
            $table->string('price_terms')->nullable(false)->change();
            $table->string('payment_terms')->nullable(false)->change();
            $table->boolean('long_term')->nullable(false)->default(false)->change();
            $table->boolean('change_pack')->nullable(false)->default(false)->change();
            $table->string('export_history')->nullable(false)->change();
            $table->string('visit')->nullable(false)->change();
            $table->string('photos')->nullable()->change();
            $table->string('packaging_photos')->nullable()->change();
        });
    }
};
