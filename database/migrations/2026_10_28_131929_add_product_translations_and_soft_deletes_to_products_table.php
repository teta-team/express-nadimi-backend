<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'size_translations')) {
                $table->json('size_translations')->nullable();
            }

            if (! Schema::hasColumn('products', 'packaging_translations')) {
                $table->json('packaging_translations')->nullable();
            }

            if (! Schema::hasColumn('products', 'min_order_translations')) {
                $table->json('min_order_translations')->nullable();
            }

            if (! Schema::hasColumn('products', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'size_translations')) {
                $table->dropColumn('size_translations');
            }

            if (Schema::hasColumn('products', 'packaging_translations')) {
                $table->dropColumn('packaging_translations');
            }

            if (Schema::hasColumn('products', 'min_order_translations')) {
                $table->dropColumn('min_order_translations');
            }

            if (Schema::hasColumn('products', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};
