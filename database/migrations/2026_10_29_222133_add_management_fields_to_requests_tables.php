<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('price_inquiries', function (Blueprint $table) {
            $table->string('status')->default('new');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->softDeletes();
        });

        Schema::table('supplier_submissions', function (Blueprint $table) {
            $table->string('status')->default('new');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('price_inquiries', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn([
                'status',
                'reviewed_at',
                'archived_at',
            ]);
        });

        Schema::table('supplier_submissions', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn([
                'status',
                'reviewed_at',
                'archived_at',
            ]);
        });
    }
};

