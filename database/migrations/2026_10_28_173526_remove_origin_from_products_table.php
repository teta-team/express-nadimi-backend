<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('products', 'origin')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('origin');
            });
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('products', 'origin')) {
            Schema::table('products', function (Blueprint $table) {
                $table->text('origin')->nullable();
            });
        }
    }
};
