<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();

            $table->string('type', 20)->default('message');
            $table->string('office', 10)->default('any');
            $table->string('name', 120);
            $table->string('subject', 190)->nullable();
            $table->string('email', 190);
            $table->string('phone', 40);
            $table->string('order_ref', 80)->nullable();
            $table->text('body');

            $table->string('status')->default('new');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('archived_at')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
